@extends('layouts.admin-layout')
@section('title')
  - Dashboard
@endsection
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" @role('admin')href="{{ route('home') }}"@endrole>Home</a></li>
        </ol>
        <h5 class="font-weight-bolder mb-0">Dashboard</h5>
    </nav>
@endsection
@section('content')
  <div class="row mb-3 p-3">
    <h5>Hallo {{ Auth::user()->name }}</h5>
  </div>
@endsection

@section('script')

@endsection