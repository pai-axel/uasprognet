<?php

namespace App\Http\Controllers;

use App\Models\Options;
use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

class OptionsController extends Controller
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
            $options = Options::select('id', 'slug', 'company_name', 'banner_image')->where('company_name', 'LIKE', '%' . request()->search . '%')->latest()->paginate(10);
            $search = request()->search;

            if (count($options) == 0) {
                request()->session()->flash('search', '
                    <div class="alert alert-success mt-4" role="alert">
                        Data yang anda cari tidak ada
                    </div>
                ');
            }
        } else {
            $options = Options::select('id', 'slug', 'company_name', 'banner_image')->latest()->paginate(10);
        }

        return view('admin/options/index', compact('options', 'footer', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $footer = $this->footer;
        return view('admin/options/create', compact('footer'));
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
            'company_name' => 'required|string|max:20',
            'theme_color' => 'required|string|max:10',
            'banner_image' => 'required|mimes:jpg,jpeg,png,webp',
            'location' => 'required|string|max:50',
            'call' => 'required|string|max:15',
            'email' => 'required|string|max:20',
            'maps' => 'required',
            'product_footer' => 'required|string|max:255'
        ]);

        $banner_image = time() . '-' . $request->banner_image->getClientOriginalName();
        $request->banner_image->move('upload/options', $banner_image);

        Options::create([
            'company_name' => $request->company_name,
            'theme_color' => $request->theme_color,
            'banner_image' => $banner_image,
            'location' => $request->location,
            'call' => $request->call,
            'email' => $request->email,
            'maps' => $request->maps,
            'product_footer' => $request->product_footer,
            'slug' => Str::slug($request->company_name, '-'),
        ]);

        Alert::success('Sukses', 'Data berhasil ditambahkan');
        return redirect('/options');
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
        $options = Options::select('id', 'company_name', 'theme_color', 'banner_image', 'location', 'call', 'email', 'maps', 'product_footer', 'created_at')->whereId($id)->firstOrFail();
        return view('admin/options/show', compact('options', 'footer'));
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
        $options = Options::select('id','company_name', 'theme_color', 'banner_image', 'location', 'call', 'email', 'maps', 'product_footer')->whereId($id)->firstOrFail();
        return view('admin/options/edit', compact('options', 'footer'));
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
            'company_name' => 'required|string|max:20',
            'theme_color' => 'required|string|max:10',
            'banner_image' => 'mimes:jpg,jpeg,png,webp',
            'location' => 'required|string|max:50',
            'call' => 'required|string|max:15',
            'email' => 'required|string|max:20',
            'maps' => 'required',
            'product_footer' => 'required|string|max:255'
        ]);

        $data = [
            'company_name' => $request->company_name,
            'theme_color' => $request->theme_color,
            'location' => $request->location,
            'call' => $request->call,
            'email' => $request->email,
            'maps' => $request->maps,
            'product_footer' => $request->product_footer,
            'slug' => Str::slug($request->company_name, '-'),
        ];

        $options = Options::select('banner_image', 'id')->whereId($id)->first();
        if ($request->banner_image) {
            File::delete('upload/options/' .$options->banner_image);

            $banner_image = time() . '-' . $request->banner_image->getClientOriginalName();
            $request->banner_image->move('upload/options', $banner_image);

            $data['banner_image'] = $banner_image;
        }

        $options->update($data);

        Alert::success('Sukses', 'Data berhasil diubah');
        return redirect('/options');
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
        ->showConfirmButton('<a href="/options/' . $id . '/delete" class="text-white" style="text-decoration: none"> Hapus</a>', '#3085d6')->toHtml()
            ->showCancelButton('Batal', '#aaa')->reverseButtons();

        return redirect('/options');
    }

    public function delete($id)
    {
        $options = Options::select('banner_image', 'id')->whereId($id)->firstOrFail();
        File::delete('upload/options/' . $options->banner_image);
        $options->delete();

        Alert::success('Sukses', 'Data berhasil dihapus');
        return redirect('/options');
    }
}
