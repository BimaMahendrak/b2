@extends('layout.test')

@section('content')
    <div class="position-relative p-4 p-md-5 text-center text-muted bg-body rounded-5"
        style="border:#B7D7E8 1px dashed; justify-self: center; width: 90%;">
        <h1 class="text-body-emphasis display-4 fw-semibold bg-info-subtle fw-bold px-1">Hasil</h1>
        <div class="container my-4">
            @foreach ($hasil as $kategori => $data)
                <div class="mb-4">
                    <div class="row align-items-center">
                        <div class="col-md-2 col-4 text-start fw-semibold">
                            {{ $kategori }}: <i>{{ $data['status'] }}</i>
                        </div>
                        <div class="col-md-10 col-8">
                            <div class="custom-progress">
                                <div class="custom-progress-bar" style="width: {{ min($data['total'],100) }}%;">
                                    {{ $data['total'] }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <p class="fs-6 my-3">
            Hasil ini merupakan langkah awal untuk memahami kondisi Anda dan membantu menentukan langkah-langkah
            selanjutnya, seperti melakukan konsultasi dengan profesional jika diperlukan.
            <br>Jangan ragu untuk mengambil tindakan yang tepat demi kesejahteraan mental Anda.
        </p>
        <div class="text-end">
            <a href="{{ route('selesai') }}" class="button" style="border:0;">Beranda</a>
        </div>
    </div>
@endsection