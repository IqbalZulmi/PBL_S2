@extends('layout.admin')

@section('title')
Riwayat pengajuan hak cipta
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
        <div class="table-responsive">
            <table class="table border table-striped table-hover align-middle text-center caption-top">
                <caption>Judul yang telah diverifikasi:{{ $join->count() }}</caption>
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Ketua</th>
                        <th scope="col">Judul</th>
                        <th scope="col" style="min-width:110px;">Email</th>
                        <th scope="col" style="min-width:110px;">No Whatsapp</th>
                        <th scope="col" style="min-width:110px;">Formulir Pendaftaran</th>
                        <th scope="col" style="min-width:110px;">Scan KTP</th>
                        <th scope="col" style="min-width:110px;">Scan NPWP</th>
                        <th scope="col" style="min-width:110px;">Contoh Ciptaan</th>
                        <th scope="col" style="min-width:110px;">Surat pernyataan</th>
                        <th scope="col" style="min-width:110px;">Surat Pengalihan</th>
                        <th scope="col" style="min-width:110px;">Salinan PKS</th>
                        <th scope="col" style="min-width:170px;">Tanggal</th>
                        <th scope="col" style="min-width:170px;">Status</th>
                        <th scope="col" style="min-width:110px;">Alasan</th>
                        <th scope="col" style="min-width:110px;">Aksi</th>
                    </tr>
                </thead>
                @forelse ($join as $index => $data )
                <tbody>
                    <tr>
                        <th scope="row">{{ $index+1 }}</th>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->judul_usulan }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->no_wa }}</td>
                        <td>
                            <iframe src="{{ asset('storage/'. $data->file_formulir_permohonan) }}" frameborder="0" class="d-none"></iframe>
                            <button type="button" class="btn btn-sm btn-outline-info review">
                                <i class="fa-solid fa-eye"></i> Review
                            </button>
                        </td>
                        <td>
                            <iframe src="{{ asset('storage/'. $data->file_scan_ktp) }}" frameborder="0" class="d-none"></iframe>
                            <button type="button" class="btn btn-sm btn-outline-info review">
                                <i class="fa-solid fa-eye"></i> Review
                            </button>
                        </td>
                        <td>
                            <iframe src="{{ asset('storage/'. $data->file_scan_npwp) }}" frameborder="0" class="d-none"></iframe>
                            <button type="button" class="btn btn-sm btn-outline-info review">
                                <i class="fa-solid fa-eye"></i> Review
                            </button>
                        </td>
                        <td>
                            <iframe src="{{ asset('storage/'. $data->file_contoh_ciptaan) }}" frameborder="0" class="d-none"></iframe>
                            <button type="button" class="btn btn-sm btn-outline-info review">
                                <i class="fa-solid fa-eye"></i> Review
                            </button>
                        </td>
                        <td>
                            <iframe src="{{ asset('storage/'. $data->file_surat_pernyataan_hak_cipta) }}" frameborder="0" class="d-none"></iframe>
                            <button type="button" class="btn btn-sm btn-outline-info review">
                                <i class="fa-solid fa-eye"></i> Review
                            </button>
                        </td>
                        <td>
                            <iframe src="{{ asset('storage/'. $data->file_surat_pengalihan_hak_cipta) }}" frameborder="0" class="d-none"></iframe>
                            <button type="button" class="btn btn-sm btn-outline-info review">
                                <i class="fa-solid fa-eye"></i> Review
                            </button>
                        </td>
                        <td>
                            @if ($data->file_salinan_pks == null)
                               <span>Usulan bukan hasil kerjasama dengan mitra eksternal</span>
                            @else
                            <iframe src="{{ asset('storage/'. $data->file_salinan_pks )}}" frameborder="0" class="d-none"></iframe>
                            <button type="button" class="btn btn-sm btn-outline-info review">
                                <i class="fa-solid fa-eye"></i> Review
                            </button>
                            @endif
                        </td>

                        <td>{{ $data->tanggal_pengajuan }}</td>
                        <td>
                            <div class="badge fs-6 fw-normal @if ($data->status == 'diterima') text-bg-success @else text-bg-danger @endif">
                                {{ $data->status }}
                            </div>
                        </td>
                        <td>{{ $data->alasan }}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $index+1 }}">
                                <i class="fa-solid fa-gear"></i> Edit
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="100%">Tidak ada data untuk ditampilkan !</td>
                    </tr>
                </tbody>
                @endforelse
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
        @foreach ($join as $index => $data )
        <div class="modal fade" id="hapusModal{{ $index+1 }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Verfikasi</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/riwayat-pengajuan/hak-cipta/{{ $data->id }}" method="post">
                        <div class="modal-body">
                            @csrf @method('put')
                            <input type="text" hidden value="{{ $data->id }}" name="old_id">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select @error('status') is-invalid @enderror"  onchange="filterAlasan(this, {{ $index+1 }})">
                                <option value="diterima" @if ($data->status == 'diterima') selected @endif>diterima</option>
                                <option value="perlu direvisi" @if ($data->status == 'perlu direvisi') selected @endif>perlu direvisi</option>
                            </select>
                            @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <label class="form-label @if ($data->status == 'perlu direvisi') d-block @else d-none @endif" id="alasanLabel{{ $index+1 }}">Alasan</label>
                            <textarea name="alasan" class="form-control @error('alasan') is-invalid @enderror @if ($data->status == 'perlu direvisi') d-block @else d-none @endif" id="alasanTextarea{{ $index+1 }}" cols="30" rows="5" placeholder="File Ktp Buram">{{ $data->alasan }}</textarea>
                            @error('alasan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
