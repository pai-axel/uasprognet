<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

class TestimoniController extends Controller
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
            $testimoni = Testimoni::select('id', 'slug', 'testi_client_name', 'testi_client_avatar', 'testi_client_content')->where('testi_client_name', 'LIKE', '%' . request()->search . '%')->latest()->paginate(10);
            $search = request()->search;

            if (count($testimoni) == 0) {
                request()->session()->flash('search', '
                    <div class="alert alert-success mt-4" role="alert">
                        Data yang anda cari tidak ada
                    </div>
                ');
            }
        } else {
            $testimoni = Testimoni::select('id', 'slug', 'testi_client_name', 'testi_client_content', 'testi_client_avatar')->latest()->paginate(10);
        }

        return view('admin/testimoni/index', compact('testimoni', 'footer', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $footer = $this->footer;
        return view('admin/testimoni/create', compact('footer'));
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
            'testi_client_name' => 'required|string|max:50',
            'testi_client_content' => 'required',
            'testi_client_avatar' => 'required|mimes:jpg,jpeg,png,webp',
        ]);

        $testi_client_avatar = time() . '-' . $request->testi_client_avatar->getClientOriginalName();
        $request->testi_client_avatar->move('upload/testimoni', $testi_client_avatar);

        Testimoni::create([
            'testi_client_name' => $request->testi_client_name,
            'testi_client_content' => $request->testi_client_content,
            'testi_client_avatar' => $testi_client_avatar,
            'slug' => Str::slug($request->testi_client_name, '-'),
        ]);

        Alert::success('Sukses', 'Data berhasil ditambahkan');
        return redirect('/testimoni');
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
        $testimoni = Testimoni::select('id', 'testi_client_name', 'testi_client_avatar', 'testi_client_content', 'created_at')->whereId($id)->firstOrFail();
        return view('admin/testimoni/show', compact('testimoni', 'footer'));
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
        $testimoni = Testimoni::select('id','testi_client_name', 'testi_client_content', 'testi_client_avatar')->whereId($id)->firstOrFail();
        return view('admin/testimoni/edit', compact('testimoni', 'footer'));
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
            'testi_client_name' => 'required|string|max:50',
            'testi_client_content' => 'required',
            'testi_client_avatar' => 'mimes:jpg,jpeg,png',
        ]);

        $data = [
            'testi_client_name' => $request->testi_client_name,
            'testi_client_content' => $request->testi_client_content,
            'slug' => Str::slug($request->testi_client_name, '-'),
        ];

        $testimoni = Testimoni::select('testi_client_avatar', 'id')->whereId($id)->first();
        if ($request->testi_client_avatar) {
            File::delete('upload/testimoni/' .$testimoni->testi_client_avatar);

            $testi_client_avatar = time() . '-' . $request->testi_client_avatar->getClientOriginalName();
            $request->testi_client_avatar->move('upload/testimoni', $testi_client_avatar);

            $data['testi_client_avatar'] = $testi_client_avatar;
        }

        $testimoni->update($data);

        Alert::success('Sukses', 'Data berhasil diubah');
        return redirect('/testimoni');
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
        ->showConfirmButton('<a href="/testimoni/' . $id . '/delete" class="text-white" style="text-decoration: none"> Hapus</a>', '#3085d6')->toHtml()
            ->showCancelButton('Batal', '#aaa')->reverseButtons();

        return redirect('/testimoni');
    }

    public function delete($id)
    {
        $testimoni = Testimoni::select('testi_client_avatar', 'id')->whereId($id)->firstOrFail();
        File::delete('upload/testimoni/' . $testimoni->testi_client_avatar);
        $testimoni->delete();

        Alert::success('Sukses', 'Data berhasil dihapus');
        return redirect('/testimoni');
    }
}
