@extends('layout.dashboard')

@section('content')
    <h1 class="fw-bold">
        Dashboard Tes Kesehatan Mental Gratis
    </h1>
    <p class="text-body-secondary mb-4">Halaman ini menunjukkan jumlah pernyataan, responden, dan grafik rata-rata kondisi
        responden.</p>
    <div class="row align-items-stretch g-4">
        <div class="col-12 col-lg-4">
            <div class="d-flex flex-column flex-md-row flex-lg-column gap-3 h-100">
                <div class="d-flex bg-white shadow rounded-4 p-3 align-items-center flex-grow-1">
                    <div class="bg-info-subtle rounded-circle d-flex justify-content-center align-items-center me-3"
                        style="width: 60px; height: 60px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" fill="#436374" class="bi bi-card-heading"
                            viewBox="0 0 16 16">
                            <path
                                d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z" />
                            <path
                                d="M3 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5m0-5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="fw-bold mb-0">128</h2>
                        <small class="text-muted">Soal</small>
                    </div>
                </div>
                <div class="d-flex bg-white shadow rounded-4 p-3 align-items-center flex-grow-1">
                    <div class="bg-info-subtle rounded-circle d-flex justify-content-center align-items-center me-3"
                        style="width: 60px; height: 60px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" fill="#436374" class="bi bi-person"
                            viewBox="0 0 16 16">
                            <path
                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="fw-bold mb-0">123</h2>
                        <small class="text-muted">Responden</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-8">
            <div class="bg-white shadow rounded-4 p-4 h-100">
                <canvas id="mainChart" height="200"></canvas>
            </div>
        </div>
    </div>
    <script>
        const ctx = document.getElementById('mainChart');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Depression', 'Anxiety', 'Stress'],
                datasets: [{
                    data: [20, 90, 35],
                    label: "Rata-Rata Hasil Responden",
                    borderColor: '#436374',
                    backgroundColor: ['rgba(168, 213, 186, 0.6)', 'rgba(193, 225, 193, 0.6)', 'rgba(183, 215, 232, 0.6)'],
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: { y: { beginAtZero: true } }
            }
        });
    </script>

@endsection