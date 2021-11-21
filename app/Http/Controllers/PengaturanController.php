<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Daftar;
use Illuminate\Support\Facades\Hash;




class PengaturanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // return view('peserta.pengaturan');
        $data_user = DB::table('users') 
        // -> join ('daftar',  'daftar.id', '=', 'users.id')
        ->select('users.id','users.name','users.nim', 'users.email')        
        ->where('users.id', '=', Auth::user()->id)         
        ->get();
        return view('peserta.pengaturan', compact('data_user'));

    }

    public function index_aslab()
    {
        $data_user = DB::table('users') 
        ->select('users.id','users.name','users.nim', 'users.email')        
        ->where('users.id', '=', Auth::user()->id)         
        ->get();
        return view('aslab.pengaturan', compact('data_user'));

    }

    public function index_kalab()
    {
        $data_user = DB::table('users') 
        ->select('users.id','users.name','users.nim', 'users.email')        
        ->where('users.id', '=', Auth::user()->id)         
        ->get();
        return view('kalab.pengaturan', compact('data_user'));

    }

    public function gantipassword()
    {
        
        // return view('peserta.pengaturan');
        $data_user = DB::table('users') 
        ->select('users.id', 'users.password')        
        ->where('users.id', '=', Auth::user()->id)         
        ->get();
     

        return view('peserta.gantipassword', compact('data_user'));

    }
    public function gantipasswordaslab()
    {
        $data_user = DB::table('users') 
        ->select('users.id', 'users.password')        
        ->where('users.id', '=', Auth::user()->id)         
        ->get();
     

        return view('aslab.gantipassword', compact('data_user'));

    }

    public function gantipasswordkalab()
    {
        $data_user = DB::table('users') 
        ->select('users.id', 'users.password')        
        ->where('users.id', '=', Auth::user()->id)         
        ->get();
     

        return view('kalab.gantipassword', compact('data_user'));

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
        // return view('peserta.pengaturan');
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
        $u = User::find($id);
        
        if($request->isMethod('post')){
         
            $data_user = $request->all();
            $user = User::find($id);
            $user = User::where('id',$id)->first();
            $user->name = $data_user['name'];       
            $user->email = $data_user['email'];        
            $user->save();


            return redirect('/pengaturan')->with('status', 'Data Akun Berhasil Diubah');
        }
    }

    public function updatepass(Request $request, $id)
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


            return redirect('/dashboardpeserta')->with('status', 'Data Akun Berhasil Diubah');
        }
    }

    public function updatepassaslab(Request $request, $id)
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


            return redirect('/dashboardaslab')->with('status', 'Data Akun Berhasil Diubah');
        }
    }

    public function updatepasskalab(Request $request, $id)
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


            return redirect('/dashboardkalab')->with('status', 'Data Akun Berhasil Diubah');
        }
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
