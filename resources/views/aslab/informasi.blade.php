@extends('layouts/labor')

@section('content')
    <h2><center>Daftar Informasi Seputar OR</center></h2>
    <div class="col-md-12 bg-white p-4">
        <a href="/add"><button class="btn btn-primary mb-3">Tambah Artikel</button></a>
        <table class="table table-responsive table-bordered table-hover table-stripped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>Tanggal Posting</th>
                    <th width="15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($informasi as $i => $info)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $info->judul }}</td>
                        <td>{{ $info->isi }}</td>
                        <td>{{ $info->created_at }}</td>
                        <td>
                            <a href="/detail/{{ $info->id }}"<button class="btn btn-primary">Detail</button></a>
                            <a href="/edit/{{ $info->id }}"><button class="btn btn-success">Edit</button></a>
                            <a href="/delete/{{ $info->id }}"><button class="btn btn-danger">Hapus</button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection