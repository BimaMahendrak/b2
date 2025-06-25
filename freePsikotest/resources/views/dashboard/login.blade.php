<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tes Kesehatan Mental Gratis - Barbim</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <style>
        html,
        body {
            height: 100%;
            font-family: 'Montserrat', sans-serif;
            background-color: #F5F5F5;
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
            transform: scale(1.05);
        }

        body.swal2-shown>[aria-hidden='true'] {
            transition: 0.1s filter;
            filter: blur(3px);
        }
    </style>
</head>

<body>
    <div class="wrapper position-relative overflow-hidden" style="min-height: 100vh;">
        <main class="content d-flex justify-content-center align-items-center position-relative" style="z-index: 1;">
            <div class="container text-center py-4" style="width: fit-content">
                <img src="{{ asset('favicon.ico') }}" alt="Logo BarBim" style="width: 5rem">
                <p class="text-body-emphasis display-4 fw-semibold fw-bold px-1 fs-1">Masuk ke Dashboard<br>Admin BarBim
                </p>
                <p class="fs-6 my-3">
                    Masuk ke <i>dashboard</i> dan lakukan manajemen data tes kesehatan mental gratis
                </p>
                <form action="{{ route('loging') }}" method="POST">
                    @csrf
                    <div class="form-floating mb-3 ">
                        <input type="text" class="form-control" id="username" name="username" required
                            placeholder="Username">
                        <label for="username">Username</label>
                    </div>
                    <div class="form-floating mb-3 ">
                        <input type="password" class="form-control" id="password" name="password" required
                            placeholder="Password">
                        <label for="password">Password</label>
                    </div>
                    <div class="text-end">
                        <input type="submit" class="button" style="border:0;" value="Masuk">
                    </div>
                </form>
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

    @if (session('successLogout'))
        <script>
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Berhasil Keluar!",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif

    @if (session('wrongLogin'))
        <script>
            Swal.fire({
                title: "Gagal Masuk!",
                text: "Username atau password salah.",
                icon: "error",
                position: "top-end",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif

</body>

</html>