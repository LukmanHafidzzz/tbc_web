@extends('layout.pakar.master')

@section('content')
    <div class="container text-start">
        <div class="mb-3 text-title fw-semibold fs-5">
            Form Input Gejala
        </div>
        <form action="{{ route('store_gejala') }}" method="post">
            @csrf
            <div class="card p-5 mb-5">
                <div class="mb-4">
                    <label for="indication_code" class="form-label">Kode Gejala</label>
                    <input type="text" class="form-control rounded-4 px-4 py-3" id="indication_code" name="indication_code">
                    @error('indication_code')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="indication_name" class="form-label">Nama Gejala</label>
                    <input type="text" class="form-control rounded-4 px-4 py-3" id="indication_name" name="indication_name">
                    @error('indication_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="md_score" class="form-label">MD</label>
                    <input type="text" class="form-control rounded-4 px-4 py-3" id="md_score" name="md_score">
                    @error('md_score')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-sumbit w-25 fw-semibold rounded-4">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection