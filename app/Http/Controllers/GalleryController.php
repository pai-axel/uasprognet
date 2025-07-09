<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
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
            $gallery = Gallery::select('id', 'slug', 'gallery_title', 'gallery_image')->where('gallery_title', 'LIKE', '%' . request()->search . '%')->latest()->paginate(10);
            $search = request()->search;

            if (count($gallery) == 0) {
                request()->session()->flash('search', '
                    <div class="alert alert-success mt-4" role="alert">
                        Data yang anda cari tidak ada
                    </div>
                ');
            }
        } else {
            $gallery = Gallery::select('id', 'slug', 'gallery_title', 'gallery_image')->latest()->paginate(10);
        }

        return view('admin/gallery/index', compact('gallery', 'footer', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $footer = $this->footer;
        return view('admin/gallery/create', compact('footer'));
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
            'gallery_title' => 'required|string|max:50',
            'gallery_image' => 'required|mimes:jpg,jpeg,png',
        ]);

        $gallery_image = time() . '-' . $request->gallery_image->getClientOriginalName();
        $request->gallery_image->move('upload/gallery', $gallery_image);

        Gallery::create([
            'gallery_title' => $request->gallery_title,
            'gallery_image' => $gallery_image,
            'slug' => Str::slug($request->gallery_title, '-'),
        ]);

        Alert::success('Sukses', 'Data berhasil ditambahkan');
        return redirect('/gallery');
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
        $gallery = Gallery::select('id', 'gallery_title', 'gallery_image', 'created_at')->whereId($id)->firstOrFail();
        return view('admin/gallery/show', compact('gallery', 'footer'));
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
        $gallery = Gallery::select('id','gallery_title', 'gallery_image')->whereId($id)->firstOrFail();
        return view('admin/gallery/edit', compact('gallery', 'footer'));
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
            'gallery_title' => 'required|string|max:50',
            'gallery_image' => 'mimes:jpg,jpeg,png',
        ]);

        $data = [
            'gallery_title' => $request->gallery_title,
            'slug' => Str::slug($request->gallery_title, '-'),
        ];

        $gallery = Gallery::select('gallery_image', 'id')->whereId($id)->first();
        if ($request->gallery_image) {
            File::delete('upload/gallery/' .$gallery->gallery_image);

            $gallery_image = time() . '-' . $request->gallery_image->getClientOriginalName();
            $request->gallery_image->move('upload/gallery', $gallery_image);

            $data['gallery_image'] = $gallery_image;
        }

        $gallery->update($data);

        Alert::success('Sukses', 'Data berhasil diubah');
        return redirect('/gallery');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function konfirmasi($id)
    {
        alert()->question('Peringatan !', 'Anda yakin akan menghapus data ?')
        ->showConfirmButton('<a href="/gallery/' . $id . '/delete" class="text-white" style="text-decoration: none"> Hapus</a>', '#3085d6')->toHtml()
            ->showCancelButton('Batal', '#aaa')->reverseButtons();

        return redirect('/gallery');
    }

    public function delete($id)
    {
        $gallery = Gallery::select('gallery_image', 'id')->whereId($id)->firstOrFail();
        File::delete('upload/gallery/' . $gallery->gallery_image);
        $gallery->delete();

        Alert::success('Sukses', 'Data berhasil dihapus');
        return redirect('/gallery');
    }
}
