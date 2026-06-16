# rule-sikesat.md
# SIKESAT — Sistem Informasi Keuangan Kesehatan Terpadu
## Blueprint Aturan Sistem & Arsitektur Aplikasi

---

## 1. IDENTITAS SISTEM

| Atribut | Nilai |
|---|---|
| Nama Sistem | SIKESAT (Sistem Informasi Keuangan Kesehatan Terpadu) |
| Jenis Instansi | Puskesmas / BLUD (Badan Layanan Umum Daerah) |
| Framework Backend | Laravel 12 |
| Bahasa Pemrograman | PHP 8.3+ |
| Database | MySQL 8.0+ |
| Standar Akuntansi | PP No. 71 Tahun 2010 (SAP Akrual), Permendagri No. 79 Tahun 2018 (BLUD) |
| Standar Pelaporan | SAP Berbasis Akrual, PSAP (Pernyataan Standar Akuntansi Pemerintahan) |
| Bahasa Antarmuka | Bahasa Indonesia |
| Timezone Default | WIB (Asia/Jakarta) |

---

## 2. TECH STACK

### 2.1 Backend
```
Laravel 12
PHP 8.3+
MySQL 8.0+
Laravel Sanctum (autentikasi session-based)
Laravel Scheduler (cron job otomasi jurnal & laporan)
Laravel Queue (background job untuk proses berat)
Laravel Excel (Maatwebsite/Laravel-Excel) — ekspor Excel
DomPDF / Laravel-DOMPDF — cetak laporan PDF
Spatie Laravel Permission — RBAC (Role & Permission)
Spatie Laravel Activity Log — Audit Trail
Carbon — manipulasi tanggal
```

### 2.2 Frontend
```
Bootstrap 5 (CDN)
SweetAlert2 (CDN)
Font Awesome 6 (CDN)
Chart.js (CDN) — grafik dashboard
Select2 (CDN) — dropdown searchable
Flatpickr (CDN) — date picker
DataTables (CDN) — tabel interaktif dengan search & pagination
Alpine.js (CDN) — reaktivitas ringan tanpa build step
```

### 2.3 CDN Links (Wajib digunakan, tidak boleh di-install lokal)
```html
<!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Font Awesome 6 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>

<!-- DataTables -->
<link href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>

<!-- Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- Flatpickr -->
<link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<!-- Alpine.js -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<!-- jQuery (dibutuhkan DataTables & Select2) -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
```

---

## 3. STRUKTUR ROLE & HAK AKSES

### 3.1 Daftar Role

| No | Role | Kode | Deskripsi |
|---|---|---|---|
| 1 | Super Admin | `super_admin` | Pengelola penuh sistem |
| 2 | Kepala Puskesmas | `kepala_puskesmas` | Pengambil keputusan strategis |
| 3 | Pejabat Keuangan (PPK-BLUD) | `ppk_blud` | Verifikasi & persetujuan keuangan |
| 4 | Bendahara Penerimaan | `bendahara_penerimaan` | Input pendapatan & penerimaan |
| 5 | Bendahara Pengeluaran | `bendahara_pengeluaran` | Input pengeluaran & pembayaran |
| 6 | Staf Akuntansi | `staf_akuntansi` | Jurnal, buku besar, rekonsiliasi |
| 7 | Petugas Gudang Farmasi | `petugas_gudang` | Manajemen stok obat & alkes |
| 8 | Unit Pengadaan | `unit_pengadaan` | Pengajuan pembelian |
| 9 | Auditor Internal | `auditor_internal` | Read-only semua laporan |
| 10 | Petugas Pelayanan | `petugas_pelayanan` | View status kebutuhan unit |

### 3.2 Matrix Hak Akses Per Modul

| Modul | SA | KP | PPK | BP | BPeng | SA | PG | UP | AI | PP |
|---|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|
| Master Data | CRUD | R | R | R | R | R | R | R | R | R |
| Manajemen Pengguna | CRUD | — | — | — | — | — | — | — | — | — |
| Perencanaan Anggaran (RKA/RBA) | CRUD | Approve | CRU | — | — | R | — | C | R | — |
| Penerimaan Kas | CRUD | R | V | CRUD | — | R | — | — | R | — |
| Pengeluaran Kas | CRUD | R | V,A | — | CRUD | R | — | — | R | — |
| Pengajuan Pengadaan | CRUD | R | V,A | — | — | R | R | CRUD | R | R |
| Akuntansi & Jurnal | CRUD | R | V,A | — | — | CRUD | — | — | R | — |
| Persediaan Obat & Alkes | CRUD | R | R | — | — | R | CRUD | R | R | R |
| Manajemen Aset | CRUD | R | V | — | — | R | — | R | R | — |
| Monitoring Mutu Layanan | CRUD | R | R | — | — | R | — | — | R | CRUD |
| Dashboard Eksekutif | R | R | R | R | R | R | — | — | R | — |
| Audit Log | R | — | — | — | — | — | — | — | R | — |
| Konfigurasi Sistem | CRUD | — | — | — | — | — | — | — | — | — |

**Keterangan:** `SA` = Super Admin, `KP` = Kepala Puskesmas, `PPK` = PPK-BLUD, `BP` = Bendahara Penerimaan, `BPeng` = Bendahara Pengeluaran, `SA` = Staf Akuntansi, `PG` = Petugas Gudang, `UP` = Unit Pengadaan, `AI` = Auditor Internal, `PP` = Petugas Pelayanan. `C` = Create, `R` = Read, `U` = Update, `D` = Delete, `V` = Verify, `A` = Approve.

---

## 4. STRUKTUR DATABASE

### 4.1 Tabel Autentikasi & Manajemen Pengguna

```sql
-- users
CREATE TABLE users (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    nip VARCHAR(30) UNIQUE NULL COMMENT 'Nomor Induk Pegawai',
    jabatan VARCHAR(100) NULL,
    unit_id BIGINT UNSIGNED NULL,
    foto VARCHAR(255) NULL,
    is_active TINYINT DEFAULT 1,
    last_login_at TIMESTAMP NULL,
    remember_token VARCHAR(100) NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    deleted_at TIMESTAMP NULL COMMENT 'Soft delete'
);

-- model_has_roles (Spatie Permission)
-- model_has_permissions (Spatie Permission)
-- roles, permissions (Spatie Permission)
```

### 4.2 Master Data

```sql
-- unit_pelayanans
CREATE TABLE unit_pelayanans (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    kode VARCHAR(20) UNIQUE NOT NULL,
    nama VARCHAR(100) NOT NULL,
    jenis ENUM('rawat_jalan','rawat_inap','penunjang','administrasi','farmasi') NOT NULL,
    kepala_unit VARCHAR(100) NULL,
    is_aktif TINYINT DEFAULT 1,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);

-- pegawais
CREATE TABLE pegawais (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    user_id BIGINT UNSIGNED NULL,
    nip VARCHAR(30) UNIQUE NULL,
    nama VARCHAR(100) NOT NULL,
    jenis_kelamin ENUM('L','P'),
    tempat_lahir VARCHAR(50) NULL,
    tanggal_lahir DATE NULL,
    alamat TEXT NULL,
    no_telepon VARCHAR(20) NULL,
    jabatan VARCHAR(100) NULL,
    golongan VARCHAR(10) NULL,
    jenis_pegawai ENUM('PNS','PPPK','Kontrak','Honorer') DEFAULT 'PNS',
    unit_id BIGINT UNSIGNED NULL,
    tanggal_masuk DATE NULL,
    status_aktif TINYINT DEFAULT 1,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    deleted_at TIMESTAMP NULL
);

-- akun_akungtansls (Chart of Account)
CREATE TABLE akun_akuntansis (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    kode_akun VARCHAR(20) UNIQUE NOT NULL,
    nama_akun VARCHAR(150) NOT NULL,
    jenis_akun ENUM('aset','kewajiban','ekuitas','pendapatan','beban') NOT NULL,
    kelompok_akun ENUM('aset_lancar','aset_tetap','aset_lainnya','kewajiban_jangka_pendek','kewajiban_jangka_panjang','ekuitas','pendapatan_lra','pendapatan_lo','beban') NOT NULL,
    akun_induk_id BIGINT UNSIGNED NULL COMMENT 'Self-referencing untuk hierarki COA',
    level TINYINT DEFAULT 1 COMMENT '1=Kelompok, 2=Jenis, 3=Objek, 4=Rincian',
    saldo_normal ENUM('debit','kredit') NOT NULL,
    is_aktif TINYINT DEFAULT 1,
    keterangan TEXT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);

-- sumber_danas
CREATE TABLE sumber_danas (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    kode VARCHAR(20) UNIQUE NOT NULL,
    nama VARCHAR(100) NOT NULL,
    jenis ENUM('APBD','APBN','BPJS_Kapitasi','BPJS_Non_Kapitasi','BOK','Hibah','PAD','Lainnya') NOT NULL,
    tahun_anggaran YEAR NOT NULL,
    total_pagu DECIMAL(15,2) DEFAULT 0,
    keterangan TEXT NULL,
    is_aktif TINYINT DEFAULT 1,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);

-- suppliers
CREATE TABLE suppliers (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    kode VARCHAR(20) UNIQUE NOT NULL,
    nama VARCHAR(100) NOT NULL,
    jenis ENUM('Obat','Alkes','ATK','Makanan','Jasa','Lainnya') NOT NULL,
    alamat TEXT NULL,
    no_telepon VARCHAR(20) NULL,
    email VARCHAR(100) NULL,
    NPWP VARCHAR(30) NULL,
    nama_rekening VARCHAR(100) NULL,
    no_rekening VARCHAR(30) NULL,
    nama_bank VARCHAR(50) NULL,
    is_aktif TINYINT DEFAULT 1,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    deleted_at TIMESTAMP NULL
);

-- pasiens
CREATE TABLE pasiens (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    no_rm VARCHAR(20) UNIQUE NOT NULL COMMENT 'Nomor Rekam Medis',
    nik VARCHAR(20) UNIQUE NULL,
    nama VARCHAR(100) NOT NULL,
    jenis_kelamin ENUM('L','P'),
    tanggal_lahir DATE NULL,
    alamat TEXT NULL,
    no_telepon VARCHAR(20) NULL,
    jenis_pasien ENUM('Umum','BPJS','Gratis') DEFAULT 'Umum',
    no_bpjs VARCHAR(20) NULL COMMENT 'Nomor kartu BPJS',
    faskes_tingkat_satu VARCHAR(100) NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);

-- aset_kategoris
CREATE TABLE aset_kategoris (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    kode VARCHAR(20) UNIQUE NOT NULL,
    nama VARCHAR(100) NOT NULL,
    jenis ENUM('Tanah','Gedung','Peralatan','Kendaraan','Aset_Lainnya') NOT NULL,
    masa_manfaat_tahun INT DEFAULT 0 COMMENT '0 = tidak disusutkan (tanah)',
    tarif_penyusutan DECIMAL(5,2) DEFAULT 0 COMMENT 'Dalam persen per tahun',
    akun_perolehan_id BIGINT UNSIGNED NULL,
    akun_penyusutan_id BIGINT UNSIGNED NULL,
    akun_akumulasi_id BIGINT UNSIGNED NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
```

### 4.3 Perencanaan Anggaran

```sql
-- tahun_anggarans
CREATE TABLE tahun_anggarans (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    tahun YEAR UNIQUE NOT NULL,
    status ENUM('draft','aktif','tutup') DEFAULT 'draft',
    tanggal_mulai DATE NULL,
    tanggal_selesai DATE NULL,
    catatan TEXT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);

-- rencana_kegiatan_anggarans (RKA)
CREATE TABLE rencana_kegiatan_anggarans (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    tahun_anggaran_id BIGINT UNSIGNED NOT NULL,
    unit_id BIGINT UNSIGNED NOT NULL,
    sumber_dana_id BIGINT UNSIGNED NOT NULL,
    kode_kegiatan VARCHAR(30) NOT NULL,
    nama_kegiatan VARCHAR(200) NOT NULL,
    tujuan TEXT NULL,
    sasaran TEXT NULL,
    target_kuantitas DECIMAL(10,2) NULL,
    satuan_target VARCHAR(50) NULL,
    total_pagu DECIMAL(15,2) DEFAULT 0,
    status ENUM('draft','diajukan','diverifikasi','disetujui','ditolak') DEFAULT 'draft',
    diajukan_oleh BIGINT UNSIGNED NULL,
    diajukan_at TIMESTAMP NULL,
    diverifikasi_oleh BIGINT UNSIGNED NULL,
    diverifikasi_at TIMESTAMP NULL,
    disetujui_oleh BIGINT UNSIGNED NULL,
    disetujui_at TIMESTAMP NULL,
    catatan_revisi TEXT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);

-- rka_rinciians (Rincian RKA per akun)
CREATE TABLE rka_rincians (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    rka_id BIGINT UNSIGNED NOT NULL,
    akun_id BIGINT UNSIGNED NOT NULL,
    uraian TEXT NOT NULL,
    volume DECIMAL(10,2) DEFAULT 1,
    satuan VARCHAR(50) NULL,
    harga_satuan DECIMAL(15,2) DEFAULT 0,
    total DECIMAL(15,2) DEFAULT 0 COMMENT 'volume * harga_satuan',
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);

-- rencana_bisnis_anggarans (RBA)
CREATE TABLE rencana_bisnis_anggarans (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    tahun_anggaran_id BIGINT UNSIGNED NOT NULL,
    unit_id BIGINT UNSIGNED NULL,
    jenis ENUM('pendapatan','belanja') NOT NULL,
    akun_id BIGINT UNSIGNED NOT NULL,
    sumber_dana_id BIGINT UNSIGNED NOT NULL,
    target_triwulan_1 DECIMAL(15,2) DEFAULT 0,
    target_triwulan_2 DECIMAL(15,2) DEFAULT 0,
    target_triwulan_3 DECIMAL(15,2) DEFAULT 0,
    target_triwulan_4 DECIMAL(15,2) DEFAULT 0,
    total_target DECIMAL(15,2) DEFAULT 0,
    status ENUM('draft','diajukan','disetujui','ditolak') DEFAULT 'draft',
    disetujui_oleh BIGINT UNSIGNED NULL,
    disetujui_at TIMESTAMP NULL,
    catatan TEXT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
```

### 4.4 Transaksi Penerimaan

