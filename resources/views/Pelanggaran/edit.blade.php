@extends('layout.admin')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Pelanggaran</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('pelanggaran.index') }}">Tabel Pelanggaran</a></li>
                        <li class="breadcrumb-item active">Edit Pelanggaran</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('pelanggaran.update', $pelanggaran->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="id_number">NIK Karyawan</label>
                <select id="id_number" name="id_number" class="form-control" required>
                    <option value="">-- Pilih --</option>
                    @foreach ($tampilkan as $tampil)
                        <option value="{{ $tampil->id_number }}" {{ $pelanggaran->id_number == $tampil->id_number ? 'selected' : '' }}>
                            {{ $tampil->id_number }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="offense_type">Nama Pelanggaran</label>
                <input type="text" id="offense_type" name="offense_type" class="form-control" value="{{ old('offense_type', $pelanggaran->offense_type) }}" required>
            </div>
            <div class="form-group">
                <label for="offense_date">Tanggal Pelanggaran</label>
                <input type="date" id="offense_date" name="offense_date" class="form-control" value="{{ old('offense_date', $pelanggaran->offense_date) }}" required>
            </div>
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea id="description" name="description" class="form-control" placeholder="Masukkan Deskripsi">{{ old('description', $pelanggaran->description) }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Perbarui</button>
            <a href="{{ route('pelanggaran.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
