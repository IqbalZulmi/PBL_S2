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
                <p class="card-text">Pengajuan Yang Belum Diverifikasi: {{ $cipta }} </p>
                <a href="verif-cipta" class="btn btn-primary">Verifikasi</a>
            </div>
        </div>
    </div>
    <div class="col-sm-4" data-aos="fade-up" data-aos-duration="400">
        <div class="card text-center wht h-100">
            <div class="card-body">
                <h5 class="card-title">Paten</h5>
                <p class="card-text">Pengajuan Yang Belum Diverifikasi: {{ $paten }} </p>
                <a href="verif-paten" class="btn btn-primary">Verifikasi</a>
            </div>
        </div>
    </div>
    <div class="col-sm-4" data-aos="fade-up" data-aos-duration="400">
        <div class="card text-center wht h-100" >
            <div class="card-body">
                <h5 class="card-title">Riwayat Pengajuan</h5>
                <p class="card-text">Pengajuan Yang Telah Diverifikasi: {{ $total }} </p>
                <div class="btn-group dropend">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Kelola Riwayat
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="/riwayat-pengajuan/hak-cipta">Hak cipta</a></li>
                      <li><a class="dropdown-item" href="/riwayat-pengajuan/paten">paten</a></li>
                    </ul>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