```sql
-- penerimaan_kass (Header)
CREATE TABLE penerimaan_kass (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    no_bukti VARCHAR(30) UNIQUE NOT NULL COMMENT 'Format: TRP-YYYYMM-XXXX',
    tanggal DATE NOT NULL,
    jenis_penerimaan ENUM('Layanan_Umum','BPJS_Kapitasi','BPJS_Non_Kapitasi','BOK','Hibah','APBD','Lainnya') NOT NULL,
    sumber_dana_id BIGINT UNSIGNED NULL,
    unit_id BIGINT UNSIGNED NULL,
    pasien_id BIGINT UNSIGNED NULL,
    jumlah DECIMAL(15,2) NOT NULL,
    metode_pembayaran ENUM('Tunai','Transfer','QRIS') DEFAULT 'Tunai',
    no_referensi VARCHAR(50) NULL COMMENT 'No. referensi transfer/QRIS',
    keterangan TEXT NULL,
    status ENUM('draft','posted','void') DEFAULT 'draft',
    status_jurnal ENUM('belum','sudah') DEFAULT 'belum',
    input_oleh BIGINT UNSIGNED NOT NULL,
    diverifikasi_oleh BIGINT UNSIGNED NULL,
    diverifikasi_at TIMESTAMP NULL,
    void_oleh BIGINT UNSIGNED NULL,
    void_at TIMESTAMP NULL,
    alasan_void TEXT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);

-- penerimaan_kas_details
CREATE TABLE penerimaan_kas_details (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    penerimaan_id BIGINT UNSIGNED NOT NULL,
    akun_id BIGINT UNSIGNED NOT NULL,
    jenis_layanan VARCHAR(100) NULL,
    jumlah DECIMAL(15,2) NOT NULL,
    keterangan TEXT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);

-- kapitasi_bpjss (Khusus pencatatan kapitasi bulanan)
CREATE TABLE kapitasi_bpjss (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    penerimaan_id BIGINT UNSIGNED NULL,
    bulan TINYINT NOT NULL,
    tahun YEAR NOT NULL,
    jumlah_peserta INT DEFAULT 0,
    tarif_per_peserta DECIMAL(10,2) DEFAULT 0,
    total_kapitasi DECIMAL(15,2) DEFAULT 0,
    tanggal_terima DATE NULL,
    no_spm VARCHAR(50) NULL COMMENT 'Nomor Surat Perintah Membayar BPJS',
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    UNIQUE KEY unique_kapitasi (bulan, tahun)
);
```

### 4.5 Transaksi Pengeluaran & Pengadaan

```sql
-- pengajuan_pengadaans (SPP/SPM internal)
CREATE TABLE pengajuan_pengadaans (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    no_pengajuan VARCHAR(30) UNIQUE NOT NULL COMMENT 'Format: PA-YYYYMM-XXXX',
    tanggal_pengajuan DATE NOT NULL,
    unit_id BIGINT UNSIGNED NOT NULL,
    rka_id BIGINT UNSIGNED NULL COMMENT 'Mengacu ke RKA tertentu',
    jenis_pengadaan ENUM('Obat','Alkes','ATK','Operasional','Pemeliharaan','Jasa','Lainnya') NOT NULL,
    prioritas ENUM('rendah','sedang','tinggi','urgent') DEFAULT 'sedang',
    deskripsi TEXT NOT NULL,
    total_estimasi DECIMAL(15,2) DEFAULT 0,
    status ENUM('draft','diajukan','diverifikasi','disetujui','proses_pengadaan','selesai','ditolak') DEFAULT 'draft',
    diajukan_oleh BIGINT UNSIGNED NOT NULL,
    diverifikasi_oleh BIGINT UNSIGNED NULL,
    diverifikasi_at TIMESTAMP NULL,
    disetujui_oleh BIGINT UNSIGNED NULL,
    disetujui_at TIMESTAMP NULL,
    catatan TEXT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);

-- pengajuan_pengadaan_items
CREATE TABLE pengajuan_pengadaan_items (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    pengajuan_id BIGINT UNSIGNED NOT NULL,
    nama_barang VARCHAR(200) NOT NULL,
    spesifikasi TEXT NULL,
    satuan VARCHAR(50) NOT NULL,
    jumlah DECIMAL(10,2) NOT NULL,
    harga_estimasi DECIMAL(15,2) DEFAULT 0,
    subtotal DECIMAL(15,2) DEFAULT 0,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);

-- pengeluaran_kass (Header SPJ/Bukti Pengeluaran)
CREATE TABLE pengeluaran_kass (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    no_bukti VARCHAR(30) UNIQUE NOT NULL COMMENT 'Format: TPK-YYYYMM-XXXX',
    tanggal DATE NOT NULL,
    pengajuan_id BIGINT UNSIGNED NULL,
    supplier_id BIGINT UNSIGNED NULL,
    jenis_pengeluaran ENUM('Obat','Alkes','ATK','Operasional','Pemeliharaan','Jasa_Pegawai','Lainnya') NOT NULL,
    sumber_dana_id BIGINT UNSIGNED NOT NULL,
    rka_id BIGINT UNSIGNED NULL,
    no_spd VARCHAR(50) NULL COMMENT 'Nomor SPD untuk pengeluaran APBD',
    no_spm VARCHAR(50) NULL COMMENT 'Nomor SPM',
    no_sp2d VARCHAR(50) NULL COMMENT 'Nomor SP2D',
    metode_pembayaran ENUM('Tunai','Transfer','Giro') DEFAULT 'Transfer',
    no_referensi VARCHAR(50) NULL,
    jumlah_bruto DECIMAL(15,2) NOT NULL,
    pajak_ppn DECIMAL(15,2) DEFAULT 0,
    pajak_pph DECIMAL(15,2) DEFAULT 0,
    jumlah_neto DECIMAL(15,2) NOT NULL COMMENT 'bruto - pajak',
    keterangan TEXT NULL,
    no_faktur VARCHAR(50) NULL,
    tanggal_faktur DATE NULL,
    status ENUM('draft','diverifikasi','disetujui','dibayar','void') DEFAULT 'draft',
    status_jurnal ENUM('belum','sudah') DEFAULT 'belum',
    input_oleh BIGINT UNSIGNED NOT NULL,
    diverifikasi_oleh BIGINT UNSIGNED NULL,
    diverifikasi_at TIMESTAMP NULL,
    disetujui_oleh BIGINT UNSIGNED NULL,
    disetujui_at TIMESTAMP NULL,
    dibayar_oleh BIGINT UNSIGNED NULL,
    dibayar_at TIMESTAMP NULL,
    void_oleh BIGINT UNSIGNED NULL,
    void_at TIMESTAMP NULL,
    alasan_void TEXT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);

-- pengeluaran_kas_details
CREATE TABLE pengeluaran_kas_details (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    pengeluaran_id BIGINT UNSIGNED NOT NULL,
    akun_id BIGINT UNSIGNED NOT NULL,
    nama_item VARCHAR(200) NULL,
    satuan VARCHAR(50) NULL,
    jumlah_qty DECIMAL(10,2) DEFAULT 1,
    harga_satuan DECIMAL(15,2) DEFAULT 0,
    subtotal DECIMAL(15,2) NOT NULL,
    keterangan TEXT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
```

### 4.6 Akuntansi & Jurnal

