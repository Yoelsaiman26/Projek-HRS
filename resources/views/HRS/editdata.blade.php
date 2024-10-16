<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Karyawan</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style/index.css') }}">
</head>

<style>
    body {
        background-color: black;
        color: white;
    }

    .container {
        background-color: #1e1e1e;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    h1,
    h2 {
        color: #f0f0f0;
    }

    .form-control {
        background-color: #333;
        color: white;
        border: 1px solid #444;
    }

    .form-control::placeholder {
        color: #888;
    }

    .form-control:focus {
        border-color: #007bff;
        background-color: #333;
        color: white;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }
</style>

<body>
    <div class="container">
        <h1 class="text-center mb-4">EDIT DATA KARYAWAN</h1>

        <form action="{{ route('employeesZ.update', $employee->id_number) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Form Input Karyawan -->
            <div class="form-group">
                <label for="id_number">Nomor KTP</label>
                <input type="text" id="id_number" name="id_number" class="form-control"
                    value="{{ old('id_number', $employee->id_number) }}" placeholder="Masukkan Nomor Ktp" readonly>
            </div>
            <div class="form-group">
                <label for="full_name">Nama Lengkap</label>
                <input type="text" id="full_name" name="full_name" class="form-control"
                    value="{{ old('full_name', $employee->full_name) }}" placeholder="Masukkan Nama Lengkap" required>
            </div>
            <div class="form-group">
                <label for="nickname">Nama Panggilan</label>
                <input type="text" id="nickname" name="nickname" class="form-control"
                    value="{{ old('nickname', $employee->nickname) }}" placeholder="Masukkan Nama Panggilan">
            </div>
            <div class="form-group">
                <label for="contract_date">Tanggal Kontrak</label>
                <input type="date" id="contract_date" name="contract_date" class="form-control"
                    value="{{ old('contract_date', $employee->contract_date) }}" required>
            </div>
            <div class="form-group">
                <label for="work_date">Tanggal Mulai Bekerja</label>
                <input type="date" id="work_date" name="work_date" class="form-control"
                    value="{{ old('work_date', $employee->work_date) }}" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" class="form-control" required>
                    <option value="Aktif" {{ old('status', $employee->status) == 'Aktif' ? 'selected' : '' }}>Aktif
                    </option>
                    <option value="Berhenti" {{ old('status', $employee->status) == 'Berhenti' ? 'selected' : '' }}>
                        Berhenti</option>
                </select>
            </div>
            <div class="form-group">
                <label for="position">Jabatan</label>
                <input type="text" id="position" name="position" class="form-control"
                    value="{{ old('position', $employee->position) }}" placeholder="Masukkan Jabatan">
            </div>
            <div class="form-group">
                <label for="nuptk">NUPTK</label>
                <input type="text" id="nuptk" name="nuptk" class="form-control"
                    value="{{ old('nuptk', $employee->nuptk) }}" placeholder="Masukkan NUPTK">
            </div>
            <div class="form-group">
                <label for="gender">Jenis Kelamin</label>
                <select id="gender" name="gender" class="form-control" required>
                    <option value="pria" {{ old('gender', $employee->gender) == 'pria' ? 'selected' : '' }}>Pria
                    </option>
                    <option value="wanita" {{ old('gender', $employee->gender) == 'wanita' ? 'selected' : '' }}>Wanita
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label for="place_birth">Tempat Lahir</label>
                <input type="text" id="place_birth" name="place_birth" class="form-control"
                    value="{{ old('place_birth', $employee->place_birth) }}" placeholder="Masukkan Tempat Lahir">
            </div>
            <div class="form-group">
                <label for="birth_date">Tanggal Lahir</label>
                <input type="date" id="birth_date" name="birth_date" class="form-control"
                    value="{{ old('birth_date', $employee->birth_date) }}" required>
            </div>
            <div class="form-group">
                <label for="religion">Agama</label>
                <select id="religion" name="religion" class="form-control" required>
                    <option value="Islam" {{ old('religion', $employee->religion) == 'Islam' ? 'selected' : '' }}>
                        Islam</option>
                    <option value="Kristen" {{ old('religion', $employee->religion) == 'Kristen' ? 'selected' : '' }}>
                        Kristen</option>
                    <option value="Katolik" {{ old('religion', $employee->religion) == 'Katolik' ? 'selected' : '' }}>
                        Katolik</option>
                    <option value="Hindu" {{ old('religion', $employee->religion) == 'Hindu' ? 'selected' : '' }}>
                        Hindu</option>
                    <option value="Buddha" {{ old('religion', $employee->religion) == 'Buddha' ? 'selected' : '' }}>
                        Buddha</option>
                    <option value="Konghucu"
                        {{ old('religion', $employee->religion) == 'Konghucu' ? 'selected' : '' }}>
                        Konghucu</option>
                </select>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control"
                    value="{{ old('email', $employee->email) }}" placeholder="Masukkan Email">
            </div>
            <div class="form-group">
                <label for="hobby">Hobi</label>
                <input type="text" id="hobby" name="hobby" class="form-control"
                    value="{{ old('hobby', $employee->hobby) }}" placeholder="Masukkan Hobi">
            </div>
            <div class="form-group">
                <label for="marital_status">Status Pernikahan</label>
                <select id="marital_status" name="marital_status" class="form-control" required>
                    <option value="menikah"
                        {{ old('marital_status', $employee->marital_status) == 'menikah' ? 'selected' : '' }}>Menikah
                    </option>
                    <option value="belum"
                        {{ old('marital_status', $employee->marital_status) == 'belum' ? 'selected' : '' }}>Belum
                        Menikah</option>
                </select>
            </div>
            <div class="form-group">
                <label for="residence_address">Alamat Tempat Tinggal</label>
                <input type="text" id="residence_address" name="residence_address" class="form-control"
                    value="{{ old('residence_address', $employee->residence_address) }}"
                    placeholder="Masukkan Alamat Tempat Tinggal">
            </div>
            <div class="form-group">
                <label for="phone">Nomor Telepon</label>
                <input type="tel" id="phone" name="phone" class="form-control"
                    value="{{ old('phone', $employee->phone) }}" placeholder="Masukkan Nomor Telepon">
            </div>
            <div class="form-group">
                <label for="address_emergency">Alamat Darurat</label>
                <input type="text" id="address_emergency" name="address_emergency" class="form-control"
                    value="{{ old('address_emergency', $employee->address_emergency) }}"
                    placeholder="Masukkan Alamat Darurat">
            </div>
            <div class="form-group">
                <label for="phone_emergency">Telepon Darurat</label>
                <input type="tel" id="phone_emergency" name="phone_emergency" class="form-control"
                    value="{{ old('phone_emergency', $employee->phone_emergency) }}"
                    placeholder="Masukkan Telepon Darurat">
            </div>
            <div class="form-group">
                <label for="blood_type">Golongan Darah</label>
                <input type="text" id="blood_type" name="blood_type" class="form-control"
                    value="{{ old('blood_type', $employee->blood_type) }}" placeholder="Masukkan Golongan Darah">
            </div>
            <div class="form-group">
                <label for="last_education">Pendidikan Terakhir</label>
                <input type="text" id="last_education" name="last_education" class="form-control"
                    value="{{ old('last_education', $employee->last_education) }}"
                    placeholder="Masukkan Pendidikan Terakhir">
            </div>
            <div class="form-group">
                <label for="agency">Instansi</label>
                <input type="text" id="agency" name="agency" class="form-control"
                    value="{{ old('agency', $employee->agency) }}" placeholder="Masukkan Instansi">
            </div>
            <div class="form-group">
                <label for="graduation_year">Tahun Lulus</label>
                <input type="number" id="graduation_year" name="graduation_year" class="form-control"
                    value="{{ old('graduation_year', $employee->graduation_year) }}"
                    placeholder="Masukkan Tahun Lulus">
            </div>
            <div class="form-group">
                <label for="competency_training_place">Tempat Pelatihan Kompetensi</label>
                <input type="text" id="competency_training_place" name="competency_training_place"
                    class="form-control"
                    value="{{ old('competency_training_place', $employee->competency_training_place) }}"
                    placeholder="Masukkan Tempat Pelatihan Kompetensi">
            </div>
            <div class="form-group">
                <label for="organizational_experience">Pengalaman Organisasi</label>
                <textarea id="organizational_experience" name="organizational_experience" class="form-control" rows="4"
                    placeholder="Masukkan Pengalaman Organisasi">{{ old('organizational_experience', $employee->organizational_experience) }}</textarea>
            </div>

            <h2 class="mt-4 mb-3">DATA KELUARGA</h2>
            <div class="form-group">
                <label for="mate_name">Nama Pasangan</label>
                <input type="text" id="mate_name" name="mate_name" class="form-control"
                    value="{{ old('mate_name', $employee->familyData->mate_name ?? '') }}"
                    placeholder="Masukkan Nama Pasangan">
            </div>
            <div class="form-group">
                <label for="child_name">Nama Anak</label>
                <input type="text" id="child_name" name="child_name" class="form-control"
                    value="{{ old('child_name', $employee->familyData->child_name ?? '') }}"
                    placeholder="Masukkan Nama Anak">
            </div>
            <div class="form-group">
                <label for="wedding_date">Tanggal Menikah</label>
                <input type="date" id="wedding_date" name="wedding_date" class="form-control"
                    value="{{ old('wedding_date', $employee->familyData->wedding_date ?? '') }}">
            </div>
            <div class="form-group">
                <label for="wedding_certificate_number">Nomor Surat Nikah</label>
                <input type="text" id="wedding_certificate_number" name="wedding_certificate_number"
                    class="form-control"
                    value="{{ old('wedding_certificate_number', $employee->familyData->wedding_certificate_number ?? '') }}"
                    placeholder="Masukkan Nomor Surat Nikah">
            </div>

            <button type="submit" class="btn btn-primary mt-4">Update</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
