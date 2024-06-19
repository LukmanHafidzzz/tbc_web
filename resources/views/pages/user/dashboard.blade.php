@extends('layout.user.master')

@section('content')
    <div class="container text-start">
        <div class="mb-3 text-title fw-semibold fs-5">
            Tuberkulosis
        </div>
        <div class="card p-5">
            <img src="{{ asset('images/img-2.jpg') }}" alt="" srcset="" class="rounded-3 mb-4 h-50">
            <div class="text-desc">
                Tuberkulosis (TBC) adalah penyakit menular yang disebabkan oleh bakteri Mycobacterium tuberculosis. Kondisi ini dapat menyerang otak, kelenjar getah bening, sistem saraf pusat, jantung dan tulang belakang. Namun, infeksi TBC paling sering menyerang paru-paru. Menurut Organisasi Kesehatan Dunia (WHO), TBC berada di peringkat kedua sebagai penyakit menular yang mematikan. Indonesia termasuk lima besar negara dengan jumlah pengidap TB terbanyak di Asia Tenggara. Merujuk data 2012, jumlah pengidap TBC yang mencapai 305 ribu jiwa.
            </div>
        </div>
    </div>
@endsection