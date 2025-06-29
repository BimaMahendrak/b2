@extends('layout.test')

@section('content')
    <div class="position-relative p-4 p-md-5 text-center text-muted bg-body rounded-5"
        style="border:#B7D7E8 1px dashed; justify-self: center;width: 60%;">
        <h1 class="text-body-emphasis display-4 fw-semibold bg-info-subtle fw-bold px-1">Biodata</h1>
        <p class="fs-6 my-3">
            Data Anda hanya dipakai untuk keperluan yang relevan dan disimpan dengan aman
        </p>
        <form action="{{ route('biodataAdd') }}" method="POST">
            @csrf
            <div class="form-floating mb-3 ">
                <input type="text" class="form-control" id="namaLengkap" name="namaLengkap" required
                    placeholder="Nama Lengkap">
                <label for="namaLengkap">Nama Lengkap</label>
            </div>
            <div class="form-floating mb-3 ">
                <select class="form-select" id="jenisKelamin" name="jenisKelamin" required placeholder="Jenis Kelamin">
                    <option value="Perempuan">Perempuan</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                </select>
                <label for="jenisKelamin">Jenis Kelamin</label>
            </div>
            <div class="form-floating mb-3">
                <input type="date" class="form-control" id="tanggalLahir" name="tanggalLahir" required
                    placeholder="Tanggal Lahir">
                <label for="tanggalLahir">Tanggal Lahir</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" required placeholder="Email">
                <label for="email">Email</label>
            </div>
            <input type="hidden" name="tanggalUji" value="{{ date('Y-m-d') }}">
            <div class="text-end">
                <input type="submit" class="button" style="border:0;" value="Selanjutnya">
            </div>
        </form>
    </div>
@endsection