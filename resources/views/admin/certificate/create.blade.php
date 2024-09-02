@extends('layouts_2.app')
@section('content')


    <h3>Buat Sertifikat baru</h3>
    @if ($errors->any())
        @foreach ($errors->all() as $err)
            {{ $err }}
        @endforeach
    @endif
    <form action="{{ route('certificate.store') }}" method="POST" enctype="multipart/form-data">
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
            <label for="judul">Nama Sertifikat</label>
            <input type="text" name="nama_sertifikat" id="judul" class="form-control">
        </div>
        <div class="mb-3">
            <label for="sub_judul">Tahun Sertifikat</label>
            <input type="date" name="tahun_sertifikat" id="tahun_sertifikat" class="form-control">
        </div>
        <div class="mb-3">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="file">Bukti Sertifikat</label>
            <input type="file" name="bukti_sertifikat" id="bukti_sertifikat" class="form-control">
        </div>
        <div class="mb-3">
            <button class="btn btn-primary" type="submit">ADD</button>
            <a href="{{ url('admin/certificate') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
@endsection
