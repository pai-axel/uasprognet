<?php

namespace App\Http\Controllers;

use App\Models\Options;
use App\Models\Footer;
use App\Models\KategoriBerita;
use App\Models\Berita;
use App\Models\Gallery;
use App\Models\Artikel;
use App\Models\Career;
use App\Models\TagBerita;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->footer = Footer::select('konten')->first();
    }
    public function index()
    {
        $footer = $this->footer;

        $jumlah_berita = Berita::count();
        $jumlah_artikel = Artikel::count();
        $jumlah_gallery = Gallery::count();
        $jumlah_karir = Career::count();
        

        $hari_ini = Carbon::today();
        $berita = Berita::select('id', 'berita_title', 'id_kategori_berita', 'berita_sampul_1')->whereDate('created_at', $hari_ini)->get();
        $artikel = Artikel::select('id', 'artikel_title', 'artikel_sampul')->whereDate('created_at', $hari_ini)->get();
        $gallery = Gallery::select('id', 'gallery_title', 'gallery_image')->whereDate('created_at', $hari_ini)->get();
        $karir = Career::select('id', 'career_title', 'career_image')->whereDate('created_at', $hari_ini)->get();
        
        
        return view('admin/dashboard', compact('footer', 'jumlah_berita', 'berita', 'artikel', 'jumlah_artikel', 'gallery', 'jumlah_gallery', 'karir', 'jumlah_karir'));
    }
}
