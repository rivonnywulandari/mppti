@extends('layouts/labor')

@section('content')
    <div class="col-md-7 col-sm-12 mb-5 bg-white p-0">
        <div class="p-4">
            <h2>{{ $informasi->judul }}</h2>
            <p class="mt-5">{{ $informasi->isi }}</p>
        </div>
    </div>
    <a href="/info" <button class="btn btn-primary">Kembali</button></a>
@endsection