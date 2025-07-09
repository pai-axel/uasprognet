<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\OptionsController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\SeoController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StrukturOrganisasiController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\ValueCompanyController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\KategoriBeritaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\TagBeritaController;
use App\Http\Controllers\TagArtikelController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes(['verify' => true, 'register' => false]);

Route::get('/register', function () {
    return redirect('/login');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('/cek-role', function () {
    if (auth()->user()->hasRole(['admin'])) {
        return redirect('/dashboard');
    } else {
        return redirect('/');
    }
    
});

Route::group(['middleware' => ['verified', 'role:admin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::resource('/kategori_berita', KategoriBeritaController::class);
    Route::post('/kategori_berita/search', [KategoriBeritaController::class, 'index']);

    Route::resource('/tag_berita', TagBeritaController::class);
    Route::post('/tag_berita/search', [TagBeritaController::class, 'index']);

    Route::resource('/tag_artikel', TagArtikelController::class);
    Route::post('/tag_artikel/search', [TagArtikelController::class, 'index']);

    Route::resource('/berita', BeritaController::class);
    Route::get('/berita/{id}/konfirmasi', [BeritaController::class, 'konfirmasi']);
    Route::get('/berita/{id}/delete', [BeritaController::class, 'delete']);
    Route::get('/berita/{id}/rekomendasi', [BeritaController::class, 'rekomendasi']);
    Route::post('/berita/search', [BeritaController::class, 'index']);

    Route::resource('/article', ArticleController::class);
    Route::get('/article/{id}/konfirmasi', [ArticleController::class, 'konfirmasi']);
    Route::get('/article/{id}/delete', [ArticleController::class, 'delete']);
    Route::post('/article/search', [ArticleController::class, 'index']);


    Route::resource('/options', OptionsController::class);
    Route::get('/options/{id}/konfirmasi', [OptionsController::class, 'konfirmasi']);
    Route::get('/options/{id}/delete', [OptionsController::class, 'delete']);
    Route::post('/options/search', [OptionsController::class, 'index']);

    Route::resource('/gallery', GalleryController::class);
    Route::get('/gallery/{id}/konfirmasi', [GalleryController::class, 'konfirmasi']);
    Route::get('/gallery/{id}/delete', [GalleryController::class, 'delete']);
    Route::post('/gallery/search', [GalleryController::class, 'index']);

    Route::resource('/banner', BannerController::class);
    Route::get('/banner/{id}/konfirmasi', [BannerController::class, 'konfirmasi']);
    Route::get('/banner/{id}/delete', [BannerController::class, 'delete']);
    Route::post('/banner/search', [BannerController::class, 'index']);

    Route::resource('/faq', FaqController::class);
    Route::get('/faq/{id}/konfirmasi', [FaqController::class, 'konfirmasi']);
    Route::get('/faq/{id}/delete', [FaqController::class, 'delete']);
    Route::post('/faq/search', [FaqController::class, 'index']);

    Route::resource('/seo', SeoController::class);
    Route::get('/seo/{id}/konfirmasi', [SeoController::class, 'konfirmasi']);
    Route::get('/seo/{id}/delete', [SeoController::class, 'delete']);
    Route::post('/seo/search', [SeoController::class, 'index']);

    Route::resource('/support', SupportController::class);
    Route::get('/support/{id}/konfirmasi', [SupportController::class, 'konfirmasi']);
    Route::get('/support/{id}/delete', [SupportController::class, 'delete']);
    Route::post('/support/search', [SupportController::class, 'index']);

    Route::resource('/value_company', ValueCompanyController::class);
    Route::get('/value_company/{id}/konfirmasi', [ValueCompanyController::class, 'konfirmasi']);
    Route::get('/value_company/{id}/delete', [ValueCompanyController::class, 'delete']);
    Route::post('/value_company/search', [ValueCompanyController::class, 'index']);

    Route::resource('/product', ProductController::class);
    Route::get('/product/{id}/konfirmasi', [ProductController::class, 'konfirmasi']);
    Route::get('/product/{id}/delete', [ProductController::class, 'delete']);
    Route::post('/product/search', [ProductController::class, 'index']);

    Route::resource('/struktur_organisasi', StrukturOrganisasiController::class);
    Route::get('/struktur_organisasi/{id}/konfirmasi', [StrukturOrganisasiController::class, 'konfirmasi']);
    Route::get('/struktur_organisasi/{id}/delete', [StrukturOrganisasiController::class, 'delete']);
    Route::post('/struktur_organisasi/search', [StrukturOrganisasiController::class, 'index']);

    Route::resource('/feature', FeatureController::class);
    Route::get('/feature/{id}/konfirmasi', [FeatureController::class, 'konfirmasi']);
    Route::get('/feature/{id}/delete', [FeatureController::class, 'delete']);
    Route::post('/feature/search', [FeatureController::class, 'index']);


    Route::resource('/about', AboutController::class);
    Route::get('/about/{id}/konfirmasi', [AboutController::class, 'konfirmasi']);
    Route::get('/about/{id}/delete', [AboutController::class, 'delete']);
    Route::post('/about/search', [AboutController::class, 'index']);


    Route::resource('/testimoni', TestimoniController::class);
    Route::get('/testimoni/{id}/konfirmasi', [TestimoniController::class, 'konfirmasi']);
    Route::get('/testimoni/{id}/delete', [TestimoniController::class, 'delete']);
    Route::post('/testimoni/search', [TestimoniController::class, 'index']);

    Route::resource('/career', CareerController::class);
    Route::get('/career/{id}/konfirmasi', [CareerController::class, 'konfirmasi']);
    Route::get('/career/{id}/delete', [CareerController::class, 'delete']);
    Route::post('/career/search', [CareerController::class, 'index']);




    Route::get('/footer', [FooterController::class, 'index']);
    Route::patch('/footer/{id}', [FooterController::class, 'update']);

    Route::get('/user/{id}/setting', [UserController::class, 'setting']);
    Route::patch('/user/{id}/setting', [UserController::class, 'ubah_password']);

    // Route::middleware(['role:admin'])->group(function () {
    //     Route::resource('/penulis', PenulisController::class);
    //     Route::get('/penulis/{id}/konfirmasi', [PenulisController::class, 'konfirmasi']);
    //     Route::get('/penulis/{id}/delete', [PenulisController::class, 'delete']);
    //     Route::post('/penulis/search', [PenulisController::class, 'index']);

    //     Route::resource('/pembaca', PembacaController::class);
    //     Route::post('/pembaca/search', [PembacaController::class, 'index']);
    // });
});

Route::get('/', [ArtikelController::class, 'index']);
Route::get('/search', [ArtikelController::class, 'search']);
Route::get('/artikel-artikel', [ArtikelController::class, 'artikel']);
Route::get('/artikel-tag-artikel/{slug}', [ArtikelController::class, 'tag_artikel'])->name('tag_artikel');
Route::get('/artikel-artikeldetail/{slug}', [ArtikelController::class, 'artikel_detail']);
Route::get('/artikel-karir', [ArtikelController::class, 'karir']);
Route::get('/artikel-karirdetail/{slug}', [ArtikelController::class, 'karir_detail']);
Route::get('/artikel-value', [ArtikelController::class, 'value']);
Route::get('/artikel-kontak', [ArtikelController::class, 'kontak']);
Route::get('/artikel-faq', [ArtikelController::class, 'faq']);
Route::get('/artikel-berita', [ArtikelController::class, 'berita']);
Route::get('/artikel-beritadetail/{slug}', [ArtikelController::class, 'berita_detail']);
Route::get('/artikel-history', [ArtikelController::class, 'history']);
Route::get('/artikel-vision', [ArtikelController::class, 'vision']);
Route::get('/artikel-productdetail/{slug}', [ArtikelController::class, 'product_detail']);
Route::get('/artikel-struktur-organisasi', [ArtikelController::class, 'struktur_organisasi']);
Route::get('/artikel-portfolio', [ArtikelController::class, 'portfolio']);
Route::get('/artikel-testimoni', [ArtikelController::class, 'testimoni']);
Route::get('/{slug}', [ArtikelController::class, 'berita_detail']);
Route::get('/artikel-kategori-berita/{slug}', [ArtikelController::class, 'kategori_berita'])->name('kategori_berita');
Route::get('/artikel-tag-berita/{slug}', [ArtikelController::class, 'tag_berita'])->name('tag_berita');
Route::get('/artikel-options/{slug}', [ArtikelController::class, 'options']);
Route::get('/artikel-author/{id}', [ArtikelController::class, 'author']);
Route::post('/support-artikel', [ArtikelController::class, 'storeSupport'])->name('support-artikel.store');

