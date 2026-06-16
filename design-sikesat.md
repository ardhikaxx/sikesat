# design-sikesat.md
# SIKESAT — Sistem Informasi Keuangan Kesehatan Terpadu
## Blueprint Desain UI/UX

---

## 1. FILOSOFI DESAIN

**"Clinical Precision, Public Trust"**

SIKESAT adalah sistem keuangan untuk instansi kesehatan publik. Desainnya harus memancarkan:
- **Kepercayaan** — tampilan bersih, profesional, tidak berantakan
- **Kejelasan** — data keuangan kompleks disajikan mudah dipahami
- **Efisiensi** — alur kerja staf berulang harus secepat mungkin
- **Otoritas** — cocok untuk instansi pemerintah, bukan startup
- **Aksesibilitas** — dapat digunakan di segala perangkat termasuk tablet atau laptop lama di puskesmas

---

## 2. PALET WARNA

### 2.1 Warna Utama (Primary)

| Nama | Hex | Penggunaan |
|---|---|---|
| **Teal Puskesmas** | `#0D6E6E` | Sidebar, tombol aksi utama, header modul |
| **Teal Terang** | `#19A7A7` | Hover state, aksen aktif, highlight |
| **Teal Sangat Terang** | `#E8F5F5` | Background sidebar aktif, badge ringan |
| **Navy Dalam** | `#0B3D3D` | Teks heading pada background gelap |

### 2.2 Warna Sekunder & Status

| Nama | Hex | Penggunaan |
|---|---|---|
| **Hijau Sukses** | `#1A7F5A` | Status disetujui, transaksi berhasil |
| **Hijau Muda** | `#D4EDDA` | Badge sukses, baris tabel approved |
| **Kuning Peringatan** | `#D4860B` | Status menunggu verifikasi, warning |
| **Kuning Muda** | `#FFF3CD` | Badge pending, baris tabel menunggu |
| **Merah Bahaya** | `#C0392B` | Error, ditolak, stok kritis, overbudget |
| **Merah Muda** | `#F8D7DA` | Badge ditolak, baris tabel ditolak |
| **Biru Info** | `#1565C0` | Informasi, link, badge biru |
| **Biru Muda** | `#DBEAFE` | Badge info, background info |

### 2.3 Warna Netral

| Nama | Hex | Penggunaan |
|---|---|---|
| **Abu Gelap** | `#2D3748` | Teks utama konten |
| **Abu Menengah** | `#718096` | Teks sekunder, label, placeholder |
| **Abu Ringan** | `#A0AEC0` | Border, divider, teks nonaktif |
| **Abu Sangat Ringan** | `#F7FAFC` | Background halaman, latar belakang card |
| **Putih** | `#FFFFFF` | Card, modal, panel, input |

### 2.4 Warna Sumber Dana (Untuk grafik & badge)

| Sumber Dana | Warna | Hex |
|---|---|---|
| BPJS Kapitasi | Biru teal | `#0D9488` |
| BOK | Biru indigo | `#4F46E5` |
| APBD | Biru navy | `#1E40AF` |
| PAD / Layanan Umum | Hijau | `#16A34A` |
| Hibah | Ungu | `#7C3AED` |
| Lainnya | Abu | `#6B7280` |

---

## 3. TIPOGRAFI

```css
/* Import di <head> sebelum Bootstrap */
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Noto+Serif:wght@400;700&family=JetBrains+Mono:wght@400;500&display=swap');
```

| Peran | Font | Weight | Penggunaan |
|---|---|---|---|
| **Display / Judul Halaman** | `Noto Serif` | 700 | Judul halaman utama, nama sistem |
| **UI / Semua antarmuka** | `Inter` | 400, 500, 600 | Nav, label, tombol, teks |
| **Data / Angka keuangan** | `JetBrains Mono` | 400, 500 | Nilai nominal, kode akun, nomor dokumen |
| **Tubuh teks** | `Inter` | 400 | Paragraf, deskripsi, keterangan |

### Type Scale
```css
--fs-xs:   0.75rem;   /* 12px — caption, badge */
--fs-sm:   0.875rem;  /* 14px — label, tabel */
--fs-base: 1rem;      /* 16px — teks utama */
--fs-lg:   1.125rem;  /* 18px — sub-judul */
--fs-xl:   1.25rem;   /* 20px — judul card */
--fs-2xl:  1.5rem;    /* 24px — judul halaman */
--fs-3xl:  1.875rem;  /* 30px — KPI besar */
--fs-4xl:  2.25rem;   /* 36px — headline dashboard */
```

---

## 4. LAYOUT & GRID

### 4.1 Layout Utama (Authenticated)

```
┌──────────────────────────────────────────────────────────────────┐
│ HEADER (64px) — Logo | Breadcrumb | Notifikasi | Avatar Profil   │
├──────────┬───────────────────────────────────────────────────────┤
│          │ PAGE HEADER (56px)                                     │
│ SIDEBAR  │ Judul Halaman | Tombol Aksi Utama                     │
│ (260px   ├───────────────────────────────────────────────────────┤
│  lebar)  │                                                        │
│          │   CONTENT AREA (fluid)                                 │
│ Kiri,    │   Padding: 24px semua sisi                            │
│ Fixed    │                                                        │
│          │                                                        │
│          │                                                        │
└──────────┴───────────────────────────────────────────────────────┘
```

### 4.2 Sidebar Struktur

```
┌──────────────────┐
│ [Logo] SIKESAT   │  ← Tinggi 64px, background #0D6E6E
│  Puskesmas ...   │  ← Nama Puskesmas (subtitle)
├──────────────────┤
│ 📊 Dashboard     │  ← Nav Item (aktif: bg #E8F5F5, teks #0D6E6E)
├──────────────────┤
│ 📁 Master Data   │  ← Parent dengan anak (collapsible)
│   ↳ Pegawai      │
│   ↳ COA          │
│   ↳ Supplier     │
│   ↳ ...          │
├──────────────────┤
│ 📋 Anggaran      │
│   ↳ RKA          │
│   ↳ RBA          │
├──────────────────┤
│ 💰 Penerimaan    │
├──────────────────┤
│ 💸 Pengeluaran   │
├──────────────────┤
│ 👥 Jasa Pelayanan│
│   ↳ Parameter    │
│   ↳ Perhitungan  │
│   ↳ Pencairan    │
├──────────────────┤
│ 📒 Akuntansi     │
├──────────────────┤
│ 💊 Persediaan    │
├──────────────────┤
│ 🏢 Aset          │
├──────────────────┤
│ ⭐ Mutu Layanan  │
├──────────────────┤
│ 📈 Kinerja BLUD  │
│   ↳ Indikator SPM│
│   ↳ Capaian      │
├──────────────────┤
│ 📊 Laporan       │
├──────────────────┤
│ ⚙️  Admin        │  ← Hanya untuk Super Admin
└──────────────────┘
```

### 4.3 Responsive Breakpoints

| Breakpoint | Lebar | Perilaku Sidebar |
|---|---|---|
| Mobile | < 576px | Sidebar disembunyikan, drawer dari kiri via toggle |
| Tablet | 576px – 991px | Sidebar collapsed (hanya ikon, tooltip on hover) |
| Desktop kecil | 992px – 1199px | Sidebar penuh 240px |
| Desktop besar | ≥ 1200px | Sidebar penuh 260px |

---

## 5. KOMPONEN UI

### 5.1 KPI Card (Dashboard)

```html
<div class="kpi-card">
    <!-- Contoh struktur -->
    <div class="kpi-card__icon bg-teal-light">
        <i class="fas fa-coins text-teal"></i>
    </div>
    <div class="kpi-card__body">
        <span class="kpi-card__label">Total Pendapatan YTD</span>
        <span class="kpi-card__value">Rp 1.250.000.000</span>
        <span class="kpi-card__sub text-success">
            <i class="fas fa-arrow-up"></i> 12,5% vs tahun lalu
        </span>
    </div>
    <div class="kpi-card__progress">
        <div class="progress" style="height: 4px;">
            <div class="progress-bar bg-teal" style="width: 78%"></div>
        </div>
        <small class="text-muted">78% dari target</small>
    </div>
</div>
```

**CSS KPI Card:**
```css
.kpi-card {
    background: #FFFFFF;
    border: 1px solid #E2E8F0;
    border-left: 4px solid #0D6E6E;
    border-radius: 8px;
    padding: 20px;
    display: flex;
    gap: 16px;
    align-items: flex-start;
    transition: box-shadow 0.2s ease, transform 0.2s ease;
}
.kpi-card:hover {
    box-shadow: 0 4px 12px rgba(13, 110, 110, 0.12);
    transform: translateY(-2px);
}
.kpi-card__icon {
    width: 48px;
    height: 48px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    flex-shrink: 0;
}
.kpi-card__value {
    font-family: 'JetBrains Mono', monospace;
    font-size: 1.5rem;
    font-weight: 600;
    color: #2D3748;
    display: block;
    line-height: 1.2;
}
.kpi-card__label {
    font-size: 0.75rem;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: #718096;
    display: block;
    margin-bottom: 4px;
}
```

### 5.2 Tabel Data (DataTables)

```css
/* Tabel SIKESAT */
.sikesat-table thead th {
    background: #0D6E6E;
    color: #FFFFFF;
    font-size: 0.8125rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.04em;
    border: none;
    padding: 12px 16px;
    white-space: nowrap;
}
.sikesat-table tbody tr:hover {
    background: #E8F5F5;
}
.sikesat-table tbody td {
    font-size: 0.875rem;
    color: #2D3748;
    padding: 10px 16px;
    vertical-align: middle;
    border-bottom: 1px solid #EDF2F7;
}
/* Kolom nominal — monospace kanan */
.sikesat-table td.nominal {
    font-family: 'JetBrains Mono', monospace;
    text-align: right;
    font-size: 0.875rem;
}
/* Row coloring berdasarkan status */
.sikesat-table tr.status-disetujui { border-left: 3px solid #1A7F5A; }
.sikesat-table tr.status-menunggu  { border-left: 3px solid #D4860B; }
.sikesat-table tr.status-ditolak   { border-left: 3px solid #C0392B; }
.sikesat-table tr.status-void      { opacity: 0.6; text-decoration: line-through; }
```

### 5.3 Badge Status

```html
<!-- Badge Status — konsisten di seluruh sistem -->
<span class="badge-status badge-status--draft">Draft</span>
<span class="badge-status badge-status--diajukan">Diajukan</span>
<span class="badge-status badge-status--diverifikasi">Diverifikasi</span>
<span class="badge-status badge-status--disetujui">Disetujui</span>
<span class="badge-status badge-status--ditolak">Ditolak</span>
<span class="badge-status badge-status--posted">Posted</span>
<span class="badge-status badge-status--void">Void</span>
```

```css
.badge-status {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    padding: 4px 10px;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
    letter-spacing: 0.03em;
}
.badge-status::before { content: '●'; font-size: 0.5rem; }

.badge-status--draft        { background: #EDF2F7; color: #718096; }
.badge-status--diajukan     { background: #DBEAFE; color: #1565C0; }
.badge-status--diverifikasi { background: #FFF3CD; color: #D4860B; }
.badge-status--disetujui    { background: #D4EDDA; color: #1A7F5A; }
.badge-status--ditolak      { background: #F8D7DA; color: #C0392B; }
.badge-status--posted       { background: #E8F5F5; color: #0D6E6E; }
.badge-status--void         { background: #F1F5F9; color: #94A3B8; text-decoration: line-through; }
```

### 5.4 Form Layout

```css
/* Form Card */
.form-card {
    background: #FFFFFF;
    border: 1px solid #E2E8F0;
    border-radius: 10px;
    padding: 24px;
    margin-bottom: 20px;
}
.form-card__title {
    font-family: 'Inter', sans-serif;
    font-size: 1rem;
    font-weight: 600;
    color: #0D6E6E;
    padding-bottom: 12px;
    border-bottom: 2px solid #E8F5F5;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 8px;
}

/* Label wajib */
.form-label.required::after {
    content: ' *';
    color: #C0392B;
}

/* Input styling */
.form-control, .form-select {
    border: 1.5px solid #CBD5E0;
    border-radius: 6px;
    padding: 8px 12px;
    font-size: 0.875rem;
    color: #2D3748;
    transition: border-color 0.15s ease, box-shadow 0.15s ease;
}
.form-control:focus, .form-select:focus {
    border-color: #19A7A7;
    box-shadow: 0 0 0 3px rgba(25, 167, 167, 0.15);
    outline: none;
}
/* Input nominal — monospace */
.form-control.nominal {
    font-family: 'JetBrains Mono', monospace;
    text-align: right;
}
/* Input readonly (untuk field kalkulasi otomatis) */
.form-control[readonly] {
    background: #F7FAFC;
    color: #718096;
    cursor: not-allowed;
}
```

### 5.5 Tombol Aksi

```css
/* Tombol utama — Teal */
.btn-primary-sikesat {
    background: #0D6E6E;
    border: none;
    color: #FFFFFF;
    padding: 8px 20px;
    border-radius: 6px;
    font-size: 0.875rem;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: background 0.2s ease, transform 0.1s ease;
}
.btn-primary-sikesat:hover { background: #0B5C5C; transform: translateY(-1px); }
.btn-primary-sikesat:active { transform: translateY(0); }

/* Tombol aksi di tabel (ikon kecil) */
.btn-action {
    width: 32px;
    height: 32px;
    border-radius: 6px;
    border: 1px solid;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 0.75rem;
    transition: all 0.15s ease;
}
.btn-action-view   { border-color: #1565C0; color: #1565C0; background: #DBEAFE; }
.btn-action-edit   { border-color: #D4860B; color: #D4860B; background: #FFF3CD; }
.btn-action-delete { border-color: #C0392B; color: #C0392B; background: #F8D7DA; }
.btn-action-approve { border-color: #1A7F5A; color: #1A7F5A; background: #D4EDDA; }
.btn-action-print  { border-color: #718096; color: #718096; background: #EDF2F7; }
```

### 5.6 Page Header (Judul Halaman)

```html
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">
            <i class="fas fa-file-invoice"></i>
            Pengeluaran Kas
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Pengeluaran Kas</li>
            </ol>
        </nav>
    </div>
    <div class="page-header__actions">
        <button class="btn-primary-sikesat">
            <i class="fas fa-plus"></i> Tambah Pengeluaran
        </button>
    </div>
</div>
```

```css
.page-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    padding: 20px 24px;
    background: #FFFFFF;
    border-bottom: 1px solid #E2E8F0;
    flex-wrap: wrap;
    gap: 12px;
}
.page-header__title {
    font-family: 'Noto Serif', serif;
    font-size: 1.5rem;
    font-weight: 700;
    color: #0B3D3D;
    display: flex;
    align-items: center;
    gap: 10px;
    margin: 0 0 4px;
}
.page-header__title i {
    color: #0D6E6E;
}
.breadcrumb {
    font-size: 0.8125rem;
    margin: 0;
}
```

---

## 6. ALERT & KONFIRMASI (SweetAlert2)

Semua alert, konfirmasi, dan notifikasi toast **wajib** menggunakan SweetAlert2. Tidak boleh menggunakan `alert()` browser atau Bootstrap modal untuk pesan.

### 6.1 Konfigurasi Global SweetAlert2

```javascript
// resources/js/sweetalert-config.js (include di layout utama)
const Swal = window.Swal;

// Konfigurasi tema SIKESAT
const SikeAlert = {
    // Alert sukses
    sukses: (pesan, callback) => {
        return Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: pesan,
            confirmButtonColor: '#0D6E6E',
            confirmButtonText: 'OK',
            timer: 3000,
            timerProgressBar: true,
        }).then(callback || function(){});
    },

    // Alert error/gagal
    gagal: (pesan) => {
        return Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: pesan,
            confirmButtonColor: '#C0392B',
            confirmButtonText: 'Tutup',
        });
    },

    // Alert peringatan
    peringatan: (pesan) => {
        return Swal.fire({
            icon: 'warning',
            title: 'Perhatian',
            text: pesan,
            confirmButtonColor: '#D4860B',
            confirmButtonText: 'Mengerti',
        });
    },

    // Konfirmasi hapus
    konfirmasiHapus: (namaItem) => {
        return Swal.fire({
            icon: 'warning',
            title: 'Konfirmasi Hapus',
            html: `Apakah Anda yakin ingin menghapus <strong>${namaItem}</strong>?<br>
                   <small class="text-muted">Data yang dihapus tidak dapat dikembalikan.</small>`,
            showCancelButton: true,
            confirmButtonColor: '#C0392B',
            cancelButtonColor: '#718096',
            confirmButtonText: '<i class="fas fa-trash"></i> Ya, Hapus',
            cancelButtonText: 'Batal',
            reverseButtons: true,
        });
    },

    // Konfirmasi aksi penting (approve, posting jurnal)
    konfirmasiAksi: (judul, pesan, tipeAksi) => {
        const warna = { approve: '#1A7F5A', reject: '#C0392B', post: '#0D6E6E', void: '#D4860B' };
        const ikon = { approve: '✅', reject: '❌', post: '📋', void: '🚫' };
        return Swal.fire({
            icon: 'question',
            title: judul,
            html: pesan,
            showCancelButton: true,
            confirmButtonColor: warna[tipeAksi] || '#0D6E6E',
            cancelButtonColor: '#718096',
            confirmButtonText: `${ikon[tipeAksi] || ''} Konfirmasi`,
            cancelButtonText: 'Batal',
            reverseButtons: true,
        });
    },

    // Konfirmasi void transaksi (wajib isi alasan)
    konfirmasiVoid: (noBukti) => {
        return Swal.fire({
            icon: 'warning',
            title: 'Void Transaksi',
            html: `
                <p>Transaksi <strong>${noBukti}</strong> akan dibatalkan (void).</p>
                <div class="text-start mt-3">
                    <label class="form-label">Alasan Void <span class="text-danger">*</span></label>
                    <textarea id="alasan-void" class="form-control swal2-input" 
                              placeholder="Jelaskan alasan pembatalan..." rows="3"
                              style="height:auto;"></textarea>
                </div>
            `,
            showCancelButton: true,
            confirmButtonColor: '#C0392B',
            cancelButtonColor: '#718096',
            confirmButtonText: 'Void Transaksi',
            cancelButtonText: 'Batal',
            reverseButtons: true,
            preConfirm: () => {
                const alasan = document.getElementById('alasan-void').value.trim();
                if (!alasan) {
                    Swal.showValidationMessage('Alasan void wajib diisi.');
                    return false;
                }
                return alasan;
            }
        });
    },

    // Toast notifikasi (pojok kanan atas)
    toast: (pesan, jenis = 'success') => {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3500,
            timerProgressBar: true,
        });
        return Toast.fire({ icon: jenis, title: pesan });
    },

    // Loading state
    loading: (pesan = 'Memproses...') => {
        Swal.fire({
            title: pesan,
            allowOutsideClick: false,
            allowEscapeKey: false,
            didOpen: () => { Swal.showLoading(); }
        });
    },

    // Tutup SweetAlert
    tutup: () => Swal.close(),
};

window.SikeAlert = SikeAlert;
```

### 6.2 Penggunaan di Blade

```php
{{-- Setelah redirect dengan session flash --}}
@if(session('sukses'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        SikeAlert.sukses('{{ session('sukses') }}');
    });
</script>
@endif

@if(session('gagal'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        SikeAlert.gagal('{{ session('gagal') }}');
    });
</script>
@endif

@if($errors->any())
<script>
    document.addEventListener('DOMContentLoaded', function() {
        SikeAlert.gagal('Terdapat kesalahan pada formulir. Silakan periksa kembali.');
    });
</script>
@endif
```

### 6.3 Konfirmasi Hapus di Tombol

