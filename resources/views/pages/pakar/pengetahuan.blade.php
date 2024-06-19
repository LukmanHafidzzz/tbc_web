@extends('layout.pakar.master')

{{-- @section('content')
    <div class="container text-start">
        <div class="mb-3 text-title fw-semibold fs-5">
            Form Input Basis Pengetahuan
        </div>
        <form action="{{ route('store_pengetahuan') }}" method="post">
            @csrf
            <div class="card p-5 mb-5">
                <div class="mb-4">
                    <label for="disease" class="form-label">Penyakit</label>
                    <input type="text" class="form-control rounded-4 px-4 py-3" id="disease" name="disease">
                    @error('disease')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="age" class="form-label">Umur</label>
                    <input type="number" class="form-control rounded-4 px-4 py-3" id="age" name="age">
                    @error('age')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="gender" class="form-label">Jenis Kelamin</label>
                    <select class="form-select rounded-4 px-4 py-3" id="gender" name="gender">
                        <option selected disabled></option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="gejala" class="form-label">Gejala</label>
                    <select class="form-select" id="gejala" multiple name="indication_code[]">
                        @foreach($indications as $indication)
                        <option value="{{ $indication->indication_code }}">{{ $indication->indication_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="solusi" class="form-label">Solusi Penanganan</label>
                    <input type="text" class="form-control rounded-4 px-4 py-3" id="solusi" name="solution">
                </div>
                <input type="text" class="form-control invisible" id="id" name="user_id" value="174" readonly>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-sumbit w-25 fw-semibold rounded-4">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection --}}

@section('content')
    <div class="container text-start">
        <form action="{{ route('store_pengetahuan') }}" method="POST">
            @csrf
            <div class="mb-3 text-title fw-semibold fs-5">
                Form Pendaftaran
            </div>
            <div class="card p-5 mb-5">
                <div class="mb-4">
                    <label for="disease" class="form-label">Penyakit</label>
                    <input type="text" class="form-control rounded-4 px-4 py-3" id="disease" name="disease">
                </div>
                <div class="mb-4">
                    <label for="age" class="form-label">Usia</label>
                    <input type="number" class="form-control rounded-4 px-4 py-3" id="age" name="age">
                </div>
                <div class="mb-4">
                    <label for="weight" class="form-label">Berat badan</label>
                    <input type="number" class="form-control rounded-4 px-4 py-3" id="weight" name="weight">
                </div>
                <div class="mb-4">
                    <label for="gender" class="form-label">Jenis Kelamin</label>
                    <select class="form-select rounded-4 px-4 py-3" id="gender" name="gender">
                        <option selected disabled></option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="gejala" class="form-label">Gejala yang dialami</label>
                    <select class="form-select" id="gejala" multiple name="indication_code[]">
                        @foreach($indications as $indication)
                        <option value="{{ $indication->indication_code }}">{{ $indication->indication_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="solution" class="form-label">Solusi Penanganan</label>
                    <input type="text" class="form-control rounded-4 px-4 py-3" id="solution" name="solution">
                </div>
                <input type="text" class="form-control invisible fixed-bottom" id="name" name="name" value="Dummy">
                <input type="text" class="form-control invisible fixed-bottom" id="address" name="address" value="Dummy Address">
                <input type="text" class="form-control invisible fixed-bottom" id="id" name="user_id" value="174" readonly>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-sumbit w-25 fw-semibold rounded-4">
                    Submit
                </button>
            </div>
        </form>
    </div>
@endsection