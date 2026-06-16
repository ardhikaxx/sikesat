@extends('layouts.app')
@section('title', 'Tambah KapitasiBpjs - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-plus"></i> Tambah KapitasiBpjs</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('kapitasi-bpjs.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('kapitasi-bpjs.store') }}" method="POST">
            @csrf
            <hr>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Simpan Data</button>
            </div>
        </form>
    </div>
</div>
@endsection