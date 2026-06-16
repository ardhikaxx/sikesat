@extends('layouts.app')
@section('title', 'Edit JurnalDetail - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Edit JurnalDetail</h1>
        <a href="{{ route('jurnal-detail.index') }}" class="text-decoration-none">&larr; Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('jurnal-detail.update', $data->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-semibold">Jurnal Id</label>
                <input type="text" name="jurnal_id" class="form-control" value="{{ $data->jurnal_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Akun Id</label>
                <input type="text" name="akun_id" class="form-control" value="{{ $data->akun_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Posisi</label>
                <input type="text" name="posisi" class="form-control" value="{{ $data->posisi }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Jumlah</label>
                <input type="text" name="jumlah" class="form-control" value="{{ $data->jumlah }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Keterangan</label>
                <input type="text" name="keterangan" class="form-control" value="{{ $data->keterangan }}" required>
            </div>
            <button type="submit" class="btn btn-warning"><i class="fas fa-save"></i> Update</button>
        </form>
    </div>
</div>
@endsection