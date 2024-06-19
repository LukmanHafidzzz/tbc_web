@extends('layout.admin.master')

@section('content')
<div class="container text-start">
    <div class="mb-3 text-title fw-semibold fs-5">
        Data Basis Pengetahuan
    </div>
    <div class="card p-5">
        <table class="table table-borderless">
            <thead class="border-bottom">
                <tr>
                    <th scope="col"><span class="text-desc">No.</span></th>
                    <th scope="col"><span class="text-desc">Penyakit</span></th>
                    <th scope="col"><span class="text-desc">Gejala</span></th>
                    <th scope="col"><span class="text-desc">MD</span></th>
                    <th scope="col"><span class="text-desc">Solusi Penanganan</span></th>
                    <th scope="col"><span class="text-desc">Aksi</span></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($knowledgeData as $data)
                <tr>
                    <th scope="row">{{ $data->id }}</th>
                    <td>{{ $data->disease }}</td>
                    <td>{{ $data->indications->pluck('indication_code')->implode(', ') }}</td>
                    <td>{{ $data->md }}</td>
                    <td>{{ $data->solution }}</td>
                    <td class="gap-3 d-flex">
                        <a href="{{ route('update_pengetahuan_admin_view', $data->id) }}" class="edit-icon-1">
                            <i class="bi bi-pencil-square fs-5"></i>
                        </a>
                        <a href="{{ route('delete_pengetahuan_admin', $data->id) }}" class="edit-icon-2"
                            onclick="event.preventDefault(); document.getElementById('delete-form-{{ $data->id }}').submit();">
                            <i class="bi bi-trash fs-5"></i>
                        </a>
                        <form id="delete-form-{{ $data->id }}" action="{{ route('delete_pengetahuan_admin', $data->id) }}" method="POST"
                            style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection