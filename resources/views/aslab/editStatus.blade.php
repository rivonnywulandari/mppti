@extends('layouts/labor')
<nav>
    <a class="flex items-center px-4 py-2 text-gray-700 transition-colors duration-200 transform dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:text-gray-200 hover:text-gray-700" href="/dashboardaslab">
        <img class="w-5 h-5" viewBox="0 0 24 24" fill="none" src="{{asset("img/home.png")}}">
        <span class="mx-4 font-medium">Beranda</span>
    </a>

    <a class="flex items-center px-4 py-2 mt-5 text-gray-600 bg-gray-200 dark:bg-gray-700 dark:text-gray-200" href="/daftar_peserta">
        <img class="w-5 h-5" viewBox="0 0 24 24" fill="none" src="{{asset("img/data.png")}}">
        <span class="mx-4 font-medium">Data Peserta OR</span>
    </a>

    <a class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-200 transform dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:text-gray-200 hover:text-gray-700" href="/menupenilaian">
        <img class="w-5 h-5" viewBox="0 0 24 24" fill="none" src="{{asset("img/grade.png")}}">
        <span class="mx-4 font-medium">Kelola Nilai</span>
    </a>

    <a class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-200 transform dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:text-gray-200 hover:text-gray-700" href="#">
        <img class="w-5 h-5" viewBox="0 0 24 24" fill="none" src="{{asset("img/setting.png")}}">
        <span class="mx-4 font-medium">Pengaturan</span>
    </a>
    <a href="{{url('/logout')}}" class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-200 transform dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:text-gray-200 hover:text-gray-700">
        <img class="w-5 h-5" viewBox="0 0 24 24" fill="none" src="{{asset("img/logout.png")}}">
        <span class="mx-4 font-medium">Logout</span>
    </a>
</nav>
@section('content')
    <div class="col-md-8 col-sm-12 bg-white p-4">
        <form method="post" action="/edit_status">
        @csrf
            <div class="form-group">
                <label>Nama Peserta</label>
                <input type="text" class="form-control" name="nama" value="{{ $informasi->name}}">
            </div>
            <div class="form-group">
                <label>Status</label>
                <input type="text" class="form-control" name="status" value="{{ $informasi->status }}">
            </div>
    </div>
    <input type="hidden" class="form-control" name="id" value="{{ $informasi->id}}">
    <div class="col-md-3 ml-md-5 col-sm-12 bg-white p-4" style="height:120px !important">
        <div class="form-group">
            <input type="submit" class="form-control btn btn-primary" value="Edit">
        </div>
    </div>
    </form>
@endsection