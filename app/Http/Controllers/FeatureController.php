<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

class FeatureController extends Controller
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
            $feature = Feature::select('id', 'slug', 'feature_title', 'feature_content', 'feature_image')->where('feature_title', 'LIKE', '%' . request()->search . '%')->latest()->paginate(10);
            $search = request()->search;

            if (count($feature) == 0) {
                request()->session()->flash('search', '
                    <div class="alert alert-success mt-4" role="alert">
                        Data yang anda cari tidak ada
                    </div>
                ');
            }
        } else {
            $feature = Feature::select('id', 'slug', 'feature_title', 'feature_content', 'feature_image')->latest()->paginate(10);
        }

        return view('admin/feature/index', compact('feature', 'footer', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $footer = $this->footer;
        return view('admin/feature/create', compact('footer'));
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
            'feature_title' => 'required|string|max:50',
            'feature_content' => 'required',
            'feature_image' => 'required|mimes:jpg,jpeg,png',
        ]);

        $feature_image = time() . '-' . $request->feature_image->getClientOriginalName();
        $request->feature_image->move('upload/feature', $feature_image);

        Feature::create([
            'feature_title' => $request->feature_title,
            'feature_content' => $request->feature_content,
            'feature_image' => $feature_image,
            'slug' => Str::slug($request->feature_title, '-'),
        ]);

        Alert::success('Sukses', 'Data berhasil ditambahkan');
        return redirect('/feature');
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
        $feature = Feature::select('id', 'feature_title', 'feature_image', 'feature_content', 'created_at')->whereId($id)->firstOrFail();
        return view('admin/feature/show', compact('feature', 'footer'));
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
        $feature = Feature::select('id','feature_title', 'feature_content', 'feature_image')->whereId($id)->firstOrFail();
        return view('admin/feature/edit', compact('feature', 'footer'));
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
            'feature_title' => 'required|string|max:50',
            'feature_content' => 'required',
            'feature_image' => 'mimes:jpg,jpeg,png',
        ]);

        $data = [
            'feature_title' => $request->feature_title,
            'feature_content' => $request->feature_content,
            'slug' => Str::slug($request->feature_title, '-'),
        ];

        $feature = Feature::select('feature_image', 'id')->whereId($id)->first();
        if ($request->feature_image) {
            File::delete('upload/feature/' .$feature->feature_image);

            $feature_image = time() . '-' . $request->feature_image->getClientOriginalName();
            $request->feature_image->move('upload/feature', $feature_image);

            $data['feature_image'] = $feature_image;
        }

        $feature->update($data);

        Alert::success('Sukses', 'Data berhasil diubah');
        return redirect('/feature');
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
        ->showConfirmButton('<a href="/feature/' . $id . '/delete" class="text-white" style="text-decoration: none"> Hapus</a>', '#3085d6')->toHtml()
            ->showCancelButton('Batal', '#aaa')->reverseButtons();

        return redirect('/feature');
    }

    public function delete($id)
    {
        $feature = Feature::select('feature_image', 'id')->whereId($id)->firstOrFail();
        File::delete('upload/feature/' . $feature->feature_image);
        $feature->delete();

        Alert::success('Sukses', 'Data berhasil dihapus');
        return redirect('/feature');
    }
}
