<?php

namespace App\Http\Controllers;

use App\Models\Seo;
use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

class SeoController extends Controller
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
            $seo = Seo::select('id', 'slug', 'domain_canonical', 'og_image')->where('domain_canonical', 'LIKE', '%' . request()->search . '%')->latest()->paginate(10);
            $search = request()->search;

            if (count($seo) == 0) {
                request()->session()->flash('search', '
                    <div class="alert alert-success mt-4" role="alert">
                        Data yang anda cari tidak ada
                    </div>
                ');
            }
        } else {
            $seo = Seo::select('id', 'slug', 'domain_canonical', 'og_image')->latest()->paginate(10);
        }

        return view('admin/seo/index', compact('seo', 'footer', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $footer = $this->footer;
        return view('admin/seo/create', compact('footer'));
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
            'domain_canonical' => 'required|string|max:100',
            'meta_title' => 'required|string|max:100',
            'meta_description' => 'required',
            'og_image' => 'required|mimes:jpg,jpeg,png',
            'meta_keywords' => 'required',
            'meta_language' => 'required',
            'meta_author' => 'required',
        ]);

        $og_image = time() . '-' . $request->og_image->getClientOriginalName();
        $request->og_image->move('upload/seo', $og_image);

        Seo::create([
            'domain_canonical' => $request->domain_canonical,
            'meta_title' => $request->meta_title,
            'og_image' => $og_image,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'meta_language' => $request->meta_language,
            'meta_author' => $request->meta_author,
            'slug' => Str::slug($request->domain_canonical, '-'),
        ]);

        Alert::success('Sukses', 'Data berhasil ditambahkan');
        return redirect('/seo');
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
        $seo = Seo::select('id','domain_canonical', 'meta_title', 'meta_description', 'meta_keywords', 'meta_language', 'meta_author', 'og_image','created_at')->whereId($id)->firstOrFail();
        return view('admin/seo/show', compact('seo', 'footer'));
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
        $seo = Seo::select('id','domain_canonical', 'meta_title', 'meta_description', 'meta_keywords', 'meta_language', 'meta_author', 'og_image')->whereId($id)->firstOrFail();
        return view('admin/seo/edit', compact('seo', 'footer'));
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
            'domain_canonical' => 'required|string|max:100',
            'meta_title' => 'required|string|max:100',
            'og_image' => 'mimes:jpg,jpeg,png',
            'meta_description' => 'required',
            'meta_language' => 'required',
            'meta_keywords' => 'required',
            'meta_author' => 'required',
        ]);

        $data = [
            'domain_canonical' => $request->domain_canonical,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_language' => $request->meta_language,
            'meta_keywords' => $request->meta_keywords,
            'meta_author' => $request->meta_author,
            'slug' => Str::slug($request->domain_canonical, '-'),
        ];

        $seo = Seo::select('og_image', 'id')->whereId($id)->first();
        if ($request->og_image) {
            File::delete('upload/seo/' .$seo->og_image);

            $og_image = time() . '-' . $request->og_image->getClientOriginalName();
            $request->og_image->move('upload/seo', $og_image);

            $data['og_image'] = $og_image;
        }

        $seo->update($data);

        Alert::success('Sukses', 'Data berhasil diubah');
        return redirect('/seo');
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
        ->showConfirmButton('<a href="/seo/' . $id . '/delete" class="text-white" style="text-decoration: none"> Hapus</a>', '#3085d6')->toHtml()
            ->showCancelButton('Batal', '#aaa')->reverseButtons();

        return redirect('/seo');
    }

    public function delete($id)
    {
        $seo = Seo::select('og_image', 'id')->whereId($id)->firstOrFail();
        File::delete('upload/seo/' . $seo->og_image);
        $seo->delete();

        Alert::success('Sukses', 'Data berhasil dihapus');
        return redirect('/seo');
    }
}
