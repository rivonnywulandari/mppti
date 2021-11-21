@extends('layouts/labor')
@section('navigasi')
<nav>
    <a class="flex items-center px-4 py-2 mt-5 text-gray-600 bg-gray-200 dark:bg-gray-700 dark:text-gray-200" href="/dashboardaslab">
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

    <a class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-200 transform dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:text-gray-200 hover:text-gray-700" href="/pengaturanaslab">
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
<div class="px-4 py-5 bg-white sm:p-6"> 
    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
    <b>Detail Informasi</b>
    </h3><hr>

    <div class="col-md-7 col-sm-12 mb-5 bg-white p-0">
        <div class="p-4">
            <h2>{{ $informasi->judul }}</h2>
            <p class="mt-5">{{ $informasi->isi }}</p>
        </div>
    </div>
    <a href="/dashboardaslab"><button class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Kembali</button></a>
</div>
@endsection