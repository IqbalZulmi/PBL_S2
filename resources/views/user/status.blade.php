@extends('layout.user')

@section('title')
Status Pengajuan
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
        <div class="table-responsive my-2">
            <table class="table border table-striped table-hover align-middle text-center">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nik</th>
                        <th scope="col">Judul Usulan</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ( $pengajuan_hakciptas as $index => $data)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $data->nik }}</td>
                        <td>{{ $data->judul_usulan }}</td>
                        <td>{{ $data->status }}</td>
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
    </div>
</div>

@endsection
