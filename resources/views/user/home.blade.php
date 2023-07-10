@extends('layout.user')

@section('title')
Beranda
@endsection

@section('content')
<div class="row wht">
    <div class="col-12 mt-3">
        <p>Dalam rangka mendukung dan melindungi karya civitas akademika dalam penelitian, pengabdian, atau program karya ilmiah mahasiswa, dengan ini Sentra HKI mengajak Bapak/Ibu untuk mendaftarkan hak kekayaan intelektualnya. Adapun KI yang bisa didaftarkan melalui Sentra HKI Polibatam adalah sebagai berikut:</p>
    </div>
    <div class="col-12" data-aos="fade-up" data-aos-duration="400">
        <ol>
            <li><span class="fw-bold">Hak Cipta</span>,hak eksklusif bagi pencipta atau penerima hak untuk mengumumkan atau memperbanyak ciptaannya.</li>
            <li>
                <span class="fw-bold">Hak Kekayaan Industri</span>, yang mencakup
                <ul>
                    <li><span class="fw-bold">Paten</span>, hak eksklusif yang diberikan oleh negara kepada inventor atas hasil invensinya di bidang teknologi.</li>
                </ul>
            </li>
        </ol>
        <p>Untuk proses pendaftarannya bisa mengikuti panduan (poster terlampir):</p>
    </div>
    <div class="col-12 text-center" data-aos="fade-up" data-aos-duration="400">
        <a href="web/poster_alur.jpeg" class="image-link" title="Alur Hak-Cipta dan paten">
            <img src="web/poster_alur.jpeg" alt="Gambar" width="200" height="300">
        </a>
    </div>
    <div class="col-12" data-aos="fade-up" data-aos-duration="400">
        <p>Contoh Template dokumen dapat diunduh <a href="/unduhan"> disini</a></p>
        <p>Nama-nama PIC di masing-masing jurusan, sebagai berikut:</p>
        <ol>
            <li>Jurusan Teknik Mesin ⇒ Lalu Giat Juangsa Putra</li>
            <li>Jurusan Teknik Informatika ⇒ Satriya Bayu Aji</li>
            <li>Jurusan Teknik Elektro ⇒ Rahmi Mahdaliza</li>
            <li>Jurusan Manajemen Bisnis ⇒ Vina Kholisa Dinuka</li>
        </ol>
    </div>
</div>
@endsection
