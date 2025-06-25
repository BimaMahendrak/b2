<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard BarBim</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        html,
        body {
            font-family: 'Montserrat', sans-serif;
            height: 100%;
        }

        .sidebar {
            min-height: 100vh;
            background-color: #436374;
            color: #F5F5F5;
        }

        .sidebar .nav-link {
            color: #F5F5F5;
        }

        .sidebar .nav-link.active {
            background-color: #B7D7E8;
            color: #436374;
            font-weight: bold;
        }

        .content-area {
            margin-left: 250px;
        }

        @media (max-width: 768px) {
            .sidebar {
                position: absolute;
                left: -250px;
                transition: left 0.3s;
                z-index: 1000;
            }

            .sidebar.show {
                left: 0;
            }

            .content-area {
                margin-left: 0;
            }

            .menu-toggle {
                position: fixed;
                top: 10px;
                left: 10px;
                z-index: 1100;
                background: #436374;
                color: #F5F5F5;
                border: none;
                border-radius: 5px;
                padding: 0.5rem 1rem;
            }
        }
    </style>
</head>

<body>
    <button class="menu-toggle d-md-none" onclick="document.querySelector('.sidebar').classList.toggle('show')">
        ☰
    </button>
    <div class="sidebar position-fixed d-flex flex-column p-3" style="justify-content: space-between">
        <h4 class="mb-4">BarBim</h4>
        <ul class="nav nav-pills flex-column text-center">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}"
                    class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" fill="currentColor" class="bi bi-speedometer2"
                        viewBox="0 0 16 16">
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4M3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707M2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10m9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5m.754-4.246a.39.39 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.39.39 0 0 0-.029-.518z" />
                        <path fill-rule="evenodd"
                            d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A8 8 0 0 1 0 10m8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3" />
                    </svg>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('respon') }}" class="nav-link {{ request()->routeIs('respon') ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" fill="currentColor" class="bi bi-person"
                        viewBox="0 0 16 16">
                        <path
                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                    </svg>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('soal') }}" class="nav-link {{ request()->routeIs('soal') ? 'active' : '' }}">
                    Kelola Soal
                </a>
            </li>
            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST" class="mt-3">
                    @csrf
                    <button class="nav-link text-start btn btn-link text-white p-0" type="submit">Keluar</button>
                </form>
            </li>
        </ul>
        <div class="border-top">
            <p onclick="logout()" class="d-flex align-items-center justify-content-center my-3 text-decoration-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" fill="#F5F5F5" class="bi bi-box-arrow-right"
                    viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                    <path fill-rule="evenodd"
                        d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                </svg>
            </p>
        </div>
    </div>
    <div class="content-area p-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('successLogin'))
        <script>
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Berhasil Masuk!",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif
    <script>
        function logout() {
            Swal.fire({
                icon: 'warning',
                text: 'Kamu yakin ingin mengakhiri sesi?',
                confirmButtonColor: '#436374',
                showDenyButton: true,
                confirmButtonText: "Ya",
                denyButtonText: `Batalkan`
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('logout') }}";
                }
            });
        }
    </script>
</body>

</html>