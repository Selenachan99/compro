@extends('layouts_2.app')
@section('content')
    <h3>Tambah Bahasa Baru</h3>
    <form action="{{ route('language.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">

            <label for="id_profile">Pilih Profile</label>
            <select name="id_profile" id="id_profile" class="form-control" required>
                <option value="">Pilih Profile</option>
                @foreach ($profile as $index => $item)
                    <option value="{{ $item->id }}">{{ $item->nama_lengkap }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="judul">Nama Bahasa</label>
            <input type="text" name="nama_bahasa" id="nama_bahasa" class="form-control">
        </div>
        <div class="mb-3">
            <label for="tingkat_bahasa">Tingkat Bahasa</label>
            <input type="text" name="tingkat_bahasa" id="tingkat_bahasa" class="form-control">
        </div>
        <div class="mb-3">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary" type="submit">ADD</button>
            <a href="{{ url('admin/language') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
@endsection
