@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Data Dosen</h3>
        <form action="{{ route('dosens.index') }}" method="GET">
            <input type="text" name="search" placeholder="Cari dosen..." value="{{ $search }}">
            <button type="submit">Cari</button>
        </form>

        <a href="{{ route('dosens.create') }}" class="btn btn-success mt-2 mb-2">+ Tambah Dosen</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th> <!-- Kolom untuk Nomor -->
                    <th>NIDN</th>
                    <th>Nama</th>
                    <th>Tanggal Mulai Tugas</th>
                    <th>Jenjang Pendidikan</th>
                    <th>Bidang Keilmuan</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dosens as $index => $dosen)
                    <tr>
                        <td>{{ $index + 1 }}</td> <!-- Menampilkan nomor urutan -->
                        <td>{{ $dosen->nidn }}</td>
                        <td>{{ $dosen->nama_dosen }}</td>
                        <td>{{ $dosen->tgl_mulai_tugas }}</td>
                        <td>{{ $dosen->jenjang_pendidikan }}</td>
                        <td>{{ $dosen->bidang_keilmuan }}</td>
                        <td><img src="{{ asset('storage/' . $dosen->foto_dosen) }}" alt="Foto Dosen" width="100"></td>
                        <td>
                            <a href="{{ route('dosens.show', $dosen->id) }}" class="btn btn-info btn-sm">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('dosens.edit', $dosen->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                            <form action="{{ route('dosens.destroy', $dosen->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $dosens->links() }}
    </div>
@endsection
