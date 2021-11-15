<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KalabController extends Controller
{
    public function index()
    {
        $informasi = DB::table('informasi')->orderby('id', 'desc')->get();
        return view('kalab.dashboardkalab', ['info'=>$informasi]);
    }
    public function tahap()
    {
        $tahap = DB::table('jenisseleksi')->orderby('id', 'desc')->get();
        return view('kalab.daftarnilaipeserta', ['tahap'=>$tahap]);
    }
    public function nilai_peserta($id)
    {
        $jenis = DB::table('jenisseleksi')->where('id', $id)->first();
        $user = DB::table('seleksi')->orderby('seleksi.id_users', 'desc')
                    ->join('daftar', 'daftar.id', '=', 'seleksi.id_users')
                    ->join('users', 'users.id', '=', 'seleksi.id_users')
                    ->where('id_seleksi', $id)
                    ->get();
        return view('kalab.nilaipeserta', ['user'=>$user], ['jenis'=>$jenis]);
    }
}
