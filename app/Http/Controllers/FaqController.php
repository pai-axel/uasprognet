<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class FaqController extends Controller
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
            $faq = Faq::select('id', 'slug', 'question', 'answer')->where('question', 'LIKE', '%' . request()->search . '%')->latest()->paginate(10);
            $search = request()->search;

            if (count($faq) == 0) {
                request()->session()->flash('search', '
                    <div class="alert alert-success mt-4" role="alert">
                        Data yang anda cari tidak ada
                    </div>
                ');
            }
        } else {
            $faq = Faq::select('id', 'slug', 'question', 'answer')->latest()->paginate(10);
        }

        return view('admin/faq/index', compact('faq', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $footer = $this->footer;
        return view('admin/faq/create', compact('footer'));
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
            'question' => 'required|string|max:255',
            'answer' => 'required|string|max:255'
        ]);


        Faq::create([
            'question' => $request->question,
            'answer' => $request->answer,
            'slug' => Str::slug($request->question, '-'),
        ]);

        Alert::success('Sukses', 'Data berhasil ditambahkan');
        return redirect('/faq');
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
        $faq = Faq::select('id', 'question', 'answer', 'created_at')->whereId($id)->firstOrFail();
        return view('admin/faq/show', compact('faq', 'footer'));
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
        $faq= Faq::select('id','question', 'answer')->whereId($id)->firstOrFail();
        return view('admin/faq/edit', compact('faq', 'footer'));
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
            'question' => 'required|string|max:255',
            'answer' => 'required|string|max:255',
        ]);

        $data = [
            'question' => $request->question,
            'answer' => $request->answer,
            'slug' => Str::slug($request->question, '-'),
        ];

        $faq = Faq::select('question', 'id')->whereId($id)->first();

        $faq->update($data);

        Alert::success('Sukses', 'Data berhasil diubah');
        return redirect('/faq');
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
        ->showConfirmButton('<a href="/faq/' . $id . '/delete" class="text-white" style="text-decoration: none"> Hapus</a>', '#3085d6')->toHtml()
            ->showCancelButton('Batal', '#aaa')->reverseButtons();

        return redirect('/faq');
    }

    public function delete($id)
    {
        $faq = Faq::select('question', 'id')->whereId($id)->firstOrFail();
        $faq->delete();

        Alert::success('Sukses', 'Data berhasil dihapus');
        return redirect('/faq');
    }
}
