@extends('layout.dashboard')

@section('content')
    <h1 class="fw-bold">
        Data Respons Tes Kesehatan Mental Gratis
    </h1>
    <p class="text-body-secondary mb-3">Halaman ini menunjukkan setiap responden yang telah mengikuti tes.</p>
    <a href="{{ route('home') }}" data-bs-toggle="modal" data-bs-target="#tambah" class="button text-center mb-3"
        style="z-index: 1; max-width: fit-content;">
        Tambah Respons
    </a>
    <div class="position-relative p-4 rounded-4" style="border:#B7D7E8 1px dashed;">
        <div class="table-responsive">
            <table id="dataTable" class="table table-bordered table-striped w-100 align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Lengkap</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Tanggal Ujian</th>
                        <th class="text-center">Depression</th>
                        <th class="text-center">Anxiety</th>
                        <th class="text-center">Stress</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $i => $item)
                        <tr>
                            <td class="text-center">{{ $i + 1 }}</td>
                            <td>{{ $item->nama_lengkap}}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->tanggal_ujian }}</td>
                            <td class="text-center">20</td>
                            <td class="text-center">30</td>
                            <td class="text-center">40</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center align-items-center gap-2">
                                    <a href="{{ route('responDetail') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" fill="#242ac0" class="bi bi-eye"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                            <path
                                                d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                                        </svg>
                                    </a>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" fill="#c02424" class="bi bi-trash"
                                        data-bs-toggle="modal" data-bs-target="#hapus{{ $i }}" viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                        <path
                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                    </svg>
                                </div>
                            </td>
                            <div class="modal fade" id="hapus{{ $i }}" data-bs-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <form action="{{ route('responDelete') }}" method="POST">
                                    @csrf
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Respon
                                                    ke-{{ $i + 1 }}
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Yakin hapus respon ke-{{ $i + 1 }} oleh {{ $item->nama_lengkap }}?
                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" name="idPertanyaan" value="{{ $item->id_responden }}">
                                                <input type="submit" class="button" value="Hapus Respons"></input>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </tr>
                        <script>
                            const myModal = document.getElementById('myModal')
                            const myInput = document.getElementById('myInput')

                            myModal.addEventListener('shown.bs.modal', () => {
                                myInput.focus()
                            })
                        </script>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection