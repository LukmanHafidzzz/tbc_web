@extends('layout.admin.master')

@section('content')
    <div class="container text-start">
        <div class="mb-3 text-title fw-semibold fs-5">
            Form Edit Gejala
        </div>
        <form action="{{ route('update_pengetahuan_admin', $knowledgeData->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="card p-5 mb-5">
                <div class="mb-4">
                    <label for="disease" class="form-label">Penyakit</label>
                    <input type="text" class="form-control rounded-4 px-4 py-3" id="disease" name="disease" value="{{ $knowledgeData->disease }}">
                    @error('disease')
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
                <div class="mb-4">
                    <label for="md" class="form-label">MD</label>
                    <input type="text" class="form-control rounded-4 px-4 py-3" id="md" name="md" value="{{ $knowledgeData->md }}">
                    @error('md')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="solution" class="form-label">Solusi</label>
                    <input type="text" class="form-control rounded-4 px-4 py-3" id="solution" name="solution" value="{{ $knowledgeData->solution }}"> 
                    @error('solution')
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