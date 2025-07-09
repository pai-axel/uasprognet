<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class BannerController extends Controller
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
            $banner = Banner::select('id', 'slug', 'banner_title', 'banner_sub')->where('banner_title', 'LIKE', '%' . request()->search . '%')->latest()->paginate(10);
            $search = request()->search;

            if (count($banner) == 0) {
                request()->session()->flash('search', '
                    <div class="alert alert-success mt-4" role="alert">
                        Data yang anda cari tidak ada
                    </div>
                ');
            }
        } else {
            $banner = Banner::select('id', 'slug', 'banner_title', 'banner_sub')->latest()->paginate(10);
        }

        return view('admin/banner/index', compact('banner', 'search'));
    }
}
