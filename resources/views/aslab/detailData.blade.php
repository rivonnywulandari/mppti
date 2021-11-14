@extends('layouts/labor')

@section('content')
    <div class="col-md-8 col-sm-12 bg-white p-4">
        @csrf
            <div class="form-group">
                <label>Nama Peserta</label>
                <input type="text" class="form-control" name="nama" value="{{ $detail->name}}">
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <input type="text" class="form-control" name="jenis_kelami" value="{{ $detail->jenis_kelamin }}">
            </div>
            <div class="form-group">
                <label>Tempat/Tanggal Lahir</label>
                <input type="text" class="form-control" name="ttl" value="{{ $detail->tempat_lahir }} / {{ $detail->tanggal_lahir }}">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" name="alamat" value="{{ $detail->alamat }}">
            </div>
            <div class="form-group">
                <label>Status</label>
                <input type="text" class="form-control" name="status" value="{{ $detail->status }}">
            </div>
            <a href="/edit/{{ $detail->id }}"><button class="btn btn-primary">Edit Status</button></a>
    </div>
@endsection