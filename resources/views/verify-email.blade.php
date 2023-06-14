@extends('layout.user')

@section('title')
Verifikasi Email
@endsection

@section('content')
<div class="row">
    <div class="col-12 d-flex justify-content-center">
        <div class="card text-center wht h-100">
            <div class="card-body">
                <img src="{{ asset('web/logo.jpeg') }}" alt="logo" width="130" height="130" class="img-fluid">
                <h2 class="card-title fw-bold">Halo {{ Auth::user()->nama }}</h2>
                <p class="card-text">Anda Telah Melakukan Pendaftaran di Sentra HKI Polibatam.</p>
                <p class="card-text">Untuk Melanjutkan Proses Pengajuan, Silahkan Konfirmasi Email Anda melalui link yang telah dikirimkan ke email anda.</p>
                <p class="card-text">Jika belum mendapatkan email silahkan tekan tombol dibawah ini!</p>
                <form action="{{ route('verification.send') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-primary submit">
                        Kirim ulang email <i class="fa-solid fa-paper-plane"></i>
                    </button>.
                </form>
            </div>
        </div>
            
    </div>
</div>
@endsection
