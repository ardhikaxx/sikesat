@extends('layouts.app')
@section('title', 'Detail KapitasiBpjs - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-eye"></i> Detail KapitasiBpjs</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('kapitasi-bpjs.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <table class="table table-striped mb-0">
        </table>
    </div>
</div>
@endsection