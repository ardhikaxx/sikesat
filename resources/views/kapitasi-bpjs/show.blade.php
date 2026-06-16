@extends('layouts.app')
@section('title', 'Detail KapitasiBpjs - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Detail KapitasiBpjs</h1>
        <a href="{{ route('kapitasi-bpjs.index') }}" class="text-decoration-none">&larr; Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <table class="table table-bordered">
        </table>
    </div>
</div>
@endsection