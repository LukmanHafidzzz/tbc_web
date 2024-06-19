@extends('layout.user.master')

@section('content')
    <div class="container text-start">
        <form action="{{ route('user.pendaftaran.store') }}" method="POST">
            @csrf
            <div class="mb-3 text-title fw-semibold fs-5">
                Form Pendaftaran
            </div>
            <div class="card p-5 mb-5">
                <div class="mb-4">
                    <label for="name" class="form-label">Nama Pasien</label>
                    <input type="text" class="form-control rounded-4 px-4 py-3" id="name" name="name">
                </div>
                <div class="mb-4">
                    <label for="age" class="form-label">Usia</label>
                    <input type="number" class="form-control rounded-4 px-4 py-3" id="age" name="age">
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
                    <label for="weight" class="form-label">Berat badan</label>
                    <input type="number" class="form-control rounded-4 px-4 py-3" id="weight" name="weight">
                </div>
                <div class="mb-4">
                    <label for="address" class="form-label">Alamat</label>
                    <input type="text" class="form-control rounded-4 px-4 py-3" id="address" name="address">
                </div>
                <div class="">
                    <label for="gejala" class="form-label">Gejala yang dialami</label>
                    <select class="form-select" id="gejala" multiple name="indication_code[]">
                        @foreach($indications as $indication)
                        <option value="{{ $indication->indication_code }}">{{ $indication->indication_name }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="text" class="form-control invisible" id="id" name="user_id" value="{{ $userId }}" readonly>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-sumbit w-25 fw-semibold rounded-4">
                    Submit
                </button>
            </div>
        </form>
    </div>
@endsection