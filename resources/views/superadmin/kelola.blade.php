@extends('layout.superadmin')

@section('title')
Kelola Akun
@endsection

@section('content')
<div class="row wht">
    <div class="col-12">
        <div class="container-input mt-2">
            <input type="text" placeholder="Cari Username" name="text" class="input" oninput="cari(2)">
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
        <div class="card-body">
        @if(session('notifikasi'))
            <div class="alert alert-{{ session('type') }}">
            {{ session('notifikasi') }}
            </div>
        @endif
        <div class="table-responsive">
            <table class="table border table-striped table-hover align-middle text-center caption-top">
                <caption>Jumlah Akun:</caption>
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                        <th scope="col">Nama</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Email</th>
                        <th scope="col">No_wa</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">Roles</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ( $accounts as $index => $data )
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $data->username }}</td>
                        <td>{{ $data->password }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->nik }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->no_wa }}</td>
                        <td>{{ $data->jurusan }}</td>
                        <td>{{ $data->role }}</td>
                        <td>
                            <a class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $data->id }}">
                                <i class="fa-solid fa-gear"></i> Edit
                            </a>
                            <a class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->id }}">
                                <i class="fa-solid fa-trash"></i> Hapus
                            </a>
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
        @foreach ( $accounts as $index => $data )
        <div class="modal fade" id="editModal{{ $data->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Akun</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('superadmin.update', $data->id)}}" method="POST">
                        <div class="modal-body">
                            @csrf @method('PUT')
                            <div>
                                <label for="">Username</label>
                                <input type="text" name="username" class="form-control" placeholder="username" value="{{$data->username}}" required>
                            </div>
                            <div class="mt-2">
                                <label for="">Password</label>
                                <input type="text" name="password" class="form-control" placeholder="password" value="{{ $data->password }}" required>
                            </div>
                            <div class="mt-2">
                                <label for="">Nama</label>
                                <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="{{ $data->nama }}" required>
                            </div>
                            <div class="mt-2">
                                <label for="">NIK</label>
                                <input type="text" name="nik" class="form-control" placeholder="Nomor Identitas Kepegawaian" value="{{ $data->nik }}" required>
                            </div>
                            <div class="mt-2">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email Aktif" value="{{ $data->email }}" required>
                            </div>
                            <div class="mt-2">
                                <label for="">No WhatsApp</label>
                                <input type="text" name="no_wa" class="form-control" placeholder="Nomor WhatsApp Aktif" value="{{ $data->no_wa }}" required>
                            </div>
                            <div class="mt-2">
                                <label for="">Jurusan</label>
                                <select class="form-select" name="jurusan" required>
                                    <option value="Teknik Informatika">Teknik Informatika</option>
                                    <option value="Teknik Elektro">Teknik Elektro</option>
                                    <option value="Teknik Informatika">Teknik Mesin</option>
                                    <option value="Manajemen Bisnis">Manajemen Bisnis</option>
                                </select>
                            </div>
                            <div class="my-2">
                                <label for="">Roles</label>
                                <select class="form-select" name="role">
                                    <option value="admin">admin</option>
                                    <option value="superadmin">superadmin</option>
                                </select>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="hapusModal{{ $data->id }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Akun</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5 class="fw-bold">Apakah Anda Yakin Menghapus Akun Dengan Username {{$data->username}}?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>

                        <form action="{{ route('superadmin.destroy', $data->id) }}" method="post">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger">hapus</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
