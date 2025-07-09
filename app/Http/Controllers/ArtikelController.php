<?php

namespace App\Http\Controllers;

use App\Models\Options;
use App\Models\Banner;
use App\Models\Footer;
use App\Models\About;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\Support;
use App\Models\ValueCompany;
use App\Models\StrukturOrganisasi;
use App\Models\Career;
use App\Models\Testimoni;
use App\Models\TagArtikel;
use App\Models\Artikel;
use App\Models\KategoriBerita;
use App\Models\Berita;
use App\Models\Feature;
use App\Models\Rekomendasi;
use App\Models\TagBerita;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ArtikelController extends Controller
{
    public function __construct()
    {
        $this->footer = Footer::select('konten')->first();
    }

    public function index()
    {
        $footer = $this->footer;
        $options = Options::select('slug', 'banner_image', 'company_name', 'location', 'call', 'email', 'maps', 'product_footer')->first();
        $banner = Banner::select('slug', 'banner_title', 'banner_sub')->latest()->get();
        $testimoni = Testimoni::select('slug', 'testi_client_avatar', 'testi_client_name', 'testi_client_content')->latest()->get();
        $feature = Feature::select('slug', 'feature_title', 'feature_image', 'feature_content')->latest()->get();

        request()->session()->forget('search');
        if (request()->search) {
            $berita = Berita::select('berita_sampul_1','berita_sampul_2', 'berita_sampul_3', 'berita_title', 'berita_konten_1', 'berita_konten_2', 'slug', 'created_at')->where('berita_title', 'LIKE', '%'. request()->search .'%')->latest()->paginate(6);

            if (count($berita) == 0) {
                request()->session()->flash('search', 'Berita yang anda cari tidak ada');
            }
            $search = request()->search;
        } else {
            $berita = Berita::select('berita_sampul_1','berita_sampul_2', 'berita_sampul_3', 'berita_title', 'slug', 'berita_konten_1', 'berita_konten_2', 'created_at')->latest()->paginate(6);
            $search = '';
        }

        $kategori_berita = KategoriBerita::select('slug', 'kategori_berita_name')->orderBy('kategori_berita_name', 'asc')->get();
        $product = Product::select('slug', 'product_title', 'product_image', 'product_content')->latest()->get();
        $home = true;
        $rekomendasi = Rekomendasi::select('id_berita')->latest()->paginate(3);
        return view('artikel/index', compact('berita', 'kategori_berita', 'options', 'footer', 'testimoni', 'home', 'feature', 'search', 'rekomendasi', 'banner', 'product'));
    }

}
