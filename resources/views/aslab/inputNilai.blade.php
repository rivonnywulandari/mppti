@extends('layouts/labor')

@section('content')
    <div class="col-md-8 col-sm-12 bg-white p-4">
        <form method="post" action="/input_nilai">
        @csrf
            <div class="form-group">
                <label>Nama Peserta</label>
                <input type="text" class="form-control" name="nama" value="{{ $tampil->name }}">
            </div>
            <div class="form-group">
                <label>Nilai</label>
                <input type="text" class="form-control" name="nilai" placeholder="Nilai">
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <input type="text" class="form-control" name="keterangan" placeholder="Keterangan">
            </div>
            <input type="hidden" class="form-control" name="id_peserta" value="{{ $tampil->id }}">
            <input type="hidden" class="form-control" name="id_seleksi" value="{{ $jenis->id }}">
    </div>

    <div class="col-md-3 ml-md-5 col-sm-12 bg-white p-4" style="height:120px !important">
        <div class="form-group">
            <input type="submit" class="form-control btn btn-primary" value="Input">
        </div>
    </div>
    </form>
@endsection