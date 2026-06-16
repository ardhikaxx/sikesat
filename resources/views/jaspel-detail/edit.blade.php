@extends('layouts.app')
@section('title', 'Edit JaspelDetail - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Edit JaspelDetail</h1>
        <a href="{{ route('jaspel-detail.index') }}" class="text-decoration-none">&larr; Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('jaspel-detail.update', $data->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-semibold">Jaspel Perhitungan Id</label>
                <input type="text" name="jaspel_perhitungan_id" class="form-control" value="{{ $data->jaspel_perhitungan_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Pegawai Id</label>
                <input type="text" name="pegawai_id" class="form-control" value="{{ $data->pegawai_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Skor Total</label>
                <input type="text" name="skor_total" class="form-control" value="{{ $data->skor_total }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Nominal Diterima</label>
                <input type="text" name="nominal_diterima" class="form-control" value="{{ $data->nominal_diterima }}" required>
            </div>
            <button type="submit" class="btn btn-warning"><i class="fas fa-save"></i> Update</button>
        </form>
    </div>
</div>
@endsection