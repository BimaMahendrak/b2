@extends('layout.public')

@section('content')
    <img src="{{ asset('images/brush.svg') }}" alt="Brush Top Right" class="position-absolute rotate-image"
        style="top: -50px; right: -60px; z-index: 0; max-width: 300px; pointer-events: none;">
    <img src="{{ asset('images/brush.svg') }}" alt="Brush Bottom Left" class="position-absolute rotate-image"
        style="bottom: -50px; left: -60px; z-index: 0; max-width: 300px; pointer-events: none;">
    <div class="position-relative p-4 p-md-5 text-center text-muted bg-body rounded-5" style="border:#B7D7E8 1px dashed;">
        <h1 class="text-body-emphasis display-4 fw-semibold">
            Tes Kesehatan Mental Gratis
        </h1>
        <p class="fs-6 my-3" style="text-align: justify">
            Ini adalah alat penilaian komprehensif yang dirancang untuk mengungkap kondisi emosional Anda, berfokus pada
            tiga
            dimensi utama: stres, kecemasan, dan depresi. Instrumen ini diakui luas sebagai metode efektif untuk menilai
            tingkat
            keparahan gejala yang mungkin Anda alami, menjadikannya dasar bagi banyak penelitian dan praktik kesehatan
            mental
            modern.
        </p>
        <p class="fs-6 my-3" style="text-align: justify">
            Tes ini membantu memahami dinamika emosional berdasarkan model multidimensi yang digunakan para profesional
            kesehatan.
            Didasari oleh teori dan standar psikologi yang akurat, Anda bisa mendapatkan gambaran lengkap tentang kondisi
            mental dan
            emosi Anda. Dengan begitu, Anda dapat mengambil langkah tepat untuk menjaga kesejahteraan diri.
            <b>Jangan biarkan perasaan tersebut mengganggu kesehatan Anda!</b>
        </p>
        <div class="position-relative d-flex justify-content-center">
            <p onclick="showAlert()" class="button text-center" style="z-index: 1; max-width: fit-content;">
                Mulai Tes
            </p>
            <img src="{{ asset('images/hiu/spark.svg') }}" alt="Spark Icon" class="position-absolute d-none d-sm-block"
                style="right: 0px; top: 50%; transform: translateY(-50%); max-width: 190px; z-index: 0; pointer-events: none;">
        </div>

        <script>
            function showAlert() {
                Swal.fire({
                    title: 'Instruksi Pengisian',
                    html: `<div class="fs-6">
                            <p class="text-secondary">Perhatikan instruksi pengisian berikut untuk mengisi Tes Kesehatan Gratis oleh <img src="{{ asset('favicon.ico') }}" alt="Logo BarBim" style="width: 2rem;"> <span class="fw-bold text-info-emphasis">BarBim</span>.</p>
                                <div style="text-align:justify;">
                                    Tes ini terdiri dari berbagai pernyataan yang mungkin sesuai dengan pengalaman Anda dalam menghadapi situasi hidup sehari-hari. Terdapat empat pilihan jawaban yang disediakan untuk setiap pernyataan yaitu:</p>
                                    <ul>
                                        <li>Tidak sesuai dengan saya sama sekali.</li>
                                        <li>Sesuai dengan saya sampai tingkat tertentu.</li>
                                        <li>Sesuai dengan saya sampai batas yang dapat dipertimbangkan.</li>
                                        <li>Sangat sesuai dengan saya.</li>
                                    </ul>
                                    Selanjutnya, Anda diminta untuk memilih salah satu jawaban yang paling sesuai dengan pengalaman Anda selama <b>satu minggu belakangan</b> ini. Tidak ada jawaban yang benar ataupun salah, karena itu isilah sesuai dengan keadaan diri Anda yang sesungguhnya, yaitu berdasarkan jawaban pertama yang terlintas dalam pikiran Anda.
                                </div>
                            </div>`,
                    confirmButtonText: 'Mulai',
                    confirmButtonColor: '#436374',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('biodata') }}";
                    }
                });
            }
        </script>
    </div>
@endsection