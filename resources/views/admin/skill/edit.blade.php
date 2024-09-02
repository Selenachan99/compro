@extends('layouts_2.app')
@section('content')
    <form action="{{ route('skill.update', $skill->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="judul">Nama Skill</label>
            <input type="text" name="nama_skill" id="nama_skill" class="form-control" value="{{ $skill->nama_skill }}">
        </div>
        <div class="mb-3">
            <label for="sub_judul">Sub Judul</label>
            <input type="text" name="sub_judul" id="sub_judul" class="form-control" value="{{ $skill->sub_judul }}">
        </div>
        <div class="mb-3">
            <label for="descriptions">Deskripsi</label>
            <textarea name="descriptions" id="descriptions" cols="30" rows="10" class="form-control">{{ $skill->descriptions }}"</textarea>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ url('admin/skill') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
@endsection
