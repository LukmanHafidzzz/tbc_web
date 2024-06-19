@extends('layout.admin.master')

@section('content')
    <div class="container text-start">
        <div class="mb-3 text-title fw-semibold fs-5">
            Form Edit Kasus
        </div>
        <form action="{{ route('update_kasus_admin', $knowledgeData->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="card p-5 mb-5">
                <div class="mb-4">
                    <label for="name" class="form-label">Nama Pasien</label>
                    <input type="text" class="form-control rounded-4 px-4 py-3" id="name" name="name" value="{{ $knowledgeData->name }}">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="age" class="form-label">Usia</label>
                    <input type="number" class="form-control rounded-4 px-4 py-3" id="age" name="age" value="{{ $knowledgeData->age }}">
                    @error('age')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="gejala" class="form-label">Gejala</label>
                    <select class="form-select" id="gejala" multiple name="indication_code[]">
                        @foreach($indications as $indication)
                            <option value="{{ $indication->indication_code }}" 
                                {{ in_array($indication->indication_code, $knowledgeData->indications->pluck('indication_code')->toArray()) ? 'selected' : '' }}>
                                {{ $indication->indication_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('indication_code')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-submit w-25 fw-semibold rounded-4">
                        Update
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection