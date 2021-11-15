@extends('layouts/labor')

@section('content')
    <h2><center>Daftar Nilai</center></h2>
    <div class="col-md-12 bg-white p-4">
        <table class="table table-responsive table-bordered table-hover table-stripped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Peserta</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $i => $user)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $user->name }}</td>
                        <td>
                            <a href="/input/{{ $user->id }}/{{ $jenis->id }}"><button class="btn btn-primary">Input</button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="/menupenilaian"<button class="btn btn-primary">Menu Penilaian</button></a>
    </div>
@endsection