<?php

namespace App\Http\Controllers;

use App\Models\StrukturOrganisasi;
use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

class StrukturOrganisasiController extends Controller
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
            $struktur_organisasi = StrukturOrganisasi::select('id', 'slug', 'nama_anggota', 'posisi', 'image_anggota')->where('nama_anggota', 'LIKE', '%' . request()->search . '%')->latest()->paginate(10);
            $search = request()->search;

            if (count($struktur_organisasi) == 0) {
                request()->session()->flash('search', '
                    <div class="alert alert-success mt-4" role="alert">
                        Data yang anda cari tidak ada
                    </div>
                ');
            }
        } else {
            $struktur_organisasi = StrukturOrganisasi::select('id', 'slug', 'nama_anggota', 'posisi', 'image_anggota')->latest()->paginate(10);
        }

        return view('admin/struktur_organisasi/index', compact('struktur_organisasi', 'footer', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $footer = $this->footer;
        return view('admin/struktur_organisasi/create', compact('footer'));
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
            'nama_anggota' => 'required|string|max:100',
            'posisi' => 'required|string|max:100',
            'image_anggota' => 'required|mimes:jpg,jpeg,png,webp'
        ]);

        $image_anggota = time() . '-' . $request->image_anggota->getClientOriginalName();
        $request->image_anggota->move('upload/struktur_organisasi', $image_anggota);

        StrukturOrganisasi::create([
            'nama_anggota' => $request->nama_anggota,
            'posisi' => $request->posisi,
            'image_anggota' => $image_anggota,
            'slug' => Str::slug($request->nama_anggota, '-'),
        ]);

        Alert::success('Sukses', 'Data berhasil ditambahkan');
        return redirect('/struktur_organisasi');
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
        $struktur_organisasi = StrukturOrganisasi::select('id', 'nama_anggota', 'image_anggota', 'posisi', 'created_at')->whereId($id)->firstOrFail();
        return view('admin/struktur_organisasi/show', compact('struktur_organisasi', 'footer'));
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
        $struktur_organisasi = StrukturOrganisasi::select('id','nama_anggota', 'posisi', 'image_anggota')->whereId($id)->firstOrFail();
        return view('admin/struktur_organisasi/edit', compact('struktur_organisasi', 'footer'));
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
            'nama_anggota' => 'required|string|max:100',
            'posisi' => 'required|string|max:100',
            'image_anggota' => 'required|mimes:jpg,jpeg,png,webp'
        ]);

        $data = [
            'nama_anggota' => $request->nama_anggota,
            'posisi' => $request->posisi,
            'slug' => Str::slug($request->nama_anggota, '-'),
        ];

        $struktur_organisasi = StrukturOrganisasi::select('image_anggota', 'id')->whereId($id)->first();
        if ($request->image_anggota) {
            File::delete('upload/struktur_organisasi/' .$struktur_organisasi->image_anggota);

            $image_anggota = time() . '-' . $request->image_anggota->getClientOriginalName();
            $request->image_anggota->move('upload/struktur_organisasi', $image_anggota);

            $data['image_anggota'] = $image_anggota;
        }

        $struktur_organisasi->update($data);

        Alert::success('Sukses', 'Data berhasil diubah');
        return redirect('/struktur_organisasi');
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
        ->showConfirmButton('<a href="/struktur_organisasi/' . $id . '/delete" class="text-white" style="text-decoration: none"> Hapus</a>', '#3085d6')->toHtml()
            ->showCancelButton('Batal', '#aaa')->reverseButtons();

        return redirect('/struktur_organisasi');
    }

    public function delete($id)
    {
        $struktur_organisasi = StrukturOrganisasi::select('image_anggota', 'id')->whereId($id)->firstOrFail();
        File::delete('upload/struktur_organisasi/' . $struktur_organisasi->image_anggota);
        $struktur_organisasi->delete();

        Alert::success('Sukses', 'Data berhasil dihapus');
        return redirect('/struktur_organisasi');
    }
}
