@extends('layouts/labor')
@section('navigasi')
<nav>
    <a class="flex items-center px-4 py-2 text-gray-700 transition-colors duration-200 transform dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:text-gray-200 hover:text-gray-700" href="/dashboardaslab">
        <img class="w-5 h-5" viewBox="0 0 24 24" fill="none" src="img/home.png">
        <span class="mx-4 font-medium">Beranda</span>
    </a>

    <a class="flex items-center px-4 py-2 mt-5 text-gray-600 bg-gray-200 dark:bg-gray-700 dark:text-gray-200" href="/daftar_peserta">
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
      @csrf
        <div class="shadow overflow-hidden sm:rounded-md">
          <div class="px-4 py-5 bg-white col-md-12 sm:p-6">
          <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
              <b>Detail Informasi Peserta</b>
            </h3><hr style="height:20px"">
            <div class="grid grid-cols-6 gap-6">
    
              <div class="col-span-6 sm:col-span-4">
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama Peserta</label>
                <input type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" name="nama" value="{{$detail->name}}" readonly>
              </div>

              <div class="col-span-6 sm:col-span-4">
                <label for="nama" class="block text-sm font-medium text-gray-700">NIM Peserta</label>
                <input type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" name="im" value="{{$detail->nim}}" readonly>
              </div>

              <div class="col-span-6 sm:col-span-4">
                <label for="jenis_kelami" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                <input type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" name="jenis_kelami" value="{{ $detail->jenis_kelamin }}" readonly>
              </div>

              <div class="col-span-6 sm:col-span-4">
                <label for="ttl" class="block text-sm font-medium text-gray-700">Tempat/Tanggal Lahir</label>
                <input type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" name="ttl" value="{{ $detail->tempat_lahir }} / {{ $detail->tanggal_lahir }}" readonly>
              </div>

              <div class="col-span-6 sm:col-span-4">
                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                <input type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" name="alamat" value="{{ $detail->alamat }}" readonly>
              </div>

              <div class="col-span-6 sm:col-span-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Status Peserta</label>
                <select id="status" name="status" autocomplete="jenis_kelamin" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @if($detail->status == "diproses")
                    <option value="diproses" selected>Diproses</option>
                    <option value="magang">Magang</option>
                    <option value="aslab">Aslab</option>
                    @elseif($detail->status == "magang")
                    <option value="diproses">Diproses</option>
                    <option value="magang" selected>Magang</option>
                    <option value="aslab">Aslab</option>
                    @else
                    <option value="diproses">Diproses</option>
                    <option value="magang">Magang</option>
                    <option value="aslab" selected>Aslab</option> 
                    @endif
                  </select>
              </div>
            </div>
      </div>
      <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
        <a href="/edit/{{ $detail->id }}"><button class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
           Edit
          </button></a>
      </div>
    </div>
  </form>
</div>
</div>
@endsection