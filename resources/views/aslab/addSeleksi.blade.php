@extends('layouts/labor')

@section('content')
    <h1>Tambah Tahapan</h1>
    <div class="col-md-8 col-sm-12 bg-white p-4">
        <form method="post" action="/tambah_seleksi">
        @csrf
            <div class="form-group">
                <label>Nama Tahap</label>
                <input type="text" class="form-control" name="nama_seleksi" placeholder="Tahap Seleksi">
            </div>
    </div>

    <div class="col-md-3 ml-md-5 col-sm-12 bg-white p-4" style="height:120px !important">
        <div class="form-group">
            <input type="submit" class="form-control btn btn-primary" value="Tambah">
        </div>
    </div>
    </form>
@endsection