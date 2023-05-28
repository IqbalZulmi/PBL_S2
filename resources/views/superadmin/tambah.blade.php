@extends('layout.superadmin')

@section('title')
Tambah Akun
@endsection

@section('content')
<div class="row wht">
    <div class="col-12 px-4 pt-2">
        <form action="/tambah-akun" method="post">
            @csrf
            <div class="row gy-2" data-aos="zoom-in" data-aos-duration="400">
                <label for="inputPassword" class="col-sm-2 col-form-label mt-3">NIK</label>
                <div class="col-sm-10">
                    <input type="text" name="nik" placeholder="nik" class="form-control mt-sm-2 @error('nik') is-invalid @enderror" value="{{ old('nik') }}" required autofocus>
                    @error('nik')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <label for="inputPassword" class="col-sm-2 col-form-label">username</label>
                <div class="col-sm-10">
                    <input type="text" name="username" placeholder="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" required>
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" name="password" placeholder="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <label for="inputPassword" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" name="nama" placeholder="Nama Lengkap" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" required>
                    @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <label for="inputPassword" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" name="email" placeholder="Email Aktif" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <label for="inputPassword" class="col-sm-2 col-form-label">No WhatsApp</label>
                <div class="col-sm-10">
                    <input type="text" name="no_wa" placeholder="Nomor WhatsApp Aktif" class="form-control @error('no_wa') is-invalid @enderror" value="{{ old('no_wa') }}" required>
                    @error('no_wa')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <label for="inputPassword" class="col-sm-2 col-form-label">Jurusan</label>
                <div class="col-sm-10">
                    <select class="form-select" name="jurusan" class="form-control @error('jurusan') is-invalid @enderror" required>
                        <option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="Teknik Elektro">Teknik Elektro</option>
                        <option value="Teknik Informatika">Teknik Mesin</option>
                        <option value="Manajemen Bisnis">Manajemen Bisnis</option>
                    </select>
                    @error('jurusan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <label for="inputPassword" class="col-sm-2 col-form-label">Roles</label>
                <div class="col-sm-10">
                    <select class="form-select" name="role" class="form-control @error('role') is-invalid @enderror" required>
                        <option value="pic">pic</option>
                        <option value="manajer">manajer</option>
                    </select>
                    @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-sm-12 my-3 text-center">
                    <button type="submit" name="tambah" class="btn btn-outline-success"><i class="fa-sharp fa-solid fa-circle-plus"></i> Tambah Akun</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
