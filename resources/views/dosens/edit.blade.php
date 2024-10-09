@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Edit Dosen</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-10">
            <form action="{{ route('dosens.update', $dosen->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nidn" class="form-label">NIDN</label>
                    <input type="text" name="nidn" class="form-control" value="{{ old('nidn', $dosen->nidn) }}" required>
                </div>

                <div class="mb-3">
                    <label for="nama_dosen" class="form-label">Nama Dosen</label>
                    <input type="text" name="nama_dosen" class="form-control" value="{{ old('nama_dosen', $dosen->nama_dosen) }}" required>
                </div>

                <div class="mb-3">
                    <label for="tgl_mulai_tugas" class="form-label">Tanggal Mulai Tugas</label>
                    <input type="date" name="tgl_mulai_tugas" class="form-control" value="{{ old('tgl_mulai_tugas', $dosen->tgl_mulai_tugas) }}" required>
                </div>

                <div class="mb-3">
                    <label for="jenjang_pendidikan" class="form-label">Jenjang Pendidikan</label>
                    <select name="jenjang_pendidikan" class="form-control" required>
                        <option value="S2" {{ $dosen->jenjang_pendidikan == 'S2' ? 'selected' : '' }}>S2</option>
                        <option value="S3" {{ $dosen->jenjang_pendidikan == 'S3' ? 'selected' : '' }}>S3</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="bidang_keilmuan" class="form-label">Bidang Keilmuan</label>
                    <input type="text" name="bidang_keilmuan" class="form-control" value="{{ old('bidang_keilmuan', $dosen->bidang_keilmuan) }}" required>
                </div>

                <div class="mb-3">
                    <label for="foto_dosen" class="form-label">Foto Dosen</label>
                    @if($dosen->foto_dosen)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $dosen->foto_dosen) }}" alt="Foto Dosen" width="150" class="img-thumbnail">
                        </div>
                    @endif
                    <input type="file" name="foto_dosen" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary w-100">Simpan Perubahan</button>
                <a href="{{ route('dosens.index') }}" class="btn btn-secondary w-100 mt-2">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
