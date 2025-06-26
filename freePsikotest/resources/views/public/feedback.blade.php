@extends('layout.test')

@section('content')
    <div class="position-relative p-4 p-md-5 text-center text-muted bg-body rounded-5"
        style="border:#B7D7E8 1px dashed; justify-self: center;">
        <h1 class="text-body-emphasis display-4 fw-semibold bg-info-subtle fw-bold px-1">Feedback</h1>
        <p class="fs-6 my-3">
            Berikan <i>feedback</i> agar psikotes ini dapat terus berkembang
        </p>
        @php
            $likertLabels = [
                1 => ['Sangat Buruk', 'badest'],
                2 => ['Cukup Buruk', 'bad'],
                3 => ['Biasa Saja', 'smile'],
                4 => ['Cukup Baik', 'happy'],
                5 => ['Sangat Baik', 'active'],
            ];
        @endphp
        <form action="{{ route('feedbackAdd') }}" method="POST">
            @csrf
            <div class="container text-center mb-4">
                <div class="row justify-content-center g-3">
                    @foreach ($likertLabels as $value => $label)
                        <div class="col-6 col-md-2">
                            <label>
                                <input type="radio" name="likert" value="{{ $value }}" class="likert-radio" required>
                                <div class="likert-option shadow-sm">
                                    <img src="{{ asset('images/hiu/' . $label[1] . '.svg') }}" alt="Pilihan {{ $value }}">
                                    <div class="likert-label">{{ $label[0] }}</div>
                                </div>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                    style="height: 6rem" required name="kritik"></textarea>
                <label for="floatingTextarea2">Berikan kritik dan saran</label>
            </div>
            <div class="text-end">
                <input type="submit" class="button" style="border:0;" value="Selanjutnya">
            </div>
        </form>
    </div>
@endsection