@extends('layouts.app')
@section('title', 'Edit KapitasiBpjs - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Edit KapitasiBpjs</h1>
        <a href="{{ route('kapitasi-bpjs.index') }}" class="text-decoration-none">&larr; Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('kapitasi-bpjs.update', $data->id) }}" method="POST">
            @csrf @method('PUT')
            <button type="submit" class="btn btn-warning"><i class="fas fa-save"></i> Update</button>
        </form>
    </div>
</div>
@endsection