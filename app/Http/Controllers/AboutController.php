<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class AboutController extends Controller
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
        $search = '';
        if (request()->search) {
            $about = About::select('id', 'slug', 'about_title','about_year','about_content', 'about_image')->where('about_title', 'LIKE', '%' . request()->search . '%')->latest()->paginate(10);
            $search = request()->search;

            if (count($about) == 0) {
                request()->session()->flash('search', '
                    <div class="alert alert-success mt-4" role="alert">
                        Data yang anda cari tidak ada
                    </div>
                ');
            }
        } else {
            $about = About::select('id', 'slug', 'about_title','about_year','about_content', 'about_image')->latest()->paginate(10);
        }

        return view('admin/about/index', compact('about', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $footer = $this->footer;
        return view('admin/about/create', compact('footer'));
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
            'about_title' => 'required|string|max:50',
            'about_year' => 'required',
            'about_content' => 'required',
            'about_image' => 'required|mimes:jpg,jpeg,png',
        ]);

        $about_image = time() . '-' . $request->about_image->getClientOriginalName();
        $request->about_image->move('upload/about', $about_image);

        About::create([
            'about_title' => $request->about_title,
            'about_year' => $request->about_year,
            'about_content' => $request->about_content,
            'about_image' => $about_image,
            'slug' => Str::slug($request->about_title, '-'),
        ]);

        Alert::success('Sukses', 'Data berhasil ditambahkan');
        return redirect('/about');
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
        $about = About::select('id', 'about_title','about_year','about_content', 'about_image', 'created_at')->whereId($id)->firstOrFail();
        return view('admin/about/show', compact('about', 'footer'));
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
        $about= About::select('id', 'about_title','about_year','about_content', 'about_image')->whereId($id)->firstOrFail();
        return view('admin/about/edit', compact('about', 'footer'));
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
            'about_title' => 'required|string|max:50',
            'about_year' => 'required',
            'about_content' => 'required',
            'about_image' => 'mimes:jpg,jpeg,png',
        ]);

        $data = [
            'about_title' => $request->about_title,
            'about_year' => $request->about_year,
            'about_content' => $request->about_content,
            'slug' => Str::slug($request->about_title, '-'),
        ];

        $about = About::select('about_image', 'id')->whereId($id)->first();
        if ($request->about_image) {
            File::delete('upload/about/' .$about->about_image);

            $about_image = time() . '-' . $request->about_image->getClientOriginalName();
            $request->about_image->move('upload/about', $about_image);

            $data['about_image'] = $about_image;
        }

        $about->update($data);

        Alert::success('Sukses', 'Data berhasil diubah');
        return redirect('/about');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about = About::findOrFail($id);
        File::delete('upload/about/' . $about->about_image);
        $about->delete();
    
        Alert::success('Sukses', 'Data berhasil dihapus');
        return redirect('/about');
    }

    public function konfirmasi($id)
    {
        alert()->question('Peringatan !', 'Anda yakin akan menghapus data ?')
        ->showConfirmButton('<a href="/about/' . $id . '/delete" class="text-white" style="text-decoration: none"> Hapus</a>', '#3085d6')->toHtml()
            ->showCancelButton('Batal', '#aaa')->reverseButtons();

        return redirect('/about');
    }

    public function delete($id)
    {
        $about = About::select('about_image', 'id')->whereId($id)->firstOrFail();
        File::delete('upload/about/' . $about->about_image);
        $about->delete();

        Alert::success('Sukses', 'Data berhasil dihapus');
        return redirect('/about');
    }
}
