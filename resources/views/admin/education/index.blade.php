@extends('layouts_2.app')

@section('content')
    <div class="card">
        <div class="card-header">Education</div>
        <div class="card-body">
            <a href="{{ route('education.create') }}" class="btn btn-primary btn-sm mb-2">ADD</a>
            <a href="{{ url('admin/education/recycle') }}" class="btn btn-warning btn-sm mb-2">Recycle</a>
            <div class="table table-responsive">
                <table class="table table-bordered text-center">
                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Actions</th>
                            {{-- <th>Nama</th> --}}
                            <th>Judul</th>
                            <th>Sub Judul</th>
                            <th>Deskripsi</th>
                            <th>Riwayat Pendidikan</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($education as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <a href="{{ route('education.edit', $item->id) }}"
                                        class="btn btn-success btn-sm ">Edit</a>
                                    <form action="{{ route('education.softdelete', $item->id) }}" method="POST"
                                        style="display: inline" onsubmit="return confirm('Akan di delete sementara ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Soft Delete</button>
                                    </form>
                                </td>

                                {{-- <td>{{ $item->profile->nama_lengkap }}</td> --}}
                                <td>{{ $item->judul }}</td>
                                <td>{{ $item->sub_judul }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                <td>{{ $item->riwayat_pendidikan }}</td>



                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer"></div>
    </div>
@endsection
@section('script-sweetalert')
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const statusRadios = document.querySelectorAll('.status-radio');
            statusRadios.forEach(radio => {
                radio.addEventListener('click', (event) => {
                    const itemId = event.target.getAttribute('data-id');
                    const csrfToken = document.querySelector('meta[name="csrf-token"]')
                        .getAttribute('content');
                    fetch(`/admin/profiles/update-status/${itemId}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrfToken
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire(
                                    'Berhasil',
                                    'Status Berhasil diperbarui.',
                                    'success'
                                );
                                statusRadios.forEach(r => {
                                    if (r.getAttribute('data-id') != itemId) {
                                        r.checked = false;
                                    }
                                });
                            } else {
                                Swal.fire(
                                    'Gagal',
                                    data.error ||
                                    'Terjadi Kesalahan saat memperbarui status',
                                    'error'
                                );
                            }
                        })
                        .catch(error => {
                            Swal.fire(
                                'Gagal',
                                'Terjadi kesalahan saat memperbarui status',
                                'error'
                            );
                        });
                });
            });
        });
    </script>
@endsection
