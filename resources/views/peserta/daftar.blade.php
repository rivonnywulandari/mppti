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
                               <p class="font-medium text-gray-600 dark:text-gray-400 text-xs">status:</p>
                            </div> -->
                        </div>
                        
                        {{-- Navigasi Side Bar --}}
                        <div class="flex flex-col justify-between flex-1 mt-6">
                            <nav>
                            <a href="{{url('/dashboard')}}"class="flex items-center px-4 py-2 text-gray-700 transition-colors duration-200 transform dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:text-gray-200 hover:text-gray-700" href="#">
                                    <img class="w-5 h-5" viewBox="0 0 24 24" fill="none" img src="{{asset("img/home.png")}}">


                                    <span class="mx-4 font-medium">Beranda</span>
                                </a>
                             
                                <a href="{{url('/pendaftaranor')}}" class="flex items-center px-4 py-2 mt-5 text-gray-600 bg-gray-200 dark:bg-gray-700 dark:text-gray-200" href="#">
                                    <img class="w-5 h-5" viewBox="0 0 24 24" fill="none" img src="{{asset("img/document.png")}}">
                                    <span class="mx-4 font-medium">Pendaftaran OR</span>
                                </a>
                             
                                <a href="{{url('/lihatnilai')}}"  class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-200 transform dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:text-gray-200 hover:text-gray-700" href="#">
                                    <img class="w-5 h-5" viewBox="0 0 24 24" fill="none" img src="{{asset("img/grade.png")}}">
                                    <span class="mx-4 font-medium">Lihat Nilai</span>
                                </a>
                             
                                <a href="{{url('/pengaturan')}}" class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-200 transform dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:text-gray-200 hover:text-gray-700" href="#">
                                    <img class="w-5 h-5" viewBox="0 0 24 24" fill="none" img src="{{asset("img/setting.png")}}">
                                    <span class="mx-4 font-medium">Pengaturan</span>
                                </a>

                                <a href="{{url('/logout')}}" class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-200 transform dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:text-gray-200 hover:text-gray-700" href="#">
                                    <img class="w-5 h-5" viewBox="0 0 24 24" fill="none" img src="{{asset("img/logout.png")}}">
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
                            <img class="w-8" img src="{{asset("img/logo.png")}}" alt="logo-lbi"></p>
                        </div>
                    </div>
                   
                    {{-- Content Abu-Abu --}}
                    <div class="static content w-full bg-gray-100 h-full p-3">
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
                      <div >
                        
                        <div class="md:grid md:gap-6">
                          
                          <div class="mt-5 md:mt-0 md:col-span-2">
                            <form action="{{ route('simpan.pendaftaran', [Auth::user()->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                              <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                    <b>Formulir Pendaftaran Open Recruitment Laboratory Of Business Intelligence</b>
                                  </h3><hr style="height:20px"">
                                  <div class="grid grid-cols-6 gap-6">
                                  

                                  <input type="hidden" name="id" id="id" autocomplete="given-id" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="{{ Auth::user()->id }}">
                                
                                    <div class="col-span-6 sm:col-span-4">
                                      <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                                      <input type="text" name="name" id="name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="{{ Auth::user()->name }}"readonly>
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                      <label for="nim" class="block text-sm font-medium text-gray-700">NIM</label>
                                      <input type="text" name="nim" id="nim" autocomplete="given-nim" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="{{ Auth::user()->nim }}"readonly>
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                      <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                      <input type="text" name="email" id="email" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="{{ Auth::user()->email }}" readonly>
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                      <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                                      <select id="jenis_kelamin" name="jenis_kelamin" autocomplete="jenis_kelamin" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option>Laki-laki</option>
                                        <option>Perempuan</option>
                                      </select>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                      <label for="tempat_lahir" class="block text-sm font-medium text-gray-700">Tempat Lahir</label>
                                      <input type="text" name="tempat_lahir" id="tempat_lahir" autocomplete="tempat_lahir" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                      <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                                      <input type="date" name="tanggal_lahir" id="tanggal_lahir" autocomplete="tanggal_lahir" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    <div class="col-span-6 sm:col-span-6 lg:col-span-4">
                                      <label for="asal" class="block text-sm font-medium text-gray-700">Asal</label>
                                      <input type="text" name="asal" id="asal" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    <div class="col-span-6">
                                      <label for="alamat" class="block text-sm font-medium text-gray-700">
                                        Alamat
                                      </label>
                                      <div class="mt-1">
                                        <textarea id="alamat" name="alamat" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" ></textarea>
                                      </div>
                                    </div>

                                    <div class="col-span-6">
                                      <label for="alasan" class="block text-sm font-medium text-gray-700">
                                        Apa alasan Anda ingin bergabung bersama Laboratory Of Business Intelligence?
                                      </label>
                                      <div class="mt-1">
                                        <textarea id="alasan" name="alasan" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" ></textarea>
                                      </div>
                                    </div>

                                    <div class="col-span-6">
                                      <label for="kontribusi" class="block text-sm font-medium text-gray-700">
                                        Kontribusi apa yang bisa Anda berikan pada Laboratory Of Business Intelligence?
                                      </label>
                                      <div class="mt-1">
                                        <textarea id="kontribusi" name="kontribusi" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" ></textarea>
                                      </div>
                                    </div>

                                    <div class="col-span-6">
                                      <label for="kenapa" class="block text-sm font-medium text-gray-700">
                                        Mengapa memilih Laboratory Of Business Intelligence?
                                      </label>
                                      <div class="mt-1">
                                        <textarea id="kenapa" name="kenapa" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" ></textarea>
                                      </div>
                                    </div>

                                    <div class="col-span-6">
                                      <label for="apakah" class="block text-sm font-medium text-gray-700">
                                        Apakah Anda sedang mengikuti kegiatan lain?
                                      </label>
                                      <div class="mt-1">
                                        <textarea id="apakah" name="apakah" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" ></textarea>
                                      </div>
                                    </div>

                                    <div class="col-span-6">
                                      <label for="bersediakah" class="block text-sm font-medium text-gray-700">
                                        Bersediakah Anda ditutuntut dan bekerja dibawah tekanan?
                                      </label>
                                      <div class="mt-1">
                                        <textarea id="bersediakah" name="bersediakah" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" ></textarea>
                                      </div>
                                    </div>

                                  <div class="col-span-6">
                                      <label for="bersediakah" class="block text-sm font-medium text-gray-700">
                                      Link Google Drive (CV, KTM, KRS, dan Transkrip Nilai dalam satu file .zip)
                                      </label>
                                      <div class="mt-1">
                                        <textarea id="filezip" name="filezip" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" ></textarea>
                                      </div>
                                    </div>
                              
                              </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                              <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Daftar
                              </button>
                            </div>
                          </div>
                        </form>
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
