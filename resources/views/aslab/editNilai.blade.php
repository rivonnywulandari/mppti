@extends('layouts/labor')

@section('content')
    <div class="col-md-8 col-sm-12 bg-white p-4">
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
    </form>
@endsection