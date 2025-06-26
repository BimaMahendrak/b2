@extends('layout.dashboard')

@section('content')
<h1 class="fw-bold">
    Data Soal Tes Kesehatan Mental Gratis
</h1>
<p class="text-body-secondary mb-3">Halaman ini menunjukkan setiap pernyataan yang digunakan dalam tes.</p>
<p data-bs-toggle="modal" data-bs-target="#tambah" class="button text-center"
    style="z-index: 1; max-width: fit-content;">
    Tambah Pernyataan
</p>
<div class="modal fade" id="tambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <form action="{{ route('soalAdd') }}" method="POST">
        @csrf
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Pertanyaan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="kategori" aria-label="Floating label select example"
                            name="kategori" required>
                            <option value="1">Depression</option>
                            <option value="2">Anxiety</option>
                            <option value="3">Stress</option>
                        </select>
                        <label for="kategori">Kategori</label>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Pertanyaan" id="pertanyaan" required
                            name="pertanyaan" style=" height: 100px"></textarea>
                        <label for="pertanyaan">Pertanyaan</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="idPertanyaan">
                    <input type="submit" class="button" value="Tambah Pertanyaan"></input>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="position-relative p-4 rounded-4" style="border:#B7D7E8 1px dashed;">
    <div class="table-responsive">
        <table id="dataTable" class="table table-bordered table-striped w-100 align-middle">
            <thead class="table-light">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Kategori</th>
                    <th class="text-center">Pernyataan</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $i => $item)
                <tr>
                    <td class="text-center">{{ $i + 1 }}</td>
                    <td>{{ $item->kategori->nama_kategori }}</td>
                    <td>{{ $item->pertanyaan }}</td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center align-items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" fill="#c0a724"
                                class="bi bi-pencil-square" data-bs-toggle="modal" data-bs-target="#edit{{ $i }}"
                                viewBox="0 0 16 16">
                                <path
                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd"
                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" fill="#c02424" class="bi bi-trash"
                                data-bs-toggle="modal" data-bs-target="#hapus{{ $i }}" viewBox="0 0 16 16">
                                <path
                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                <path
                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                            </svg>
                        </div>
                    </td>
                    <div class="modal fade" id="edit{{ $i }}" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <form action="{{ route('soalEdit') }}" method="POST">
                            @csrf
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Perbarui Pertanyaan
                                            ke-{{ $i + 1 }}
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="kategori" required
                                                aria-label="Floating label select example" name="kategori">
                                                <option value="1" {{ $item->id_kategori == 1 ? 'selected' : '' }}>
                                                    Depression</option>
                                                <option value="2" {{ $item->id_kategori == 2 ? 'selected' : '' }}>
                                                    Anxiety</option>
                                                <option value="3" {{ $item->id_kategori == 3 ? 'selected' : '' }}>
                                                    Stress</option>
                                            </select>
                                            <label for="kategori">Kategori</label>
                                        </div>
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Pertanyaan" id="pertanyaan"
                                                name="pertanyaan" required
                                                style=" height: 100px">{{ $item->pertanyaan }}</textarea>
                                            <label for="pertanyaan">Pertanyaan</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" name="idPertanyaan" value="{{ $item->id_pertanyaan }}">
                                        <input type="submit" class="button" value="Perbarui Data"></input>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal fade" id="hapus{{ $i }}" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <form action="{{ route('soalDelete') }}" method="POST">
                            @csrf
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Pertanyaan
                                            ke-{{ $i + 1 }}
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Yakin hapus pernyataan ke-{{ $i + 1 }} yang berisikan "{{ $item->pertanyaan }}"?
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" name="idPertanyaan" value="{{ $item->id_pertanyaan }}">
                                        <input type="submit" class="button" value="Hapus Pertanyaan"></input>
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
    @push('scripts')
    @if(session('success'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                timer: 2000,
                showConfirmButton: false
            });
    </script>
    @endif
    @endpush
</div>
@endsection
@section('scripts')