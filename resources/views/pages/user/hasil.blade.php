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
            Hasil Diagnosa
        </div>
        <div class="card p-5">
            @foreach ($knowledgeData as $data)
            <div>
                Anda menderita penyakit: {{ $data->disease }}
            </div>
            <div>
                <?php 
                if ($data->solution === 'Kategori 1') {
                    $desc = "TB dewasa (mencakup pasien dewasa yang baru pertama kali didiagnosis dengan TBC yang tidak resistan terhadap obat)";
                } else {
                    $desc = "Anak (mencakup di bawah usia 15), formulasi obat sering kali disesuaikan dalam bentuk sirup atau tablet yang bisa dihancurkan untuk memudahkan pemberian";
                } 
                ?>
                Solusi:
                <div>
                    {{ $data->solution }}: {{ $desc }}
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection