@extends('layouts.admin-layout')

@section('title')
    - Inventaris
@endsection

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Kategori</li>
        </ol>
        <h5 class="font-weight-bolder mb-0">Kategori</h5>
    </nav>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-1 p-3">
            <div class="card-header pb-3">
                <div class="row">
                    <div class="col-6 d-flex align-items-center">
                        <h6>Kategori</h6>
                    </div>
                    <div class="col-6 text-end">
                        <a class="btn bg-gradient-dark mb-0" href="{{ route('category.create') }}"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Kategori</a>
                    </div>
                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table" id="dataTable3">
                        <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <a href="{{ route('category.edit', $item->id) }}" data-bs-toggle="tooltip" data-bs-original-title="Edit Kategori">
                                            <i class="fa-solid fa-pen-to-square text-secondary"></i>
                                        </a>
                                        <button class="cursor-pointer fas fa-trash text-danger" onclick="modalHapus('{{ $item->id  }}')" style="border: none; background: no-repeat;" data-bs-toggle="tooltip" data-bs-original-title="Hapus Kategori"></button>
                                        <form id="form_{{ $item->id }}" action="{{ route('category.destroy', $item->id) }}" method="POST" class="inline">
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
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    function submit(key) {
        $('#form_'+key).submit();
    }

    function modalHapus(id) {
        Swal.fire({
            title: "Kamu yakin?",
            text: "Kamu tidak akan bisa membatalkannya setelah ini!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#a1a1a1",
            confirmButtonText: "Ya, hapus saja!"
        }).then((result) => {
            if (result.isConfirmed) {
                submit(id);
            }
        });
    }
</script>
@endsection