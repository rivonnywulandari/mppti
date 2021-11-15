@extends('layouts/kalab')

@section('content')
    <h2><center>Daftar Nilai</center></h2>
    <div class="col-md-12 bg-white p-4">
        <table class="table table-responsive table-bordered table-hover table-stripped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Peserta</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $i => $user)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->nilai}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection