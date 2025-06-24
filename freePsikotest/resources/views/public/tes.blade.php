@extends('layout.test')

@section('content')

    <div class="row align-items-center text-start">
        <div class="col-lg-9">
            <p class="fs-6" style="color: #ccc">Jawab pernyataan berikut sesuai kondisi Anda
                seminggu ini</p>
            <h1 class="display-5 fw-bold mb-4">Saya merasa gugup tanpa alasan yang jelas</h1>
            <form action="{{ route('tesAdd') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="custom-radio d-block mb-3">
                        <input type="radio" name="pilihan" value="0" required>
                        <span class="checkmark"></span>
                        Tidak sesuai dengan saya sama sekali
                    </label>
                    <label class="custom-radio d-block mb-3">
                        <input type="radio" name="pilihan" value="1">
                        <span class="checkmark"></span>
                        Sesuai dengan saya sampai tingkat tertentu
                    </label>
                    <label class="custom-radio d-block mb-3">
                        <input type="radio" name="pilihan" value="2">
                        <span class="checkmark"></span>
                        Sesuai dengan saya sampai batas yang dapat dipertimbangkan
                    </label>
                    <label class="custom-radio d-block mb-3">
                        <input type="radio" name="pilihan" value="3">
                        <span class="checkmark"></span>
                        Sangat sesuai dengan saya
                    </label>
                </div>
                <div class="text-start">
                    <input type="submit" class="button" style="border:0;" value="Selanjutnya">
                </div>
            </form>
        </div>
        <div class="col-lg-3 text-center mt-4 mt-lg-0 d-none d-lg-block slide-in-right">
            <img src="{{ asset('images/hiu/calm.svg') }}" alt="Ilustrasi Soal" class="img-fluid">
        </div>
</div>@endsection
@section('tes')
@endsection