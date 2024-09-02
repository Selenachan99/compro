@extends('layouts_2.app')
@section('content')
    <h3>Create Awards</h3>
    <form action="{{ route('awards.store') }}" method="POST" enctype="multipart/form-data">
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
            <label for="judul">Nama Penghargaan </label>
            <input type="text" name="nama_penghargaan" id="nama_penghargaan" class="form-control">
        </div>
        <div class="mb-3">
            <label for="tahun_penghargaan">Tahun Penghargaan</label>
            <input type="date" name="tahun_penghargaan" id="tahun_penghargaab" class="form-control">
        </div>
        <div class="mb-3">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary" type="submit">ADD</button>
            <a href="{{ url('admin/awards') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
@endsection
