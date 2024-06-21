@extends('layout.user.master')

@section('content')
    <div class="container text-start">
        <div class="mb-3 text-title fw-semibold fs-5">
            List Hasil
        </div>
        @if ($knowledgeData->isEmpty())
            <div class="card mb-3 position-relative">
                <div class="row m-5 d-flex justify-content-center">
                    Anda belum melakukan pendaftaran
                </div>
            </div>
        @else
            @foreach ($knowledgeData as $data)
            <a href="{{ route('detail_hasil', $data->id) }}">
                <div class="card mb-3 position-relative">
                    <div class="row m-5">
                        <div class="col-3">
                            Nama Pasien
                        </div>
                        <div class="col-1">
                            :
                        </div>
                        <div class="col text-desc">
                            {{ $data->name }}
                        </div>
                    </div>
                    <div class="position-absolute end-0 bottom-0 p-2 fs-8 text-secondary">
                        {{ ($data->updated_at)->translatedFormat('d F Y, H:i') }}
                    </div>
                </div>
            </a>
            @endforeach
        @endif
    </div>
@endsection