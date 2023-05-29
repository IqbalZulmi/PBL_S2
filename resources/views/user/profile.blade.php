@extends('layout.user')

@section('title')
Pengajuan Hak Cipta
@endsection

@section('content')
<div class="row wht">
    <div class="col-sm-5 d-grid" style="place-items:center;">
        <div class="w-75">
            <img src="https://learning-if.polibatam.ac.id/theme/image.php/moove/core/1675225508/u/f2" class="rounded-circle w-100 h-100">
        </div>
    </div>
    @foreach ($profile as $index => $data )
    <div class="col-sm-7">
        <div class="mt-2 d-flex justify-content-end">
            <button class="btn btn-outline-warning" onclick="enableinput()" id="editButton">
                <i class="fa-solid fa-gear"></i> Edit
            </button>
        </div>
        <form action="/user/profile/{{ $data->nik }}" method="POST">
            @csrf @method('put')
            <input type="text" name="old_username" hidden value="{{ $data->username }}">
            <input type="text" name="old_nik" hidden value="{{ $data->nik }}">
            <div class="mb-3" data-aos="fade-up" data-aos-duration="500">
                <label for="exampleFormControlInput1" class="form-label">USERNAME</label>
                <input type="text" name="username" class="@error('username') is-invalid @enderror form-control buka" value="{{ old('username',$data->username) }}" id="exampleFormControlInput" disabled readonly required>
                @error('username')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3" data-aos="fade-up" data-aos-duration="500">
                <label for="exampleFormControlInput1" class="form-label">NIK/NIP</label>
                <input type="text" name="nik" class="@error('nik') is-invalid @enderror form-control buka" value="{{ old('nik',$data->nik) }}" id="exampleFormControlInput" disabled readonly required>
                @error('nik')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3" data-aos="fade-up" data-aos-duration="500">
                <label for="exampleFormControlInput1" class="form-label">NAMA</label>
                <input type="text" name="nama" class="@error('nama') is-invalid @enderror form-control buka" value="{{ old('nama',$data->nama) }}" id="exampleFormControlInput" disabled readonly required>
                @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3" data-aos="fade-up" data-aos-duration="500">
                <label for="exampleFormControlInput1" class="form-label">EMAIL</label>
                <input type="email" name="email" class="@error('email') is-invalid @enderror form-control buka" value="{{ old('email',$data->email) }}" id="exampleFormControlInput" disabled readonly required>
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3" data-aos="fade-up" data-aos-duration="500">
                <label for="exampleFormControlInput1" class="form-label">No Whatsapp</label>
                <input type="text" name="no_wa" class="@error('no_wa') is-invalid @enderror form-control buka" value="{{ old('no_wa',$data->no_wa) }}" id="exampleFormControlInput" disabled readonly required>
                @error('no_wa')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3" data-aos="fade-up" data-aos-duration="500">
                <label for="exampleFormControlInput1" class="form-label">Jurusan</label>
                <select class="@error('jurusan') is-invalid @enderror form-select buka" name="jurusan" required disabled>
                    <option value="Teknik Informatika" @if($data->jurusan == 'Teknik Informatika') selected @endif>Teknik Informatika</option>
                    <option value="Teknik Elektro" @if($data->jurusan == 'Teknik Elektro') selected @endif>Teknik Elektro</option>
                    <option value="Teknik Mesin" @if($data->jurusan == 'Teknik Mesin') selected @endif>Teknik Mesin</option>
                    <option value="Manajemen Bisnis" @if($data->jurusan == 'Manajemen Bisnis') selected @endif>Manajemen Bisnis</option>
                </select>
                @error('jurusan')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3" data-aos="fade-up" data-aos-duration="500">
                <input type="submit" class="btn btn-outline-primary w-100 submit">
            </div>
        </form>
    </div>
    @endforeach
</div>
@endsection
