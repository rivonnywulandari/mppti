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
                        </div>
                        
                        {{-- Navigasi Side Bar --}}
                        <div class="flex flex-col justify-between flex-1 mt-6">
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

                        {{-- Isi content --}}
                        @yield('content')
                    </div> 

                </div>
            </div>
    </body>
</html>
