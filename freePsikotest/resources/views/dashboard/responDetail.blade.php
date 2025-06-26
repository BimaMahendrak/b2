@extends('layout.dashboard')

@section('content')
    <div class="row align-items-start">
        <div class="col-auto d-flex align-items-center">
            <a href="{{ route('respon') }}" class="btn btn-link p-0 m-0" style="text-decoration: none;">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" fill="#436374" class="bi bi-arrow-left"
                    viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M15 8a.5.5 0 0 1-.5.5H3.707l4.147 4.146a.5.5 0 0 1-.708.708l-5-5a.5.5 0 0 1 0-.708l5-5a.5.5 0 1 1 .708.708L3.707 7.5H14.5A.5.5 0 0 1 15 8z" />
                </svg>
            </a>
        </div>
        <div class="col">
            <h1 class="fw-bold">
                Data Detail Respons Tes Kesehatan Mental Gratis
            </h1>
            <p class="text-body-secondary mb-3">
                Halaman ini menunjukkan detail seorang responden yang telah mengikuti tes.
            </p>
        </div>
    </div>

    <div class="position-relative p-4 rounded-4" style="border:#B7D7E8 1px dashed;">
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>Nama Lengkap</th>
                                <td>{{ $responden->nama_lengkap }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>{{ $responden->jenis_kelamin }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td>{{ $responden->tempat_tanggal_lahir }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $responden->email }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Tes</th>
                                <td>{{ $responden->tanggal_ujian }}</td>
                            </tr>
                            <tr>
                                <th>Feedback</th>
                                <td>
                                    @php
                                        $feedback = \App\Models\Feedback::where('id_responden', $responden->id_responden)->first();
                                        $likertLabels = [
                                            1 => ['Sangat Buruk', 'badest'],
                                            2 => ['Cukup Buruk', 'bad'],
                                            3 => ['Biasa Saja', 'smile'],
                                            4 => ['Cukup Baik', 'happy'],
                                            5 => ['Sangat Baik', 'active'],
                                        ];
                                    @endphp
                                    @if($feedback)
                                        @foreach ($likertLabels as $value => $label)
                                            @if($value == $feedback->rating)
                                                <b><img src="{{ asset('images/hiu/' . $label[1] . '.svg') }}" width="40px">
                                                    {{ $label[0]}}</b>, {{ $feedback->ulasan }}
                                            @endif
                                        @endforeach
                                    @else
                                        <span class="text-muted">Belum ada feedback</span>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col">
                <b>Hasil Tes:</b>
                <div class="bg-white p-4">
                    <canvas id="mainChart" height="200"></canvas>
                </div>
            </div>
        </div>
        <b>Detail Jawaban:</b>
        <div class="table-responsive">
            <table class="table custom-table text-center align-middle mt-3">
                <tr>
                    <th>Soal</th>
                    @foreach($jawaban as $j)
                        <td style="background-color: #B7D7E8;">{{ $j->id_pertanyaan }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Respon</th>
                    @foreach($jawaban as $j)
                        <td>{{ $j->jawaban }}</td>
                    @endforeach
                </tr>
            </table>
        </div>
    </div>

    <script>
        const ctx = document.getElementById('mainChart');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Depression', 'Anxiety', 'Stress'],
                datasets: [{
                    data: [
                                                    {{ $hasil['Depression'] ?? 0 }},
                                                    {{ $hasil['Anxiety'] ?? 0 }},
                        {{ $hasil['Stress'] ?? 0 }}
                    ],
                    label: "Hasil Responden",
                    borderColor: '#436374',
                    backgroundColor: [
                        'rgba(168, 213, 186, 0.6)',
                        'rgba(193, 225, 193, 0.6)',
                        'rgba(183, 215, 232, 0.6)'
                    ],
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