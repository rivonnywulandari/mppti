@extends('layouts/labor')

@section('content')
    <h2><center>Daftar Tahapan OR</center></h2>
    <div class="col-md-12 bg-white p-4">
        <table class="table table-responsive table-bordered table-hover table-stripped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Tahapan</th>
                    <th width="15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tahap as $i => $tahap)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $tahap->nama_seleksi }}</td>
                        <td>
                            <a href="/daftarnilai_edit/{{ $tahap->id }}"<button class="btn btn-primary">Detail</button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection