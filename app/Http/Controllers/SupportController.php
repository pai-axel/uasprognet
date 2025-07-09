<?php

namespace App\Http\Controllers;

use App\Models\Support;
use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class SupportController extends Controller
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
            $support = Support::select('id', 'client_name', 'client_phone', 'client_email' , 'client_text')->where('client_name', 'LIKE', '%' . request()->search . '%')->latest()->paginate(10);
            $search = request()->search;

            if (count($support) == 0) {
                request()->session()->flash('search', '
                    <div class="alert alert-success mt-4" role="alert">
                        Data yang anda cari tidak ada
                    </div>
                ');
            }
        } else {
            $support = Support::select('id', 'client_name', 'client_phone', 'client_email' , 'client_text')->latest()->paginate(10);
        }

        return view('admin/support/index', compact('support', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $footer = $this->footer;
        return view('admin/support/create', compact('footer'));
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
            'client_name' => 'required|string|max:50',
            'client_phone' => 'required|string|max:15',
            'client_email' => 'required|string|max:20',
            'client_text' => 'required'
        ]);


        Support::create([
            'client_name' => $request->client_name,
            'client_phone' => $request->client_phone,
            'client_email' => $request->client_email,
            'client_text' => $request->client_text,
        ]);

        Alert::success('Sukses', 'Data berhasil ditambahkan');
        return redirect('/support');
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
        $support = Support::select('id', 'client_name', 'client_phone', 'client_email', 'client_text', 'created_at')->whereId($id)->firstOrFail();
        return view('admin/support/show', compact('support', 'footer'));
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
        $support= Support::select('id','client_name', 'client_phone', 'client_email', 'client_text')->whereId($id)->firstOrFail();
        return view('admin/support/edit', compact('support', 'footer'));
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
            'client_name' => 'required|string|max:50',
            'client_phone' => 'required|string|max:15',
            'client_email' => 'required|string|max:20',
            'client_text' => 'required'
        ]);

        $data = [
            'client_name' => $request->client_name,
            'client_phone' => $request->client_phone,
            'client_email' => $request->client_email,
            'client_text' => $request->client_text,
        ];

        $support = Support::select('client_name', 'id')->whereId($id)->first();

        $support->update($data);

        Alert::success('Sukses', 'Data berhasil diubah');
        return redirect('/support');
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
        ->showConfirmButton('<a href="/support/' . $id . '/delete" class="text-white" style="text-decoration: none"> Hapus</a>', '#3085d6')->toHtml()
            ->showCancelButton('Batal', '#aaa')->reverseButtons();

        return redirect('/support');
    }

    public function delete($id)
    {
        $support = Support::select('client_name', 'id')->whereId($id)->firstOrFail();
        $support->delete();

        Alert::success('Sukses', 'Data berhasil dihapus');
        return redirect('/support');
    }
}
