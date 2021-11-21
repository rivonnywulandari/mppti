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
      <b>Informasi Seputar Open Recruitment LBI</b>
    </h3><hr>

    <a href="/addinfo"><button style="margin-top:15px; margin-bottom:15px"class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Tambah Artikel</button></a>

    <div class="px-3 py-4 flex justify-center">
        <table class="w-full text-md bg-white shadow-md rounded mb-4 border">
            <thead>
                <tr class="border">
                    <th class="text-left p-3 px-5">No.</th>
                    <th class="text-left p-3 px-5">Judul</th>
                    <th class="text-left p-3 px-5">Isi</th>
                    <th class="text-left p-3 px-5">Tanggal Posting</th>
                    <th width="15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                    @forelse ($info as $i => $info)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="p-3 px-5">{{ ++$i }}</td>
                            <td class="p-3 px-5">{{ $info->judul }}</td>
                            <td class="p-3 px-5">{{ $info->isi }}</td>
                            <td class="p-3 px-5">{{ $info->created_at }}</td>
                            <td class="p-3 px-5 flex justify-end">
                                <a href="/detail/{{ $info->id }}"><button class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Detail</a>
                                <a href="/editInfo/{{ $info->id }}"><button class="mr-3 text-sm bg-yellow-500 hover:bg-yellow-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Edit</a>
                                <a href="/delete/{{ $info->id }}"><button class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Hapus</a>
                            </td>
                        </tr>
                    @empty
                    <tr class="border-b hover:bg-gray-100">
                        <td colspan="5"><center><p class="text-sm text-gray-500">Informasi Tidak Tersedia</p></center></td>
                    </tr>
                    @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
