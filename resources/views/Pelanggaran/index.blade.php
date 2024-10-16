@extends('layout.admin')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Pelanggaran</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tabel Pelanggaran</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#createEmployeeModal">
            Tambah Pelanggaran
        </button>

        <!-- Modal Form -->
        <div class="modal fade" id="createEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="createEmployeeModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createEmployeeModalLabel">Tambah Pelanggaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('pelanggaran.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="id_number">NIK Karyawan</label>
                                <select id="id_number" name="id_number" class="form-control" required>
                                    <option value="">-- Pilih --</option>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id_number }}">{{ $employee->id_number }} - {{ $employee->full_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="offense_type">Nama Pelanggaran</label>
                                <input type="text" id="offense_type" name="offense_type" class="form-control" placeholder="Masukkan Nama Pelanggaran" required>
                            </div>
                            <div class="form-group">
                                <label for="offense_date">Tanggal Pelanggaran</label>
                                <input type="date" id="offense_date" name="offense_date" class="form-control" placeholder="Masukkan Tanggal Pelanggaran" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Deskripsi</label>
                                <input type="text" id="description" name="description" class="form-control" placeholder="Masukkan Deskripsi">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>NIK Karyawan</th>
                        <th>Nama Pelanggaran</th>
                        <th>Tanggal Pelanggaran</th>
                        <th>Deskripsi</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($records as $record)
                        <tr>
                            <td>{{ $record->employee->id_number }}</td>
                            <td>{{ $record->offense_type }}</td>
                            <td>{{ $record->offense_date}}</td>
                            <td>{{ $record->description }}</td>
                            <td>
                                <a href="{{ route('pelanggaran.edit', $record->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('pelanggaran.destroy', $record->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