```sql
-- jurnal_umums (Header Jurnal)
CREATE TABLE jurnal_umums (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    no_jurnal VARCHAR(30) UNIQUE NOT NULL COMMENT 'Format: JRN-YYYYMM-XXXX',
    tanggal DATE NOT NULL,
    jenis_jurnal ENUM('umum','penyesuaian','penutup','koreksi','pembuka') DEFAULT 'umum',
    sumber ENUM('penerimaan','pengeluaran','pengadaan','penyesuaian','manual','penutup','pembuka') NOT NULL,
    referensi_id BIGINT UNSIGNED NULL COMMENT 'ID transaksi sumber',
    referensi_tipe VARCHAR(50) NULL COMMENT 'Model class sumber',
    no_bukti_sumber VARCHAR(50) NULL,
    keterangan TEXT NOT NULL,
    total_debit DECIMAL(15,2) DEFAULT 0,
    total_kredit DECIMAL(15,2) DEFAULT 0,
    status ENUM('draft','posted','void') DEFAULT 'draft',
    dibuat_oleh BIGINT UNSIGNED NOT NULL,
    diposting_oleh BIGINT UNSIGNED NULL,
    diposting_at TIMESTAMP NULL,
    void_oleh BIGINT UNSIGNED NULL,
    void_at TIMESTAMP NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);

-- jurnal_details (Baris Debit/Kredit)
CREATE TABLE jurnal_details (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    jurnal_id BIGINT UNSIGNED NOT NULL,
    akun_id BIGINT UNSIGNED NOT NULL,
    posisi ENUM('debit','kredit') NOT NULL,
    jumlah DECIMAL(15,2) NOT NULL,
    keterangan TEXT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);

-- buku_besars (Ledger per akun)
CREATE TABLE buku_besars (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    akun_id BIGINT UNSIGNED NOT NULL,
    jurnal_detail_id BIGINT UNSIGNED NOT NULL,
    tanggal DATE NOT NULL,
    no_jurnal VARCHAR(30) NOT NULL,
    keterangan TEXT NULL,
    debit DECIMAL(15,2) DEFAULT 0,
    kredit DECIMAL(15,2) DEFAULT 0,
    saldo DECIMAL(15,2) DEFAULT 0 COMMENT 'Running balance',
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);

-- neraca_saldos (Trial Balance per periode)
CREATE TABLE neraca_saldos (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    periode_bulan TINYINT NOT NULL,
    periode_tahun YEAR NOT NULL,
    akun_id BIGINT UNSIGNED NOT NULL,
    saldo_awal_debit DECIMAL(15,2) DEFAULT 0,
    saldo_awal_kredit DECIMAL(15,2) DEFAULT 0,
    mutasi_debit DECIMAL(15,2) DEFAULT 0,
    mutasi_kredit DECIMAL(15,2) DEFAULT 0,
    saldo_akhir_debit DECIMAL(15,2) DEFAULT 0,
    saldo_akhir_kredit DECIMAL(15,2) DEFAULT 0,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    UNIQUE KEY unique_neraca (periode_bulan, periode_tahun, akun_id)
);

-- jurnal_penyesuaians
CREATE TABLE jurnal_penyesuaians (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    tahun_anggaran_id BIGINT UNSIGNED NOT NULL,
    tanggal DATE NOT NULL,
    jenis ENUM('akrual_pendapatan','akrual_beban','penyusutan','persediaan','lainnya') NOT NULL,
    keterangan TEXT NOT NULL,
    status ENUM('draft','disetujui','posted') DEFAULT 'draft',
    disetujui_oleh BIGINT UNSIGNED NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
```

### 4.7 Persediaan Obat & Alkes

```sql
-- obat_alkes_kategoris
CREATE TABLE obat_alkes_kategoris (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    kode VARCHAR(20) UNIQUE NOT NULL,
    nama VARCHAR(100) NOT NULL,
    jenis ENUM('Obat','Alkes','BHP','Reagent','Lainnya') NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);

-- obat_alkes (Master Barang)
CREATE TABLE obat_alkes (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    kode_barang VARCHAR(30) UNIQUE NOT NULL,
    nama_generik VARCHAR(150) NOT NULL,
    nama_dagang VARCHAR(150) NULL,
    kategori_id BIGINT UNSIGNED NOT NULL,
    satuan VARCHAR(30) NOT NULL COMMENT 'Tablet, Botol, Ampul, dll',
    satuan_terkecil VARCHAR(30) NULL,
    konversi INT DEFAULT 1 COMMENT 'Misal: 1 Box = 100 Tablet',
    akun_persediaan_id BIGINT UNSIGNED NULL,
    stok_minimum INT DEFAULT 0 COMMENT 'Ambang batas stok menipis',
    stok_maksimum INT DEFAULT 0,
    lokasi_penyimpanan VARCHAR(100) NULL,
    suhu_penyimpanan VARCHAR(50) NULL,
    golongan ENUM('Bebas','Bebas_Terbatas','Keras','Narkotika','Psikotropika','Non_Obat') DEFAULT 'Bebas',
    is_aktif TINYINT DEFAULT 1,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);

-- stok_gudangs (Stok per item per batch)
CREATE TABLE stok_gudangs (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    obat_alkes_id BIGINT UNSIGNED NOT NULL,
    no_batch VARCHAR(50) NULL,
    tanggal_kedaluwarsa DATE NULL,
    jumlah_masuk DECIMAL(10,2) DEFAULT 0,
    jumlah_keluar DECIMAL(10,2) DEFAULT 0,
    stok_tersedia DECIMAL(10,2) DEFAULT 0,
    harga_perolehan DECIMAL(15,2) DEFAULT 0,
    pengeluaran_id BIGINT UNSIGNED NULL COMMENT 'Sumber pembelian',
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);

-- mutasi_stoks (Kartu Stok)
CREATE TABLE mutasi_stoks (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    obat_alkes_id BIGINT UNSIGNED NOT NULL,
    stok_gudang_id BIGINT UNSIGNED NULL,
    tanggal DATE NOT NULL,
    jenis ENUM('masuk','keluar','penyesuaian','retur','kadaluarsa') NOT NULL,
    jumlah DECIMAL(10,2) NOT NULL,
    saldo_sesudah DECIMAL(10,2) NOT NULL,
    sumber ENUM('pengadaan','pelayanan','penyesuaian','retur','kadaluarsa') NOT NULL,
    referensi_id BIGINT UNSIGNED NULL,
    unit_tujuan_id BIGINT UNSIGNED NULL COMMENT 'Unit penerima (untuk distribusi)',
    keterangan TEXT NULL,
    input_oleh BIGINT UNSIGNED NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);

-- distribusi_ke_units (Penyerahan stok dari gudang ke unit)
CREATE TABLE distribusi_ke_units (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    no_distribusi VARCHAR(30) UNIQUE NOT NULL,
    tanggal DATE NOT NULL,
    unit_tujuan_id BIGINT UNSIGNED NOT NULL,
    status ENUM('draft','dikirim','diterima') DEFAULT 'draft',
    dikirim_oleh BIGINT UNSIGNED NULL,
    diterima_oleh BIGINT UNSIGNED NULL,
    catatan TEXT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);

-- distribusi_details
CREATE TABLE distribusi_details (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    distribusi_id BIGINT UNSIGNED NOT NULL,
    obat_alkes_id BIGINT UNSIGNED NOT NULL,
    stok_gudang_id BIGINT UNSIGNED NULL,
    jumlah DECIMAL(10,2) NOT NULL,
    satuan VARCHAR(30) NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
```

