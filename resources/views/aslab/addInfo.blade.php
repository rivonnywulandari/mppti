@extends('layouts/labor')

@section('content')
    <div class="col-md-8 col-sm-12 bg-white p-4">
        <form method="post" action="/add_process">
        @csrf
            <div class="form-group">
                <label>Judul Artikel</label>
                <input type="text" class="form-control" name="judul" placeholder="Judul artikel">
            </div>
            <div class="form-group">
                <label>Isi Artikel</label>
                <textarea class="form-control" name="isi" rows="15"></textarea>
            </div>
    </div>

    <div class="col-md-3 ml-md-5 col-sm-12 bg-white p-4" style="height:120px !important">
        <div class="form-group">
            <label>Upload</label>
            <input type="submit" class="form-control btn btn-primary" value="Upload">
        </div>
    </div>
    </form>
@endsection