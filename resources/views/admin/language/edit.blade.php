@extends('layouts_2.app')
@section('content')
    <form action="{{ route('language.update', $language->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="judul">Nama Bahasa</label>
            <input type="text" name="nama_bahasa" id="nama_bahasa" class="form-control" value="{{ $language->nama_bahasa }}">
        </div>
        <div class="mb-3">
            <label for="sub_judul">Tingkat Bahasa</label>
            <input type="text" name="tingkat_bahasa" id="tingkat_bahasa" class="form-control" value="{{ $language->tingkat_bahasa }}">
        </div>
        <div class="mb-3">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control">{{ $language->deskripsi }}"</textarea>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ url('admin/language') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
@endsection
