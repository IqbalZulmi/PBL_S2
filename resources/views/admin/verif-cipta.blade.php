@extends('layout.admin')

@section('title')
Verifikasi Hak Cipta
@endsection

@section('content')
<div class="row wht">
    <div class="col-12">
        <div class="container-input mt-2">
            <select name="limit" class="form-select form-select-md">
                <option value="-1">ALL</option>
                <option value="5">5</option>
                <option value="10" selected>10</option>
                <option value="25">25</option>
                <option value="50">50</option>
            </select>
        </div>
        <div class="table-responsive">
            <table class="table border table-striped table-hover text-center caption-top">
                <caption>Jumlah Pengajuan: {{ $join->count() }} </caption>
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
                        <th scope="col" style="min-width:170px;">Aksi</th>
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
                        <td>
                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $index+1 }}">
                                <i class="fa-regular fa-pen-to-square"></i> verifikasi
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
    </div>
</div>
  <!-- Modal -->
@foreach ($join as $index=>$data)
<div class="modal fade" id="exampleModal{{ $index+1 }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Verfikasi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/verif-cipta/{{ $data->id }}" method="post">
                <div class="modal-body">
                    @csrf @method('put')
                    <input type="text" hidden value="{{ $data->id }}" name="old_id">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select @error('status') is-invalid @enderror" onchange="filterAlasan(this)">
                        <option value="diterima">diterima</option>
                        <option value="perlu direvisi">perlu direvisi</option>
                    </select>
                    @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <label class="form-label d-none" id="alasanLabel">Alasan</label>
                    <textarea name="alasan" class="form-control d-none @error('alasan') is-invalid @enderror" id="alasanTextarea" cols="30" rows="5" placeholder="File Ktp Buram"></textarea>
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
@endsection