### 4.8 Manajemen Aset

```sql
-- asets
CREATE TABLE asets (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    kode_aset VARCHAR(30) UNIQUE NOT NULL COMMENT 'Format: AST-KAT-XXXX',
    nama_aset VARCHAR(150) NOT NULL,
    kategori_id BIGINT UNSIGNED NOT NULL,
    unit_id BIGINT UNSIGNED NULL COMMENT 'Lokasi/penempatan aset',
    pengeluaran_detail_id BIGINT UNSIGNED NULL COMMENT 'Transaksi pengadaan aset',
    tanggal_perolehan DATE NOT NULL,
    nilai_perolehan DECIMAL(15,2) NOT NULL,
    masa_manfaat_tahun INT DEFAULT 0,
    metode_penyusutan ENUM('garis_lurus','saldo_menurun','tidak_disusutkan') DEFAULT 'garis_lurus',
    akumulasi_penyusutan DECIMAL(15,2) DEFAULT 0,
    nilai_buku DECIMAL(15,2) NOT NULL COMMENT 'Nilai perolehan - akumulasi penyusutan',
    kondisi ENUM('Baik','Rusak_Ringan','Rusak_Berat','Hilang','Dihapus') DEFAULT 'Baik',
    no_seri VARCHAR(100) NULL,
    spesifikasi TEXT NULL,
    lokasi_detail VARCHAR(200) NULL,
    status ENUM('Aktif','Tidak_Aktif','Dipinjam','Penghapusan') DEFAULT 'Aktif',
    keterangan TEXT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    deleted_at TIMESTAMP NULL
);

-- penyusutan_asets (Histori penyusutan per periode)
CREATE TABLE penyusutan_asets (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    aset_id BIGINT UNSIGNED NOT NULL,
    periode_bulan TINYINT NOT NULL,
    periode_tahun YEAR NOT NULL,
    nilai_penyusutan DECIMAL(15,2) NOT NULL,
    akumulasi_penyusutan DECIMAL(15,2) NOT NULL,
    nilai_buku_sesudah DECIMAL(15,2) NOT NULL,
    jurnal_id BIGINT UNSIGNED NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    UNIQUE KEY unique_penyusutan (aset_id, periode_bulan, periode_tahun)
);

-- pemeliharaan_asets
CREATE TABLE pemeliharaan_asets (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    aset_id BIGINT UNSIGNED NOT NULL,
    tanggal DATE NOT NULL,
    jenis_pemeliharaan ENUM('rutin','perbaikan','penggantian_spare') NOT NULL,
    biaya DECIMAL(15,2) DEFAULT 0,
    pengeluaran_id BIGINT UNSIGNED NULL,
    kondisi_sebelum ENUM('Baik','Rusak_Ringan','Rusak_Berat') NULL,
    kondisi_sesudah ENUM('Baik','Rusak_Ringan','Rusak_Berat') NULL,
    dilakukan_oleh VARCHAR(100) NULL COMMENT 'Nama teknisi/vendor',
    keterangan TEXT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
```

### 4.9 Monitoring Mutu Layanan

```sql
-- indikator_mutus
CREATE TABLE indikator_mutus (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    kode VARCHAR(20) UNIQUE NOT NULL,
    nama VARCHAR(150) NOT NULL,
    satuan VARCHAR(50) NOT NULL COMMENT 'Menit, Persen, Orang, dll',
    jenis ENUM('waktu_tunggu','kepuasan','kunjungan','ketersediaan_obat','lainnya') NOT NULL,
    target_nilai DECIMAL(10,2) NULL COMMENT 'Nilai target yang ingin dicapai',
    arah_target ENUM('min','max','range') DEFAULT 'max' COMMENT 'min=lebih kecil lebih baik',
    unit_id BIGINT UNSIGNED NULL COMMENT 'Null = berlaku untuk semua unit',
    is_aktif TINYINT DEFAULT 1,
    keterangan TEXT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);

-- realisasi_indikator_mutus (Input bulanan)
CREATE TABLE realisasi_indikator_mutus (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    indikator_id BIGINT UNSIGNED NOT NULL,
    unit_id BIGINT UNSIGNED NULL,
    periode_bulan TINYINT NOT NULL,
    periode_tahun YEAR NOT NULL,
    nilai_realisasi DECIMAL(10,2) NOT NULL,
    nilai_target DECIMAL(10,2) NULL,
    keterangan TEXT NULL,
    input_oleh BIGINT UNSIGNED NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    UNIQUE KEY unique_realisasi (indikator_id, unit_id, periode_bulan, periode_tahun)
);

-- kunjungan_pasiens (Rekap kunjungan per unit per hari)
CREATE TABLE kunjungan_pasiens (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    unit_id BIGINT UNSIGNED NOT NULL,
    tanggal DATE NOT NULL,
    jumlah_kunjungan_umum INT DEFAULT 0,
    jumlah_kunjungan_bpjs INT DEFAULT 0,
    jumlah_kunjungan_gratis INT DEFAULT 0,
    total_kunjungan INT DEFAULT 0,
    rata_waktu_tunggu DECIMAL(5,2) DEFAULT 0 COMMENT 'Dalam menit',
    input_oleh BIGINT UNSIGNED NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    UNIQUE KEY unique_kunjungan (unit_id, tanggal)
);

-- survei_kepuasans
CREATE TABLE survei_kepuasans (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    unit_id BIGINT UNSIGNED NOT NULL,
    periode_bulan TINYINT NOT NULL,
    periode_tahun YEAR NOT NULL,
    jumlah_responden INT DEFAULT 0,
    skor_rata_rata DECIMAL(4,2) DEFAULT 0 COMMENT 'Skala 1-5',
    persentase_puas DECIMAL(5,2) DEFAULT 0,
    keterangan TEXT NULL,
    input_oleh BIGINT UNSIGNED NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    UNIQUE KEY unique_survei (unit_id, periode_bulan, periode_tahun)
);
```

### 4.10 Sistem & Log

```sql
-- audit_logs (Spatie Activity Log + custom)
-- Otomatis dibuat oleh Spatie Activity Log

-- notifikasis
CREATE TABLE notifikasis (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    user_id BIGINT UNSIGNED NOT NULL,
    judul VARCHAR(200) NOT NULL,
    pesan TEXT NOT NULL,
    jenis ENUM('info','sukses','peringatan','bahaya') DEFAULT 'info',
    referensi_modul VARCHAR(50) NULL,
    referensi_id BIGINT UNSIGNED NULL,
    sudah_dibaca TINYINT DEFAULT 0,
    dibaca_at TIMESTAMP NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);

-- konfigurasi_sistemas
CREATE TABLE konfigurasi_sistemas (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    kunci VARCHAR(100) UNIQUE NOT NULL,
    nilai TEXT NULL,
    jenis ENUM('text','number','boolean','json','file') DEFAULT 'text',
    label VARCHAR(150) NULL,
    grup VARCHAR(50) DEFAULT 'umum',
    keterangan TEXT NULL,
    updated_at TIMESTAMP
);

-- periode_tutup_bukus
CREATE TABLE periode_tutup_bukus (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    periode_bulan TINYINT NOT NULL,
    periode_tahun YEAR NOT NULL,
    status ENUM('terbuka','ditutup') DEFAULT 'terbuka',
    ditutup_oleh BIGINT UNSIGNED NULL,
    ditutup_at TIMESTAMP NULL,
    catatan TEXT NULL,
    created_at TIMESTAMP,
    UNIQUE KEY unique_periode (periode_bulan, periode_tahun)
);
```

