@extends('layout.admin')

@section('title')
Riwayat pengajuan
@endsection

@section('content')
<div class="row wht">
    <div class="col-12">
        <div class="container-input mt-2">
            <input type="text" placeholder="Cari Judul" name="text" class="input" oninput="cari(4)">
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
                <caption>Judul yang telah diterima:</caption>
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Ketua Pengusul</th>
                        <th scope="col">Email</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Iqbal</td>
                        <td>Iqbal@gmail.com</td>
                        <td>boboiboy</td>
                        <td>13 Maret 2023</td>
                        <td>Diterima</td>
                        <td>
                            <button type="button" class="btn btn-primary">
                                <i class="fa-solid fa-trash"></i> Hapus
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Rayyan</td>
                        <td>Rayyan@gmail.com</td>
                        <td>Pendeteksi Bencana</td>
                        <td>15 Maret 2023</td>
                        <td>Ditolak</td>
                        <td>
                            <button type="button" class="btn btn-primary">
                                <i class="fa-solid fa-trash"></i> Hapus
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

@endsection
