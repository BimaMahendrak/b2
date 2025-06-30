<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tes Kesehatan Mental Gratis - Barbim</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <style>
        html,
        body {
            height: 100%;
            font-family: 'Montserrat', sans-serif;
            background-color: #F5F5F5;
            color: #1f2020;
        }

        .wrapper {
            min-height: 100%;
            display: flex;
            flex-direction: column;
        }

        .content {
            flex: 1;
        }

        .button {
            background-color: #B7D7E8;
            text-decoration: none;
            border-radius: 0.5rem;
            color: #436374;
            display: inline-block;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            transition: background-color 0.3s ease, color 0.3s ease, transform 0.2s ease;
            white-space: nowrap;
            cursor: pointer;
        }

        .button:hover {
            color: #F5F5F5;
            background-color: #436374;
            transform: scale(1.05);
        }

        body.swal2-shown>[aria-hidden='true'] {
            transition: 0.1s filter;
            filter: blur(3px);
        }

        h1.text-body-emphasis {
            font-size: 2.2rem;
        }

        @media (min-width: 576px) {
            h1.text-body-emphasis {
                font-size: 2.5rem;
            }
        }

        @media (min-width: 768px) {
            h1.text-body-emphasis {
                font-size: 3rem;
            }
        }

        @media (min-width: 992px) {
            h1.text-body-emphasis {
                font-size: 4rem;
            }
        }

        .rotate-image {
            animation: rotation 80s infinite linear;
        }

        @keyframes rotation {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>
    <div class="wrapper position-relative overflow-hidden" style="min-height: 100vh;">
        <main class="content d-flex justify-content-center align-items-center position-relative" style="z-index: 1;">
            <div class="container text-center py-4">
                @yield('content')
            </div>
        </main>

        <footer class="text-center position-relative" style="z-index: 1;">
            <div class="container">
                <ul class="nav justify-content-center border-bottom pb-3 mb-3"></ul>
                <p class="text-center text-body-secondary fs-6">
                    Copyright ©
                    <span class="fw-bold text-info-emphasis">
                        <img src="{{ asset('favicon.ico') }}" alt="Logo BarBim" style="width: 2rem">
                        <a href="https://www.instagram.com/bdavitya/" target="_blank" class="text-info-emphasis"
                            style="text-decoration: none; cursor: pointer;">Bar</a>
                        <a href="https://www.instagram.com/hadmahendra/" target="_blank" class="text-info-emphasis"
                            style="text-decoration: none; cursor: pointer;">Bim</a>
                    </span>, 2025
                </p>
            </div>
        </footer>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                html: `<img src="{{ asset('images/hiu/wink.svg') }}" alt="Hiu Calm" style="width:11rem;"><div class="fs-6" style="text-align: justify"><p><h3><b>Terima Kasih</b></h3>Untuk Anda yang ingin mengetahui kepribadian lebih dalam atau ingin mengetahui aspek-aspek psikologis lain seperti, minat bakat, tes kecocokan pasangan, tes penjurusan, dan lainnya bisa ditemukan di <img src="{{ asset('favicon.ico') }}" alt="Logo BarBim" style="width: 2rem;"><span class="fw-bold text-info-emphasis">BarBim</span>.<br>Terima kasih, semoga harimu menyenangkan!</p></div></div>`,
                confirmButtonText: 'Terima kasih!',
                confirmButtonColor: '#436374',
            });
        </script>
    @endif

</body>

</html>