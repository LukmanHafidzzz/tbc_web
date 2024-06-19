@extends('layout.user.master')

@section('content')
    <div class="container text-start">
        <div class="mb-3 text-title fw-semibold fs-5">
            Identitas Anda
        </div>
        <div class="card p-5 mb-5">
            @foreach ($knowledgeData as $data)
            <div class="row">
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
            <div class="row">
                <div class="col-3">
                    Usia
                </div>
                <div class="col-1">
                    :
                </div>
                <div class="col text-desc">
                    {{ $data->age }}
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    Jenis Kelamin
                </div>
                <div class="col-1">
                    :
                </div>
                <div class="col text-desc">
                    {{ $data->gender }}
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    Weight
                </div>
                <div class="col-1">
                    :
                </div>
                <div class="col text-desc">
                    {{ $data->weight }} Kg
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    Alamat
                </div>
                <div class="col-1">
                    :
                </div>
                <div class="col text-desc">
                    {{ $data->address }}
                </div>
            </div>
            @endforeach
        </div>
        <div class="mb-3 text-title fw-semibold fs-5">
            Gejala Yang Diinputkan
        </div>
        <div class="card p-5 mb-5">
            @foreach ($data->indications as $indicationList)
            <div>
                {{ $indicationList->indication_code }} - {{ $indicationList->indication->indication_name }}
            </div>
            @endforeach
        </div>
        <div class="mb-3 text-title fw-semibold fs-5">
            Solusi
        </div>
        <div class="card p-5">
            @foreach ($knowledgeData as $data)
            <div>
                {{ $data->solution }}
            </div>
            @endforeach
        </div>
    </div>
@endsection