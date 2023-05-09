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
    <div class="col-sm-7">
        <div class="mt-2 d-flex justify-content-end">
            <button class="btn btn-warning" onclick="enableinput()" id="editButton">
                <i class="fa-solid fa-gear"></i> Edit
            </button>
        </div>
        <form action="">
            <div class="mb-3" data-aos="fade-up" data-aos-duration="500">
                <label for="exampleFormControlInput1" class="form-label">USERNAME</label>
                <input type="text" name="username" class="form-control unedit" id="exampleFormControlInput" disabled readonly required>
            </div>
            <div class="mb-3" data-aos="fade-up" data-aos-duration="500">
                <label for="exampleFormControlInput1" class="form-label">NIK/NIP</label>
                <input type="text" name="nik" class="form-control buka" id="exampleFormControlInput" disabled readonly required>
            </div>
            <div class="mb-3" data-aos="fade-up" data-aos-duration="500">
                <label for="exampleFormControlInput1" class="form-label">NAMA</label>
                <input type="text" name="name" class="form-control buka" id="exampleFormControlInput" disabled readonly required>
            </div>
            <div class="mb-3" data-aos="fade-up" data-aos-duration="500">
                <label for="exampleFormControlInput1" class="form-label">EMAIL</label>
                <input type="email" name="email" class="form-control buka" id="exampleFormControlInput" disabled readonly required>
            </div>
            <div class="mb-3" data-aos="fade-up" data-aos-duration="500">
                <label for="exampleFormControlInput1" class="form-label">Jurusan</label>
                <select class="form-select buka" name="jurusan" required disabled>
                    <option value="Teknik Informatika">Teknik Informatika</option>
                    <option value="Teknik Elektro">Teknik Elektro</option>
                    <option value="Teknik Informatika">Teknik Mesin</option>
                    <option value="Manajemen Bisnis">Manajemen Bisnis</option>
                </select>
            </div>
            <div class="mb-3" data-aos="fade-up" data-aos-duration="500">
                <label for="exampleFormControlInput1" class="form-label">No Whatsapp</label>
                <input type="text" name="nowa" class="form-control buka" id="exampleFormControlInput" disabled readonly required>
            </div>
            <div class="mb-3" data-aos="fade-up" data-aos-duration="500">
                <input type="submit" class="btn btn-outline-primary w-100 submit">
            </div>
        </form>
    </div>
</div>
@endsection
