@extends('layout.user')

@section('title')
Unduhan
@endsection

@section('content')
<div class="row wht">
    <div class="col-12">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-2 my-1">
            <div class="col">
                <div class="card h-100" data-aos="zoom-in" data-aos-duration="400">
                    <iframe src="Form pendaftaran hak cipta online.pdf" frameborder="0" class="card-img-top"></iframe>
                    <div class="card-header">
                        <h5 class="card-title">Formulir Pendaftaran Online</h5>
                    </div>
                    <div class="card-body">
                        <a href="Form pendaftaran hak cipta online.pdf" class="btn btn-outline-primary">
                            <i class="fa-solid fa-eye"></i> Lihat file
                        </a>
                        <a href="Form pendaftaran hak cipta online.pdf" class="btn btn-outline-success" download>
                            <i class="fa-solid fa-download"></i> Unduh file
                        </a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100" data-aos="zoom-in" data-aos-duration="400">
                    <iframe src="pernyataan_hak_cipta.pdf" frameborder="0" class="card-img-top"></iframe>
                    <div class="card-header">
                        <h5 class="card-title">Surat Pernyataan Hak Cipta</h5>
                    </div>
                    <div class="card-body">
                        <a href="pernyataan_hak_cipta.pdf" class="btn btn-outline-primary">
                            <i class="fa-solid fa-eye"></i> Lihat file
                        </a>
                        <a href="pernyataan_hak_cipta.pdf" class="btn btn-outline-success" download>
                            <i class="fa-solid fa-download"></i> Unduh file
                        </a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100" data-aos="zoom-in" data-aos-duration="400">
                    <iframe src="SURAT PENGALIHAN HAK CIPTA.pdf" frameborder="0" class="card-img-top"></iframe>
                    <div class="card-header">
                        <h5 class="card-title">Surat Pengalihan Hak Cipta</h5>
                    </div>
                    <div class="card-body">
                        <a href="SURAT PENGALIHAN HAK CIPTA.pdf" class="btn btn-outline-primary">
                            <i class="fa-solid fa-eye"></i> Lihat file
                        </a>
                        <a href="SURAT PENGALIHAN HAK CIPTA.pdf" class="btn btn-outline-success" download>
                            <i class="fa-solid fa-download"></i> Unduh file
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
