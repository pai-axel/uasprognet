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
}
