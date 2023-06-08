@extends('layout.user')

@section('title')
Pengajuan Paten
@endsection

@section('content')
<div class="row wht">
    <div class="col-12 px-4">
        <p class="fw-bold mt-2">Form Pengajuan Paten</p>
        <form action="/hak-paten" method="post" enctype="multipart/form-data">
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
                    <input type="text" name="nik"  id="nik" placeholder="Masukkan NIP/NIK" class="form-control" value="{{ $user->nik }}" readonly required>
                </div>
            </div>
            <div class="mb-2 row" data-aos="fade-up" data-aos-duration="500">
                <label for="KKT" class="col-lg-4 col-form-label">KKT/PK</label>
                <div class="col-lg-6">
                    <input type="text" name="kkt"  id="kkt" placeholder="KKT/PK" class="form-control @error('kkt') is-invalid @enderror" value="{{ old('kkt') }}" required autofocus>
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
                <label for="formFile" class="col-lg-4 col-form-label">Borang tindak lanjut penelitian</label>
                <div class="col-9 col-sm-10 col-lg-6">
                    <input type="file" name="file_borang_tindak_lanjut_penelitian"  id="formFile" onchange="showButton(this); validasi(this);" class="form-control @error('file_borang_tindak_lanjut_penelitian') is-invalid @enderror" value="{{ old('file_borang_tindak_lanjut_penelitian') }}"required>
                    @error('file_borang_tindak_lanjut_penelitian')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <p class="format">*format .pdf</p>
                </div>
                <div class="col-3 col-sm-2 col-lg-2">
                    <a href="#" class="btn btn-outline-info btn-view d-none">Review</a>
                </div>
            </div>
            <div class="mb-2 row" data-aos="fade-up" data-aos-duration="500">
                <label for="KTP" class="col-lg-4 col-form-label">Abstrak paten</label>
                <div class="col-9 col-sm-10 col-lg-6">
                    <input type="file" name="file_abstrak_paten" id="KTP" onchange="showButton(this); validasi(this);" class="form-control @error('file_abstrak_paten') is-invalid @enderror" value="{{ old('file_abstrak_paten') }}"required>
                    @error('file_abstrak_paten')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <p class="format">*format .pdf</p>
                </div>
                <div class="col-3 col-sm-2 col-lg-2">
                    <a href="#" class="btn btn-outline-info btn-view d-none">Review</a>
                </div>
            </div>
            <div class="mb-2 row" data-aos="fade-up" data-aos-duration="500">
                <label for="NPWP" class="col-lg-4 col-form-label">Daftar isian pendaftaran paten online</label>
                <div class="col-9 col-sm-10 col-lg-6">
                    <input type="file" name="file_daftar_isian_pendaftaran"  id="NPWP" onchange="showButton(this); validasi(this);" class="form-control @error('file_daftar_isian_pendaftaran') is-invalid @enderror" value="{{ old('file_daftar_isian_pendaftaran') }}"required>
                    @error('file_daftar_isian_pendaftaran')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <p class="format">*format .pdf</p>
                </div>
                <div class="col-3 col-sm-2 col-lg-2">
                    <a href="#" class="btn btn-outline-info btn-view d-none">Review</a>
                </div>
            </div>
            <div class="mb-2 row" data-aos="fade-up" data-aos-duration="500">
                <label for="Ciptaan" class="col-lg-4 col-form-label">Gambar</label>
                <div class="col-9 col-sm-10 col-lg-6">
                    <input type="file" name="file_gambar" id="Ciptaan" onchange="showButton(this); validasi(this);" class="form-control @error('file_gambar') is-invalid @enderror" value="{{ old('file_gambar') }}"required>
                    @error('file_gambar')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <p class="format">*format .pdf</p>
                </div>
                <div class="col-3 col-sm-2 col-lg-2">
                    <a href="#" class="btn btn-outline-info btn-view d-none">Review</a>
                </div>
            </div>
            <div class="mb-2 row" data-aos="fade-up" data-aos-duration="500">
                <label for="pernyataan" class="col-lg-4 col-form-label">Surat pengalihan hak atas invensi</label>
                <div class="col-9 col-sm-10 col-lg-6">
                    <input type="file" name="file_surat_pengalihan_hak_atas_invensi" id="pernyataan" onchange="showButton(this); validasi(this);" class="form-control @error('file_surat_pengalihan_hak_atas_invensi') is-invalid @enderror" value="{{ old('file_surat_pernyataan_hak_cipta') }}"required>
                    @error('file_surat_pengalihan_hak_atas_invensi')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <p class="format">*format .pdf</p>
                </div>
                <div class="col-3 col-sm-2 col-lg-2">
                    <a href="#" class="btn btn-outline-info btn-view d-none">Review</a>
                </div>
            </div>
            <div class="mb-2 row" data-aos="fade-up" data-aos-duration="500">
                <label for="Pengalihan" class="col-lg-4 col-form-label">Scan surat pernyataan kepemilikan atas invensi</label>
                <div class="col-9 col-sm-10 col-lg-6">
                    <input type="file" name="file_scan_surat_kepemilikan" id="Pengalihan" onchange="showButton(this); validasi(this);" class="form-control @error('file_scan_surat_kepemilikan') is-invalid @enderror" value="{{ old('file_scan_surat_kepemilikan') }}"required>
                    @error('file_scan_surat_kepemilikan')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <p class="format">*format .pdf</p>
                </div>
                <div class="col-3 col-sm-2 col-lg-2">
                    <a href="#" class="btn btn-outline-info btn-view d-none">Review</a>
                </div>
            </div>
            <div class="mb-2 row" data-aos="fade-up" data-aos-duration="500">
                <label for="Pengalihan" class="col-lg-4 col-form-label">Dokumen spesifikasi paten</label>
                <div class="col-9 col-sm-10 col-lg-6">
                    <input type="file" name="file_dokumen_spesifikasi_paten" id="Pengalihan" onchange="showButton(this); validasi(this);" class="form-control @error('file_dokumen_spesifikasi_paten') is-invalid @enderror" value="{{ old('file_dokumen_spesifikasi_paten') }}"required>
                    @error('file_dokumen_spesifikasi_paten')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <p class="format">*format .pdf</p>
                </div>
                <div class="col-3 col-sm-2 col-lg-2">
                    <a href="#" class="btn btn-outline-info btn-view d-none">Review</a>
                </div>
            </div>
            <div class="mb-2 row" data-aos="fade-up" data-aos-duration="500">
                <label for="Pengalihan" class="col-lg-4 col-form-label">Klaim Paten</label>
                <div class="col-9 col-sm-10 col-lg-6">
                    <input type="file" name="file_klaim_paten" id="Pengalihan" onchange="showButton(this); validasi(this);" class="form-control @error('file_klaim_paten') is-invalid @enderror" value="{{ old('file_klaim_paten') }}"required>
                    @error('file_klaim_paten')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <p class="format">*format .pdf</p>
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
                    <input type="file" name="file_salinan_pks" id="mitra" onchange="showButton(this); validasi(this);" class="form-control @error('file_salinan_pks') is-invalid @enderror" value="{{ old('file_salinan_pks') }}"/>
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
