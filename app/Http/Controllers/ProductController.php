<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
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
            $product = Product::select('id', 'slug', 'product_title', 'product_content', 'product_image')->where('product_title', 'LIKE', '%' . request()->search . '%')->latest()->paginate(10);
            $search = request()->search;

            if (count($product) == 0) {
                request()->session()->flash('search', '
                    <div class="alert alert-success mt-4" role="alert">
                        Data yang anda cari tidak ada
                    </div>
                ');
            }
        } else {
            $product = Product::select('id', 'slug', 'product_title', 'product_content', 'product_image')->latest()->paginate(10);
        }

        return view('admin/product/index', compact('product', 'footer', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $footer = $this->footer;
        return view('admin/product/create', compact('footer'));
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
            'product_title' => 'required|string|max:50',
            'product_content' => 'required',
            'product_image' => 'required|mimes:jpg,jpeg,png,webp',
        ]);

        $product_image = time() . '-' . $request->product_image->getClientOriginalName();
        $request->product_image->move('upload/product', $product_image);

        Product::create([
            'product_title' => $request->product_title,
            'product_content' => $request->product_content,
            'product_image' => $product_image,
            'slug' => Str::slug($request->product_title, '-'),
        ]);

        Alert::success('Sukses', 'Data berhasil ditambahkan');
        return redirect('/product');
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
        $product = Product::select('id', 'product_title', 'product_image', 'product_content', 'created_at')->whereId($id)->firstOrFail();
        return view('admin/product/show', compact('product', 'footer'));
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
        $product = Product::select('id','product_title', 'product_content', 'product_image')->whereId($id)->firstOrFail();
        return view('admin/product/edit', compact('product', 'footer'));
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
            'product_title' => 'required|string|max:50',
            'product_content' => 'required',
            'product_image' => 'mimes:jpg,jpeg,png,webp',
        ]);

        $data = [
            'product_title' => $request->product_title,
            'product_content' => $request->product_content,
            'slug' => Str::slug($request->product_title, '-'),
        ];

        $product = Product::select('product_image', 'id')->whereId($id)->first();
        if ($request->product_image) {
            File::delete('upload/product/' .$product->product_image);

            $product_image = time() . '-' . $request->product_image->getClientOriginalName();
            $request->product_image->move('upload/product', $product_image);

            $data['product_image'] = $product_image;
        }

        $product->update($data);

        Alert::success('Sukses', 'Data berhasil diubah');
        return redirect('/product');
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
        ->showConfirmButton('<a href="/product/' . $id . '/delete" class="text-white" style="text-decoration: none"> Hapus</a>', '#3085d6')->toHtml()
            ->showCancelButton('Batal', '#aaa')->reverseButtons();

        return redirect('/product');
    }

    public function delete($id)
    {
        $product = Product::select('product_image', 'id')->whereId($id)->firstOrFail();
        File::delete('upload/product/' . $product->product_image);
        $product->delete();

        Alert::success('Sukses', 'Data berhasil dihapus');
        return redirect('/product');
    }
}
