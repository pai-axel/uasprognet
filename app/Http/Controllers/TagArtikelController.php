<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use App\Models\TagArtikel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagArtikelController extends Controller
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
            $tag_artikel = TagArtikel::select('id', 'tag_artikel_name', 'slug')->where('tag_artikel_name', 'LIKE', '%' . request()->search . '%')->latest()->paginate(10);
            $search = request()->search;

            if (count($tag_artikel) == 0) {
                request()->session()->flash('search', '
                    <div class="alert alert-success mt-4" role="alert">
                        Data yang anda cari tidak ada
                    </div>
                ');
            }
        } else {
            $tag_artikel = TagArtikel::select('id', 'tag_artikel_name', 'slug')->latest()->paginate(10);
        }

        return view('admin/tag_artikel/index', compact('tag_artikel', 'footer', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $footer = $this->footer;
        return view('admin/tag_artikel/create', compact('footer'));
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
            'tag_artikel_name' => 'required|string|max:50',
        ]);

        TagArtikel::create([
            'tag_artikel_name' => $request->tag_artikel_name,
            'slug' => Str::slug($request->tag_artikel_name, '-')
        ]);

        $request->session()->flash('sukses', '
            <div class="alert alert-success" role="alert">
                Data berhasil ditambahkan
            </div>
        ');
        return redirect('/tag_artikel');
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
        $tag_artikel = TagArtikel::select('id', 'tag_artikel_name')->whereId($id)->firstOrFail();
        return view('admin/tag_artikel/edit', compact('tag_artikel', 'footer'));
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
            'tag_artikel_name' => 'required|string|max:50',
        ]);

        TagArtikel::whereId($id)->update([
            'tag_artikel_name' => $request->tag_artikel_name,
            'slug' => Str::slug($request->tag_artikel_name, '-')
        ]);

        $request->session()->flash('sukses', '
            <div class="alert alert-success" role="alert">
                Data berhasil diubah
            </div>
        ');
        return redirect('/tag_artikel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TagArtikel::whereId($id)->delete();

        request()->session()->flash('sukses', '
            <div class="alert alert-success" role="alert">
                Data berhasil dihapus
            </div>
        ');
        return redirect('/tag_artikel');
    }
}
