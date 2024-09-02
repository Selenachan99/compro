@extends('layouts_2.app')
@section('content')
    <h3>Create Education</h3>
    <form action="{{ route('education.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">

            <label for="id_profile">Pilih Profile</label>
            <select name="id_profile" id="id_profile" class="form-control" required>
                <option value="">Pilih Profile</option>
                @foreach ($profiles as $index => $item)
                    <option value="{{ $item->id }}">{{ $item->nama_lengkap }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="judul">Nama Sekolah / Kampus </label>
            <input type="text" name="nama_sekolah" id="nama_sekolah" class="form-control">
        </div>
        <div class="mb-3">
            <label for="sub_judul">Jurusan</label>
            <input type="text" name="jurusan" id="jurusan" class="form-control">
        </div>
        <div class="mb-3">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="" form="riwayat_pendidikan">Riwayat Pendidikan</label>
            <input type="text" name="riwayat_pendidikan" id="riwayat_pendidikan" class="form-control">
        </div>
        <div class="mb-3">
            <button class="btn btn-primary" type="submit">ADD</button>
            <a href="{{ url('admin/education') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
@endsection