---

## 5. ALUR SISTEM (BUSINESS PROCESS)

### 5.1 Alur Perencanaan Anggaran (RKA → RBA)

```
Unit Pelayanan                 PPK-BLUD              Kepala Puskesmas
     │                             │                        │
     ├─ Susun kebutuhan anggaran   │                        │
     ├─ Buat draft RKA per kegiatan│                        │
     ├─ Submit RKA ─────────────→  │                        │
     │                             ├─ Review & Verifikasi   │
     │                             ├─ Jika kurang → Kembalikan ke Unit
     │                             ├─ Jika OK → Forward ──→ │
     │                             │                        ├─ Review RKA
     │                             │                        ├─ Approve / Tolak
     │  ←────── Notifikasi ────────┼────────────────────────┤
     │                             │                        │
     │                             ├─ Staf Akuntansi susun RBA dari kumpulan RKA
     │                             ├─ Submit RBA ──────────→│
     │                             │                        ├─ Approve RBA
     │                             ├─ RBA menjadi dasar pagu│
```

### 5.2 Alur Pengadaan & Pengeluaran

```
Unit Pengadaan          PPK-BLUD         Kepala Puskesmas    Bend. Pengeluaran    Gudang Farmasi
     │                     │                    │                    │                  │
     ├─ Buat SPP/Pengajuan  │                    │                    │                  │
     ├─ Submit ──────────→  │                    │                    │                  │
     │                      ├─ Verifikasi        │                    │                  │
     │                      │  - Cek pagu RKA   │                    │                  │
     │                      │  - Cek sumber dana │                    │                  │
     │                      ├─ Teruskan ────────→│                    │                  │
     │                      │                    ├─ Approve/Tolak     │                  │
     │                      │  ←── Approved ─────┤                    │                  │
     │                      │                    │                    │                  │
     │  ←── Notifikasi ─────┤                    │                    │                  │
     │                      │                    │   Bendahara        │                  │
     │                      │                    │   Input Faktur ──→ │                  │
     │                      │                    │                    ├─ Input SPJ        │
     │                      │                    │                    ├─ Verifikasi faktur│
     │                      ├─ Final Verify ────←┤                    │                  │
     │                      │                    │                    │                  │
     │                      │ Sistem otomatis:   │                    │                  │
     │                      │ ✓ Buat Jurnal      │                    │                  │
     │                      │ ✓ Update Buku Besar│                    │                  │
     │                      │ ✓ Kurangi Pagu RKA │                    │                  │
     │                      │                    │   (Jika Obat/Alkes)│                  │
     │                      │                    │                    ├─ Kirim ke Gudang→│
     │                      │                    │                    │                  ├─ Terima barang
     │                      │                    │                    │                  ├─ Update stok
     │                      │                    │                    │                  ├─ Catat batch
```

### 5.3 Alur Penerimaan Kas

```
[Pasien / BPJS / Dana BOK] → Bend. Penerimaan → Input Penerimaan → Submit
                                                                       │
                                              ┌────────────────────────┘
                                              │ PPK-BLUD Verifikasi
                                              │ (Nominal > Rp 5.000.000)
                                              │
                                              ↓
                                         Auto Jurnal:
                                         Dr. Kas/Bank
                                           Cr. Pendapatan Layanan / Kapitasi BPJS
                                         + Update Buku Besar
                                         + Update Neraca Saldo
```

### 5.4 Alur Akuntansi Otomatis

```
Setiap Transaksi (Penerimaan/Pengeluaran)
          │
          ↓
    Event Listener (Laravel Event)
          │
          ↓
    Service: JurnalOtomatisService
          │
          ├─ Identifikasi jenis transaksi
          ├─ Ambil mapping akun dari COA
          ├─ Generate entry jurnal (Debit = Kredit) → validasi balance
          ├─ Simpan jurnal_umums + jurnal_details
          ├─ Update buku_besars (running balance)
          ├─ Tandai status_jurnal = 'sudah'
          │
          ↓
    Staf Akuntansi dapat:
          ├─ Review jurnal otomatis
          ├─ Posting jurnal (ubah status ke 'posted')
          ├─ Koreksi manual jika perlu
          │
          ↓
    Laporan Keuangan (Auto-generate):
          ├─ LRA (Laporan Realisasi Anggaran)
          ├─ LO (Laporan Operasional)
          ├─ Neraca
          ├─ LAK (Laporan Arus Kas)
          └─ CaLK (template)
```

### 5.5 Alur Tutup Buku Bulanan

```
Staf Akuntansi → Cek semua jurnal sudah 'posted' → Jalankan Jurnal Penyesuaian
             → Hitung Penyusutan Aset (scheduler) → Update Neraca Saldo
             → Generate Laporan Bulanan → Submit ke PPK-BLUD
             → PPK-BLUD Approve → Kunci periode (periode_tutup_bukus)
             → Kepala Puskesmas menerima notifikasi laporan keuangan bulanan
```

---

## 6. MODUL DAN FITUR DETAIL

### Modul 1: Master Data
- CRUD pegawai (termasuk impor dari Excel)
- CRUD unit pelayanan
- Manajemen Chart of Account (COA) hierarkis (4 level)
- CRUD sumber dana per tahun anggaran
- CRUD supplier (dengan validasi NPWP)
- CRUD pasien umum & BPJS (dengan pencarian NIK/no BPJS)
- CRUD kategori & data aset
- Impor data awal dari Excel (template tersedia)

### Modul 2: Perencanaan Anggaran
- Penyusunan RKA per unit, per kegiatan, per akun
- Workflow approval RKA (draft → diajukan → diverifikasi → disetujui)
- Penyusunan RBA dari kumpulan RKA yang disetujui
- Setting target kegiatan kuantitatif (output, outcome)
- Monitoring realisasi vs anggaran (grafik waterfall & progress bar)
- Revisi anggaran (pergeseran/penambahan anggaran dengan approval)
- Laporan realisasi anggaran per unit / per sumber dana

### Modul 3: Penerimaan Kas
- Input penerimaan layanan kesehatan per jenis layanan
- Input kapitasi BPJS bulanan (dengan perhitungan otomatis)
- Input penerimaan BOK, Hibah, APBD
- Nomor bukti otomatis
- Validasi: jumlah tidak boleh melebihi target RBA
- Auto-jurnal setelah verifikasi
- Laporan penerimaan harian/bulanan/tahunan
- Rekonsiliasi penerimaan vs saldo bank

### Modul 4: Pengeluaran Kas
- Pengajuan pengadaan oleh unit (SPP internal)
- Input SPJ/bukti pengeluaran dengan upload dokumen
- Penghitungan otomatis pajak PPn & PPh
- Cek ketersediaan pagu RKA sebelum persetujuan
- Workflow SPP → Verifikasi PPK → Persetujuan KaPus → Pembayaran Bendahara
- Auto-jurnal dan pengurangan pagu RKA
- Laporan pengeluaran per jenis, per sumber dana, per unit

