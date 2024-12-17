@extends('layouts.admin-layout')

@section('title')
    - Add Category
@endsection

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ route('inventaris') }}">List Barang</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Tambah Barang</li>
        </ol>
        <h5 class="font-weight-bolder mb-0">Tambah Barang</h5>
    </nav>
@stop

@section('content')
    <div class="card">
        <div class="card-header pb-0 px-3">
            <h5 class="mb-0">{{ __('Tambah Barang') }}</h5>
        </div>
        <div class="card-body pt-4 p-3">
            <form action="{{ route('inventaris.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_barang" class="form-control-label">{{ __('Ubah Barang') }}</label>
                            <div class="@error('nama_barang')border border-danger rounded-3 @enderror">
                                <input class="form-control" type="text" name="nama_barang" value="{{ old('nama_barang') }}" autofocus>
                                @error('nama_barang')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="baik" class="form-control-label">{{ __('Jumlah kondisi Baik') }}</label>
                            <div class="@error('baik')border border-danger rounded-3 @enderror">
                                <input class="form-control" type="number" name="baik" value="{{ old('baik') }}" min="0" autofocus>
                                @error('baik')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category" class="form-control-label">{{ __('Kategori') }}</label>
                            <div class="@error('category')border border-danger rounded-3 @enderror">
                                <select name="category" class="form-control">
                                    <option value="" selected disabled>- Pilih Kategori -</option>
                                    @foreach ($category as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="rusak" class="form-control-label">{{ __('Jumlah kondisi Rusak') }}</label>
                            <div class="@error('rusak')border border-danger rounded-3 @enderror">
                                <input class="form-control" type="number" name="rusak" value="{{ old('rusak') }}" min="0" autofocus>
                                @error('rusak')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jumlah" class="form-control-label">{{ __('Jumlah') }}</label>
                            <div class="@error('jumlah')border border-danger rounded-3 @enderror">
                                <input class="form-control" type="number" name="jumlah" value="{{ old('jumlah') }}" min="1" autofocus>
                                @error('jumlah')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Tambah Barang' }}</button>
                </div>
            </form>

        </div>
    </div>

@endsection