<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

class CareerController extends Controller
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
            $career = Career::select('id', 'slug', 'career_title', 'career_content', 'career_image', 'career_available')->where('career_title', 'LIKE', '%' . request()->search . '%')->latest()->paginate(10);
            $search = request()->search;

            if (count($career) == 0) {
                request()->session()->flash('search', '
                    <div class="alert alert-success mt-4" role="alert">
                        Data yang anda cari tidak ada
                    </div>
                ');
            }
        } else {
            $career = Career::select('id', 'slug', 'career_title', 'career_content', 'career_image', 'career_available')->latest()->paginate(10);
        }

        return view('admin/career/index', compact('career', 'footer', 'search'));
    }
}
