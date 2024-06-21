@extends('layout.user.master')

@section('content')
    <div class="container text-start">
        <div class="mb-3 text-title fw-semibold fs-5">
            Identitas Anda
        </div>
        <div class="card p-5 mb-5">
            <div class="row">
                <div class="col-3">
                    Nama Pasien
                </div>
                <div class="col-1">
                    :
                </div>
                <div class="col text-desc">
                    {{ $knowledgeData->name }}
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
                    {{ $knowledgeData->age }}
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
                    {{ $knowledgeData->gender }}
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
                    {{ $knowledgeData->weight }} Kg
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
                    {{ $knowledgeData->address }}
                </div>
            </div>
        </div>

        <div class="mb-3 text-title fw-semibold fs-5">
            Gejala Yang Diinputkan
        </div>
        <div class="card p-5 mb-5">
            @foreach ($knowledgeData->indications as $indicationList)
                <div>
                    {{ $indicationList->indication_code }} - {{ $indicationList->indication->indication_name }}
                </div>
            @endforeach
        </div>

        <div class="mb-3 text-title fw-semibold fs-5">
            Hasil Diagnosa
        </div>
        <div class="card p-5">
            <div>
                Anda menderita penyakit: {{ $knowledgeData->disease }}
            </div>
            <div>
                @if ($knowledgeData->solution === 'Kategori 1')
                    <?php $desc = "TB dewasa (mencakup pasien dewasa yang baru pertama kali didiagnosis dengan TBC yang tidak resistan terhadap obat)"; ?>
                @else
                    <?php $desc = "Anak (mencakup di bawah usia 15), formulasi obat sering kali disesuaikan dalam bentuk sirup atau tablet yang bisa dihancurkan untuk memudahkan pemberian"; ?>
                @endif
                Solusi:
                <div>
                    {{ $knowledgeData->solution }}: {{ $desc }}
                </div>
            </div>
        </div>
    </div>
@endsection
