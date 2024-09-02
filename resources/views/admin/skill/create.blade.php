@extends('layouts_2.app')
@section('content')
    <h3>Create Education</h3>
    <form action="{{ route('skill.store') }}" method="POST" enctype="multipart/form-data">
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
            <label for="judul">Nama Skill</label>
            <input type="text" name="nama_skill" id="nama_skill" class="form-control">
        </div>
        <div class="mb-3">
            <label for="sub_judul">Sub Judul</label>
            <input type="text" name="sub_judul" id="sub_judul" class="form-control">
        </div>
        <div class="mb-3">
            <label for="descriptions">Deskripsi Skill</label>
            <textarea name="descriptions" id="descriptions" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary" type="submit">ADD</button>
            <a href="{{ url('admin/skill') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
@endsection
