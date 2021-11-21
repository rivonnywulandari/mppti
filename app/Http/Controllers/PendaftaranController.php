<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Daftar;
use App\Models\User;
use App\Models\Seleksi;
use App\Models\JenisSeleksi;
use Storage;
use PDF;
use Auth;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_user = DB::table('users') 
        -> join ('daftar',  'daftar.id', '=', 'users.id')
        ->select('users.id','users.name','users.nim', 'users.email', 'daftar.status', 'daftar.daftar_id')        
        ->where('users.id', '=', Auth::user()->id)         
        ->get();
        return view('peserta.pendaftaranor', compact('data_user'));
    }

    public function lihatnilai()
    {
        $data_user = DB::table('users') 
        -> join ('daftar',  'daftar.id', '=', 'users.id')
        ->select('users.id','users.name','users.nim', 'users.email', 'daftar.status')        
        ->where('users.id', '=', Auth::user()->id)         
        ->get();

        return view('peserta.lihatnilai', compact('data_user'));
    }

    public function lihatpendaftaran()
    {
        $data_pendaftar = DB::table('daftar') 
        ->join ('users',  'users.id', '=', 'daftar.id')
        ->select('users.id','users.name','users.nim', 'users.email', 'daftar.status', 'daftar.jenis_kelamin', 'daftar.tempat_lahir','daftar.tanggal_lahir', 'daftar.tahun_daftar', 'daftar.asal', 'daftar.alamat', 'daftar.alasan', 'daftar.kontribusi', 'daftar.kenapa', 'daftar.apakah', 'daftar.bersediakah', 'daftar.filezip')        
        ->orderByDesc('daftar_id')
        ->limit(1)
        ->where('daftar.id', '=', Auth::user()->id)         
        ->get();
        return view('peserta.lihatpendaftaran', compact('data_pendaftar'));
    }

    public function nilai()
    {

        $data_nilai = DB::table('users')
        -> join ('seleksi',  'seleksi.id_users', '=', 'users.id')
        ->join ('jenisseleksi',  'jenisseleksi.id', '=', 'seleksi.id_seleksi')
        ->select('jenisseleksi.id','jenisseleksi.nama_seleksi', 'seleksi.nilai')        
        ->where('users.id', '=', Auth::user()->id)      
        ->get();
        return view('peserta.lihatnilai', compact('data_nilai'));

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_user = DB::table('users') 
        -> join ('daftar',  'daftar.id', '=', 'users.id')
        ->select('users.id','users.name','users.nim', 'users.email', 'daftar.status')        
        ->where('users.id', '=', Auth::user()->id)         
        ->get();
        return view('peserta.daftar', compact('data_user'));
        // return view('peserta.daftar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        
        $request->validate([
    		'jenis_kelamin'=>'required',
    		'tempat_lahir'=>'required',
    		'tanggal_lahir'=>'required',
    		'alamat'=>'required'
    	]);

        $user = User::where('id', $id)->first();


        if ($user->daftar) {
        return redirect('/pendaftaranor')->with('gagal', 'Anda telah melakukan pendaftaran sebelumnya');
       
        }
        else{             

        $user = User::findOrFail($id);
        $daftar = new Daftar(); 
        $daftar->id = $user->id;
        $daftar->jenis_kelamin = $request->jenis_kelamin;
        $daftar->tempat_lahir = $request->tempat_lahir;
        $daftar->tanggal_lahir = $request->tanggal_lahir;
        $daftar->asal = $request->asal;
        $daftar->alamat = $request->alamat;
        $daftar->alasan = $request->alasan;
        $daftar->kontribusi = $request->kontribusi;
        $daftar->kenapa = $request->kenapa;
        $daftar->apakah = $request->apakah;
        $daftar->bersediakah = $request->bersediakah;
        $daftar->tahun_daftar = date('Y');
        $daftar->filezip = $request->filezip;
        $daftar->status = "diproses";
        $daftar->save();

    	return redirect('/pendaftaranor')->with('sukses', 'Berhasil Melakukan Pendaftaran');
        }

    }

    public function download($filezip)
    {

        $name = $filezip;
        $file = storage_path()."/app/public/storage/file_pendaftaran/".$filezip;
        $headers  = array(
            'Content-Type: application/pdf',
        );
        return Response::download($file, $name, $headers);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
