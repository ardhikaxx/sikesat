@extends('layouts.app')
@section('title', 'Buat Tagihan Baru - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-file-invoice-dollar"></i> Buat Tagihan Baru</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('billing.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('billing.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">Nomor Invoice</label>
                    <input type="text" name="no_invoice" class="form-control" value="{{ $no_invoice }}" readonly style="background-color: #f8f9fa;">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="{{ date('Y-m-d') }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">Pasien <span class="text-danger">*</span></label>
                    <select name="pasien_id" class="form-select" required>
                        <option value="">-- Pilih Pasien --</option>
                        @foreach($pasiens as $p)
                            <option value="{{ $p->id }}">{{ $p->no_rm }} - {{ $p->nama_lengkap }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 mb-4">
                    <label class="form-label fw-semibold">Keterangan (Opsional)</label>
                    <input type="text" name="keterangan" class="form-control" placeholder="Catatan tambahan...">
                </div>
            </div>

            <h5 class="fw-bold mb-3 border-bottom pb-2">Rincian Tagihan</h5>
            
            <div class="table-responsive mb-3">
                <table class="table table-bordered" id="itemsTable">
                    <thead class="table-light">
                        <tr>
                            <th width="15%">Jenis</th>
                            <th width="35%">Nama Item / Obat</th>
                            <th width="10%">Jumlah</th>
                            <th width="15%">Harga Satuan</th>
                            <th width="20%">Subtotal</th>
                            <th width="5%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Items akan ditambahkan via JS -->
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4" class="text-end">TOTAL TAGIHAN:</th>
                            <th colspan="2" class="fs-5 text-success">Rp <span id="grandTotal">0</span></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            
            <button type="button" class="btn btn-outline-primary btn-sm mb-4" onclick="addItem()"><i class="fas fa-plus"></i> Tambah Item</button>

            <hr>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Simpan Tagihan</button>
            </div>
        </form>
    </div>
</div>

<!-- Template Obat untuk JS -->
<select id="obatOptions" style="display:none;">
    <option value="">-- Pilih Obat --</option>
    @foreach($obats as $o)
        <option value="{{ $o->id }}" data-harga="{{ $o->harga_jual }}">{{ $o->nama_obat }} (Rp {{ number_format($o->harga_jual, 0, ',', '.') }})</option>
    @endforeach
</select>
@endsection

@push('scripts')
<script>
    let itemIndex = 0;

    function addItem() {
        const tbody = document.querySelector('#itemsTable tbody');
        const tr = document.createElement('tr');
        
        tr.innerHTML = `
            <td>
                <select name="items[${itemIndex}][jenis_item]" class="form-select jenis-select" required onchange="changeJenis(this)">
                    <option value="Tindakan">Tindakan/Jasa</option>
                    <option value="Obat">Obat/Alkes</option>
                    <option value="Kamar">Kamar</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </td>
            <td>
                <div class="input-text-wrapper">
                    <input type="text" name="items[${itemIndex}][nama_item]" class="form-control" required placeholder="Nama Tindakan/Kamar">
                </div>
                <div class="input-obat-wrapper" style="display:none;">
                    <select name="items[${itemIndex}][obat_id]" class="form-select obat-select" onchange="setHargaObat(this)">
                        ${document.getElementById('obatOptions').innerHTML}
                    </select>
                </div>
            </td>
            <td>
                <input type="number" name="items[${itemIndex}][jumlah]" class="form-control text-center qty-input" value="1" min="1" required oninput="calcSub(this)">
            </td>
            <td>
                <input type="number" name="items[${itemIndex}][harga_satuan]" class="form-control text-end price-input" value="0" required oninput="calcSub(this)">
            </td>
            <td>
                <input type="text" class="form-control text-end subtotal-display" readonly value="Rp 0">
            </td>
            <td class="text-center">
                <button type="button" class="btn btn-sm btn-danger" onclick="removeItem(this)"><i class="fas fa-times"></i></button>
            </td>
        `;
        tbody.appendChild(tr);
        itemIndex++;
    }

    function changeJenis(select) {
        const tr = select.closest('tr');
        const textWrapper = tr.querySelector('.input-text-wrapper');
        const obatWrapper = tr.querySelector('.input-obat-wrapper');
        const nameInput = textWrapper.querySelector('input');
        const obatSelect = obatWrapper.querySelector('select');
        const priceInput = tr.querySelector('.price-input');

        if (select.value === 'Obat') {
            textWrapper.style.display = 'none';
            obatWrapper.style.display = 'block';
            nameInput.removeAttribute('required');
            obatSelect.setAttribute('required', 'required');
        } else {
            textWrapper.style.display = 'block';
            obatWrapper.style.display = 'none';
            nameInput.setAttribute('required', 'required');
            obatSelect.removeAttribute('required');
            priceInput.readOnly = false;
        }
    }

    function setHargaObat(select) {
        const tr = select.closest('tr');
        const priceInput = tr.querySelector('.price-input');
        const option = select.options[select.selectedIndex];
        
        if (option.value) {
            priceInput.value = option.getAttribute('data-harga');
            // Set nama item juga
            const textInput = tr.querySelector('.input-text-wrapper input');
            textInput.value = option.text.split(' (Rp')[0]; // Extract name
        } else {
            priceInput.value = 0;
        }
        calcSub(priceInput);
    }

    function calcSub(el) {
        const tr = el.closest('tr');
        const qty = parseFloat(tr.querySelector('.qty-input').value) || 0;
        const price = parseFloat(tr.querySelector('.price-input').value) || 0;
        const subtotal = qty * price;
        
        tr.querySelector('.subtotal-display').value = 'Rp ' + new Intl.NumberFormat('id-ID').format(subtotal);
        calcTotal();
    }

    function removeItem(btn) {
        btn.closest('tr').remove();
        calcTotal();
    }

    function calcTotal() {
        let total = 0;
        document.querySelectorAll('#itemsTable tbody tr').forEach(tr => {
            const qty = parseFloat(tr.querySelector('.qty-input').value) || 0;
            const price = parseFloat(tr.querySelector('.price-input').value) || 0;
            total += (qty * price);
        });
        document.getElementById('grandTotal').textContent = new Intl.NumberFormat('id-ID').format(total);
    }

    // Add first row on load
    document.addEventListener('DOMContentLoaded', function() {
        addItem();
    });
</script>
@endpush
