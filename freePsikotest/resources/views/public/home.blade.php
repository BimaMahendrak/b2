@extends('layout.public')

@section('content')
    <img src="{{ asset('images/brush.svg') }}" alt="Brush Top Left" class="position-absolute rotate-image"
        style="top: -50px; left: -60px; z-index: 0; max-width: 300px; pointer-events: none;">
    <img src="{{ asset('images/brush.svg') }}" alt="Brush Bottom Right" class="position-absolute rotate-image"
        style="bottom: -50px; right: -60px; z-index: 0; max-width: 300px; pointer-events: none;">
    <div class="position-relative p-4 p-md-5 text-center text-muted bg-body rounded-5" style="border:#B7D7E8 1px dashed;">
        <h1 class="text-body-emphasis display-4 fw-semibold">
            Sering merasa<br>
            <span class="bg-info-subtle fw-bold px-1">&nbsp;stres&nbsp;</span>,
            <span class="bg-info-subtle fw-bold px-1">&nbsp;cemas&nbsp;</span>, atau
            <span class="bg-info-subtle fw-bold px-1">&nbsp;depresi&nbsp;</span>?
        </h1>
        <p class="fs-5 my-3">
            Jangan biarkan perasaan tersebut mengganggu kesehatanmu!
        </p>
        <p onclick="showAlert()" class="button text-center mx-auto" style="max-width: fit-content; text-wrap: auto;">
            Cek Kesehatan Mentalmu Sekarang!
        </p>
        <script>
            function showAlert() {
                Swal.fire({
                    icon: 'info',
                    html: `Tes ini dirancang sesuai dengan standar resmi dari HIMPSI, sehingga hasilnya akurat dan terpercaya. <img src="{{ asset('favicon.ico') }}" alt="Logo BarBim" style="width: 2rem;"> <span class="fw-bold text-info-emphasis">BarBim </span>menjamin privasi dan kerahasiaan data Anda terlindungi sepenuhnya.`,
                    confirmButtonText: 'Saya paham',
                    confirmButtonColor: '#436374',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('instruksi') }}";
                    }
                });
            }
        </script>
    </div>
@endsection