@extends('layout.test')

@section('content')
<div class="row align-items-center text-start">
    <div class="col-lg-9">
        <p class="fs-6" style="color: #ccc">
            Soal {{ $no }} dari {{ $total }}<br>
            Jawab pernyataan berikut sesuai kondisi Anda seminggu ini
        </p>
        @if($pertanyaan)
            <h1 class="display-5 fw-bold mb-4">{{ $pertanyaan->pertanyaan }}</h1>
            <form action="{{ route('tesAdd', ['no' => $no]) }}" method="POST" id="formTes">
                @csrf
                <div class="mb-4">
                    <label class="custom-radio d-block mb-3">
                        <input type="radio" name="pilihan" value="0" required>
                        <span class="checkmark"></span>
                        Tidak sesuai dengan saya sama sekali
                    </label>
                    <label class="custom-radio d-block mb-3">
                        <input type="radio" name="pilihan" value="1">
                        <span class="checkmark"></span>
                        Sesuai dengan saya sampai tingkat tertentu
                    </label>
                    <label class="custom-radio d-block mb-3">
                        <input type="radio" name="pilihan" value="2">
                        <span class="checkmark"></span>
                        Sesuai dengan saya sampai batas yang dapat dipertimbangkan
                    </label>
                    <label class="custom-radio d-block mb-3">
                        <input type="radio" name="pilihan" value="3">
                        <span class="checkmark"></span>
                        Sangat sesuai dengan saya
                    </label>
                </div>
                <div class="text-start" style="margin-bottom: 20px;">
                    <input type="submit" class="button" style="border:0;" value="{{ $no == $total ? 'Selesai' : 'Selanjutnya' }}">
                </div>
                <div id="timer"  class="fw-bold text-danger fs-5"></div>
            </form>
        @else
            <div class="alert alert-warning">Soal tidak ditemukan.</div>
        @endif
    </div>
    <div class="col-lg-3 text-center mt-4 mt-lg-0 d-none d-lg-block slide-in-right">
        <img src="{{ asset('images/hiu/calm.svg') }}" alt="Ilustrasi Soal" class="img-fluid">
    </div>
</div>
@endsection

@section('tes')
    @php
        $progress = $total > 0 ? round(($no / $total) * 100) : 0;
    @endphp
    <div class="container">
        <div class="progress">
            <div class="progress-bar bg-info" role="progressbar"
                style="width: {{ $progress }}%;" aria-valuenow="{{ $progress }}"
                aria-valuemin="0" aria-valuemax="100">
                {{ $progress }}%
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    let waktuMulaiServer = "{{ $waktu_mulai }}";
    let waktuMulaiDate = new Date(waktuMulaiServer.replace(' ', 'T'));
    let waktuTes = 20 * 60; // 20 menit dalam detik

    let waktuServerNow = "{{ $now }}";
    let waktuServerNowDate = new Date(waktuServerNow.replace(' ', 'T'));
    let waktuBrowserNow = new Date();
    let offset = waktuServerNowDate.getTime() - waktuBrowserNow.getTime();

    let alertDuaMenit = false;
    let waktuHabis = false;

    function updateTimer() {
        let waktuSekarang = new Date(new Date().getTime() + offset);
        let elapsed = Math.floor((waktuSekarang - waktuMulaiDate) / 10);
        let sisa = waktuTes - elapsed;

        if (sisa <= 0 && !waktuHabis) {
            waktuHabis = true;
            document.getElementById('timer').innerHTML = "Waktu habis!";
            Swal.fire({
                icon: 'warning',
                title: 'Waktu Habis!',
                text: 'Waktu tes sudah habis. Klik tombol di bawah untuk melanjutkan.',
                confirmButtonText: 'Lanjutkan',
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then(() => {
                window.location.href = "{{ route('feedback') }}";
            });
            return;
        }

        let menit = Math.floor(sisa / 60);
        let detik = sisa % 60;
        document.getElementById('timer').innerHTML = `Sisa waktu: ${menit}m ${detik}s`;

        // SweetAlert jika sisa waktu 2 menit, hanya sekali
        if (sisa <= 120 && !alertDuaMenit && sisa > 0) {
            alertDuaMenit = true;
            Swal.fire({
                icon: 'info',
                title: 'Sisa 2 Menit!',
                text: 'Segera selesaikan tes Anda.',
                timer: 3000
            });
        }
        setTimeout(updateTimer, 1000);
    }
    updateTimer();
</script>
@endpush