### Modul 5: Akuntansi Otomatis
- Jurnal otomatis dari setiap transaksi (Event-Driven)
- Jurnal penyesuaian (akrual, persediaan, penyusutan)
- Jurnal koreksi manual oleh Staf Akuntansi
- Jurnal penutup akhir tahun (auto oleh scheduler)
- Buku besar per akun dengan running balance
- Neraca saldo (trial balance) per periode
- **Laporan Keuangan BLUD berbasis akrual:**
  - LRA (Laporan Realisasi Anggaran) — format SAP
  - LO (Laporan Operasional) — berbasis akrual
  - Neraca — per tanggal
  - LAK (Laporan Arus Kas) — metode tidak langsung
  - LPE (Laporan Perubahan Ekuitas)
- Rekonsiliasi LRA vs LO
- Tutup buku bulanan dan tahunan
- Ekspor semua laporan ke PDF dan Excel

### Modul 6: Persediaan Obat & Alkes
- Master barang (obat & alkes) dengan kode barang
- Penerimaan barang dari pengadaan (auto update stok)
- Kartu stok per item (FIFO/FEFO untuk obat mendekati kedaluwarsa)
- Distribusi ke unit pelayanan
- Retur supplier
- Penyesuaian stok (opname)
- Peringatan stok menipis (≤ stok minimum) — notifikasi otomatis
- Peringatan obat mendekati kedaluwarsa (≤ 3 bulan) — notifikasi otomatis
- Laporan mutasi stok, stok akhir, nilai persediaan
- Penghitungan COGS (Harga Pokok Persediaan) untuk jurnal penyesuaian

### Modul 7: Manajemen Aset
- Registrasi aset dengan kode unik
- Perhitungan penyusutan otomatis (scheduler bulanan)
  - Metode garis lurus: Nilai Perolehan / Masa Manfaat / 12
  - Metode saldo menurun
- Auto-jurnal penyusutan setiap bulan
- Monitoring kondisi aset (Baik/Rusak Ringan/Rusak Berat)
- Pencatatan pemeliharaan & perbaikan
- Proses penghapusan aset (disposal) dengan persetujuan
- Laporan kartu aset, daftar aset, rekapitulasi penyusutan
- Rekonsiliasi nilai aset vs buku besar

### Modul 8: Monitoring Mutu Layanan
- Manajemen indikator mutu (STANDAR SPM Puskesmas)
- Input realisasi indikator bulanan per unit
- Input data kunjungan pasien harian
- Input hasil survei kepuasan pasien (IKM)
- Korelasi keuangan vs mutu: grafik perbandingan pengeluaran unit vs capaian indikator unit tersebut
- Dashboard mutu per unit (traffic light: merah/kuning/hijau)
- Laporan capaian SPM (Standar Pelayanan Minimal)

### Modul 9: Dashboard Eksekutif
- **Widget Ringkasan (KPI Cards):**
  - Total pendapatan YTD vs target
  - Total pengeluaran YTD vs pagu
  - Sisa kas/saldo
  - Jumlah kunjungan pasien bulan ini
- **Grafik:**
  - Realisasi anggaran per sumber dana (bar chart)
  - Trend pendapatan vs pengeluaran (line chart 12 bulan)
  - Komposisi pengeluaran per jenis (pie chart)
  - Capaian indikator mutu per unit (radar chart)
  - Stok kritis obat (horizontal bar)
- **Tabel:**
  - 5 transaksi terbaru (penerimaan & pengeluaran)
  - Pengajuan yang menunggu persetujuan
  - Aset mendekati akhir masa manfaat
- Filter: periode, unit, sumber dana

### Modul 10 (Tambahan): Konfigurasi & Administrasi Sistem
- Manajemen pengguna & role (Spatie Permission)
- Konfigurasi profil puskesmas (nama, alamat, logo, kepala puskesmas)
- Konfigurasi nomor dokumen otomatis
- Manajemen tahun anggaran (buka/tutup)
- Tutup buku bulanan & tahunan
- Backup & restore database
- Audit trail — semua aktivitas pengguna tercatat
- Manajemen template nomor dokumen
- Log akses & keamanan

---

## 7. ATURAN VALIDASI FORM (Bahasa Indonesia)

### 7.1 Validasi Umum
```php
// app/Rules — contoh pesan validasi Bahasa Indonesia
'required' => ':attribute wajib diisi.',
'unique' => ':attribute sudah digunakan.',
'max' => ':attribute maksimal :max karakter.',
'min' => ':attribute minimal :min karakter.',
'numeric' => ':attribute harus berupa angka.',
'email' => ':attribute harus berupa alamat email yang valid.',
'date' => ':attribute harus berupa tanggal yang valid.',
'regex' => ':attribute tidak sesuai format.',
'min_value' => ':attribute minimal sebesar :min.',
```

### 7.2 Validasi Bisnis Kritis
```php
// Validasi pagu anggaran
// Total realisasi pengeluaran per RKA tidak boleh melebihi total_pagu
Rule: realisasi_pengeluaran + jumlah_baru <= rka.total_pagu

// Validasi jurnal seimbang
Rule: SUM(debit) === SUM(kredit)  // Wajib balance

// Validasi nomor bukti unik per jenis transaksi
// Validasi tanggal transaksi tidak boleh pada periode yang sudah ditutup
// Validasi pengeluaran wajib ada pengajuan yang disetujui (nominal > 5 juta)
// Validasi stok tidak boleh negatif saat distribusi
// Validasi penyusutan tidak melebihi nilai buku
```

---

## 8. ATURAN PENOMORAN DOKUMEN OTOMATIS

| Dokumen | Format | Contoh |
|---|---|---|
| Bukti Penerimaan | `TRP-{YYYY}{MM}-{XXXX}` | `TRP-202501-0001` |
| Bukti Pengeluaran | `TPK-{YYYY}{MM}-{XXXX}` | `TPK-202501-0001` |
| Pengajuan Pengadaan | `PA-{YYYY}{MM}-{XXXX}` | `PA-202501-0001` |
| Jurnal Umum | `JRN-{YYYY}{MM}-{XXXX}` | `JRN-202501-0001` |
| Distribusi Barang | `DST-{YYYY}{MM}-{XXXX}` | `DST-202501-0001` |
| Kode Aset | `AST-{KAT}-{XXXX}` | `AST-PER-0001` |
| Kode Barang | `OBT-{XXXX}` / `ALK-{XXXX}` | `OBT-0001` |

- Nomor direset per bulan (untuk transaksi) atau per kategori (untuk aset/barang)
- Dihasilkan oleh service `NomorDokumenService`

---

## 9. AUTOMATION & SCHEDULER

```php
// app/Console/Kernel.php

// Hitung penyusutan aset — setiap akhir bulan
$schedule->command('sikesat:hitung-penyusutan')->monthlyOn(28, '23:00');

// Jurnal penyesuaian persediaan — akhir bulan
$schedule->command('sikesat:jurnal-persediaan')->monthlyOn(28, '23:30');

// Notifikasi stok menipis — setiap hari pagi
$schedule->command('sikesat:cek-stok-kritis')->dailyAt('07:00');

// Notifikasi obat mendekati kedaluwarsa — setiap hari
$schedule->command('sikesat:cek-kedaluwarsa')->dailyAt('07:30');

// Backup database otomatis — setiap hari
$schedule->command('backup:run --only-db')->dailyAt('02:00');

// Hitung neraca saldo — awal bulan (untuk bulan sebelumnya)
$schedule->command('sikesat:generate-neraca-saldo')->monthlyOn(1, '01:00');
```

