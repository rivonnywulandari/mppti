<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class JenisSeleksiController extends Controller
{
    public function index()
    {
        $tahap = DB::table('jenisseleksi')->orderby('id', 'desc')->get();
        return view('aslab.seleksi', ['tahap'=>$tahap]);
    }
    public function add_process(Request $jenisseleksi)
    {
        DB::table('jenisseleksi')->insert([
            'nama_seleksi'=>$jenisseleksi->nama_seleksi
        ]);
 
        return redirect()->action([SeleksiController::class, 'menu']);
    }
    public function index_edit()
    {
        $tahap = DB::table('jenisseleksi')->orderby('id', 'desc')->get();
        return view('aslab.seleksi_edit', ['tahap'=>$tahap]);
    }
}
