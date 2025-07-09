<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use App\Models\Artikel;
use App\Models\TagArtikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert; 

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->footer = Footer::select('konten')->first();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footer = $this->footer;

        $search = '';
        if (request()->search) {
            $article = Artikel::select('id', 'artikel_title', 'artikel_konten','artikel_sampul')->where('id_user', Auth::user()->id)->where('artikel_title', 'LIKE', '%'. request()->search .'%')->latest()->paginate(10);
            $search = request()->search;

            if (count($article) == 0) {
                request()->session()->flash('search', '
                    <div class="alert alert-success mt-4" role="alert">
                        Data yang anda cari tidak ada
                    </div>
                '); 
            }
        } else {
            $article = Artikel::select('id', 'artikel_title', 'artikel_konten','artikel_sampul')->where('id_user', Auth::user()->id)->latest()->paginate(10);
        }
       
        return view('admin/article/index', compact('article', 'footer', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $footer = $this->footer;
        $tag_article = TagArtikel::select('id', 'tag_artikel_name')->get();
        return view('admin/article/create', compact('tag_article', 'footer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'artikel_title' => 'required|string|max:50',
            'artikel_konten' => 'required',
            'artikel_sampul' => 'required|mimes:jpg,jpeg,png',
            'tag_artikel' => 'required',
        ]);

        $artikel_sampul = time() . '-' . $request->artikel_sampul->getClientOriginalName();
        $request->artikel_sampul->move('upload/article', $artikel_sampul);

        Artikel::create([
            'artikel_title' => $request->artikel_title,
            'artikel_sampul' => $artikel_sampul,
            'artikel_konten' => $request->artikel_konten,
            'slug' => Str::slug($request->artikel_title, '-'),
            'id_user' => Auth::user()->id
        ])->tag_artikel()->attach($request->tag_artikel);;

        Alert::success('Sukses', 'Data berhasil ditambahkan');
        return redirect('/article');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $footer = $this->footer;
        $article = Artikel::select('id', 'artikel_title', 'artikel_sampul', 'artikel_konten',  'created_at')->whereId($id)->where('id_user', Auth::user()->id)->firstOrFail();
        return view('admin/article/show', compact('article', 'footer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $footer = $this->footer;
        $tag_article = TagArtikel::select('id', 'tag_artikel_name')->get();
        $article = Artikel::select('id', 'artikel_title', 'artikel_sampul','artikel_konten')->whereId($id)->where('id_user', Auth::user()->id)->firstOrFail();
        return view('admin/article/edit', compact('article', 'tag_article', 'footer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'artikel_title' => 'required|string|max:50',
            'artikel_konten' => 'required',
            'artikel_sampul' => 'mimes:jpg,jpeg,png,webp',
            'tag_artikel' => 'required',
        ]);

        $data = [
            'artikel_title' => $request->artikel_title,
            'artikel_konten' => $request->artikel_konten,
            'slug' => Str::slug($request->artikel_title, '-'),
            'id_user' => Auth::user()->id
        ];

        $article = Artikel::select('artikel_sampul', 'id')->whereId($id)->first();
        if ($request->artikel_sampul) {
            File::delete('upload/article/' .$article->artikel_sampul);

            $artikel_sampul = time() . '-' . $request->artikel_sampul->getClientOriginalName();
            $request->artikel_sampul->move('upload/article', $artikel_sampul);

            $data['artikel_sampul'] = $artikel_sampul;
        }

        $article->update($data);

        $article->tag_artikel()->sync($request->tag_artikel);

        Alert::success('Sukses', 'Data berhasil diubah');
        return redirect('/article');
    }

    public function konfirmasi($id)
    {
        alert()->question('Peringatan !', 'Anda yakin akan menghapus data ?')
        ->showConfirmButton('<a href="/article/' . $id . '/delete" class="text-white" style="text-decoration: none"> Hapus</a>', '#3085d6')->toHtml()
        ->showCancelButton('Batal', '#aaa')->reverseButtons();

        return redirect('/article');
    }

    public function delete($id)
    {
        $article = Artikel::select('artikel_sampul', 'id')->whereId($id)->firstOrFail();
        File::delete('upload/article/' . $article->artikel_sampul);
        $article->delete();

        Alert::success('Sukses', 'Data berhasil dihapus');
        return redirect('/article');
    }
}
