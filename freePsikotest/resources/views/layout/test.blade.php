<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tes Kesehatan Mental Gratis - Barbim</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <style>
        html,
        body {
            height: 100%;
            font-family: 'Montserrat', sans-serif;
            background-color: #436374;
            color: #F5F5F5;
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
            border-radius: 1rem;
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
            outline: #B7D7E8 1px solid;
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

        .custom-radio {
            position: relative;
            padding-left: 2.5rem;
            cursor: pointer;
            font-size: 1.2rem;
            display: inline-block;
            user-select: none;
        }

        .custom-radio input[type="radio"] {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 2rem;
            width: 2rem;
            background-color: #eee;
            border-radius: 50%;
            border: 2px solid #ccc;
            transition: 0.2s ease;
            transition: transform 0.2s ease;
        }

        .custom-radio:hover .checkmark {
            transform: scale(1.2);
        }

        .custom-radio input:checked~.checkmark {
            background-color: #B7D7E8;
            border-color: #B7D7E8
        }

        .checkmark::after {
            content: "";
            position: absolute;
            display: none;
        }

        .custom-radio input:checked~.checkmark::after {
            display: block;
        }

        .custom-radio .checkmark::after {
            top: 17%;
            left: 16%;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #436374;
        }

        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .slide-in-right {
            animation: slideInRight 0.8s ease-out forwards;
        }

        .likert-radio {
            display: none;
        }

        .likert-option {
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease, border 0.3s ease;
            border-radius: 1rem;
            overflow: hidden;
            border: 2px solid transparent;
            text-align: center;
            padding: 0.5rem;
            background-color: #fff;
            color: #333;
        }

        .likert-option img {
            width: 100%;
            height: auto;
            transition: transform 0.3s ease;
            max-height: 100px;
            object-fit: contain;
        }

        .likert-option:hover img {
            transform: scale(1.1);
        }

        .likert-radio:checked+.likert-option {
            transform: scale(1.05);
            border-color: #436374;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .likert-label {
            font-size: 0.9rem;
            margin-top: 0.5rem;
            color: #436374;
        }

        .custom-progress {
            position: relative;
            width: 100%;
            height: 1.5rem;
            background: transparent;
        }

        .custom-progress-bar {
            position: absolute;
            right: 0;
            top: 0;
            height: 100%;
            background-color: #B7D7E8;
            border-radius: 0.375rem;
            transition: background-color 1s ease, color 1.5s ease, font-weight 1.5s ease;
        }

        .custom-progress-bar:hover {
            background-color: #436374;
            color: #F5F5F5;
            font-weight: 900;
        }
    </style>
</head>

<body>
    <div class="wrapper position-relative overflow-hidden" style="min-height: 100vh;">
        <main class="content d-flex justify-content-center align-items-center position-relative" style="z-index: 1;">
            <div class="container text-center py-auto">
                @yield('content')
            </div>
        </main>
        <footer class="text-center position-relative" style="z-index: 1;">
            @if (View::hasSection('tes'))
                @yield('tes')
            @endif
            <div class="container">
                <ul class="nav justify-content-center border-bottom pb-3 mb-3"></ul>
                <p class="text-center fs-6">
                    Copyright ©
                    <span class="fw-bold">
                        <img src="{{ asset('favicon.ico') }}" alt="Logo BarBim" style="width: 2rem">
                        <a href="https://www.instagram.com/bdavitya/" target="_blank"
                            style="text-decoration: none; cursor: pointer;color: #B7D7E8">Bar</a>
                        <a href="https://www.instagram.com/hadmahendra/" target="_blank"
                            style="text-decoration: none; cursor: pointer;color: #B7D7E8">Bim</a>
                    </span>, 2025
                </p>
            </div>
        </footer>
    </div>
    @stack('scripts')
</body>
</html>