---

## 10. NOTIFIKASI SISTEM

| Event | Penerima | Jenis |
|---|---|---|
| Pengajuan RKA baru | PPK-BLUD | Info |
| RKA disetujui | Pengaju, Unit | Sukses |
| Pengajuan pengadaan baru | PPK-BLUD | Info |
| Pengadaan disetujui KaPus | Bendahara Pengeluaran | Sukses |
| Penerimaan kas besar (>5 jt) perlu verifikasi | PPK-BLUD | Peringatan |
| Stok obat/alkes menipis | Petugas Gudang, PPK-BLUD | Peringatan |
| Obat mendekati kedaluwarsa | Petugas Gudang | Bahaya |
| Periode tutup buku hampir tiba | Staf Akuntansi | Info |
| Penyusutan aset berhasil diproses | Staf Akuntansi | Sukses |
| Laporan keuangan bulanan siap | PPK-BLUD, Kepala Puskesmas | Info |

---

## 11. LAPORAN YANG TERSEDIA

### Laporan Keuangan (Ekspor PDF & Excel)
1. Laporan Realisasi Anggaran (LRA) — per bulan / triwulan / tahunan
2. Laporan Operasional (LO)
3. Neraca (Balance Sheet)
4. Laporan Arus Kas (LAK)
5. Laporan Perubahan Ekuitas (LPE)
6. Neraca Saldo (Trial Balance)
7. Buku Besar per akun & per periode
8. Jurnal Umum per periode

### Laporan Operasional
9. Rekapitulasi Penerimaan Kas
10. Rekapitulasi Pengeluaran Kas
11. Laporan Realisasi Anggaran per Unit
12. Laporan Realisasi Anggaran per Sumber Dana
13. Laporan Kartu Stok Obat & Alkes
14. Laporan Mutasi Persediaan
15. Laporan Nilai Persediaan Akhir
16. Laporan Daftar Aset
17. Laporan Penyusutan Aset
18. Laporan Rekap Pengadaan

### Laporan Mutu & Kinerja
19. Laporan Capaian SPM Puskesmas
20. Laporan Kunjungan Pasien
21. Laporan Survei Kepuasan
22. Dashboard Mutu Layanan

---

## 12. STRUKTUR DIREKTORI LARAVEL

```
app/
├── Console/Commands/
│   ├── HitungPenyusutanCommand.php
│   ├── JurnalPersediaanCommand.php
│   ├── CekStokKritisCommand.php
│   ├── CekKedaluwarsaCommand.php
│   └── GenerateNeracaSaldoCommand.php
├── Events/
│   ├── TransaksiPosted.php
│   └── StokDiperbarui.php
├── Listeners/
│   ├── BuatJurnalOtomatis.php
│   └── KirimNotifikasiStok.php
├── Http/
│   ├── Controllers/
│   │   ├── Auth/
│   │   ├── MasterData/
│   │   │   ├── PegawaiController.php
│   │   │   ├── UnitPelayananController.php
│   │   │   ├── AkunAkuntansiController.php
│   │   │   ├── SumberDanaController.php
│   │   │   ├── SupplierController.php
│   │   │   └── PasienController.php
│   │   ├── Anggaran/
│   │   │   ├── RkaController.php
│   │   │   └── RbaController.php
│   │   ├── Transaksi/
│   │   │   ├── PenerimaanKasController.php
│   │   │   ├── PengeluaranKasController.php
│   │   │   └── PengajuanPengadaanController.php
│   │   ├── Akuntansi/
│   │   │   ├── JurnalController.php
│   │   │   ├── BukuBesarController.php
│   │   │   ├── NeracaSaldoController.php
│   │   │   └── LaporanKeuanganController.php
│   │   ├── Persediaan/
│   │   │   ├── ObatAlkesController.php
│   │   │   ├── StokGudangController.php
│   │   │   ├── MutasiStokController.php
│   │   │   └── DistribusiController.php
│   │   ├── Aset/
│   │   │   ├── AsetController.php
│   │   │   └── PemeliharaanController.php
│   │   ├── Mutu/
│   │   │   ├── IndikatorMutuController.php
│   │   │   ├── RealisasiMutuController.php
│   │   │   └── KunjunganPasienController.php
│   │   ├── DashboardController.php
│   │   └── Admin/
│   │       ├── UserController.php
│   │       ├── RoleController.php
│   │       └── KonfigurasiController.php
│   ├── Middleware/
│   │   ├── CheckRole.php
│   │   └── CheckPeriodeTutup.php
│   └── Requests/ (Form Request per fitur)
├── Models/ (per tabel)
├── Services/
│   ├── JurnalOtomatisService.php
│   ├── NomorDokumenService.php
│   ├── PenyusutanAsetService.php
│   ├── RealisasiAnggaranService.php
│   ├── LaporanKeuanganService.php
│   └── StokService.php
├── Exports/ (Laravel Excel)
└── Pdf/ (DomPDF views)

resources/views/
├── layouts/
│   ├── app.blade.php (layout utama sidebar)
│   ├── auth.blade.php (layout login)
│   └── print.blade.php (layout cetak/PDF)
├── auth/
├── dashboard/
├── master/
├── anggaran/
├── penerimaan/
├── pengeluaran/
├── akuntansi/
├── persediaan/
├── aset/
├── mutu/
├── laporan/
└── admin/
```

---

## 13. ATURAN KEAMANAN

1. Autentikasi wajib untuk semua halaman (kecuali login)
2. Setiap route dilindungi middleware `auth` + `role:nama_role`
3. Periode yang sudah ditutup tidak bisa diubah (middleware `CheckPeriodeTutup`)
4. Void/pembatalan transaksi wajib ada alasan dan hanya bisa dilakukan oleh PPK-BLUD atau Super Admin
5. Semua perubahan data sensitif dicatat di audit log (Spatie Activity Log)
6. Password wajib minimal 8 karakter, kombinasi huruf dan angka
7. Session timeout setelah 2 jam tidak aktif
8. CSRF protection aktif untuk semua form
9. Input sanitasi wajib di semua Form Request
10. File upload dibatasi: PDF, JPG, PNG, maksimal 5MB
11. Backup database otomatis harian, disimpan 30 hari terakhir

---

## 14. KONVENSI KODE

- **Bahasa validasi pesan:** Bahasa Indonesia (`lang/id/validation.php`)
- **Timezone:** `Asia/Jakarta` (config/app.php)
- **Format tanggal tampil:** `d F Y` (15 Januari 2025)
- **Format angka:** `number_format($val, 2, ',', '.')` (Rp 1.500.000,00)
- **Soft delete** aktif di model: User, Pegawai, Supplier, Aset
- **Model relationship** menggunakan Eloquent ORM penuh
- **Service class** untuk logika bisnis kompleks (bukan di Controller)
- **Form Request** untuk validasi (bukan di Controller)
- **Events & Listeners** untuk side-effect (jurnal otomatis, notifikasi)
- **Database seeder** untuk data awal: COA standar BLUD, role & permission, konfigurasi sistem
