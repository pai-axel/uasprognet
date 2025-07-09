<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class AboutController extends Controller
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
        $search = '';
        if (request()->search) {
            $about = About::select('id', 'slug', 'about_title','about_year','about_content', 'about_image')->where('about_title', 'LIKE', '%' . request()->search . '%')->latest()->paginate(10);
            $search = request()->search;

            if (count($about) == 0) {
                request()->session()->flash('search', '
                    <div class="alert alert-success mt-4" role="alert">
                        Data yang anda cari tidak ada
                    </div>
                ');
            }
        } else {
            $about = About::select('id', 'slug', 'about_title','about_year','about_content', 'about_image')->latest()->paginate(10);
        }

        return view('admin/about/index', compact('about', 'search'));
    }
}
