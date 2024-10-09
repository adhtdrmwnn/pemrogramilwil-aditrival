@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4 text-center">Detail Dosen: {{ $dosen->nama_dosen }}</h1>

        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-10">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <th>NIDN</th>
                            <td>{{ $dosen->nidn }}</td>
                        </tr>
                        <tr>
                            <th>Nama Dosen</th>
                            <td>{{ $dosen->nama_dosen }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Mulai Tugas</th>
                            <td>{{ \Carbon\Carbon::parse($dosen->tgl_mulai_tugas)->format('d-m-Y') }}</td>
                        </tr>
                        <tr>
                            <th>Jenjang Pendidikan</th>
                            <td>{{ $dosen->jenjang_pendidikan }}</td>
                        </tr>
                        <tr>
                            <th>Bidang Keilmuan</th>
                            <td>{{ $dosen->bidang_keilmuan }}</td>
                        </tr>
                        <tr>
                            <th>Foto Dosen</th>
                            <td>
                                @if($dosen->foto_dosen)
                                    <img src="{{ asset('storage/' . $dosen->foto_dosen) }}" alt="Foto Dosen" class="img-thumbnail" width="150">
                                @else
                                    <p>Tidak ada foto</p>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="text-center mt-3">
                    <a href="{{ route('dosens.index') }}" class="btn btn-secondary">Kembali ke daftar dosen</a>
                </div>
            </div>
        </div>
    </div>
@endsection
