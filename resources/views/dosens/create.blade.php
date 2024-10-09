@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4 text-center">Tambah Dosen</h1>

        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-10">
                <form action="{{ route('dosens.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="nidn">NIDN</label>
                        <input type="text" name="nidn" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="nama_dosen">Nama Dosen</label>
                        <input type="text" name="nama_dosen" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="tgl_mulai_tugas">Tanggal Mulai Tugas</label>
                        <input type="date" name="tgl_mulai_tugas" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="jenjang_pendidikan">Jenjang Pendidikan</label>
                        <select name="jenjang_pendidikan" class="form-select" required>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="bidang_keilmuan">Bidang Keilmuan</label>
                        <input type="text" name="bidang_keilmuan" class="form-control" required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="foto_dosen">Foto Dosen</label>
                        <input type="file" name="foto_dosen" class="form-control-file">
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
