@extends('layouts.admin-layout')

@section('title')
    - Add Category
@endsection

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ route('category') }}">Kategori</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Tambah Kategori</li>
        </ol>
        <h5 class="font-weight-bolder mb-0">Tambah Kategori</h5>
    </nav>
@stop

@section('content')
    <div class="card">
        <div class="card-header pb-0 px-3">
            <h5 class="mb-0">{{ __('Tambah Kategori') }}</h5>
        </div>
        <div class="card-body pt-4 p-3">
            <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                            <label for="category" class="form-control-label">{{ __('Nama Kategori') }}</label>
                            <div class="@error('name')border border-danger rounded-3 @enderror">
                                <input class="form-control" type="text" name="category" value="{{ old('category') }}" autofocus>
                                @error('category')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Add Category' }}</button>
                </div>
            </form>

        </div>
    </div>

@endsection