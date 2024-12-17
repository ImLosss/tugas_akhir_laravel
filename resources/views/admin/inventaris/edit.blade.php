@extends('layouts.admin-layout')

@section('title')
    - Add Category
@endsection

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ route('inventaris') }}">List Barang</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Ubah Barang</li>
        </ol>
        <h5 class="font-weight-bolder mb-0">Ubah Barang</h5>
    </nav>
@stop

@section('content')
    <div class="card">
        <div class="card-header pb-0 px-3">
            <h5 class="mb-0">{{ __('Ubah Barang') }}</h5>
        </div>
        <div class="card-body pt-4 p-3">
            <form action="{{ route('inventaris.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_barang" class="form-control-label">{{ __('Ubah Barang') }}</label>
                            <div class="@error('nama_barang')border border-danger rounded-3 @enderror">
                                <input class="form-control" type="text" name="nama_barang" value="{{ $data->nama_barang }}" autofocus>
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
                                <input class="form-control" type="number" name="baik" value="{{ $data->baik }}" min="0" autofocus>
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
                                        <option value="{{ $item->id }}" {{ $item->id == $data->category_id ? 'selected' : '' }}>{{ $item->name }}</option>
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
                                <input class="form-control" type="number" name="rusak" value="{{ $data->rusak }}" min="0" autofocus>
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
                                <input class="form-control" type="number" name="jumlah" value="{{ $data->jumlah }}" min="1" autofocus>
                                @error('jumlah')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pinjam" class="form-control-label">{{ __('Jumlah yang dipinjam') }}</label>
                            <div class="@error('pinjam')border border-danger rounded-3 @enderror">
                                <input class="form-control" type="number" value="{{ $data->dipinjam }}" min="0" autofocus disabled>
                                {{-- <input class="form-control" type="number" name="pinjam" value="{{ $data->dipinjam }}" min="0" autofocus hidden> --}}
                                @error('pinjam')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Ubah Barang' }}</button>
                </div>
            </form>

        </div>
    </div>

@endsection