@extends('layout.user')

@section('title')
Status Pengajuan
@endsection

@section('content')
<div class="row wht">
    <div class="col-12">
        <div class="container-input mt-2">
            <input type="text" placeholder="Cari Judul" name="text" class="input" oninput="cari(3)">
            <select name="limit" class="form-select form-select-md">
                <option value="-1">ALL</option>
                <option value="5">5</option>
                <option value="10" selected>10</option>
                <option value="25">25</option>
                <option value="50">50</option>
            </select>
            <svg fill="#000000" width="20px" height="20px" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg">
                <path d="M790.588 1468.235c-373.722 0-677.647-303.924-677.647-677.647 0-373.722 303.925-677.647 677.647-677.647 373.723 0 677.647 303.925 677.647 677.647 0 373.723-303.924 677.647-677.647 677.647Zm596.781-160.715c120.396-138.692 193.807-319.285 193.807-516.932C1581.176 354.748 1226.428 0 790.588 0S0 354.748 0 790.588s354.748 790.588 790.588 790.588c197.647 0 378.24-73.411 516.932-193.807l516.028 516.142 79.963-79.963-516.142-516.028Z" fill-rule="evenodd"></path>
            </svg>
        </div>
        <div class="table-responsive my-2">
            <table class="table border table-striped table-hover align-middle text-center">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tipe pengajuan</th>
                        <th scope="col">Judul Usulan</th>
                        <th scope="col">Tanggal Pengajuan</th>
                        <th scope="col">Status</th>
                        <th scope="col">Alasan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ( $pengajuan_hakciptas as $index => $data)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>
                            @if ($data instanceof \App\Models\pengajuan_hakCipta)
                                Hak Cipta
                            @elseif ($data instanceof \App\Models\pengajuan_paten)
                                Paten
                            @endif
                        </td>
                        <td>{{ $data->judul_usulan }}</td>
                        <td>{{ $data->tanggal_pengajuan }}</td>
                        <td>
                            <div class="badge fs-6 fw-normal @if ($data->status == 'sedang diproses') text-bg-warning @elseif ($data->status == 'diterima') text-bg-success @else text-bg-danger @endif">
                                {{ $data->status }}
                            </div>
                        </td>
                        <td>{{ $data->alasan }}</td>
                        <td>
                            <button class="btn btn-outline-warning" @if ($data->status !== 'perlu direvisi') disabled @endif data-bs-toggle="modal" data-bs-target="#editModal{{ $index+1 }}">
                                <i class="fa-solid fa-gear"></i> Edit
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="100%">Tidak ada data untuk ditampilkan !</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" id="previous"> << Previous </a>
                </li>
                <li class="page-item">
                    <a class="page-link" id="next">Next >> </a>
                </li>
            </ul>
        </nav>
        @foreach ($pengajuan_hakciptas as $index => $data )
        <div class="modal fade" id="editModal{{ $index+1 }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Pengajuan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/status/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <h5>Silakan update file yang perlu direvisi saja !</h5>
                            @csrf @method('PUT')
                            <div class="mb-2 row">
                                <label for="NIP" class="col-12 col-form-label">NIP/NIK</label>
                                <div class="col-9">
                                    <input type="text" name="nik"  id="nik" placeholder="Masukkan NIP/NIK" class="form-control" value="{{ Auth::user()->nik }}" readonly>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="KKT" class="col-12 col-form-label">KKT/PK</label>
                                <div class="col-9">
                                    <input type="text" name="kkt"  id="kkt" placeholder="KKT/PK" class="form-control @error('kkt') is-invalid @enderror" value="{{ old('kkt',$data->kkt) }}" required>
                                    @error('kkt')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="Judul" class="col-12 col-form-label">Judul Usulan</label>
                                <div class="col-9">
                                    <input type="text" name="judul_usulan" id="judul_usulan" placeholder="Judul Usulan" class="form-control @error('judul_usulan') is-invalid @enderror" value="{{ old('judul_usulan',$data->judul_usulan) }}" required>
                                    @error('judul_usulan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="formFile" class="col-12 col-form-label">Formulir permohonan pendaftaran online</label>
                                <div class="col-9">
                                    <input type="file" name="file_formulir_permohonan"  id="formFile" onchange="showButton(this); validasi(this);" class="form-control @error('file_formulir_permohonan') is-invalid @enderror" value="{{ old('file_formulir_permohonan',$data->file_formulir_permohonan) }}">
                                    @error('file_formulir_permohonan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <p class="format">*format .pdf</p>
                                </div>
                                <div class="col-3">
                                    <a href="#" class="btn btn-outline-info btn-view d-none">Review</a>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="KTP" class="col-12 col-form-label">Scan KTP semua pencipta</label>
                                <div class="col-9">
                                    <input type="file" name="file_scan_ktp" id="KTP" onchange="showButton(this); validasi(this);" class="form-control @error('file_scan_ktp') is-invalid @enderror" value="{{ old('file_scan_ktp',$data->file_scan_ktp) }}">
                                    @error('file_scan_ktp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <p class="format">*format .pdf</p>
                                </div>
                                <div class="col-3">
                                    <a href="#" class="btn btn-outline-info btn-view d-none">Review</a>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="NPWP" class="col-12 col-form-label">Scan NPWP pencipta</label>
                                <div class="col-9">
                                    <input type="file" name="file_scan_npwp"  id="NPWP" onchange="showButton(this); validasi(this);" class="form-control @error('file_scan_npwp') is-invalid @enderror" value="{{ old('file_scan_npwp',$data->file_scan_npwp) }}">
                                    @error('file_scan_npwp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <p class="format">*format .pdf</p>
                                </div>
                                <div class="col-3">
                                    <a href="#" class="btn btn-outline-info btn-view d-none">Review</a>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="Ciptaan" class="col-12 col-form-label">Contoh Ciptaan</label>
                                <div class="col-9">
                                    <input type="file" name="file_contoh_ciptaan" id="Ciptaan" onchange="showButton(this); validasi(this);" class="form-control @error('file_contoh_ciptaan') is-invalid @enderror" value="{{ old('file_contoh_ciptaan',$data->file_contoh_ciptaan) }}">
                                    @error('file_contoh_ciptaan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <p class="format">*lampiran disesuaikan dengan halaman terakhir form pendaftaran</p>
                                </div>
                                <div class="col-3">
                                    <a href="#" class="btn btn-outline-info btn-view d-none">Review</a>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="pernyataan" class="col-12 col-form-label">Surat pernyataan Hak Cipta</label>
                                <div class="col-9">
                                    <input type="file" name="file_surat_pernyataan_hak_cipta" id="pernyataan" onchange="showButton(this); validasi(this);" class="form-control @error('file_surat_penyataan_hak_cipta') is-invalid @enderror" value="{{ old('file_surat_pernyataan_hak_cipta',$data->file_surat_pernyataan_hak_cipta) }}">
                                    @error('file_surat_pernyataan_hak_cipta')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <p class="format">*Sudah ditandatangani Direktur,format .pdf</p>
                                </div>
                                <div class="col-3">
                                    <a href="#" class="btn btn-outline-info btn-view d-none">Review</a>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="Pengalihan" class="col-12 col-form-label">Surat Pengalihan Hak Cipta</label>
                                <div class="col-9">
                                    <input type="file" name="file_surat_pengalihan_hak_cipta" id="Pengalihan" onchange="showButton(this); validasi(this);" class="form-control @error('file_surat_pengalihan_hak_cipta') is-invalid @enderror" value="{{ old('file_surat_pengalihan_hak_cipta',$data->file_surat_pengalihan_hak_cipta) }}">
                                    @error('file_surat_pengalihan_hak_cipta')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <p class="format">*Sudah ditandatangani Direktur,format .pdf</p>
                                </div>
                                <div class="col-3">
                                    <a href="#" class="btn btn-outline-info btn-view d-none">Review</a>
                                </div>
                            </div>
                            @if ($data->file_salinan_pks !== null )
                            <div class="mb-2 row">
                                <label for="mitra" class="col-12 col-form-label select-filter">File salinan PKS</label>
                                <div class="col-9 select-filter">
                                    <input type="file" name="file_salinan_pks" id="mitra" onchange="showButton(this); validasi(this);" class="form-control @error('file_salinan_pks') is-invalid @enderror" value="{{ old('file_salinan_pks',$data->file_salinan_pks) }}"/>
                                    @error('file_salinan_pks')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <p class="format">*format .pdf</p>
                                </div>
                                <div class="col-3">
                                    <a href="#" class="btn btn-outline-info btn-view d-none">Review</a>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
