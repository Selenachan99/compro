@extends('layouts_2.app')
@section('content')
    <form action="{{ route('awards.update', $awards->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_penghargaan">Nama Penghargaan</label>
            <input type="text" name="nama_penghargaan" id="nama_penghargaan" class="form-control" value="{{ $awards->nama_penghargaan }}">
        </div>
        <div class="mb-3">
            <label for="tahun_penghargaan">Tahun Penghargaan</label>
            <input type="date" name="tahun_penghargaan" id="tahun_penghargaan" class="form-control" value="{{ $awards->tahun_penghargaan }}">
        </div>
        <div class="mb-3">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control">{{ $awards->deskripsi }}"</textarea>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ url('admin/awards') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
@endsection
