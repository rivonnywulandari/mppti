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
    <div class="md:grid md:gap-6">          
        <div class="mt-5 md:mt-0 md:col-span-2">
          <form method="post" action="/add_process" enctype="multipart/form-data">
          @csrf
            <div class="shadow overflow-hidden sm:rounded-md">
              <div class="px-4 py-5 bg-white sm:p-6">
              <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                  <b>Tambah Informasi OR</b>
                </h3><hr style="height:20px"">
                <div class="grid grid-cols-6 gap-6">
              
                  <input type="hidden" class="form-control" name="id_users" value="{{ Auth::user()->id }}">

                  <div class="col-span-6 sm:col-span-4">
                    <label for="judul" class="block text-sm font-medium text-gray-700">Judul Artikel</label>
                    <input type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" name="judul" placeholder="Judul artikel">
                  </div>

                  <div class="col-span-6">
                    <label for="isi" class="block text-sm font-medium text-gray-700">
                      Isi Artikel
                    </label>
                    <div class="mt-1">
                      <textarea name="isi" rows="15" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" ></textarea>
                    </div>
                  </div>

                  <div class="col-span-6">
                    <label for="jenis_informasi" class="block text-sm font-medium text-gray-700">
                      Jenis Informasi
                    </label>
                    <div class="mt-1">
                        <select name="jenis" id="jenis" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <option value="" disabled> --Pilih Jenis Informasi-- </option>
                            <option value="umum">Umum</option>
                            <option value="magang">Magang</option>
                        </select>
                    </div>
                </div>
            </div>
          </div>
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <input type="submit" value="Upload" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection