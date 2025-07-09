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

    public function search(Request $request)
    {
        $query = $request->input('query');
        $footer = $this->footer;
        $berita = Berita::where('berita_title',  'like', "%$query%")->latest()->paginate(3);
        $artikel = Artikel::where('artikel_title',  'like', "%$query%")->latest()->paginate(3);
        $karir = Career::where('career_title',  'like', "%$query%")->latest()->paginate(3);
        $options = Options::select('slug', 'banner_image', 'company_name', 'location', 'call', 'email', 'maps', 'product_footer')->first();
        return view('artikel/search', compact('footer', 'options', 'berita' , 'artikel', 'karir', 'query'));
    }

    public function berita_detail($slug)
    {
        // Mengambil kategori berita beserta jumlah artikel yang terkait
        $recentKategoriBerita = KategoriBerita::withCount('berita')  // Menghitung jumlah artikel yang terkait
            ->whereNotIn('slug', [$slug])
            ->limit(5)
            ->get();
        
        // Kode lainnya tetap seperti sebelumnya
        $footer = $this->footer;
        $recentBerita = Berita::where('slug', '!=', $slug)->limit(3)->get();
        $recentTagBerita = TagBerita::where('slug', '!=', $slug)->limit(8)->get();
        $berita = Berita::with(['tag_berita', 'kategori_berita', 'user'])->where('slug', $slug)->firstOrFail();
        $options = Options::select('slug', 'banner_image', 'company_name', 'location', 'call', 'email', 'maps', 'product_footer')->first();
        $tag_berita = TagBerita::select('slug', 'tag_berita_name')->orderBy('tag_berita_name', 'asc')->get();
        $kategori_berita = KategoriBerita::select('slug', 'kategori_berita_name')->orderBy('kategori_berita_name', 'asc')->get();
        
        return view('artikel/beritadetail', compact('berita','recentBerita', 'recentTagBerita','recentKategoriBerita','kategori_berita', 'footer', 'options', 'tag_berita'));
    }


    public function berita()
    {
        $footer = $this->footer;
        $options = Options::select('slug', 'banner_image', 'company_name', 'location', 'call', 'email', 'maps', 'product_footer')->first();
        $kategori_berita = KategoriBerita::select('slug', 'kategori_berita_name')->orderBy('kategori_berita_name', 'asc')->get();
        $tag_berita = TagBerita::select('slug', 'tag_berita_name')->orderBy('tag_berita_name', 'asc')->get();

        request()->session()->forget('search');
        if (request()->search) {
            $berita = Berita::select('berita_sampul_1', 'berita_title', 'berita_konten_1', 'slug', 'created_at')->where('berita_title', 'LIKE', '%'. request()->search .'%')->latest()->paginate(6);

            if (count($berita) == 0) {
                request()->session()->flash('search', 'Berita yang anda cari tidak ada');
            }
            $search = request()->search;
        } else {
            $berita = Berita::select('berita_sampul_1', 'berita_title', 'berita_konten_1', 'slug', 'created_at')->latest()->paginate(6);
            $search = '';
        }
        
        return view('artikel/berita', compact('footer', 'options', 'berita', 'search', 'kategori_berita', 'tag_berita'));
    }


    public function kategori_berita($slug)
    {
        $footer = $this->footer;
        // Mengambil kategori yang sesuai berdasarkan $slug
        $kategori_berita_dipilih = KategoriBerita::where('slug', $slug)->firstOrFail();
        $options = Options::select('slug', 'banner_image', 'company_name')->first();

         // Mencari artikel berdasarkan kategori yang dipilih
         $berita = Berita::select('berita_sampul_1','berita_sampul_2', 'berita_sampul_3', 'berita_title', 'berita_konten_1', 'berita_konten_2','slug', 'created_at')
         ->whereHas('kategori_berita', function ($query) use ($slug) {
             $query->where('slug', $slug);
         })
         ->latest()
         ->paginate(6);
        
         // Mengecek apakah ada pencarian
         $search = request()->search;
         if ($search) {
             $berita = Berita::select('berita_sampul_1','berita_sampul_2', 'berita_sampul_3', 'berita_title', 'berita_konten_1', 'berita_konten_2','slug', 'created_at')
                 ->where('berita_title', 'LIKE', '%' . $search . '%')
                 ->whereHas('kategori_berita', function ($query) use ($slug) {
                     $query->where('slug', $slug);
                 })
                 ->latest()
                 ->paginate(6);
 
             if ($berita->isEmpty()) {
                 request()->session()->flash('search', 'Berita yang anda cari tidak ada');
             }
         }

        $kategori_berita = KategoriBerita::select('slug', 'kategori_berita_name')->orderBy('kategori_berita_name', 'asc')->get();
        return view('artikel/berita', compact('berita', 'kategori_berita', 'options', 'footer', 'kategori_berita_dipilih', 'search'));
    }

    public function tag_berita($slug)  
    {
        $footer = $this->footer;
        $options = Options::select('slug', 'banner_image', 'company_name')->first();
        $tag_berita_dipilih = TagBerita::where('slug', $slug)->firstOrFail();

                // Mencari artikel berdasarkan kategori yang dipilih
        $berita = Berita::select('berita_sampul_1','berita_sampul_2', 'berita_sampul_3', 'berita_title', 'berita_konten_1', 'berita_konten_2','slug', 'created_at')
            ->whereHas('tag_berita', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })
            ->latest()
            ->paginate(6);

        // Mengecek apakah ada pencarian
        $search = request()->search;
        if ($search) {
            $berita = Berita::select('berita_sampul_1','berita_sampul_2', 'berita_sampul_3', 'berita_title', 'berita_konten_1', 'berita_konten_2','slug', 'created_at')
                ->where('berita_title', 'LIKE', '%' . $search . '%')
                ->whereHas('tag_berita', function ($query) use ($slug) {
                    $query->where('slug', $slug);
                })
                ->latest()
                ->paginate(6);

            if ($berita->isEmpty()) {
                request()->session()->flash('search', 'Berita yang anda cari tidak ada');
            }
        }
        
        $tag_berita = TagBerita::select('slug', 'tag_berita_name')->orderBy('tag_berita_name', 'asc')->get();
        $kategori_berita = KategoriBerita::select('slug', 'kategori_berita_name')->orderBy('kategori_berita_name', 'asc')->get();
        return view('artikel/berita', compact('berita', 'kategori_berita', 'footer', 'tag_berita_dipilih', 'tag_berita', 'search', 'options'));
    }

    public function paginate($items, $perPage = 6, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }



    public function struktur_organisasi()
    {
        $footer = $this->footer;
        $struktur_organisasi = StrukturOrganisasi::select('slug', 'nama_anggota', 'image_anggota', 'posisi')->latest()->get();
        $options = Options::select('slug', 'banner_image', 'company_name', 'location', 'call', 'email', 'maps', 'product_footer')->first();
        return view('artikel/struktur_organisasi', compact('footer', 'options', 'struktur_organisasi'));
    }

    
    public function options($slug)
    {
        $footer = $this->footer;
        $options = Options::select('id', 'company_name', 'banner_image', 'created_at', 'location', 'call', 'email', 'maps', 'product_footer')->where('slug', $slug)->firstOrFail();
        $kategori_berita = KategoriBerita::select('slug', 'kategori_berita_name')->orderBy('kategori_berita_name', 'asc')->get();
        return view('artikel/options', compact('options', 'kategori_berita', 'footer'));
    }

   
    public function history()
    {
        $footer = $this->footer;
        $about = About::select('slug', 'about_title', 'about_year', 'about_content', 'about_image')->latest()->get();
        $options = Options::select('slug', 'banner_image', 'company_name', 'location', 'call', 'email', 'maps', 'product_footer')->first();
        return view('artikel/history', compact('footer', 'options', 'about'));
    }

    public function vision()
    {
        $footer = $this->footer;
        $banner1 = Banner::select('slug', 'banner_title', 'banner_sub')->find(1);
        $banner2 = Banner::select('slug', 'banner_title', 'banner_sub')->find(2);
        $banner3 = Banner::select('slug', 'banner_title', 'banner_sub')->find(3);
        $banner4 = Banner::select('slug', 'banner_title', 'banner_sub')->find(4);
        $options = Options::select('slug', 'banner_image', 'company_name', 'location', 'call', 'email', 'maps', 'product_footer')->first();
        return view('artikel/vision', compact('footer', 'options', 'banner1', 'banner2', 'banner3', 'banner4'));
    }

    public function value()
    {
        $footer = $this->footer;
        $value_company = ValueCompany::select('value_title', 'value_color', 'value_content')->latest()->get();
        $options = Options::select('slug', 'banner_image', 'company_name', 'location', 'call', 'email', 'maps', 'product_footer')->first();
        return view('artikel/value', compact('footer', 'options', 'value_company'));
    }
    

    public function portfolio()
    {
        $footer = $this->footer;
        $gallery = Gallery::select('slug', 'gallery_title', 'gallery_image')->latest()->paginate(6);
        $options = Options::select('slug', 'banner_image', 'company_name', 'location', 'call', 'email', 'maps', 'product_footer')->first();
        return view('artikel/portfolio', compact('footer', 'options', 'gallery'));
    }

    public function testimoni()
    {
        $footer = $this->footer;
        $testimoni = Testimoni::select('slug', 'testi_client_avatar', 'testi_client_name', 'testi_client_content')->latest()->get();
        $options = Options::select('slug', 'banner_image', 'company_name', 'location', 'call', 'email', 'maps', 'product_footer')->first();
        return view('artikel/testimoni', compact('footer', 'options', 'testimoni'));
    }

    public function kontak()
    {
        $footer = $this->footer;
        $options = Options::select('slug', 'banner_image', 'company_name', 'location', 'call', 'email', 'maps', 'product_footer')->first();
        return view('artikel/kontak', compact('footer', 'options'));
    }

    public function faq()
    {
        $footer = $this->footer;
        $faq = Faq::select('slug', 'question', 'answer')->latest()->get();
        $options = Options::select('slug', 'banner_image', 'company_name', 'location', 'call', 'email', 'maps', 'product_footer')->first();
        return view('artikel/faq', compact('footer', 'options', 'faq'));
    }

    public function artikel_detail($slug)
    {
        $footer = $this->footer;
        $recentArtikel = Artikel::where('slug', '!=', $slug)->limit(3)->get();
        $recentTagArtikel = TagArtikel::where('slug', '!=', $slug)->limit(8)->get();
        $artikel = Artikel::with(['tag_artikel', 'user'])->where('slug', $slug)->firstOrFail();
        $options = Options::select('slug', 'banner_image', 'company_name', 'location', 'call', 'email', 'maps', 'product_footer')->first();
        $tag_artikel = TagArtikel::select('slug', 'tag_artikel_name')->orderBy('tag_artikel_name', 'asc')->get();
        return view('artikel/artikeldetail', compact('artikel','recentArtikel', 'recentTagArtikel', 'footer', 'options', 'tag_artikel'));
    }

    public function product_detail($slug)
    {
        $footer = $this->footer;
        $product= Product::select('id', 'product_title', 'product_image', 'created_at', 'product_content')->where('slug', $slug)->firstOrFail();
        $options = Options::select('slug', 'banner_image', 'company_name', 'location', 'call', 'email', 'maps', 'product_footer')->first();
        return view('artikel/productdetail', compact('product', 'footer', 'options'));
    }
    
    public function artikel()
    {
        $footer = $this->footer;
        $options = Options::select('slug', 'banner_image', 'company_name', 'location', 'call', 'email', 'maps', 'product_footer')->first();
        $tag_artikel = TagArtikel::select('slug', 'tag_artikel_name')->orderBy('tag_artikel_name', 'asc')->get();
        
        request()->session()->forget('search');
        if (request()->search) {
            $artikel = Artikel::select('artikel_sampul', 'artikel_title', 'artikel_konten', 'slug', 'created_at')->where('artikel_title', 'LIKE', '%'. request()->search .'%')->latest()->paginate(6);

            if (count($artikel) == 0) {
                request()->session()->flash('search', 'Artikel yang anda cari tidak ada');
            }
            $search = request()->search;
        } else {
            $artikel = Artikel::select('artikel_sampul', 'artikel_title', 'artikel_konten', 'slug', 'created_at')->latest()->paginate(6);
            $search = '';
        }

        return view('artikel/artikel', compact('footer','tag_artikel', 'artikel', 'search', 'options'));
    }

    public function tag_artikel($slug)  
    {
        $footer = $this->footer;
        $options = Options::select('slug', 'banner_image', 'company_name')->first();
        $tag_artikel_dipilih = TagArtikel::where('slug', $slug)->firstOrFail();

                // Mencari artikel berdasarkan kategori yang dipilih
        $artikel = Artikel::select('artikel_sampul','artikel_title', 'artikel_konten','slug', 'created_at')
            ->whereHas('tag_artikel', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })
            ->latest()
            ->paginate(6);

        // Mengecek apakah ada pencarian
        $search = request()->search;
        if ($search) {
            $artikel = Artikel::select('artikel_sampul', 'artikel_title', 'artikel_konten', 'slug', 'created_at')
                ->where('artikel_title', 'LIKE', '%' . $search . '%')
                ->whereHas('tag_artikel', function ($query) use ($slug) {
                    $query->where('slug', $slug);
                })
                ->latest()
                ->paginate(6);

            if ($artikel->isEmpty()) {
                request()->session()->flash('search', 'Artikel yang anda cari tidak ada');
            }
        }
        
        $tag_artikel = TagArtikel::select('slug', 'tag_artikel_name')->orderBy('tag_artikel_name', 'asc')->get();
        return view('artikel/artikel', compact('artikel', 'footer', 'tag_artikel_dipilih', 'tag_artikel', 'search', 'options'));
    }


    public function karir_detail($slug)
    {
        $footer = $this->footer;
        // Ambil 3 karir terbaru yang tersedia (career_available = true) selain karir yang sedang dilihat
        $recentKarir = Career::where('slug', '!=', $slug)
                             ->where('career_available', true)  // Pastikan hanya yang available yang ditampilkan
                             ->limit(3)
                             ->get();
    
        // Ambil karir yang sesuai dengan slug dan pastikan hanya yang tersedia yang ditampilkan
        $karir = Career::select('id', 'career_title', 'career_image', 'career_content', 'career_available', 'created_at')
                       ->where('slug', $slug)
                       ->where('career_available', true)  // Pastikan hanya yang available yang ditampilkan
                       ->firstOrFail();
    
        // Ambil data opsi lainnya (seperti company_name dan banner_image)
        $options = Options::select('slug', 'banner_image', 'company_name', 'location', 'call', 'email', 'maps', 'product_footer')->first();
    
        // Kirim data ke view
        return view('artikel/karirdetail', compact('karir','recentKarir', 'footer', 'options'));
    }
    

    public function karir()
    {
        $footer = $this->footer;
        $options = Options::select('slug', 'banner_image', 'company_name', 'location', 'call', 'email', 'maps', 'product_footer')->first();
    
        request()->session()->forget('search');
    
        request()->validate([
            'search' => 'nullable|string|max:100'
        ]);
    
        $search = request()->search;
        $query = Career::select('career_title', 'career_image', 'career_content', 'career_available', 'slug', 'created_at')
            ->where('career_available', true); // Filter hanya karir yang tersedia
    
        if ($search) {
            $query->where('career_title', 'LIKE', '%' . $search . '%');
            if ($query->count() == 0) {
                request()->session()->flash('search', 'Karir yang anda cari tidak ada');
            }
        }
    
        $karir = $query->latest()->paginate(6);
    
        return view('artikel/karir', compact('footer', 'options', 'karir', 'search'));
    }
    


    public function storeSupport(Request $request)
    {
        $request->validate([
            'client_name' => 'required|string|max:255',
            'client_phone' => 'required|string|max:15',
            'client_email' => 'required|email|max:255',
            'client_text' => 'required|string',
        ]);
    
        try {
            Support::create([
                'client_name' => $request->client_name,
                'client_phone' => $request->client_phone,
                'client_email' => $request->client_email,
                'client_text' => $request->client_text,
            ]);
    
            Alert::success('Sukses', 'Data berhasil ditambahkan');
            return redirect()->back()->with('success', 'Support data has been successfully submitted.');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Data tidak berhasil ditambahkan');
            return redirect()->back()->with('error', 'Failed to submit support data. Please try again.');
        }
    }


}
