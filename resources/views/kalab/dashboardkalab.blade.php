@extends('layouts/kalab')

@section('content')
<h2><center>Daftar Informasi Seputar OR</center></h2>
    <div class="col-md-12 bg-white p-4">
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
                @foreach ($info as $i => $info)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $info->judul }}</td>
                        <td>{{ $info->isi }}</td>
                        <td>{{ $info->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection