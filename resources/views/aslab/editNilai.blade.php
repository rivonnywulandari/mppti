@extends('layouts/labor')

@section('navigasi')
<nav>
  <a class="flex items-center px-4 py-2 text-gray-700 transition-colors duration-200 transform dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:text-gray-200 hover:text-gray-700" href="/dashboardaslab">
      <img class="w-5 h-5" viewBox="0 0 24 24" fill="none" src="{{asset("img/home.png")}}">
      <span class="mx-4 font-medium">Beranda</span>
  </a>

  <a class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-200 transform dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:text-gray-200 hover:text-gray-700" href="/daftar_peserta">
      <img class="w-5 h-5" viewBox="0 0 24 24" fill="none" src="{{asset("img/data.png")}}">
      <span class="mx-4 font-medium">Data Peserta OR</span>
  </a>

  <a class="flex items-center px-4 py-2 mt-5 text-gray-600 bg-gray-200 dark:bg-gray-700 dark:text-gray-200" href="/menupenilaian">
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
@endsection 

@section('content')
    {{-- <div class="col-md-8 col-sm-12 bg-white p-4">
        <form method="post" action="/edit_nilai_process">
        @csrf
            <div class="form-group">
                <label>Nama Peserta</label>
                <input type="text" class="form-control" name="nama" value="{{ $user->name}}">
            </div>
            <div class="form-group">
                <label>Nilai</label>
                <input type="text" class="form-control" name="nilai" value="{{ $nilai->nilai }}">
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <input type="text" class="form-control" name="keterangan" value="{{ $nilai->keterangan }}">
            </div>
            <input type="hidden" class="form-control" name="id_peserta" value="{{ $nilai->id_users }}">
            <input type="hidden" class="form-control" name="id_seleksi" value="{{ $nilai->id_seleksi }}">
    </div>

    <div class="col-md-3 ml-md-5 col-sm-12 bg-white p-4" style="height:120px !important">
        <div class="form-group">
            <input type="submit" class="form-control btn btn-primary" value="Edit">
        </div>
    </div>
    </form> --}}

    <div class="md:grid md:gap-6">             
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form method="post" action="/edit_nilai_process">
          @csrf
            <div class="shadow overflow-hidden sm:rounded-md">
              <div class="px-4 py-5 bg-white sm:p-6">
              <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                  <b>Edit Nilai</b>
                </h3><hr style="height:20px"">
                <div class="grid grid-cols-6 gap-6">
                
                <input type="hidden" class="form-control" name="id_peserta" value="{{ $nilai->id_users }}">
                <input type="hidden" class="form-control" name="id_seleksi" value="{{ $nilai->id_seleksi }}">
              
                    <div class="col-span-6 sm:col-span-4">
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama Peserta</label>
                        <input type="text" name="nama" id="nama" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $user->name}}" readonly>
                    </div>
    
                  <div class="col-span-6 sm:col-span-4">
                    <label for="nilai" class="block text-sm font-medium text-gray-700">Nilai</label>
                    <input type="text" name="nilai" id="nilai" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $nilai->nilai }}">
                  </div>
    
                  <div class="col-span-6 sm:col-span-4">
                    <label for="keterangan" class="block text-sm font-medium text-gray-700">Keterangan</label>
                    <textarea type="text" name="keterangan" id="keterangan" autocomplete="given-nim" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $nilai->keterangan }}"></textarea>
                  </div>
            </div>
          </div>
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Edit
            </button>
          </div>
        </div>
      </form>
    </div>
    </div>

@endsection