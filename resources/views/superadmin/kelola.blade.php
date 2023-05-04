@extends('layout.superadmin')

@section('title')
Kelola Akun
@endsection

@section('content')
<div class="row wht">
    <div class="col-12">
        <div class="container-input mt-2">
            <input type="text" placeholder="Cari Judul" name="text" class="input" oninput="cari(2)">
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
                <caption>Jumlah Akun:</caption>
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">username</th>
                        <th scope="col">password</th>
                        <th scope="col">Roles</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Iqbal1</td>
                        <td>13 Maret 2023</td>
                        <td>admin</td>
                        <td>
                            <a class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#editModal">
                                <i class="fa-solid fa-gear"></i> Edit
                            </a>
                            <a class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#hapusModal">
                                <i class="fa-solid fa-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>adel</td>
                        <td>13 Maret 2023</td>
                        <td>admin</td>
                        <td>
                            <a class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#editModal">
                                <i class="fa-solid fa-gear"></i> Edit
                            </a>
                            <a class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#hapusModal">
                                <i class="fa-solid fa-trash"></i> Hapus
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
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Akun</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form action="">
                        <div>
                            <label for="">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="username" value="iqbal" required>
                        </div>
                        <div class="mt-2">
                            <label for="">Password</label>
                            <input type="text" name="username" class="form-control" placeholder="username" value="iqbal123" required>
                        </div>
                        <div class="my-2">
                            <label for="">Roles</label>
                            <select class="form-select">
                                <option value="admin">admin</option>
                                <option value="superadmin">superadmin</option>
                            </select>
                        </div>
                    </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <a href="#" class="btn btn-success">Simpan</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Akun</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5 class="fw-bold">Apakah Anda Yakin Menghapus Akun Dengan Username iqbal?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <a href="" class="btn btn-danger">hapus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
