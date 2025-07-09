<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use App\Models\TagBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagBeritaController extends Controller
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
            $tag_berita = TagBerita::select('id', 'tag_berita_name', 'slug')->where('tag_berita_name', 'LIKE', '%' . request()->search . '%')->latest()->paginate(10);
            $search = request()->search;

            if (count($tag_berita) == 0) {
                request()->session()->flash('search', '
                    <div class="alert alert-success mt-4" role="alert">
                        Data yang anda cari tidak ada
                    </div>
                ');
            }
        } else {
            $tag_berita = TagBerita::select('id', 'tag_berita_name', 'slug')->latest()->paginate(10);
        }

        return view('admin/tag_berita/index', compact('tag_berita', 'footer', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $footer = $this->footer;
        return view('admin/tag_berita/create', compact('footer'));
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
            'tag_berita_name' => 'required|string|max:50',
        ]);

        TagBerita::create([
            'tag_berita_name' => $request->tag_berita_name,
            'slug' => Str::slug($request->tag_berita_name, '-')
        ]);

        $request->session()->flash('sukses', '
            <div class="alert alert-success" role="alert">
                Data berhasil ditambahkan
            </div>
        ');
        return redirect('/tag_berita');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $tag_berita = TagBerita::select('id', 'tag_berita_name')->whereId($id)->firstOrFail();
        return view('admin/tag_berita/edit', compact('tag_berita', 'footer'));
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
            'tag_berita_name' => 'required|string|max:50',
        ]);

        TagBerita::whereId($id)->update([
            'tag_berita_name' => $request->tag_berita_name,
            'slug' => Str::slug($request->tag_berita_name, '-')
        ]);

        $request->session()->flash('sukses', '
            <div class="alert alert-success" role="alert">
                Data berhasil diubah
            </div>
        ');
        return redirect('/tag_berita');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TagBerita::whereId($id)->delete();

        request()->session()->flash('sukses', '
            <div class="alert alert-success" role="alert">
                Data berhasil dihapus
            </div>
        ');
        return redirect('/tag_berita');
    }
}
