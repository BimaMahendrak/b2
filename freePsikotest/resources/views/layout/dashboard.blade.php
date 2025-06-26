<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard BarBim</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        html,
        body {
            font-family: 'Montserrat', sans-serif;
            height: 100%;
            color: #1f2020;
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
            margin-left: 138px;
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

        div.dataTables_wrapper div.dataTables_paginate ul.pagination>li.page-item>a {
            color: #436374 !important;
            border: 1px solid #436374 !important;
            background-color: #fff !important;
        }

        div.dataTables_wrapper div.dataTables_paginate ul.pagination>li.page-item>a:hover {
            background-color: #B7D7E8 !important;
            color: #fff !important;
            border-color: #B7D7E8 !important;
        }

        div.dataTables_wrapper div.dataTables_paginate ul.pagination>li.page-item.active>a {
            background-color: #436374 !important;
            color: #fff !important;
            border-color: #436374 !important;
        }

        div.dataTables_wrapper div.dataTables_paginate ul.pagination>li.page-item>a:focus {
            box-shadow: 0 0 0 0.2rem rgba(67, 99, 116, 0.25) !important;
        }

        .custom-table {
            background-color: #fefefe;
            border-radius: 0.5rem;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .custom-table th,
        .custom-table td {
            padding: 0.75rem 1rem;
            vertical-align: middle;
            border: none;
        }

        .custom-table th {
            background-color: #436374;
            color: white;
        }

        .custom-table td {
            background-color: #E6F0F5;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.css" />
</head>

<body>
    <button class="menu-toggle d-md-none" onclick="document.querySelector('.sidebar').classList.toggle('show')">
        ☰
    </button>
    <div class="sidebar position-fixed d-flex flex-column p-3" style="justify-content: space-between">
        <ul class="nav nav-pills flex-column text-center">
            <li class="border-bottom">
                <img src="{{ asset('favicon.ico') }}" alt="Logo BarBim" style="width: 2rem">
                <h4 class="mb-3 fw-semibold">BarBim</h4>
            </li>
            <li class="nav-item my-3">
                <a href="{{ route('dashboard') }}"
                    class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" fill="currentColor" class="bi bi-speedometer2"
                        viewBox="0 0 16 16">
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4M3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707M2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10m9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5m.754-4.246a.39.39 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.39.39 0 0 0-.029-.518z" />
                        <path fill-rule="evenodd"
                            d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A8 8 0 0 1 0 10m8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3" />
                    </svg>
                    <div style="font-size: 0.8rem">Dashboard</div>
                </a>
            </li>
            <li class="nav-item mb-3">
                <a href="{{ route('soal') }}" class="nav-link {{ request()->routeIs('soal') ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" fill="currentColor" class="bi bi-card-heading"
                        viewBox="0 0 16 16">
                        <path
                            d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z" />
                        <path
                            d="M3 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5m0-5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5z" />
                    </svg>
                    <div style="font-size: 0.8rem">Soal</div>
                </a>
            </li>
            <li class="nav-item mb-3">
                <a href="{{ route('respon') }}" class="nav-link {{ request()->routeIs('respon') ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" fill="currentColor" class="bi bi-person"
                        viewBox="0 0 16 16">
                        <path
                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                    </svg>
                    <div style="font-size: 0.8rem">Respon</div>
                </a>
            </li>
        </ul>
        <div class="text-center border-top">
            <p onclick="logout()"
                class="d-flex align-items-center justify-content-center mt-3 mb-0 text-decoration-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" fill="#F5F5F5" class="bi bi-box-arrow-right"
                    viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                    <path fill-rule="evenodd"
                        d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                </svg>
            </p>
            <div style="font-size: 0.8rem">Keluar</div>
        </div>
    </div>

    {{-- ditaro diatas biar kedetect --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable({
                responsive: true
            });
        });
    </script>

    <div class="content-area p-5">
        @yield('content')
    </div>

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