@extends('layouts/labor')
@section('navigasi')
<nav>
    <a class="flex items-center px-4 py-2 text-gray-700 bg-gray-200 dark:bg-gray-700 dark:text-gray-200" href="/dashboardaslab">
        <img class="w-5 h-5" viewBox="0 0 24 24" fill="none" src="img/home.png">
        <span class="mx-4 font-medium">Beranda</span>
    </a>

    <a class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-200 transform dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:text-gray-200 hover:text-gray-700" href="/daftar_peserta">
        <img class="w-5 h-5" viewBox="0 0 24 24" fill="none" src="img/data.png">
        <span class="mx-4 font-medium">Data Peserta OR</span>
    </a>

    <a class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-200 transform dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:text-gray-200 hover:text-gray-700" href="/menupenilaian">
        <img class="w-5 h-5" viewBox="0 0 24 24" fill="none" src="img/grade.png">
        <span class="mx-4 font-medium">Kelola Nilai</span>
    </a>

    <a class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-200 transform dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:text-gray-200 hover:text-gray-700" href="#">
        <img class="w-5 h-5" viewBox="0 0 24 24" fill="none" src="img/setting.png">
        <span class="mx-4 font-medium">Pengaturan</span>
    </a>
    <a href="{{url('/logout')}}" class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-200 transform dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:text-gray-200 hover:text-gray-700">
        <img class="w-5 h-5" viewBox="0 0 24 24" fill="none" src="img/logout.png">
        <span class="mx-4 font-medium">Logout</span>
    </a>
</nav>
@endsection
@section('content')
    <div class="col-md-8 col-sm-12 bg-white p-4">
        <form method="post" action="/edit_process">
        @csrf
        <input type="hidden" value="{{ $informasi->id }}" name="id">
            <div class="form-group">
                <label>Judul Artikel</label>
                <input type="text" class="form-control" value="{{ $informasi->judul }}" name="judul" placeholder="Judul artikel">
            </div>
            <div class="form-group">
                <label>Isi Artikel</label>
                <textarea class="form-control" name="isi" rows="15">{{ $informasi->isi }}
                </textarea>
            </div>
    </div>

    <div class="col-md-3 ml-md-5 col-sm-12 bg-white p-4" style="height:120px !important
        <div class="form-group">
            <label>Edit</label>
            <input type="submit" class="form-control btn btn-primary" value="Edit">
        </div>
    </div>
    </form>
@endsection