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
<div class=" row wht mt-4">
    <div class="col-12 mt-3">
        <h1 class="border-dark border-2 border-bottom pb-2">Rekapitulasi Pengajuan</h1>
    </div>
    <form class="col-12 mb-3" action="/dashboard" method="post">
        @csrf
        <div class="row">
            <div class="form-floating col-12 col-sm-3 my-3" data-aos="fade-up" data-aos-duration="400">
                <select class="form-select" name="bulan" required>
                    <option value="">pilih Bulan</option>
                    @foreach (['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $index => $bulan)
                    <option value="{{ $index + 1 }}">{{ $bulan }}</option>
                    @endforeach
                </select>
                <label for="floatingSelect">Bulan</label>
            </div>
            <div class="form-floating col-12 col-sm-3 my-3" data-aos="fade-up" data-aos-duration="400">
                <select class="form-select" name="tahun" required>
                    <option value="">pilih tahun</option>
                    @php
                    use Carbon\Carbon;
                    $tahunSekarang = Carbon::now()->format('Y');
                    $tahunAwal = $tahunSekarang - 5;
                    $tahunTerakhir = $tahunSekarang + 5;
                    @endphp
                    @for ($tahun = $tahunAwal; $tahun <= $tahunTerakhir; $tahun++)
                    <option value="{{ $tahun }}">{{ $tahun }}</option>
                    @endfor
                </select>
                <label for="floatingSelect">Tahun</label>
            </div>
            <div class="form-floating col-12 col-sm-3 my-3" data-aos="fade-up" data-aos-duration="400">
                <select class="form-select" name="jenis_pengajuan" required>
                    <option value="">pilih pengajuan</option>
                    <option value="Cipta">Hak Cipta</option>
                    <option value="Paten">paten</option>
                </select>
                <label for="floatingSelect">Jenis Pengajuan</label>
            </div>
            <div class="col-12 col-sm-3 my-2 3 d-flex align-items-center" data-aos="fade-up" data-aos-duration="400">
                <button type="submit" class="btn btn-outline-primary submit">Go</button>
            </div>
        </div>
    </form>
    @if (session('grafikproses') or session('grafikterima') or session('grafikrevisi'))   
    <div class="col-12" style="position: relative; height:100vh; width:100vw">
        <canvas id="myChart"></canvas>
    </div>
    @endif
</div>
@endsection

@push('js')
@if (session('grafikproses') or session('grafikterima') or session('grafikrevisi'))   
<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Sedang Diproses', 'Diterima', 'Perlu Direvisi'],
            datasets: [
                {
                    label: 'Sedang Diproses',
                    data: [{{ session('grafikproses') }}, 0, 0],
                    backgroundColor: 'rgba(255, 205, 86, 0.3)',
                    borderColor: 'rgb(255, 205, 86)',
                    borderWidth: 1,
                    hoverBorderRadius:5,
                    hoverBorderWidth:2,
                },
                {
                    label: 'Diterima',
                    data: [0, {{ session('grafikterima') }}, 0],
                    backgroundColor: 'rgba(66, 186, 150, 0.3)',
                    borderColor: 'rgb(82, 235, 186)',
                    borderWidth: 1,
                    hoverBorderRadius:5,
                    hoverBorderWidth:2,
                },
                {
                    label: 'Perlu Direvisi',
                    data: [0, 0, {{ session('grafikrevisi') }}],
                    backgroundColor: 'rgba(255, 99, 132, 0.3)',
                    borderColor: 'rgb(255, 99, 132)',
                    borderWidth: 1,
                    hoverBorderRadius:5,
                    hoverBorderWidth:2,
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                },
                x: {
                    ticks: {
                        font: {
                            size: 14
                        }
                    }
                }
            },
            plugins: {
                title: {
                    display: true,
                    text: '{{ session('jenis_pengajuan') }}',
                    font: {
                        size: 22,
                        weight: 'bold'
                    }
                },
            },
            animation: {
                duration: 3000,
                easing: 'easeOutQuart'
            },
        }
    });
</script>
@endif
@endpush
