@extends('layouts.app')
@section('title', 'Edit RkaRincian - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-edit"></i> Edit RkaRincian</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('rka-rincian.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('rka-rincian.update', $data->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-bold">Rka Id</label>
                <input type="text" name="rka_id" class="form-control" value="{{ $data->rka_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Akun Id</label>
                <input type="text" name="akun_id" class="form-control" value="{{ $data->akun_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Uraian</label>
                <input type="text" name="uraian" class="form-control" value="{{ $data->uraian }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Volume</label>
                <input type="text" name="volume" class="form-control" value="{{ $data->volume }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Satuan</label>
                <input type="text" name="satuan" class="form-control" value="{{ $data->satuan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Harga Satuan</label>
                <input type="text" name="harga_satuan" class="form-control" value="{{ $data->harga_satuan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Total</label>
                <input type="text" name="total" class="form-control" value="{{ $data->total }}" required>
            </div>
            <hr>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection