@extends('layout.user')

@section('title')
Pengajuan Hak Cipta
@endsection

@section('content')
<div class="row wht">
    <div class="col-12 px-4">
        <p class="fw-bold mt-2">Form Pengajuan Hak Cipta</p>
        <form action="/hak-cipta" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-2 row mt-3" data-aos="fade-up" data-aos-duration="500">
                <label for="Email" class="col-lg-4 col-form-label">Email</label>
                <div class="col-lg-6">
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email Aktif"  value="{{ $user->email }}" readonly required>
                </div>
            </div>
            <div class="mb-2 row" data-aos="fade-up" data-aos-duration="500">
                <label for="Nama" class="col-lg-4 col-form-label">Nama Lengkap</label>
                <div class="col-lg-6">
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama lengkap" value="{{ $user->nama }}" readonly required>
                </div>
            </div>
            <div class="mb-2 row" data-aos="fade-up" data-aos-duration="500">
                <label for="nowa" class="col-lg-4 col-form-label">Nomor WhatsApp</label>
                <div class="col-lg-6">
                    <input type="text" name="no_wa" class="form-control" id="no_wa" placeholder="No WA Aktif" value="{{ $user->no_wa }}" readonly required>
                </div>
            </div>
            <div class="mb-2 row" data-aos="fade-up" data-aos-duration="500">
                <label for="NIP" class="col-lg-4 col-form-label">NIP/NIK</label>
                <div class="col-lg-6">
                    <input type="text" name="nik"  id="nik" placeholder="Masukkan NIP/NIK" class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik',$user->nik) }}" readonly required>
                    @error('nik')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-2 row" data-aos="fade-up" data-aos-duration="500">
                <label for="KKT" class="col-lg-4 col-form-label">KKT/PK</label>
                <div class="col-lg-6">
                    <input type="text" name="kkt"  id="kkt" placeholder="KKT/PK" class="form-control @error('kkt') is-invalid @enderror" value="{{ old('kkt') }}"required>
                    @error('kkt')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-2 row" data-aos="fade-up" data-aos-duration="500">
                <label for="Judul" class="col-lg-4 col-form-label">Judul Usulan</label>
                <div class="col-lg-6">
                    <input type="text" name="judul_usulan" id="judul_usulan" placeholder="Judul Usulan" class="form-control @error('judul_usulan') is-invalid @enderror" value="{{ old('judul_usulan') }}" required>
                    @error('judul_usulan')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-2 row" data-aos="fade-up" data-aos-duration="500">
                <label for="formFile" class="col-lg-4 col-form-label">Formulir permohonan pendaftaran online</label>
                <div class="col-9 col-sm-10 col-lg-6">
                    <input type="file" name="file_formulir_permohonan"  id="formFile" onchange="showButton(this);" class="form-control @error('file_formulir_permohonan') is-invalid @enderror" value="{{ old('file_formulir_permohonan') }}"required>
                    @error('file_formulir_permohonan')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <p class="format">*format .pdf</p>
                </div>
                <div class="col-3 col-sm-2 col-lg-2">
                    <a href="#" class="btn btn-outline-info btn-view d-none">Review</a>
                </div>
            </div>
            <div class="mb-2 row" data-aos="fade-up" data-aos-duration="500">
                <label for="KTP" class="col-lg-4 col-form-label">Scan KTP semua pencipta</label>
                <div class="col-9 col-sm-10 col-lg-6">
                    <input type="file" name="file_scan_ktp" id="KTP" onchange="showButton(this);" class="form-control @error('file_scan_ktp') is-invalid @enderror" value="{{ old('file_scan_ktp') }}"required>
                    @error('file_scan_ktp')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <p class="format">*format .pdf</p>
                </div>
                <div class="col-3 col-sm-2 col-lg-2">
                    <a href="#" class="btn btn-outline-info btn-view d-none">Review</a>
                </div>
            </div>
            <div class="mb-2 row" data-aos="fade-up" data-aos-duration="500">
                <label for="NPWP" class="col-lg-4 col-form-label">Scan NPWP pencipta</label>
                <div class="col-9 col-sm-10 col-lg-6">
                    <input type="file" name="file_scan_npwp"  id="NPWP" onchange="showButton(this);" class="form-control @error('file_scan_npwp') is-invalid @enderror" value="{{ old('file_scan_npwp') }}"required>
                    @error('file_scan_npwp')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <p class="format">*format .pdf</p>
                </div>
                <div class="col-3 col-sm-2 col-lg-2">
                    <a href="#" class="btn btn-outline-info btn-view d-none">Review</a>
                </div>
            </div>
            <div class="mb-2 row" data-aos="fade-up" data-aos-duration="500">
                <label for="Ciptaan" class="col-lg-4 col-form-label">Contoh Ciptaan</label>
                <div class="col-9 col-sm-10 col-lg-6">
                    <input type="file" name="file_contoh_ciptaan" id="Ciptaan" onchange="showButton(this);" class="form-control @error('file_contoh_ciptaan') is-invalid @enderror" value="{{ old('file_contoh_ciptaan') }}"required>
                    @error('file_contoh_ciptaan')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <p class="format">*lampiran disesuaikan dengan halaman terakhir form pendaftaran</p>
                </div>
                <div class="col-3 col-sm-2 col-lg-2">
                    <a href="#" class="btn btn-outline-info btn-view d-none">Review</a>
                </div>
            </div>
            <div class="mb-2 row" data-aos="fade-up" data-aos-duration="500">
                <label for="pernyataan" class="col-lg-4 col-form-label">Surat pernyataan Hak Cipta</label>
                <div class="col-9 col-sm-10 col-lg-6">
                    <input type="file" name="file_surat_pernyataan_hak_cipta" id="pernyataan" onchange="showButton(this);" class="form-control @error('file_surat_penyataan_hak_cipta') is-invalid @enderror" value="{{ old('file_surat_pernyataan_hak_cipta') }}"required>
                    @error('file_surat_pernyataan_hak_cipta')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <p class="format">*Sudah ditandatangani Direktur,format .pdf</p>
                </div>
                <div class="col-3 col-sm-2 col-lg-2">
                    <a href="#" class="btn btn-outline-info btn-view d-none">Review</a>
                </div>
            </div>
            <div class="mb-2 row" data-aos="fade-up" data-aos-duration="500">
                <label for="Pengalihan" class="col-lg-4 col-form-label">Surat Pengalihan Hak Cipta</label>
                <div class="col-9 col-sm-10 col-lg-6">
                    <input type="file" name="file_surat_pengalihan_hak_cipta" id="Pengalihan" onchange="showButton(this);" class="form-control @error('file_surat_pengalihan_hak_cipta') is-invalid @enderror" value="{{ old('file_surat_pengalihan_hak_cipta') }}"required>
                    @error('file_surat_pengalihan_hak_cipta')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <p class="format">*Sudah ditandatangani Direktur,format .pdf</p>
                </div>
                <div class="col-3 col-sm-2 col-lg-2">
                    <a href="#" class="btn btn-outline-info btn-view d-none">Review</a>
                </div>
            </div>
            <div class="mb-2 row" data-aos="fade-up" data-aos-duration="500">
                <label for="pilih" class="col-lg-4 col-form-label">Apakah usulan merupakan hasil kerjasama/berhubungan dengan mitra eksternal?</label>
                <div class="col-9 col-sm-10 col-lg-6">
                    <select name="usulan" id="pilih" class="form-select @error('usulan') is-invalid @enderror" onchange="toggleUploadField(this);" required>
                        <option value="Ya">Ya</option>
                        <option value="Tidak">Tidak</option>
                    </select>
                    @error('usulan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-2 row" data-aos="fade-up" data-aos-duration="500">
                <label for="mitra" class="col-lg-4 col-form-label select-filter">Jika berkaitan dengan mitra, mohon untuk upload salinan PKS</label>
                <div class="col-9 col-sm-10 col-lg-6 select-filter">
                    <input type="file" name="file_salinan_pks" id="mitra" onchange="showButton(this);" class="form-control @error('file_salinan_pks') is-invalid @enderror" value="{{ old('file_salinan_pks') }}" required/>
                    @error('file_salinan_pks')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
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
