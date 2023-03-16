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
                            <a class="btn btn-sm btn-outline-success">
                                <i class="fa-solid fa-check"></i>Terima
                            </a>
                            <a class="btn btn-sm btn-outline-danger">
                                <i class="fa-solid fa-xmark"></i>Tolak
                            </a>
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

@endsection
