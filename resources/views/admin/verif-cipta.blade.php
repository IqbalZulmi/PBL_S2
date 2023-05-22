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
                <caption>Jumlah Pengajuan: </caption>
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
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Iqbal</td>
                        <td>Superhero</td>
                        <td>iqbal@gmail</td>
                        <td>081234454</td>
                        <td>
                            <iframe src="T12.pdf" frameborder="0" class="d-none"></iframe>
                            <button type="button" class="btn btn-sm btn-outline-info review">
                                <i class="fa-solid fa-eye"></i> Review
                            </button>
                        </td>
                        <td>
                            <iframe src="T2.pdf" frameborder="0" class="d-none"></iframe>
                            <button type="button" class="btn btn-sm btn-outline-info review">
                                <i class="fa-solid fa-eye"></i> Review
                            </button>
                        </td>
                        <td>
                            <iframe src="T12.pdf" frameborder="0" class="d-none"></iframe>
                            <button type="button" class="btn btn-sm btn-outline-info review">
                                <i class="fa-solid fa-eye"></i> Review
                            </button>
                        </td>
                        <td>
                            <iframe src="T12.pdf" frameborder="0" class="d-none"></iframe>
                            <button type="button" class="btn btn-sm btn-outline-info review">
                                <i class="fa-solid fa-eye"></i> Review
                            </button>
                        </td>
                        <td>
                            <iframe src="T12.pdf" frameborder="0" class="d-none"></iframe>
                            <button type="button" class="btn btn-sm btn-outline-info review">
                                <i class="fa-solid fa-eye"></i> Review
                            </button>
                        </td>
                        <td>
                            <iframe src="T12.pdf" frameborder="0" class="d-none"></iframe>
                            <button type="button" class="btn btn-sm btn-outline-info review">
                                <i class="fa-solid fa-eye"></i> Review
                            </button>
                        </td>
                        <td>
                            <iframe src="T12.pdf" frameborder="0" class="d-none"></iframe>
                            <button type="button" class="btn btn-sm btn-outline-info review">
                                <i class="fa-solid fa-eye"></i> Review
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                verifikasi
                            </button>
                        </td>
                    </tr>
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
    </div>
</div>
  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog  modal-dialog-centered">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Verfikasi</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
        <form action="">
            <div class="modal-body">
                @csrf @method('put')
                <label class="form-label">Status</label>
                <select name="status" class="form-select @error('status') is-invalid @enderror">
                    <option value="diterima">diterima</option>
                    <option value="perlu direvisi">perlu direvisi</option>
                </select>
                @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label class="form-label">Alasan</label>
                <textarea name="alasan" class="form-control @error('alasan') is-invalid @enderror" cols="30" rows="5" placeholder="File Ktp Buram"></textarea>
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
@endsection
