@extends('layouts_2.app')
@section('content')
    <form action="{{ route('education.update', $education->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_sekolah">Nama Sekolah</label>
            <input type="text" name="nama_sekolah" id="nama_sekolah" class="form-control" value="{{ $education->nama_sekolah }}">
        </div>
        <div class="mb-3">
            <label for="jurusan">Jurusan</label>
            <input type="text" name="jurusan" id="jurusan" class="form-control" value="{{ $education->jurusan }}">
        </div>
        <div class="mb-3">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control">{{ $education->deskripsi }}"</textarea>
        </div>
        <div class="mb-3">
            <label for="" form="awal_kerja">Riwayat Pendidikan</label>
            <input type="text" name="riwayat_pendidikan" id="riwayat_pendidikan" class="form-control"
                value="{{ $education->riwayat_pendidikan }}">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ url('admin/education') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
@endsection
