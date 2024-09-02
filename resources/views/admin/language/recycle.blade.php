@extends('layouts_2.app')
@section('content')
    <div class="card">
        <div class="card-header">Bahasa</div>
        <div class="card-body">
            <a href="{{ url('admin/language') }}" class="btn btn-secondary btn-sm mb-2">Back</a>
            <div class="table table-responsive">
                <table class="table table-bordered text-center">
                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Actions</th>
                            <th>Nama Bahasa</th>
                            <th>Tingkat Bahasa</th>
                            <th>Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($language as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>

                                <td>

                                    <a href="{{ route('language.restore', $item->id) }}"
                                        class="btn btn-success btn-sm ">Restore</a>
                                    <form action="{{ route('language.destroy', $item->id) }}" method="POST"
                                        style="display: inline" onsubmit="return confirm('Akaan di delete permanen ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                                <td>{{ $item->nama_bahasa }}</td>
                                <td>{{ $item->tingkat_bahasa }}</td>
                                <td>{{ $item->deskripsi }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer"></div>
    </div>
@endsection
