<?php

namespace App\Http\Controllers;

use App\Models\ValueCompany;
use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class ValueCompanyController extends Controller
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
            $value_company = ValueCompany::select('id', 'value_title', 'value_color', 'value_content')->where('value_title', 'LIKE', '%' . request()->search . '%')->latest()->paginate(10);
            $search = request()->search;

            if (count($value_company) == 0) {
                request()->session()->flash('search', '
                    <div class="alert alert-success mt-4" role="alert">
                        Data yang anda cari tidak ada
                    </div>
                ');
            }
        } else {
            $value_company = ValueCompany::select('id', 'value_title', 'value_color', 'value_content')->latest()->paginate(10);
        }

        return view('admin/value_company/index', compact('value_company', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $footer = $this->footer;
        return view('admin/value_company/create', compact('footer'));
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
            'value_title' => 'required|string|max:100',
            'value_color' => 'required|string|max:20',
            'value_content' => 'required',
        ]);


        ValueCompany::create([
            'value_title' => $request->value_title,
            'value_color' => $request->value_color,
            'value_content' => $request->value_content,
        ]);

        Alert::success('Sukses', 'Data berhasil ditambahkan');
        return redirect('/value_company');
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
        $value_company = ValueCompany::select('id', 'value_title', 'value_color', 'value_content', 'created_at')->whereId($id)->firstOrFail();
        return view('admin/value_company/show', compact('value_company', 'footer'));
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
        $value_company= ValueCompany::select('id','value_title', 'value_color', 'value_content')->whereId($id)->firstOrFail();
        return view('admin/value_company/edit', compact('value_company', 'footer'));
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
            'value_title' => 'required|string|max:100',
            'value_color' => 'required|string|max:20',
            'value_content' => 'required',
        ]);

        $data = [
            'value_title' => $request->value_title,
            'value_color' => $request->value_color,
            'value_content' => $request->value_content,
        ];

        $value_company = ValueCompany::select('value_title', 'id')->whereId($id)->first();

        $value_company->update($data);

        Alert::success('Sukses', 'Data berhasil diubah');
        return redirect('/value_company');
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
        ->showConfirmButton('<a href="/value_company/' . $id . '/delete" class="text-white" style="text-decoration: none"> Hapus</a>', '#3085d6')->toHtml()
            ->showCancelButton('Batal', '#aaa')->reverseButtons();

        return redirect('/value_company');
    }

    public function delete($id)
    {
        $value_company = ValueCompany::select('value_title', 'id')->whereId($id)->firstOrFail();
        $value_company->delete();

        Alert::success('Sukses', 'Data berhasil dihapus');
        return redirect('/value_company');
    }
}
