@extends('layout.admin')

@section('content')
    <style>
        /* Memastikan tabel dan konten berada di tengah */
        .table-centered {
            margin: 0 auto;
            width: 100%;
        }

        /* Memastikan responsivitas tabel */
        .table-responsive {
            overflow-x: auto;
        }

        /* Mengatur teks agar tetap berada di tengah */
        .text-center {
            text-align: center;
        }

        /* Memperbaiki tata letak tabel dan memberi ruang di sekitar tabel */
        .table-container {
            margin: 20px 0;
        }

        /* Menambahkan gaya untuk tabel */
        .table {
            width: 100%;
            border-collapse: collapse;
        }

        /* Menambahkan warna latar belakang untuk header tabel */
        .table thead th {
            background-color: #f8f9fa;
            color: #495057;
            padding: 10px;
            text-align: left;
        }

        /* Menambahkan border dan gaya untuk sel tabel */
        .table td, .table th {
            border: 1px solid #dee2e6;
            padding: 8px;
        }

        /* Menambahkan efek hover pada baris tabel */
        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

        /* Menambahkan padding dan border pada tombol */
        .btn {
            display: inline-block;
            padding: 8px 16px;
            font-size: 14px;
            font-weight: 500;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
            cursor: pointer;
            border: none;
        }

        .btn-success {
            background-color: #28a745;
            color: #fff;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        /* Menambahkan gaya untuk alert */
        .alert {
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        /* Menambahkan padding dan margin pada elemen kontainer */
        .container {
            padding: 20px;
            margin: 0 auto;
            max-width: 1200px;
        }

        /* Menambahkan margin pada header */
        h1 {
            margin-bottom: 30px;
        }

        /* Mengubah warna teks untuk elemen teks yang dimute */
        .text-muted {
            color: #6c757d;
        }
    </style>

    <div class="container text-center">
        <h1 class="my-5">Data Karyawan yang Diarsipkan</h1>

        <!-- Tampilkan pesan sukses atau error -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Cek apakah ada data karyawan yang diarsipkan -->
        @if($archivedEmployees->isEmpty())
            <p class="text-muted">Tidak ada data karyawan yang diarsipkan.</p>
        @else
            <div class="table-responsive">
                <table class="table table-striped table-centered">
                    <thead>
                        <tr>
                            <th>Nomor KTP</th>
                            <th>Nama Lengkap</th>
                            <th>Nama Panggilan</th>
                            <th>Tanggal Kontrak</th>
                            <th>Tanggal Mulai Bekerja</th>
                            <th>Status</th>
                            <th>Jabatan</th>
                            <th>NUPTK</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Agama</th>
                            <th>Email</th>
                            <th>Hobi</th>
                            <th>Status Pernikahan</th>
                            <th>Alamat Tempat Tinggal</th>
                            <th>Nomor Telepon</th>
                            <th>Alamat Darurat</th>
                            <th>Telepon Darurat</th>
                            <th>Golongan Darah</th>
                            <th>Pendidikan Terakhir</th>
                            <th>Instansi</th>
                            <th>Tahun Lulus</th>
                            <th>Tempat Pelatihan Kompetensi</th>
                            <th>Pengalaman Organisasi</th>
                            <th>Nama Pasangan</th>
                            <th>Nama Anak</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($archivedEmployees as $employee)
                            <tr>
                                <td>{{ $employee->id_number }}</td>
                                <td>{{ $employee->full_name }}</td>
                                <td>{{ $employee->nickname }}</td>
                                <td>{{ $employee->contract_date->format('d-m-Y') }}</td>
                                <td>{{ $employee->work_date->format('d-m-Y') }}</td>
                                <td>{{ $employee->status }}</td>
                                <td>{{ $employee->position }}</td>
                                <td>{{ $employee->nuptk }}</td>
                                <td>{{ $employee->gender }}</td>
                                <td>{{ $employee->place_birth }}</td>
                                <td>{{ $employee->birth_date->format('d-m-Y') }}</td>
                                <td>{{ $employee->religion }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->hobby }}</td>
                                <td>{{ $employee->marital_status }}</td>
                                <td>{{ $employee->residence_address }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>{{ $employee->address_emergency }}</td>
                                <td>{{ $employee->phone_emergency }}</td>
                                <td>{{ $employee->blood_type }}</td>
                                <td>{{ $employee->last_education }}</td>
                                <td>{{ $employee->agency }}</td>
                                <td>{{ $employee->graduation_year }}</td>
                                <td>{{ $employee->competency_training_place }}</td>
                                <td>{{ $employee->organizational_experience }}</td>
                                <td>
                                    {{ $employee->familyData->mate_name ?? 'Tidak Ada' }}
                                </td>
                                <td>
                                    {{ $employee->familyData->child_name ?? 'Tidak Ada' }}
                                </td>
                                <td>
                                    <!-- Tombol untuk memulihkan data karyawan -->
                                    <form action="{{ route('karyawan.archive', $employee->id_number) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin mengarsipkan data karyawan ini?')">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-warning">Arsip</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
