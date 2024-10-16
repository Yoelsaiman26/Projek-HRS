@extends('layout.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Karyawan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Data Karyawan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Employee Button and Modal -->
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#createEmployeeModal">
                Tambah Karyawan
            </button>

            <div class="modal fade" id="createEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="createEmployeeModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createEmployeeModalLabel">Tambah Karyawan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('karyawan.store') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="id_number">Nomor KTP</label>
                                    <input type="text" id="id_number" name="id_number" class="form-control" placeholder="Masukkan Nomor KTP" required>
                                </div>
                                <div class="form-group">
                                    <label for="full_name">Nama Lengkap</label>
                                    <input type="text" id="full_name" name="full_name" class="form-control" placeholder="Masukkan Nama Lengkap" required>
                                </div>
                                <div class="form-group">
                                    <label for="nickname">Nama Panggilan</label>
                                    <input type="text" id="nickname" name="nickname" class="form-control" placeholder="Masukkan Nama Panggilan" required>
                                </div>
                                <div class="form-group">
                                    <label for="contract_date">Tanggal Kontrak</label>
                                    <input type="date" id="contract_date" name="contract_date" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="work_date">Tanggal Mulai Bekerja</label>
                                    <input type="date" id="work_date" name="work_date" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select id="status" name="status" class="form-control" required>
                                        <option value="Aktif">Aktif</option>
                                        <option value="Berhenti">Berhenti</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="position">Jabatan</label>
                                    <input type="text" id="position" name="position" class="form-control" placeholder="Masukkan Jabatan" required>
                                </div>
                                <div class="form-group">
                                    <label for="nuptk">NUPTK</label>
                                    <input type="text" id="nuptk" name="nuptk" class="form-control" placeholder="Masukkan NUPTK" required>
                                </div>
                                <div class="form-group">
                                    <label for="gender">Jenis Kelamin</label>
                                    <select id="gender" name="gender" class="form-control" required>
                                        <option value="pria">Pria</option>
                                        <option value="wanita">Wanita</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="place_birth">Tempat Lahir</label>
                                    <input type="text" id="place_birth" name="place_birth" class="form-control" placeholder="Masukkan Tempat Lahir" required>
                                </div>
                                <div class="form-group">
                                    <label for="birth_date">Tanggal Lahir</label>
                                    <input type="date" id="birth_date" name="birth_date" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="religion">Agama</label>
                                    <select id="religion" name="religion" class="form-control" required>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Buddha">Buddha</option>
                                        <option value="Konghucu">Konghucu</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan Email" required>
                                </div>
                                <div class="form-group">
                                    <label for="hobby">Hobi</label>
                                    <input type="text" id="hobby" name="hobby" class="form-control" placeholder="Masukkan Hobi" required>
                                </div>
                                <div class="form-group">
                                    <label for="marital_status">Status Pernikahan</label>
                                    <select id="marital_status" name="marital_status" class="form-control" required>
                                        <option value="belum menikah">Belum Menikah</option>
                                        <option value="menikah">Menikah</option>
                                    </select>
                                </div>
                                <div class="form-group" id="mate_name_group" style="display:none;">
                                    <label for="mate_name">Nama Pasangan</label>
                                    <input type="text" id="mate_name" name="mate_name" class="form-control" placeholder="Masukkan Nama Pasangan">
                                </div>
                                <div class="form-group" id="child_name_group" style="display:none;">
                                    <label for="child_name">Nama Anak</label>
                                    <input type="text" id="child_name" name="child_name" class="form-control" placeholder="Masukkan Nama Anak">
                                </div>
                                <div class="form-group" id="wedding_date_group" style="display:none;">
                                    <label for="wedding_date">Tanggal Menikah</label>
                                    <input type="date" id="wedding_date" name="wedding_date" class="form-control">
                                </div>
                                <div class="form-group" id="wedding_certificate_number_group" style="display:none;">
                                    <label for="wedding_certificate_number">Nomor Surat Nikah</label>
                                    <input type="text" id="wedding_certificate_number" name="wedding_certificate_number" class="form-control" placeholder="Masukkan Nomor Surat Nikah">
                                </div>
                                <div class="form-group">
                                    <label for="residence_address">Alamat Tempat Tinggal</label>
                                    <input type="text" id="residence_address" name="residence_address" class="form-control" placeholder="Masukkan Alamat Tempat Tinggal" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Nomor Telepon</label>
                                    <input type="tel" id="phone" name="phone" class="form-control" placeholder="Masukkan Nomor Telepon" required>
                                </div>
                                <div class="form-group">
                                    <label for="address_emergency">Alamat Darurat</label>
                                    <input type="text" id="address_emergency" name="address_emergency" class="form-control" placeholder="Masukkan Alamat Darurat" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone_emergency">Telepon Darurat</label>
                                    <input type="tel" id="phone_emergency" name="phone_emergency" class="form-control" placeholder="Masukkan Telepon Darurat" required>
                                </div>
                                <div class="form-group">
                                    <label for="blood_type">Golongan Darah</label>
                                    <input type="text" id="blood_type" name="blood_type" class="form-control" placeholder="Masukkan Golongan Darah" required>
                                </div>
                                <div class="form-group">
                                    <label for="last_education">Pendidikan Terakhir</label>
                                    <input type="text" id="last_education" name="last_education" class="form-control" placeholder="Masukkan Pendidikan Terakhir" required>
                                </div>
                                <div class="form-group">
                                    <label for="agency">Instansi</label>
                                    <input type="text" id="agency" name="agency" class="form-control" placeholder="Masukkan Instansi" required>
                                </div>
                                <div class="form-group">
                                    <label for="graduation_year">Tahun Lulus</label>
                                    <input type="number" id="graduation_year" name="graduation_year" class="form-control" placeholder="Masukkan Tahun Lulus" required>
                                </div>
                                <div class="form-group">
                                    <label for="competency_training_place">Tempat Pelatihan Kompetensi</label>
                                    <input type="text" id="competency_training_place" name="competency_training_place" class="form-control" placeholder="Masukkan Tempat Pelatihan Kompetensi" required>
                                </div>
                                <div class="form-group">
                                    <label for="organizational_experience">Pengalaman Organisasi</label>
                                    <input type="text" id="organizational_experience" name="organizational_experience" class="form-control" placeholder="Masukkan Pengalaman Organisasi" required>
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

        <!-- Employee Table -->
        <div class="container">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
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
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            <tr>
                                <td>{{ $employee->id_number }}</td>
                                <td>{{ $employee->full_name }}</td>
                                <td>{{ $employee->nickname }}</td>
                                <td>{{ $employee->contract_date }}</td>
                                <td>{{ $employee->work_date }}</td>
                                <td>{{ $employee->status }}</td>
                                <td>{{ $employee->position }}</td>
                                <td>{{ $employee->nuptk }}</td>
                                <td>{{ $employee->gender }}</td>
                                <td>{{ $employee->place_birth }}</td>
                                <td>{{ $employee->birth_date }}</td>
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
                                    <a href="{{ route('employee.edit', $employee->id_number) }}" class="btn btn-primary">Edit</a>

                                    <form action="{{ route('karyawan.restore', $employee->id_number) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-warning">Arsip</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Family Data Table -->
        <div class="container mt-5">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nomor KTP</th>
                            <th>Nama Pasangan</th>
                            <th>Nama Anak</th>
                            <th>Tanggal Menikah</th>
                            <th>Nomor Surat Nikah</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($familyData as $family)
                            <tr>
                                <td>{{ $family->id_number }}</td>
                                <td>{{ $family->mate_name }}</td>
                                <td>{{ $family->child_name }}</td>
                                <td>{{ $family->wedding_date }}</td>
                                <td>{{ $family->wedding_certificate_number }}</td>
                                <td>
                                    <a href="{{ route('employee.edit', $family->id_number) }}" class="btn btn-primary">Edit</a>

                                        <button type="submit" class="btn btn-warning">Arsip</button>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const maritalStatus = document.getElementById('marital_status');
            const mateNameGroup = document.getElementById('mate_name_group');
            const childNameGroup = document.getElementById('child_name_group');
            const weddingDateGroup = document.getElementById('wedding_date_group');
            const weddingCertificateNumberGroup = document.getElementById('wedding_certificate_number_group');

            function toggleFields() {
                const status = maritalStatus.value;
                if (status === 'menikah') {
                    mateNameGroup.style.display = 'block';
                    childNameGroup.style.display = 'block';
                    weddingDateGroup.style.display = 'block';
                    weddingCertificateNumberGroup.style.display = 'block';
                } else {
                    mateNameGroup.style.display = 'none';
                    childNameGroup.style.display = 'none';
                    weddingDateGroup.style.display = 'none';
                    weddingCertificateNumberGroup.style.display = 'none';
                }
            }

            maritalStatus.addEventListener('change', toggleFields);
            toggleFields();
        });
    </script>
@endsection
