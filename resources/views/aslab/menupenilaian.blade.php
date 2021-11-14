@extends('layouts/labor')

@section('content')
    <a href="/addSeleksi"><button class="btn btn-primary mb-3">Tambah Tahapan</button></a>
    <a href="/seleksi"<button class="btn btn-primary">Input Nilai</button></a>
    <a href="/seleksi_edit"<button class="btn btn-primary">Edit Nilai</button></a>

    <h2><center>Daftar Tahapan OR</center></h2>
    <div class="col-md-12 bg-white p-4">
        <table class="table table-responsive table-bordered table-hover table-stripped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Tahapan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tahap as $i => $tahap)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $tahap->nama_seleksi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection