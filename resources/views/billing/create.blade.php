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
                    <select name="pasien_id" class="form-select select2" required>
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
<select id="obatOptions" class="d-none" disabled>
    <option value="">-- Pilih Obat --</option>
    @foreach($obats as $o)
        @php
            // Cari harga perolehan dari stok terbaru, jika tidak ada gunakan default 
            $stok = \App\Models\StokGudang::where('obat_alkes_id', $o->id)->latest()->first();
            $hargaJual = $stok && $stok->harga_perolehan > 0 ? ($stok->harga_perolehan * 1.2) : (10000 + ($o->id * 1000));
        @endphp
        <option value="{{ $o->id }}" data-harga="{{ $hargaJual }}">{{ $o->kode_barang }} - {{ $o->nama_generik }} (Rp {{ number_format($hargaJual, 0, ',', '.') }})</option>
    @endforeach
</select>

<!-- Template Tarif untuk JS -->
<select id="tarifOptions" class="d-none" disabled>
    <option value="">-- Pilih Layanan/Tindakan --</option>
    @foreach($tarifs as $t)
        <option value="{{ $t->id }}" data-harga="{{ $t->tarif }}">{{ $t->nama_layanan }} (Rp {{ number_format($t->tarif, 0, ',', '.') }})</option>
    @endforeach
</select>
@endsection

@push('scripts')
<script>
    let itemIndex = 0;

    // Inisialisasi Select2 untuk dropdown utama
    $(document).ready(function() {
        $('.select2').select2({
            theme: 'bootstrap-5',
            width: '100%'
        });
    });

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
                <div class="input-select-wrapper">
                    <select class="form-select item-select select2-dynamic" required onchange="setHarga(this)"></select>
                </div>
                <div class="input-text-wrapper" style="display:none;">
                    <input type="text" class="form-control manual-name-input" placeholder="Nama Tindakan/Kamar" oninput="updateHiddenName(this)">
                </div>
                <!-- Hidden inputs for backend -->
                <input type="hidden" name="items[${itemIndex}][nama_item]" class="hidden-nama-item">
                <input type="hidden" name="items[${itemIndex}][obat_id]" class="hidden-obat-id">
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
        
        // Gunakan timeout kecil agar browser merender elemen ke DOM sebelum Select2 membaca opsi dan ukuran
        setTimeout(() => {
            const jenisSelect = tr.querySelector('.jenis-select');
            changeJenis(jenisSelect);
        }, 50);
        
        itemIndex++;
    }

    function changeJenis(select) {
        const tr = select.closest('tr');
        const jenis = select.value;
        const selectWrapper = tr.querySelector('.input-select-wrapper');
        const textWrapper = tr.querySelector('.input-text-wrapper');
        const itemSelect = tr.querySelector('.item-select');
        const manualInput = tr.querySelector('.manual-name-input');
        const priceInput = tr.querySelector('.price-input');

        if (jenis === 'Lainnya') {
            selectWrapper.style.display = 'none';
            textWrapper.style.display = 'block';
            
            manualInput.setAttribute('required', 'required');
            itemSelect.removeAttribute('required');
            priceInput.readOnly = false;
            priceInput.value = 0;
            
            tr.querySelector('.hidden-nama-item').value = manualInput.value;
            tr.querySelector('.hidden-obat-id').value = '';
        } else {
            selectWrapper.style.display = 'block';
            textWrapper.style.display = 'none';
            
            manualInput.removeAttribute('required');
            itemSelect.setAttribute('required', 'required');
            priceInput.readOnly = true;
            
            // Hancurkan select2 sementara dengan aman
            if ($(itemSelect).hasClass('select2-hidden-accessible')) {
                $(itemSelect).select2('destroy');
            }
            // Hapus paksa container Select2 lama yang tertinggal di DOM (mencegah duplikasi)
            $(itemSelect).siblings('.select2-container').remove();
            
            // Ganti opsi berdasarkan jenis menggunakan clone node asli (bukan HTML string)
            $(itemSelect).empty();
            if (jenis === 'Obat') {
                $(itemSelect).append($('#obatOptions').children().clone());
            } else {
                $(itemSelect).append($('#tarifOptions').children().clone());
            }
            
            // Re-init Select2
            $(itemSelect).select2({ theme: 'bootstrap-5', width: '100%' });
            $(itemSelect).val('').trigger('change');
        }
        
        calcSub(priceInput);
    }

    function setHarga(select) {
        const tr = select.closest('tr');
        const priceInput = tr.querySelector('.price-input');
        const option = select.options[select.selectedIndex];
        const jenis = tr.querySelector('.jenis-select').value;
        
        if (option && option.value) {
            priceInput.value = option.getAttribute('data-harga') || 0;
            
            const extractedName = option.text.split(' (Rp')[0];
            tr.querySelector('.hidden-nama-item').value = extractedName;
            
            if (jenis === 'Obat') {
                tr.querySelector('.hidden-obat-id').value = option.value;
            } else {
                tr.querySelector('.hidden-obat-id').value = '';
            }
        } else {
            priceInput.value = 0;
            tr.querySelector('.hidden-nama-item').value = '';
            tr.querySelector('.hidden-obat-id').value = '';
        }
        calcSub(priceInput);
    }

    function updateHiddenName(input) {
        const tr = input.closest('tr');
        tr.querySelector('.hidden-nama-item').value = input.value;
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
