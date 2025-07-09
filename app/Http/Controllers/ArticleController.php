<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use App\Models\Artikel;
use App\Models\TagArtikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert; 

class ArticleController extends Controller
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
            $article = Artikel::select('id', 'artikel_title', 'artikel_konten','artikel_sampul')->where('id_user', Auth::user()->id)->where('artikel_title', 'LIKE', '%'. request()->search .'%')->latest()->paginate(10);
            $search = request()->search;

            if (count($article) == 0) {
                request()->session()->flash('search', '
                    <div class="alert alert-success mt-4" role="alert">
                        Data yang anda cari tidak ada
                    </div>
                '); 
            }
        } else {
            $article = Artikel::select('id', 'artikel_title', 'artikel_konten','artikel_sampul')->where('id_user', Auth::user()->id)->latest()->paginate(10);
        }
       
        return view('admin/article/index', compact('article', 'footer', 'search'));
    }
}
