<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\User;
use App\Models\Daftar;
use Illuminate\Support\Facades\Hash;

class MagangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informasi = DB::table('informasi')->orderby('id', 'desc')->get();
        return view('magang.dashboardmagang', ['info'=>$informasi]);
    }

    public function nilai()
    {
        // $data_nilai = DB::table('seleksi')
        // ->join ('jenisseleksi',  'jenisseleksi.id', '=', 'seleksi.id_seleksi')
        // -> join ('users',  'users.id', '=', 'seleksi.id_users')
        // ->select('jenisseleksi.id','jenisseleksi.nama_seleksi', 'seleksi.nilai')        
        // ->where('seleksi.id_users', '=', Auth::user()->id)      
        // ->get();
        // return view('peserta.lihatnilai', compact('data_nilai'));

        $data_nilai = DB::table('users')
        -> join ('seleksi',  'seleksi.id_users', '=', 'users.id')
        ->join ('jenisseleksi',  'jenisseleksi.id', '=', 'seleksi.id_seleksi')
        ->select('jenisseleksi.id','jenisseleksi.nama_seleksi', 'seleksi.nilai')        
        ->where('users.id', '=', Auth::user()->id)      
        ->get();
        return view('magang.lihatnilaimagang', compact('data_nilai'));

        // $data_user = DB::table('users') 
        // -> join ('daftar',  'daftar.id', '=', 'users.id')
        // ->select('users.id','users.name','users.nim', 'users.email', 'daftar.status')        
        // ->where('users.id', '=', Auth::user()->id)         
        // ->get();
        // return view('peserta.lihatnilai', compact('data_user'));

    }

    public function indexmagang()
    {
        
        // return view('peserta.pengaturan');
        $data_user = DB::table('users') 
        // -> join ('daftar',  'daftar.id', '=', 'users.id')
        ->select('users.id','users.name','users.nim', 'users.email')        
        ->where('users.id', '=', Auth::user()->id)         
        ->get();
        return view('magang.pengaturanmagang', compact('data_user'));

    }

    public function gantipasswordmagang()
    {
        
        // return view('peserta.pengaturan');
        $data_user = DB::table('users') 
        ->select('users.id', 'users.password')        
        ->where('users.id', '=', Auth::user()->id)         
        ->get();
     

        return view('magang.gantipasswordmagang', compact('data_user'));

    }

    public function updatemagang(Request $request, $id)
    {
        $u = User::find($id);
        
        if($request->isMethod('post')){
         
            $data_user = $request->all();
            $user = User::find($id);
            $user = User::where('id',$id)->first();
            $user->name = $data_user['name'];       
            $user->email = $data_user['email'];        
            $user->save();


            return redirect('/dashboardmagang')->with('status', 'Data Akun Berhasil Diubah');
        }
    }

    public function updatepassmagang(Request $request, $id)
    {
        // $u = User::find($id);
        
        if($request->isMethod('post')){
         
            // $data_user = $request->all();
            // $user = User::find($id);
            // $user = User::where('id',$id)->first();
            // $user->password =  $data_user['password'];             
            // $user->save();

            User::where('id', $id)
            ->update(['password' => Hash::make($request->password)]);


            return redirect('/dashboardmagang')->with('status', 'Data Akun Berhasil Diubah');
        }
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
