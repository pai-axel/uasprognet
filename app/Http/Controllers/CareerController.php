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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $footer = $this->footer;
        return view('admin/career/create', compact('footer'));
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
            'career_title' => 'required|string|max:100',
            'career_content' => 'required',
            'career_available' => 'required',
            'career_image' => 'required|mimes:jpg,jpeg,png',
        ]);

        $career_image = time() . '-' . $request->career_image->getClientOriginalName();
        $request->career_image->move('upload/career', $career_image);

        Career::create([
            'career_title' => $request->career_title,
            'career_content' => $request->career_content,
            'career_available' => $request->career_available,
            'career_image' => $career_image,
            'slug' => Str::slug($request->career_title, '-'),
        ]);

        Alert::success('Sukses', 'Data berhasil ditambahkan');
        return redirect('/career');
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
        $career = Career::select('id', 'career_title', 'career_image', 'career_content', 'career_available', 'created_at')->whereId($id)->firstOrFail();
        return view('admin/career/show', compact('career', 'footer'));
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
        $career = Career::select('id','career_title', 'career_content', 'career_available','career_image')->whereId($id)->firstOrFail();
        return view('admin/career/edit', compact('career', 'footer'));
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
            'career_title' => 'required|string|max:100',
            'career_content' => 'required',
            'career_available' => 'required',
            'career_image' => 'mimes:jpg,jpeg,png',
        ]);

        $data = [
            'career_title' => $request->career_title,
            'career_content' => $request->career_content,
            'career_available' => $request->career_available,
            'slug' => Str::slug($request->career_title, '-'),
        ];

        $career = Career::select('career_image', 'id')->whereId($id)->first();
        if ($request->career_image) {
            File::delete('upload/career/' .$career->career_image);

            $career_image = time() . '-' . $request->career_image->getClientOriginalName();
            $request->career_image->move('upload/career', $career_image);

            $data['career_image'] = $career_image;
        }

        $career->update($data);

        Alert::success('Sukses', 'Data berhasil diubah');
        return redirect('/career');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function konfirmasi($id)
    {
        alert()->question('Peringatan !', 'Anda yakin akan menghapus data ?')
        ->showConfirmButton('<a href="/career/' . $id . '/delete" class="text-white" style="text-decoration: none"> Hapus</a>', '#3085d6')->toHtml()
            ->showCancelButton('Batal', '#aaa')->reverseButtons();

        return redirect('/career');
    }

    public function delete($id)
    {
        $career = Career::select('career_image', 'id')->whereId($id)->firstOrFail();
        File::delete('upload/career/' . $career->career_image);
        $career->delete();

        Alert::success('Sukses', 'Data berhasil dihapus');
        return redirect('/career');
    }
}
