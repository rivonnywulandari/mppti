<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Sistem Informasi OR Laboratory of BI</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        {{-- Side Bar --}}
            <div class="flex">
                <div class="w-64 bg-blue-500 h-screen">
                    <div class="flex flex-col w-64 h-screen py-8 bg-white border-r dark:bg-gray-800 dark:border-gray-600">
                        
                        {{-- Data Diri Akun --}}
                        <div class="flex flex-col items-center mt-6 -mx-2">
                            <img class="object-cover w-24 h-24 mx-2 rounded-full" src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" alt="avatar">
                            <h4 class="mx-2 mt-2 font-medium text-gray-800 dark:text-gray-200 hover:underline">{{ Auth::user()->name }}</h4>
                            <p class="mx-2 mt-1 text-sm font-medium text-gray-600 dark:text-gray-400 hover:underline">{{ Auth::user()->email }}</p>
                            <!-- <div class="mt-2 border-2 px-2 rounded-full border-light-blue-500 border-opacity-100">
                            </div> -->
                        </div>
                        
                        {{-- Navigasi Side Bar --}}
                        <div class="flex flex-col justify-between flex-1 mt-6">
                            <nav>
                            <a href="{{url('/dashboardpeserta')}}"class="flex items-center px-4 py-2 text-gray-700 transition-colors duration-200 transform dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:text-gray-200 hover:text-gray-700" href="#">
                                    <img class="w-5 h-5" viewBox="0 0 24 24" fill="none" src="img/home.png">
                                    <span class="mx-4 font-medium">Beranda</span>
                                </a>
                             
                                <a href="{{url('/pendaftaranor')}}" class="flex items-center px-4 py-2 mt-5 text-gray-600 bg-gray-200 dark:bg-gray-700 dark:text-gray-200" href="#">
                                    <img class="w-5 h-5" viewBox="0 0 24 24" fill="none" src="img/document.png">
                                    <span class="mx-4 font-medium">Pendaftaran OR</span>
                                </a>
                             
                                <a href="{{url('/lihatnilai')}}"  class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-200 transform dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:text-gray-200 hover:text-gray-700" href="#">
                                    <img class="w-5 h-5" viewBox="0 0 24 24" fill="none" src="img/grade.png">
                                    <span class="mx-4 font-medium">Lihat Nilai</span>
                                </a>
                             
                                <a href="{{url('/pengaturan')}}" class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-200 transform dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:text-gray-200 hover:text-gray-700" href="#">
                                    <img class="w-5 h-5" viewBox="0 0 24 24" fill="none" src="img/setting.png">
                                    <span class="mx-4 font-medium">Pengaturan</span>
                                </a>

                                <a href="{{url('/logout')}}" class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-200 transform dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:text-gray-200 hover:text-gray-700" href="#">
                                    <img class="w-5 h-5" viewBox="0 0 24 24" fill="none" src="img/logout.png">
                                    <span class="mx-4 font-medium">Logout</span>
                                </a>
                             </nav>
                        </div>
                    </div>
                </div>


                {{-- Content Kanan --}}
                <div class="w-full flex flex-col">
                    {{-- Header --}}
                    <div class="header w-full bg-blue-color px-4 py-3 grid grid-cols-2 justify-items-stretch ">
                        <div class="justify-self-start">
                            <p class="mt-1 white-color font-bold">Sistem Informasi OR Laboratory of Business Intelligence</p>
                        </div>
                        <div class="justify-self-end">
                            <img class="w-8"src="img/logo.png" alt="logo-lbi"></p>
                        </div>
                    </div>
                   
                    {{-- Content Abu-Abu --}}
                    <div class="content w-full bg-gray-100 h-full p-3">
                        {{-- Breadcrumbs --}}
                        @yield('breadcrumbs')
                        <!--
  This example requires Tailwind CSS v2.0+ 
  
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
@if (session('gagal'))
      <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
        <p class="font-bold">Maaf</p>
        <p>Anda telah melakukan pendaftaran sebelumnya.</p>
      </div>
      <br>
@elseif (session('sukses'))
      <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
        <p class="font-bold">Terima Kasih</p>
        <p>Pendaftaran berhasil dilakukan.</p>
      </div>
      <br>
        @endif 

<div >
   
   <div class="md:grid md:grid-cols-3 md:gap-6">
     
     <div class="mt-5 md:mt-0 md:col-span-2">
     <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

    

        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="sm:flex sm:items-start">
          
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
              <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                Pendaftaran OR dan Berkas<br><br>
              </h3>
              <div class="mt-2">
                <p class="text-sm text-gray-500">
                  Silahkan lakukan pendaftaran OR. <br>Riwayat pendaftaran bisa dilihat pada tombol berikut.
              </p>
              </div>
            </div>
          </div>
        </div>

        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row">
          <a href="{{url('/lihatpendaftaran')}}" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-white-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white-500 sm:ml-3 sm:w-auto sm:text-sm">
              <span class="mx-4 font-medium">Lihat Pendaftaran</span>
          </a>
          <a href="{{url('/pendaftaran/create')}}" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
              <span class="mx-4 font-medium" >Daftar OR</span>
          </a>

          <!-- @foreach ($data_user as $data_user) -->

          <!-- @if ($data_user->daftar_id < 1) -->
          <!-- <a href="{{url('/pendaftaran/create')}}" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
              <span class="mx-4 font-medium" >Daftar OR</span>
          </a>    -->
          <!-- @elseif ($data_user->daftar_id <= 0) 
          <a href="{{url('/pendaftaran/create')}}" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
              <span class="mx-4 font-medium">Daftar OR</span>
          </a>         -->
          <!-- @endif -->


        <!-- @endforeach -->

          <!-- <a href="{{url('/pendaftaran/create')}}" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
              <span class="mx-4 font-medium">Daftar OR</span>
          </a>  -->          
          
        </div>
      </div>
    </div>
    </div>
  </div>
</div>

         
    


                        {{-- Isi content --}}
                        @yield('content')
                    </div> 

                </div>
            </div>
    </body>
</html>
