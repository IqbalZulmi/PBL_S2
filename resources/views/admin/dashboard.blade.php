@extends('layout.admin')

@section('title')
Dasbor
@endsection

@section('content')
<div class="row g-3">
    <div class="col-sm-4" data-aos="fade-up" data-aos-duration="400">
        <div class="card text-center wht h-100">
            <div class="card-body">
                <h5 class="card-title">Hak Cipta</h5>
                <p class="card-text">Pengajuan Yang Belum Diverifikasi: </p>
                <a href="#" class="btn btn-primary">Verifikasi</a>
            </div>
        </div>
    </div>
    <div class="col-sm-4" data-aos="fade-up" data-aos-duration="400">
        <div class="card text-center wht h-100">
            <div class="card-body">
                <h5 class="card-title">Hak Paten</h5>
                <p class="card-text">Pengajuan Yang Belum Diverifikasi: </p>
                <a href="#" class="btn btn-primary">Verifikasi</a>
            </div>
        </div>
    </div>
    <div class="col-sm-4" data-aos="fade-up" data-aos-duration="400">
        <div class="card text-center wht h-100" >
            <div class="card-body">
                <h5 class="card-title">Riwayat Pengajuan</h5>
                <p class="card-text">Pengajuan Yang Telah Diverifikasi: </p>
                <a href="#" class="btn btn-primary">Kelola Riwayat</a>
            </div>
        </div>
    </div>
</div>
@endsection
