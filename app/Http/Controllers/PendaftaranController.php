<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Daftar;
use App\Models\User;

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
        // return view('peserta.pendaftaranor');
    }

    public function daftar()
    {
        // return view('peserta.daftar');
    }

    public function lihatnilai()
    {
        $data_user = DB::table('users') 
        -> join ('daftar',  'daftar.id', '=', 'users.id')
        ->select('users.id','users.name','users.nim', 'users.email', 'daftar.status')        
        ->where('users.id', '=', Auth::user()->id)         
        ->get();
        return view('peserta.lihatnilai', compact('data_user'));
        // return view('peserta.lihatnilai');
    }

    public function lihatpendaftaran()
    {
        $data_pendaftar = DB::table('daftar') 
        -> join ('users',  'users.id', '=', 'daftar.id')
        ->select('users.id','users.name','users.nim', 'users.email', 'daftar.status', 'daftar.jenis_kelamin', 'daftar.tempat_lahir','daftar.tanggal_lahir', 'daftar.asal', 'daftar.alamat', 'daftar.alasan', 'daftar.kontribusi', 'daftar.kenapa', 'daftar.apakah', 'daftar.bersediakah', 'daftar.filezip')        
        ->where('daftar.id', '=', Auth::user()->id)         
        ->get();
        return view('peserta.lihatpendaftaran', compact('data_pendaftar'));

       
        // return view('peserta.lihatpendaftaran');
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
        // $request->validate([
        //     'id' => 'required',
        //     // 'nim' => 'required',
        //     // 'nim' => 'required',
        //     'jenis_kelamin' => 'required',
        //     'tempat_lahir' => 'required',
        //     'tanggal_lahir' => 'required',
        //     'asal' => 'required',
        //     'alamat' => 'required',

        // ], [
        //     // 'kode_kelas.required' => 'Kode Kelas tidak boleh kosong',
        //     // 'kode_makul.required' => 'Kode Makul tidak boleh kosong',
        //     // 'nama_makul.required' => 'Nama Makul tidak boleh kosong',
        //     // 'tahun.required' => 'Tahun tidak boleh kosong',
        //     // 'semester.required' => 'Semester tidak boleh kosong',
        //     // 'sks.required' => 'Sks tidak boleh kosong',
        // ]);

      
        // $user = User::findOrFail($id);
        // $daftar = new Daftar(); 
        // $daftar->id = $user->id;
        // $daftar->jenis_kelamin = $request->jenis_kelamin;
        // $daftar->tempat_lahir = $request->tempat_lahir;
        // $daftar->tanggal_lahir = $request->tanggal_lahir;
        // $daftar->asal = $request->asal;
        // $daftar->alamat = $request->alamat;
        // $daftar->alasan = $request->alasan;
        // $daftar->kontribusi = $request->kontribusi;
        // $daftar->kenapa = $request->kenapa;
        // $daftar->apakah = $request->apakah;
        // $daftar->bersediakah = $request->bersediakah;
        // $daftar->filezip = $request->filezip;
        // $daftar->save();

        // jangan dipakai Daftar::create($request->all());      
        //return redirect('/dashboardpesea')->with('status', 'Berhasil Melakukan Pendaftaran');

        $request->validate([
    		'jenis_kelamin'=>'required',
    		'tempat_lahir'=>'required',
    		'tanggal_lahir'=>'required',
    		'alamat'=>'required'
    	]);

      
        //dulunya pakai ini tp ga jadi

        // if($request->hasFile('filezip'))
        // {
        //     $filezip_name = $request->file('filezip')->getClientOriginalName();
        //     $filename = pathinfo($filezip_name,PATHINFO_FILENAME);
        //     $filezip_ext = $request->file('filezip')->getClientOriginalExtension();
        //     $fileNameToStore = $filename.'-'.time().'.'.$filezip_ext;
        //     $path =  $request->file('filezip')->storeAs('public/file_pendaftaran/',$fileNameToStore);
            
        // }

        // if($request->hasFile('filezip') && $request->file('filezip')->isValid()){
        //     //
        //     //storing the input field with the name "file" in $file.
        //     $file = $request->file('filezip');
        //     //using laravel method to get filename from the inputfield, in case we add a feature to allow the user to provide the name
        //     $originalName = $file->getClientOriginalName();

        //     //storing file in public/upload saving as $originalName
        //     $fileLoc =  $request->file('filezip')->storeAs('/file_pendaftaran/', $originalName);

        //     //getting mimetype from the file stored with the class storage using method mimetype of the file above
  
        // }
        
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
        // $daftar->filezip = $fileNameToStore;
        $daftar->filezip = $request->filezip;
        $daftar->status = "diproses";
        $daftar->save();

    	return redirect('/pendaftaranor')->with('status', 'Berhasil Melakukan Pendaftaran');
    }

    public function download($filezip)
    {
        // return response()->Download($filezip);
        
        // return response()->download(public_path()('public/file_pendaftaran/'.$filezip));
        // $url = Storage::url($filezip);

        // $download=DB::table('daftar')
        // ->select('daftar.filezip')        
        // ->where('daftar.id', '=', Auth::user()->id)         
        // ->get();
        // return Storage::download($url);

        $name = $filezip;
        $file = storage_path()."/app/public/storage/file_pendaftaran/".$filezip;
        $headers  = array(
            'Content-Type: application/pdf',
        );
        return Response::download($file, $name, $headers);
        
        // return response()->download($file_path);
        
        // return response()->download(storage_path("public/file_pendaftaran/{$filezip}"));
        
            // view("files.download", compact('$download'));
        

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
