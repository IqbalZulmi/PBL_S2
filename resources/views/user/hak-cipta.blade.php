@extends('layout.user')

@section('title')
Pengajuan Hak Cipta
@endsection

@section('content')
<div class="row wht">
    <div class="col-12 px-4">
        <p class="fw-bold mt-2">Form Pengajuan Hak Cipta</p>
        <form action="">
            <div class="mb-2 row mt-3" data-aos="fade-up" data-aos-duration="500">
                <label for="Email" class="col-lg-4 col-form-label">Email</label>
                <div class="col-lg-6">
                    <input type="email" class="form-control" id="Email" placeholder="Email Aktif" required>
                </div>
            </div>
            <div class="mb-2 row" data-aos="fade-up" data-aos-duration="500">
                <label for="NIP" class="col-lg-4 col-form-label">NIP/NIK</label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" id="NIP" placeholder="Masukkan NIP/NIK" required>
                </div>
            </div>
            <div class="mb-2 row" data-aos="fade-up" data-aos-duration="500">
                <label for="Nama" class="col-lg-4 col-form-label">Nama ketua pengusul</label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" id="Nama" placeholder="Nama lengkap Ketua Pengusul" required>
                </div>
            </div>
            <div class="mb-2 row" data-aos="fade-up" data-aos-duration="500">
                <label for="KKT" class="col-lg-4 col-form-label">KKT/PK</label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" id="KKT" placeholder="KKT/PK" required>
                </div>
            </div>
            <div class="mb-2 row" data-aos="fade-up" data-aos-duration="500">
                <label for="nowa" class="col-lg-4 col-form-label">Nomor WhatsApp</label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" id="nowa" placeholder="No WA Aktif" required>
                </div>
            </div>
            <div class="mb-2 row" data-aos="fade-up" data-aos-duration="500">
                <label for="Judul" class="col-lg-4 col-form-label">Judul Usulan</label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" id="Judul" placeholder="Judul Usulan" required>
                </div>
            </div>
            <div class="mb-2 row" data-aos="fade-up" data-aos-duration="500">
                <label for="formFile" class="col-lg-4 col-form-label">Formulir permohonan pendaftaran online</label>
                <div class="col-9 col-sm-10 col-lg-6">
                    <input type="file" class="form-control" id="formFile" onchange="showButton(this);" required>
                    <p class="format">*format .pdf</p>
                </div>
                <div class="col-3 col-sm-2 col-lg-2">
                    <a href="#" class="btn btn-outline-info btn-view d-none">Review</a>
                </div>
            </div>
            <div class="mb-2 row" data-aos="fade-up" data-aos-duration="500">
                <label for="KTP" class="col-lg-4 col-form-label">Scan KTP semua pencipta</label>
                <div class="col-9 col-sm-10 col-lg-6">
                    <input type="file" class="form-control" id="KTP" onchange="showButton(this);" required>
                    <p class="format">*format .pdf</p>
                </div>
                <div class="col-3 col-sm-2 col-lg-2">
                    <a href="#" class="btn btn-outline-info btn-view d-none">Review</a>
                </div>
            </div>
            <div class="mb-2 row" data-aos="fade-up" data-aos-duration="500">
                <label for="NPWP" class="col-lg-4 col-form-label">Scan NPWP pencipta</label>
                <div class="col-9 col-sm-10 col-lg-6">
                    <input type="file" class="form-control" id="NPWP" onchange="showButton(this);" required>
                    <p class="format">*format .pdf</p>
                </div>
                <div class="col-3 col-sm-2 col-lg-2">
                    <a href="#" class="btn btn-outline-info btn-view d-none">Review</a>
                </div>
            </div>
            <div class="mb-2 row" data-aos="fade-up" data-aos-duration="500">
                <label for="Ciptaan" class="col-lg-4 col-form-label">Contoh Ciptaan</label>
                <div class="col-9 col-sm-10 col-lg-6">
                    <input type="file" class="form-control" id="Ciptaan" onchange="showButton(this);" required>
                    <p class="format">*lampiran disesuaikan dengan halaman terakhir form pendaftaran</p>
                </div>
                <div class="col-3 col-sm-2 col-lg-2">
                    <a href="#" class="btn btn-outline-info btn-view d-none">Review</a>
                </div>
            </div>
            <div class="mb-2 row" data-aos="fade-up" data-aos-duration="500">
                <label for="pernyataan" class="col-lg-4 col-form-label">Surat pernyataan Hak Cipta</label>
                <div class="col-9 col-sm-10 col-lg-6">
                    <input type="file" class="form-control" id="pernyataan" onchange="showButton(this);" required>
                    <p class="format">*Sudah ditandatangani Direktur,format .pdf</p>
                </div>
                <div class="col-3 col-sm-2 col-lg-2">
                    <a href="#" class="btn btn-outline-info btn-view d-none">Review</a>
                </div>
            </div>
            <div class="mb-2 row" data-aos="fade-up" data-aos-duration="500">
                <label for="Pengalihan" class="col-lg-4 col-form-label">Surat Pengalihan Hak Cipta</label>
                <div class="col-9 col-sm-10 col-lg-6">
                    <input type="file" class="form-control" id="Pengalihan" onchange="showButton(this);" required>
                    <p class="format">*Sudah ditandatangani Direktur,format .pdf</p>
                </div>
                <div class="col-3 col-sm-2 col-lg-2">
                    <a href="#" class="btn btn-outline-info btn-view d-none">Review</a>
                </div>
            </div>
            <div class="mb-2 row" data-aos="fade-up" data-aos-duration="500">
                <label for="pilih" class="col-lg-4 col-form-label">Apakah usulan merupakan hasil kerjasama/berhubungan dengan mitra eksternal?</label>
                <div class="col-9 col-sm-10 col-lg-6">
                    <select class="form-select" id="pilih">
                        <option value="Ya">Ya</option>
                        <option value="Tidak">Tidak</option>
                    </select>
                </div>
            </div>
            <div class="mb-2 row" data-aos="fade-up" data-aos-duration="500">
                <label for="mitra" class="col-lg-4 col-form-label">Jika berkaitan dengan mitra, mohon untuk upload salinan PKS</label>
                <div class="col-9 col-sm-10 col-lg-6">
                    <input type="file" class="form-control" id="mitra" onchange="showButton(this);">
                    <p class="format">*format .pdf</p>
                </div>
                <div class="col-3 col-sm-2 col-lg-2">
                    <a href="#" class="btn btn-outline-info btn-view d-none">Review</a>
                </div>
            </div>
            <div class="mb-2 row" data-aos="fade-up" data-aos-duration="500">
                <div class="col-6 d-grid mx-auto">
                    <input type="submit" class="btn submit">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
