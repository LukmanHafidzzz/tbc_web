@extends('layout.admin.master')

@section('content')
    <div class="container">
        <div class="row gap-5">
            <div class="col card w-75 p-4 border-0 rounded-4">
                <div class="row d-flex align-items-center">
                    <div class="col-5">
                        <div class="box-icon-1">
                            <i class="bi bi-database-fill"></i>
                        </div>
                    </div>
                    <div class="col text-start">
                        <div class="text-desc fs-5 mb-2">
                            Data Basis Pengetahuan
                        </div>
                        <div class="fw-semibold">
                            {{ $sum_knowledge_data }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col card w-75 p-4 border-0 rounded-4">
                <div class="row d-flex align-items-center">
                    <div class="col-5">
                        <div class="box-icon-2">
                            <i class="bi bi-database-fill"></i>
                        </div>
                    </div>
                    <div class="col text-start">
                        <div class="text-desc fs-5 mb-2">
                            Data Gejala
                        </div>
                        <div class="fw-semibold">
                            {{ $jumlah_gejala }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col card w-75 p-4 border-0 rounded-4">
                <div class="row d-flex align-items-center">
                    <div class="col-5">
                        <div class="box-icon-3">
                            <i class="bi bi-database-fill"></i>
                        </div>
                    </div>
                    <div class="col text-start">
                        <div class="text-desc fs-5 mb-2">
                            Data Kasus Lama
                        </div>
                        <div class="fw-semibold">
                            {{ $sum_knowledge_data }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection