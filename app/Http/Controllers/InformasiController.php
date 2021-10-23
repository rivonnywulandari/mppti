<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informasi = DB::table('informasi')->orderby('id', 'desc')->get();
        return view('aslab.informasi', ['informasi'=>$informasi]);
    }
    public function add_process(Request $informasi)
    {
        DB::table('informasi')->insert([
            'judul'=>$informasi->judul,
            'isi'=>$informasi->isi
        ]);
 
        return redirect()->action([InformasiController::class, 'index']);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $informasi = DB::table('informasi')->where('id', $id)->first();
        return view('aslab.detail', ['informasi'=>$informasi]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $informasi = DB::table('informasi')->where('id', $id)->first();
        return view('aslab.editInfo', ['informasi'=>$informasi]);
    }
    public function edit_process(Request $informasi)
    {
        $id = $informasi->id;
        $judul = $informasi->judul;
        $isi = $informasi->isi;
        DB::table('informasi')->where('id', $id)
                            ->update(['judul' => $judul, 'isi' => $isi]);
        return redirect()->action([InformasiController::class, 'index']);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('informasi')->where('id', $id)
                            ->delete();
        return redirect()->action([InformasiController::class, 'index']);
    }
}
