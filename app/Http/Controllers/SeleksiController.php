<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Seleksi;
use App\Models\JenisSeleksi;
use App\Models\Daftar;

class SeleksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($ids)
    {
        $jenis = DB::table('jenisseleksi')->where('id', $ids)->first();
        $user = Seleksi::select('id_users')->where('id_seleksi', $ids)->get()->toArray();
        $users = Daftar::join('users', 'daftar.id', '=', 'users.id')
                ->select('users.name', 'daftar.id')
                ->whereNotIn('daftar.id', $user)
                ->orderby('daftar.id', 'desc')
                ->get();
        return view('aslab.detailnilai', ['user'=>$users], ['jenis'=>$jenis]);
    }
    public function index_edit($id)
    {
        $jenis = DB::table('jenisseleksi')->where('id', $id)->first();
        $user = DB::table('seleksi')->orderby('seleksi.id_users', 'desc')
                    ->join('daftar', 'daftar.id', '=', 'seleksi.id_users')
                    ->join('users', 'users.id', '=', 'seleksi.id_users')
                    ->where('id_seleksi', $id)
                    ->get();
        return view('aslab.detailnilai_edit', ['user'=>$user], ['jenis'=>$jenis]);
    }
    public function tampil_input($id,$ids)
    {
        $tampil = DB::table('daftar')->where('daftar.id', $id)
                    ->join('users', 'daftar.id', '=', 'users.id')
                    ->select('users.name','daftar.id')
                    ->first();
        $jenis  = DB::table('jenisseleksi')->where('id', $ids)->first();
        return view('aslab.inputNilai', ['tampil'=>$tampil], ['jenis'=>$jenis]);
    }
    public function input_nilai(Request $seleksi)
    {   
        $input = DB::table('seleksi')->insert([
            'id_users'=>$seleksi->id_peserta,
            'id_seleksi'=>$seleksi->id_seleksi,
            'nilai'=>$seleksi->nilai,
            'keterangan'=>$seleksi->keterangan
        ]);
 
        return redirect()->action(
            [SeleksiController::class, 'index'], ['ids' => $seleksi->id_seleksi]
        );
    }

    public function menu()
    {
        $tahap = DB::table('jenisseleksi')->orderby('id', 'desc')->get();
        return view('aslab.menupenilaian', ['tahap'=>$tahap]);
    }
    public function tampil_edit($id,$ids)
    {
        $nilai = DB::table('seleksi')
                ->join('users', 'users.id', '=', 'seleksi.id_users')
                ->where('id_seleksi', $ids)
                ->Where('id_users', $id)
                ->first();
        $users = DB::table('daftar')
                ->join('users', 'users.id', '=', 'daftar.id')
                ->where('daftar.id', $id)
                ->first();
        return view('aslab.editNilai', ['nilai'=>$nilai], ['user'=>$users]);
    }
    public function edit_nilai_process(Request $seleksi)
    {
        $id_seleksi = $seleksi->id_seleksi;
        $id_peserta = $seleksi->id_peserta;
        $nilai = $seleksi->nilai;
        $keterangan = $seleksi->keterangan;
        DB::table('seleksi')->where('id_users', $id_peserta)
                            ->where('id_seleksi', $id_seleksi)
                            ->update(['nilai' => $nilai, 'keterangan' => $keterangan]);
        return redirect()->action([SeleksiController::class, 'index_edit'], ['ids' => $seleksi->id_seleksi]);
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
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        DB::table('jenisseleksi')->where('id', $id)
                            ->delete();
        return redirect()->action([SeleksiController::class, 'menu']);
    }
}
