<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use App\Models\KategoriBerita;
use App\Models\Berita;
use App\Models\Rekomendasi;
use App\Models\TagBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert; 

class BeritaController extends Controller
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
            $berita = Berita::select('id', 'berita_title', 'berita_konten_1', 'berita_konten_2', 'berita_sampul_1', 'berita_sampul_2', 'berita_sampul_3', 'id_kategori_berita')->where('id_user', Auth::user()->id)->where('berita_title', 'LIKE', '%'. request()->search .'%')->latest()->paginate(10);
            $search = request()->search;

            if (count($berita) == 0) {
                request()->session()->flash('search', '
                    <div class="alert alert-success mt-4" role="alert">
                        Data yang anda cari tidak ada
                    </div>
                '); 
            }
        } else {
            $berita = Berita::select('id', 'berita_title', 'berita_konten_1', 'berita_konten_2', 'berita_sampul_1', 'berita_sampul_2', 'berita_sampul_3', 'id_kategori_berita')->where('id_user', Auth::user()->id)->latest()->paginate(10);
        }
       
        return view('admin/berita/index', compact('berita', 'footer', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $footer = $this->footer;
        $tag_berita = TagBerita::select('id', 'tag_berita_name')->get();
        $kategori_berita = KategoriBerita::select('id', 'kategori_berita_name')->get();
        return view('admin/berita/create', compact('kategori_berita', 'tag_berita', 'footer'));
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
            'berita_title' => 'required|string|max:50',
            'berita_sampul_1' => 'required|mimes:jpg,jpeg,png,webp',
            'berita_sampul_2' => 'required|mimes:jpg,jpeg,png,webp',
            'berita_sampul_3' => 'required|mimes:jpg,jpeg,png,webp',
            'berita_konten_1' => 'required',
            'berita_konten_2' => 'required',
            'kategori_berita' => 'required',
            'tag_berita' => 'required',
        ]);

        $berita_sampul_1 = time() .'-' .$request->berita_sampul_1->getClientOriginalName();
        $request->berita_sampul_1->move('upload/berita', $berita_sampul_1);

        $berita_sampul_2 = time() .'-' .$request->berita_sampul_2->getClientOriginalName();
        $request->berita_sampul_2->move('upload/berita', $berita_sampul_2);

        $berita_sampul_3 = time() .'-' .$request->berita_sampul_3->getClientOriginalName();
        $request->berita_sampul_3->move('upload/berita', $berita_sampul_3);

        Berita::create([
            'berita_sampul_1' => $berita_sampul_1,
            'berita_sampul_2' => $berita_sampul_2,
            'berita_sampul_3' => $berita_sampul_3,
            'berita_title' => $request->berita_title,
            'berita_konten_1' => $request->berita_konten_1,
            'berita_konten_2' => $request->berita_konten_2,
            'id_kategori_berita' => $request->kategori_berita,
            'slug' => Str::slug($request->berita_title, '-'),
            'id_user' => Auth::user()->id
        ])->tag_berita()->attach($request->tag_berita);

        Alert::success('Sukses', 'Data berhasil ditambahkan');
        return redirect('/berita');
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
        $berita = Berita::select('id', 'berita_title', 'berita_sampul_1', 'berita_sampul_2', 'berita_sampul_3', 'berita_konten_1', 'berita_konten_2',  'created_at')->whereId($id)->where('id_user', Auth::user()->id)->firstOrFail();
        return view('admin/berita/show', compact('berita', 'footer'));
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
        $tag_berita = TagBerita::select('id', 'tag_berita_name')->get();
        $kategori_berita = KategoriBerita::select('id', 'kategori_berita_name')->get();
        $berita = Berita::select('id', 'berita_title', 'berita_sampul_1', 'berita_sampul_2', 'berita_sampul_3', 'berita_konten_1', 'berita_konten_2', 'id_kategori_berita')->whereId($id)->where('id_user', Auth::user()->id)->firstOrFail();
        return view('admin/berita/edit', compact('berita', 'kategori_berita', 'tag_berita', 'footer'));
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
            'berita_title' => 'required|string|max:50',
            'berita_konten_1' => 'required',
            'berita_konten_2' => 'required',
            'berita_sampul_1' => 'mimes:jpg,jpeg,png,webp',
            'berita_sampul_2' => 'mimes:jpg,jpeg,png,webp',
            'berita_sampul_3' => 'mimes:jpg,jpeg,png,webp',
            'kategori_berita' => 'required',
            'tag_berita' => 'required',
        ]);

        $data = [
            'berita_title' => $request->berita_title,
            'berita_konten_1' => $request->berita_konten_1,
            'berita_konten_2' => $request->berita_konten_2,
            'id_kategori_berita' => $request->kategori_berita,
            'slug' => Str::slug($request->berita_title, '-'),
            'id_user' => Auth::user()->id
        ];

        $berita = Berita::select('berita_sampul_1', 'berita_sampul_2', 'berita_sampul_3', 'id')->whereId($id)->first();
        if ($request->berita_sampul_1) {
            File::delete('upload/berita/' .$berita->berita_sampul_1);

            $berita_sampul_1 = time() . '-' . $request->berita_sampul_1->getClientOriginalName();
            $request->berita_sampul_1->move('upload/berita', $berita_sampul_1);

            $data['berita_sampul_1'] = $berita_sampul_1;
        }

        if ($request->berita_sampul_2) {
            File::delete('upload/berita/' .$berita->berita_sampul_2);

            $berita_sampul_2 = time() . '-' . $request->berita_sampul_2->getClientOriginalName();
            $request->berita_sampul_2->move('upload/berita', $berita_sampul_2);

            $data['berita_sampul_2'] = $berita_sampul_2;
        }

        if ($request->berita_sampul_3) {
            File::delete('upload/berita/' .$berita->berita_sampul_3);

            $berita_sampul_3 = time() . '-' . $request->berita_sampul_3->getClientOriginalName();
            $request->berita_sampul_3->move('upload/berita', $berita_sampul_3);

            $data['berita_sampul_3'] = $berita_sampul_3;
        }


        $berita->update($data);
        $berita->tag_berita()->sync($request->tag_berita);

        Alert::success('Sukses', 'Data berhasil diubah');
        return redirect('/berita');
    }

    public function konfirmasi($id)
    {
        alert()->question('Peringatan !', 'Anda yakin akan menghapus data ?')
        ->showConfirmButton('<a href="/berita/' . $id . '/delete" class="text-white" style="text-decoration: none"> Hapus</a>', '#3085d6')->toHtml()
        ->showCancelButton('Batal', '#aaa')->reverseButtons();

        return redirect('/berita');
    }

    public function delete($id)
{
    $berita = Berita::select('berita_sampul_1', 'berita_sampul_2', 'berita_sampul_3', 'id')->whereId($id)->where('id_user', Auth::user()->id)->firstOrFail();

    // Menghapus file berita_sampul_1
    File::delete('upload/berita/' . $berita->berita_sampul_1);
    
    // Menghapus file berita_sampul_2
    if (!empty($berita->berita_sampul_2)) {
        File::delete('upload/berita/' . $berita->berita_sampul_2);
    }

    // Menghapus file berita_sampul_3
    if (!empty($berita->berita_sampul_3)) {
        File::delete('upload/berita/' . $berita->berita_sampul_3);
    }

    // Menghapus record berita
    $berita->delete();

    Alert::success('Sukses', 'Data berhasil dihapus');
    return redirect('/berita');
}


    public function rekomendasi($id)
    {
        $berita = DB::table('berita')
            ->join('rekomendasi', 'berita.id', '=', 'rekomendasi.id_berita')
            ->where('rekomendasi.id_berita', $id)
            ->get();

        if ($berita->isEmpty()) {
            Rekomendasi::create([
                'id_berita' => $id
            ]);

            Alert::success('Sukses', 'berita berhasil direkomendasikan');
            return redirect('/berita');
        } else {
            Rekomendasi::where('id_berita', $id)->delete();
            Alert::success('Sukses', 'berita batal direkomendasikan');
            return redirect('/berita');
        }
        
    }
}