```html
<button type="button" 
        class="btn-action btn-action-delete"
        onclick="konfirmasiHapus({{ $item->id }}, '{{ $item->nama }}')">
    <i class="fas fa-trash"></i>
</button>

<script>
function konfirmasiHapus(id, nama) {
    SikeAlert.konfirmasiHapus(nama).then((result) => {
        if (result.isConfirmed) {
            SikeAlert.loading('Menghapus data...');
            fetch(`/master/pegawai/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json'
                }
            })
            .then(res => res.json())
            .then(data => {
                SikeAlert.tutup();
                if (data.success) {
                    SikeAlert.sukses(data.message, () => location.reload());
                } else {
                    SikeAlert.gagal(data.message);
                }
            })
            .catch(() => {
                SikeAlert.tutup();
                SikeAlert.gagal('Terjadi kesalahan sistem. Silakan coba lagi.');
            });
        }
    });
}
</script>
```

---

## 7. LAYOUT HALAMAN PER JENIS

### 7.1 Halaman Login

```
┌────────────────────────────────────────────────────────────┐
│         BACKGROUND: Gradient #0B3D3D → #0D6E6E             │
│                                                            │
│    ┌──────────────────────────────────────┐                │
│    │  [Logo Puskesmas]                    │                │
│    │  SIKESAT                             │                │
│    │  Sistem Informasi Keuangan           │                │
│    │  Kesehatan Terpadu                   │                │
│    │  ────────────────────────────────    │                │
│    │  Email / Username                    │                │
│    │  [____________________________]      │                │
│    │  Password                            │                │
│    │  [____________________________] 👁   │                │
│    │                                      │                │
│    │  [    Masuk ke Sistem    ]           │                │
│    │                                      │                │
│    │  Lupa password? Hubungi Admin        │                │
│    │  ────────────────────────────────    │                │
│    │  © 2025 Puskesmas [Nama]. SIKESAT   │                │
│    └──────────────────────────────────────┘                │
└────────────────────────────────────────────────────────────┘
```

```css
.login-wrapper {
    min-height: 100vh;
    background: linear-gradient(135deg, #0B3D3D 0%, #0D6E6E 60%, #19A7A7 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
}
.login-card {
    background: #FFFFFF;
    border-radius: 16px;
    padding: 40px;
    width: 100%;
    max-width: 420px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
}
.login-logo {
    text-align: center;
    margin-bottom: 24px;
}
.login-logo img {
    height: 72px;
    margin-bottom: 12px;
}
.login-title {
    font-family: 'Noto Serif', serif;
    font-size: 1.5rem;
    font-weight: 700;
    color: #0B3D3D;
    text-align: center;
}
.login-subtitle {
    font-size: 0.875rem;
    color: #718096;
    text-align: center;
    margin-bottom: 28px;
}
```

### 7.2 Halaman Dashboard Eksekutif

```
┌──────────────────────────────────────────────────────────────────┐
│ Selamat datang, [Nama] | Kamis, 15 Januari 2025 | Tahun 2025    │
├──────────────────────────────────────────────────────────────────┤
│ FILTER: [Tahun Anggaran ▼] [Periode ▼] [Unit ▼] [Terapkan]     │
├──────────────────────────────────────────────────────────────────┤
│ ┌──────────────┐ ┌──────────────┐ ┌──────────────┐ ┌──────────┐│
│ │ 💰 Pendapatan│ │ 💸 Pengeluar.│ │ 💵 Sisa Kas  │ │ 👥 Kunjg.││
│ │ Rp 1,25 M   │ │ Rp 980 jt   │ │ Rp 270 jt   │ │ 1.240    ││
│ │ ▲ 12% YoY   │ │ 78% pagu    │ │ Aman         │ │ Bln ini  ││
│ │ ████░░ 78%  │ │ ████░░ 78%  │ │              │ │ ▲ 8%     ││
│ └──────────────┘ └──────────────┘ └──────────────┘ └──────────┘│
├─────────────────────────────────┬────────────────────────────────┤
│ TREND PENDAPATAN vs PENGELUARAN │ KOMPOSISI PENGELUARAN          │
│ [Line Chart — 12 bulan]         │ [Doughnut Chart]               │
│                                 │                                │
├─────────────────────────────────┼────────────────────────────────┤
│ REALISASI PER SUMBER DANA       │ CAPAIAN INDIKATOR MUTU         │
│ [Stacked Bar Chart]             │ [Traffic Light per Unit]       │
│                                 │                                │
├─────────────────────────────────┴────────────────────────────────┤
│ PENGAJUAN MENUNGGU PERSETUJUAN  │ STOK KRITIS OBAT & ALKES      │
│ [List dengan badge status]      │ [Progress bar merah]           │
└──────────────────────────────────┴────────────────────────────────┘
```

### 7.3 Halaman Daftar (Index) — Template Universal

```
Page Header: [Judul] [Tombol Tambah]
─────────────────────────────────────────────
Filter Row: [Cari...] [Filter Status ▼] [Filter Periode] [Export Excel] [Export PDF]
─────────────────────────────────────────────
┌────────────────────────────────────────────────────────────┐
│ No Bukti      │ Tanggal  │ Jumlah    │ Status    │ Aksi    │
├────────────────────────────────────────────────────────────┤
│ TRP-202501-.. │ 15 Jan.. │ Rp 500rb  │ ● Posted  │ 👁 ✏️ 🗑 │
│ TRP-202501-.. │ 14 Jan.. │ Rp 1,2jt  │ ● Draft   │ 👁 ✏️ 🗑 │
└────────────────────────────────────────────────────────────┘
DataTables: [Show 25 ▼] entries        [1] [2] [3] → Next
```

### 7.4 Halaman Form (Create/Edit) — Template Universal

```
Page Header: [Tambah / Edit Nama Modul] [Kembali ke Daftar]
─────────────────────────────────────────────
┌─────────────────────────────────────────┐
│ 📋 Informasi Utama                       │  ← Form Card
│                                          │
│ No. Bukti*    [Auto: TRP-202501-0001]   │
│ Tanggal*      [Flatpickr Date Input]    │
│ Jenis*        [Select2 Dropdown]        │
│                                          │
│ Keterangan    [Textarea]                │
└─────────────────────────────────────────┘

┌─────────────────────────────────────────┐
│ 💵 Rincian Item                          │  ← Form Card dengan baris dinamis
│                                          │
│ [+ Tambah Baris]                        │
│ ┌──────┬──────────┬──────┬──────┬───┐   │
│ │ No   │ Akun     │ Urai.│ Jml  │ X │   │
│ │ 1    │ [select] │ [...] │ [..] │ 🗑│   │
│ │ 2    │ [select] │ [...] │ [..] │ 🗑│   │
│ └──────┴──────────┴──────┴──────┴───┘   │
│                    TOTAL: Rp 0          │
└─────────────────────────────────────────┘

┌─────────────────────────────────────────┐
│ 📎 Dokumen Pendukung (Opsional)         │  ← Upload section
│ [Drag & Drop atau Klik untuk Upload]   │
│ Format: PDF, JPG, PNG | Maks: 5MB      │
└─────────────────────────────────────────┘

[ Simpan Draft ]  [ Simpan & Ajukan ]    ← Tombol aksi kontekstual
```

### 7.5 Halaman Detail / View

```
Page Header: [No Bukti] — [Status Badge] [Tombol aksi: Edit | Print | Approve | Void]
─────────────────────────────────────────────
Timeline Workflow:
○ Draft  →  ○ Diajukan  →  ● Diverifikasi  →  ○ Disetujui  →  ○ Dibayar
(visual progress step dengan tanggal & nama petugas)
─────────────────────────────────────────────
┌─────────────────────┬──────────────────────┐
│ Informasi Utama     │ Informasi Alur        │
│ No: TRP-202501-0001 │ Dibuat: 15 Jan 2025  │
│ Tanggal: 15/01/2025 │ Oleh: Ahmad S.       │
│ Jenis: Kapitasi BPJS│ Diverifikasi: 16 Jan │
│ Jumlah: Rp 1.250.000│ Oleh: Siti R. (PPK)  │
└─────────────────────┴──────────────────────┘
─────────────────────────────────────────────
┌─────────────────────────────────────────────┐
│ Rincian Detail                              │
│ Akun          │ Keterangan   │ Jumlah       │
│ 4.1.1.01      │ Kapitasi…    │ Rp 1.250.000 │
│ ─────────────────────────────────────────  │
│                              Total: Rp 1,25jt│
└─────────────────────────────────────────────┘
─────────────────────────────────────────────
┌─────────────────────────────────────────────┐
│ Jurnal Akuntansi Terkait                   │ ← Hanya terlihat oleh akuntansi
│ JRN-202501-0050                            │
│ Dr. 1.1.1.01 Kas di Bendahara  1.250.000  │
│    Cr. 4.1.1.01 Pend. Kapitasi 1.250.000  │
└─────────────────────────────────────────────┘
```

### 7.6 Halaman Laporan Keuangan

```
┌─────────────────────────────────────────────────────────┐
│ FILTER LAPORAN                                           │
│ Jenis: [LRA ▼]  Periode: [Jan 2025 - Jan 2025]         │
│ Unit: [Semua ▼]  Sumber Dana: [Semua ▼]                 │
│ [ Generate Laporan ] [ Export PDF ] [ Export Excel ]    │
└─────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────┐
│        LAPORAN REALISASI ANGGARAN (LRA)                 │
│         PUSKESMAS [NAMA]                                │
│         TAHUN ANGGARAN 2025                             │
│         (Per 31 Januari 2025)                           │
│─────────────────────────────────────────────────────────│
│ KODE    │ URAIAN         │ ANGGARAN   │ REALISASI │ %   │
│─────────────────────────────────────────────────────────│
│ 4       │ PENDAPATAN     │            │           │     │
│ 4.1     │ Pend. BLUD     │ 500.000.000│ 125.000.000│ 25%│
│ 4.1.1   │ Jasa Layanan   │ 300.000.000│  75.000.000│ 25%│
│ ...     │                │            │           │     │
│─────────────────────────────────────────────────────────│
│ 5       │ BELANJA        │            │           │     │
│ ...     │                │            │           │     │
│─────────────────────────────────────────────────────────│
│ Sisa Lebih Anggaran      │            │           │     │
└─────────────────────────────────────────────────────────┘
```

---

## 8. GRAFIK CHART.JS

### 8.1 Konfigurasi Warna Global

```javascript
// resources/js/chart-config.js
const SikeChartColors = {
    teal:     '#0D6E6E',
    tealLight:'#19A7A7',
    hijau:    '#1A7F5A',
    kuning:   '#D4860B',
    merah:    '#C0392B',
    biru:     '#1565C0',
    abu:      '#718096',
    // Palette multi-sumber dana
    sumberDana: ['#0D9488','#4F46E5','#1E40AF','#16A34A','#7C3AED','#6B7280'],
};

// Default global options Chart.js
Chart.defaults.font.family = 'Inter, sans-serif';
Chart.defaults.font.size = 13;
Chart.defaults.color = '#718096';
Chart.defaults.plugins.legend.position = 'bottom';
Chart.defaults.plugins.tooltip.backgroundColor = 'rgba(11, 61, 61, 0.9)';
Chart.defaults.plugins.tooltip.padding = 12;
Chart.defaults.plugins.tooltip.cornerRadius = 8;
Chart.defaults.plugins.tooltip.titleFont = { weight: '600' };
```

### 8.2 Contoh Grafik Realisasi Anggaran (Bar Chart)

```javascript
new Chart(document.getElementById('chartRealisasi'), {
    type: 'bar',
    data: {
        labels: ['BPJS Kapitasi', 'BOK', 'APBD', 'PAD', 'Hibah'],
        datasets: [
            {
                label: 'Pagu Anggaran',
                data: [500000000, 300000000, 200000000, 150000000, 50000000],
                backgroundColor: 'rgba(13, 110, 110, 0.15)',
                borderColor: '#0D6E6E',
                borderWidth: 2,
                borderRadius: 4,
            },
            {
                label: 'Realisasi',
                data: [380000000, 210000000, 180000000, 90000000, 35000000],
                backgroundColor: '#0D6E6E',
                borderColor: '#0D6E6E',
                borderWidth: 0,
                borderRadius: 4,
            }
        ]
    },
    options: {
        responsive: true,
        plugins: {
            tooltip: {
                callbacks: {
                    label: (ctx) => `${ctx.dataset.label}: Rp ${ctx.raw.toLocaleString('id-ID')}`
                }
            }
        },
        scales: {
            y: {
                ticks: {
                    callback: (val) => 'Rp ' + (val/1000000).toFixed(0) + 'jt'
                },
                grid: { color: '#EDF2F7' }
            },
            x: { grid: { display: false } }
        }
    }
});
```

### 8.3 Grafik Traffic Light Mutu Layanan

```html
<!-- Traffic light per unit -->
<div class="mutu-grid">
    @foreach($units as $unit)
    <div class="mutu-card mutu-card--{{ $unit->status_mutu }}">
        <div class="mutu-card__lamp"></div>
        <div class="mutu-card__name">{{ $unit->nama }}</div>
        <div class="mutu-card__score">{{ $unit->capaian }}%</div>
        <div class="mutu-card__label">{{ $unit->label_mutu }}</div>
    </div>
    @endforeach
</div>
```

```css
.mutu-card {
    background: #FFFFFF;
    border: 1px solid #E2E8F0;
    border-radius: 10px;
    padding: 16px;
    text-align: center;
    position: relative;
    overflow: hidden;
}
.mutu-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 4px;
}
.mutu-card--hijau::before  { background: #1A7F5A; }
.mutu-card--kuning::before { background: #D4860B; }
.mutu-card--merah::before  { background: #C0392B; }

.mutu-card__lamp {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    margin: 0 auto 8px;
}
.mutu-card--hijau  .mutu-card__lamp { background: #1A7F5A; box-shadow: 0 0 8px #1A7F5A; }
.mutu-card--kuning .mutu-card__lamp { background: #D4860B; box-shadow: 0 0 8px #D4860B; }
.mutu-card--merah  .mutu-card__lamp { background: #C0392B; box-shadow: 0 0 8px #C0392B; }
```

---

## 9. RESPONSIF — MOBILE & TABLET

### 9.1 Sidebar Mobile

```css
@media (max-width: 767.98px) {
    /* Sidebar sebagai drawer */
    .sidebar {
        position: fixed;
        top: 0;
        left: -100%;
        width: 280px;
        height: 100vh;
        z-index: 1050;
        transition: left 0.3s ease;
        overflow-y: auto;
    }
    .sidebar.show { left: 0; }
    .sidebar-overlay {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.5);
        z-index: 1040;
    }
    .sidebar-overlay.show { display: block; }

    /* Konten penuh di mobile */
    .main-content { margin-left: 0 !important; padding: 12px; }

    /* KPI cards 2 kolom di mobile */
    .kpi-grid { grid-template-columns: 1fr 1fr; gap: 12px; }

    /* Tabel scroll horizontal */
    .table-responsive { overflow-x: auto; -webkit-overflow-scrolling: touch; }

    /* Tombol aksi di tabel — lebih besar untuk sentuhan */
    .btn-action { width: 38px; height: 38px; }

    /* Form full width di mobile */
    .form-row .col-md-6 { flex: 0 0 100%; max-width: 100%; }

    /* Page header stack vertikal */
    .page-header { flex-direction: column; }
    .page-header__actions { width: 100%; }
    .page-header__actions .btn { width: 100%; }
}

@media (min-width: 768px) and (max-width: 991.98px) {
    /* Sidebar collapsed tablet */
    .sidebar { width: 64px; }
    .sidebar .nav-label,
    .sidebar .nav-text,
    .sidebar .app-name { display: none; }
    .sidebar .nav-link { justify-content: center; padding: 12px; }
    .sidebar .nav-link i { font-size: 1.25rem; }

    /* Tooltip on hover di tablet */
    .sidebar .nav-link { position: relative; }

    .main-content { margin-left: 64px; }
    .kpi-grid { grid-template-columns: repeat(2, 1fr); }
}
```

### 9.2 KPI Grid Responsif

```css
.kpi-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 16px;
    margin-bottom: 20px;
}
@media (max-width: 1199px) { .kpi-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 575px)  { .kpi-grid { grid-template-columns: 1fr 1fr; gap: 10px; } }
```

---

## 10. TEMPLATE LAYOUT BLADE UTAMA

### 10.1 app.blade.php (Ringkasan Struktur)

```html
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') — SIKESAT</title>

    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Noto+Serif:wght@700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Font Awesome 6 --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    {{-- DataTables --}}
    <link href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    {{-- Select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">

    {{-- Flatpickr --}}
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">

    {{-- CSS Kustom SIKESAT --}}
    <link href="{{ asset('css/sikesat.css') }}" rel="stylesheet">

    @stack('styles')
</head>
<body>

{{-- SIDEBAR --}}
<aside class="sidebar" id="sidebar">
    <div class="sidebar__brand">
        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="sidebar__logo">
        <div class="sidebar__brand-text">
            <span class="sidebar__app-name">SIKESAT</span>
            <span class="sidebar__puskesmas">{{ config('app.nama_puskesmas') }}</span>
        </div>
    </div>

    <nav class="sidebar__nav">
        {{-- Menu berdasarkan role --}}
        <ul class="sidebar__menu list-unstyled">
            <li>
                <a href="{{ route('dashboard') }}" 
                   class="sidebar__link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="fas fa-chart-pie sidebar__icon"></i>
                    <span class="sidebar__text">Dashboard</span>
                </a>
            </li>
            {{-- ... dst sesuai role --}}
        </ul>
    </nav>

    <div class="sidebar__footer">
        <div class="sidebar__user">
            <img src="{{ auth()->user()->avatar_url }}" class="sidebar__avatar" alt="">
            <div>
                <div class="sidebar__user-name">{{ auth()->user()->name }}</div>
                <div class="sidebar__user-role">{{ auth()->user()->roles->first()?->name }}</div>
            </div>
        </div>
        <a href="{{ route('logout') }}" 
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
           class="sidebar__logout" title="Keluar">
            <i class="fas fa-sign-out-alt"></i>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</aside>

{{-- OVERLAY MOBILE --}}
<div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

{{-- MAIN CONTENT --}}
<div class="main-wrapper">

    {{-- HEADER ATAS --}}
    <header class="top-header">
        <button class="sidebar-toggle" onclick="toggleSidebar()">
            <i class="fas fa-bars"></i>
        </button>
        <div class="top-header__breadcrumb">
            @yield('breadcrumb')
        </div>
        <div class="top-header__actions">
            {{-- Notifikasi --}}
            <div class="dropdown">
                <button class="top-header__btn" data-bs-toggle="dropdown">
                    <i class="fas fa-bell"></i>
                    @if($notifCount > 0)
                    <span class="notif-badge">{{ $notifCount }}</span>
                    @endif
                </button>
                <div class="dropdown-menu dropdown-menu-end notif-dropdown">
                    {{-- Daftar notifikasi --}}
                </div>
            </div>
            {{-- Profil --}}
            <div class="dropdown">
                <button class="top-header__btn top-header__profile" data-bs-toggle="dropdown">
                    <img src="{{ auth()->user()->avatar_url }}" alt="" class="top-header__avatar">
                    <span class="top-header__name d-none d-md-inline">{{ auth()->user()->name }}</span>
                    <i class="fas fa-chevron-down fa-xs"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i> Profil Saya</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-lock me-2"></i> Ganti Password</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item text-danger" href="#"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt me-2"></i> Keluar
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    {{-- KONTEN HALAMAN --}}
    <main class="main-content">
        @yield('content')
    </main>

</div>{{-- /main-wrapper --}}

{{-- SCRIPTS CDN --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

{{-- Script global SIKESAT --}}
<script src="{{ asset('js/sikesat.js') }}"></script>

{{-- Flash messages --}}
@if(session('sukses'))
<script>document.addEventListener('DOMContentLoaded',()=>SikeAlert.sukses('{{ session('sukses') }}'));</script>
@endif
@if(session('gagal'))
<script>document.addEventListener('DOMContentLoaded',()=>SikeAlert.gagal('{{ session('gagal') }}'));</script>
@endif
@if(session('peringatan'))
<script>document.addEventListener('DOMContentLoaded',()=>SikeAlert.peringatan('{{ session('peringatan') }}'));</script>
@endif

@stack('scripts')
</body>
</html>
```

---

## 11. CSS VARIABEL GLOBAL (public/css/sikesat.css)

```css
/* ==========================================
   SIKESAT — CSS Kustom Utama
   ========================================== */

:root {
    /* Warna Utama */
    --clr-primary:       #0D6E6E;
    --clr-primary-dark:  #0B5C5C;
    --clr-primary-xdark: #0B3D3D;
    --clr-primary-light: #19A7A7;
    --clr-primary-xlight:#E8F5F5;

    /* Warna Status */
    --clr-success:       #1A7F5A;
    --clr-success-light: #D4EDDA;
    --clr-warning:       #D4860B;
    --clr-warning-light: #FFF3CD;
    --clr-danger:        #C0392B;
    --clr-danger-light:  #F8D7DA;
    --clr-info:          #1565C0;
    --clr-info-light:    #DBEAFE;

    /* Warna Netral */
    --clr-text:          #2D3748;
    --clr-text-muted:    #718096;
    --clr-border:        #E2E8F0;
    --clr-bg:            #F7FAFC;
    --clr-white:         #FFFFFF;

    /* Dimensi */
    --sidebar-width:     260px;
    --sidebar-collapsed: 64px;
    --header-height:     64px;

    /* Radius */
    --radius-sm:         4px;
    --radius:            8px;
    --radius-lg:         12px;
    --radius-xl:         16px;

    /* Shadow */
    --shadow-sm:         0 1px 3px rgba(0,0,0,0.08);
    --shadow:            0 2px 8px rgba(0,0,0,0.10);
    --shadow-lg:         0 4px 20px rgba(0,0,0,0.12);
    --shadow-teal:       0 4px 12px rgba(13,110,110,0.15);

    /* Font */
    --font-ui:           'Inter', sans-serif;
    --font-display:      'Noto Serif', serif;
    --font-mono:         'JetBrains Mono', monospace;
}

/* ==========================================
   BASE
   ========================================== */
* { box-sizing: border-box; }

body {
    font-family: var(--font-ui);
    font-size: 0.9375rem;
    color: var(--clr-text);
    background: var(--clr-bg);
    line-height: 1.6;
}

/* ==========================================
   SIDEBAR
   ========================================== */
.sidebar {
    position: fixed;
    top: 0;
    left: 0;
    width: var(--sidebar-width);
    height: 100vh;
    background: var(--clr-primary-xdark);
    display: flex;
    flex-direction: column;
    z-index: 1030;
    overflow: hidden;
    transition: width 0.3s ease;
}

.sidebar__brand {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 0 16px;
    height: var(--header-height);
    background: rgba(0,0,0,0.15);
    flex-shrink: 0;
}

.sidebar__logo { width: 36px; height: 36px; border-radius: 8px; flex-shrink: 0; }

.sidebar__app-name {
    font-family: var(--font-display);
    font-size: 1.125rem;
    font-weight: 700;
    color: #FFFFFF;
    line-height: 1.1;
    letter-spacing: 0.02em;
}

.sidebar__puskesmas {
    font-size: 0.7rem;
    color: rgba(255,255,255,0.6);
    display: block;
    line-height: 1;
}

.sidebar__nav { flex: 1; overflow-y: auto; padding: 12px 0; }
.sidebar__nav::-webkit-scrollbar { width: 4px; }
.sidebar__nav::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.15); border-radius: 2px; }

.sidebar__menu { margin: 0; padding: 0; }

/* Nav Section Label */
.sidebar__section-label {
    padding: 16px 16px 4px;
    font-size: 0.65rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    color: rgba(255,255,255,0.35);
}

.sidebar__link {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px 16px;
    color: rgba(255,255,255,0.75);
    text-decoration: none;
    font-size: 0.875rem;
    font-weight: 500;
    border-radius: 0;
    transition: all 0.15s ease;
    cursor: pointer;
    user-select: none;
}

.sidebar__link:hover {
    background: rgba(255,255,255,0.08);
    color: #FFFFFF;
}

.sidebar__link.active {
    background: var(--clr-primary-xlight);
    color: var(--clr-primary);
    font-weight: 600;
    border-right: 3px solid var(--clr-primary);
}

.sidebar__icon { width: 18px; text-align: center; font-size: 0.9rem; flex-shrink: 0; }

/* Submenu */
.sidebar__submenu {
    list-style: none;
    padding: 0;
    margin: 0;
    background: rgba(0,0,0,0.15);
    display: none;
}
.sidebar__submenu.show { display: block; }

.sidebar__submenu-link {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 8px 16px 8px 44px;
    color: rgba(255,255,255,0.6);
    text-decoration: none;
    font-size: 0.8125rem;
    transition: all 0.15s ease;
}
.sidebar__submenu-link:hover { color: #FFFFFF; background: rgba(255,255,255,0.05); }
.sidebar__submenu-link.active { color: var(--clr-primary-light); font-weight: 600; }

.sidebar__footer {
    padding: 12px 16px;
    border-top: 1px solid rgba(255,255,255,0.1);
    display: flex;
    align-items: center;
    gap: 10px;
    flex-shrink: 0;
}

.sidebar__avatar { width: 32px; height: 32px; border-radius: 50%; border: 2px solid rgba(255,255,255,0.3); }
.sidebar__user-name { font-size: 0.8125rem; font-weight: 600; color: #FFFFFF; line-height: 1.2; }
.sidebar__user-role { font-size: 0.7rem; color: rgba(255,255,255,0.5); }
.sidebar__logout { margin-left: auto; color: rgba(255,255,255,0.5); font-size: 1rem; }
.sidebar__logout:hover { color: #FFFFFF; }

/* ==========================================
   MAIN WRAPPER
   ========================================== */
.main-wrapper {
    margin-left: var(--sidebar-width);
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    transition: margin-left 0.3s ease;
}

/* ==========================================
   TOP HEADER
   ========================================== */
.top-header {
    height: var(--header-height);
    background: var(--clr-white);
    border-bottom: 1px solid var(--clr-border);
    display: flex;
    align-items: center;
    padding: 0 20px;
    gap: 16px;
    position: sticky;
    top: 0;
    z-index: 1020;
}

.sidebar-toggle {
    background: none;
    border: none;
    color: var(--clr-text-muted);
    font-size: 1.1rem;
    padding: 6px;
    border-radius: var(--radius-sm);
    cursor: pointer;
    transition: color 0.15s ease, background 0.15s ease;
}
.sidebar-toggle:hover { color: var(--clr-primary); background: var(--clr-primary-xlight); }

.top-header__breadcrumb { flex: 1; }

.top-header__actions { display: flex; align-items: center; gap: 8px; }

.top-header__btn {
    position: relative;
    background: none;
    border: 1px solid var(--clr-border);
    border-radius: var(--radius);
    width: 38px;
    height: 38px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--clr-text-muted);
    cursor: pointer;
    transition: all 0.15s ease;
}
.top-header__btn:hover { border-color: var(--clr-primary); color: var(--clr-primary); }

.top-header__profile {
    width: auto;
    padding: 4px 10px;
    gap: 8px;
}

.top-header__avatar { width: 28px; height: 28px; border-radius: 50%; }
.top-header__name { font-size: 0.8125rem; font-weight: 500; color: var(--clr-text); }

.notif-badge {
    position: absolute;
    top: -4px;
    right: -4px;
    background: var(--clr-danger);
    color: #FFF;
    font-size: 0.6rem;
    font-weight: 700;
    min-width: 16px;
    height: 16px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0 3px;
}

/* ==========================================
   MAIN CONTENT
   ========================================== */
.main-content { padding: 20px 24px; flex: 1; }

/* ==========================================
   CARD UMUM
   ========================================== */
.card-sikesat {
    background: var(--clr-white);
    border: 1px solid var(--clr-border);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-sm);
    margin-bottom: 20px;
    overflow: hidden;
}

.card-sikesat__header {
    padding: 16px 20px;
    border-bottom: 1px solid var(--clr-border);
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 8px;
}

.card-sikesat__title {
    font-size: 0.9375rem;
    font-weight: 600;
    color: var(--clr-text);
    display: flex;
    align-items: center;
    gap: 8px;
    margin: 0;
}

.card-sikesat__title i { color: var(--clr-primary); }

.card-sikesat__body { padding: 20px; }

/* ==========================================
   WORKFLOW STEP
   ========================================== */
.workflow-steps {
    display: flex;
    align-items: center;
    gap: 0;
    padding: 16px 20px;
    overflow-x: auto;
    white-space: nowrap;
}

.workflow-step {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 4px;
    position: relative;
    min-width: 80px;
}

.workflow-step__circle {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    border: 2px solid var(--clr-border);
    background: var(--clr-white);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.75rem;
    color: var(--clr-text-muted);
    font-weight: 600;
    z-index: 1;
}

.workflow-step.done    .workflow-step__circle { border-color: var(--clr-success); background: var(--clr-success); color: #FFF; }
.workflow-step.active  .workflow-step__circle { border-color: var(--clr-primary); background: var(--clr-primary); color: #FFF; box-shadow: 0 0 0 4px var(--clr-primary-xlight); }
.workflow-step.reject  .workflow-step__circle { border-color: var(--clr-danger);  background: var(--clr-danger);  color: #FFF; }

.workflow-step__label {
    font-size: 0.6875rem;
    font-weight: 500;
    color: var(--clr-text-muted);
    text-align: center;
}

.workflow-step.done   .workflow-step__label { color: var(--clr-success); }
.workflow-step.active .workflow-step__label { color: var(--clr-primary); font-weight: 700; }

.workflow-connector {
    flex: 1;
    height: 2px;
    background: var(--clr-border);
    min-width: 20px;
    margin-bottom: 20px;
}
.workflow-connector.done { background: var(--clr-success); }

/* ==========================================
   PRINT / PDF
   ========================================== */
@media print {
    .sidebar, .top-header, .page-header__actions,
    .btn, .dataTables_filter, .dataTables_length,
    .dataTables_paginate { display: none !important; }

    .main-wrapper { margin-left: 0 !important; }
    .main-content { padding: 0 !important; }

    body { font-size: 12px; color: #000; background: #FFF; }

    .sikesat-table { font-size: 11px; }
    .sikesat-table thead th { background: #0D6E6E !important; color: #FFF !important; -webkit-print-color-adjust: exact; }

    .card-sikesat { border: 1px solid #ccc !important; box-shadow: none !important; }
}
```

---

## 12. PANDUAN WARNA STATUS KEUANGAN

| Kondisi | Warna | Kapan Digunakan |
|---|---|---|
| Realisasi < 50% pagu | Merah `#C0392B` | Serapan rendah / underperform |
| Realisasi 50-80% pagu | Kuning `#D4860B` | Sedang |
| Realisasi 80-100% pagu | Hijau `#1A7F5A` | Normal / on track |
| Realisasi > 100% pagu | Merah gelap + ikon warning | Over budget — tampilkan alert |
| Saldo mencukupi (>3 bulan) | Hijau | |
| Saldo waspada (1-3 bulan) | Kuning | |
| Saldo kritis (<1 bulan) | Merah | Notifikasi otomatis ke KaPus |
| Stok obat > min | Hijau | |
| Stok obat = min | Kuning | Auto notif ke Gudang |
| Stok obat < min | Merah | Auto notif + badge kritis |
| Obat kadaluarsa < 3 bulan | Oranye | Auto notif |

---

## 13. CHECKLIST IMPLEMENTASI UI

- [ ] CDN Bootstrap 5, Font Awesome, SweetAlert2, Chart.js, DataTables, Select2, Flatpickr semua via CDN
- [ ] CSS kustom sikesat.css di `public/css/`
- [ ] Semua alert menggunakan `SikeAlert.*` (tidak ada `alert()` native)
- [ ] Konfirmasi hapus SEMUA menggunakan `SikeAlert.konfirmasiHapus()`
- [ ] Konfirmasi approve/reject menggunakan `SikeAlert.konfirmasiAksi()`
- [ ] Void transaksi menggunakan `SikeAlert.konfirmasiVoid()` dengan field alasan
- [ ] Flash session otomatis tampil SweetAlert setelah redirect
- [ ] Semua tabel menggunakan DataTables (search, pagination, sort otomatis)
- [ ] Semua dropdown panjang menggunakan Select2
- [ ] Semua input tanggal menggunakan Flatpickr
- [ ] Semua input nominal menggunakan `font-mono`, rata kanan, format Rupiah
- [ ] Badge status konsisten menggunakan class `.badge-status--*`
- [ ] Color row tabel berdasarkan status menggunakan `.status-*`
- [ ] Responsive diuji di: Mobile 375px, Tablet 768px, Desktop 1280px
- [ ] Sidebar mobile berfungsi sebagai drawer
- [ ] Print CSS aktif untuk halaman laporan & detail transaksi
- [ ] Semua grafik Chart.js menggunakan `SikeChartColors` global
- [ ] Loading state dengan `SikeAlert.loading()` saat AJAX
- [ ] Validasi form error ditampilkan di bawah field (Bootstrap `invalid-feedback`)
