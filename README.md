<br/>
<div align="center">
  <a href="#">
    <img src="https://img.icons8.com/?size=256&id=114002&format=png" alt="Logo" width="80" height="80">
  </a>

  <h3 align="center">SIKESAT (Sistem Informasi Kesehatan Terpadu)</h3>

  <p align="center">
    Sistem ERP Tata Kelola Puskesmas dan Klinik Berbasis BLUD (Badan Layanan Umum Daerah)
    <br/>
    <br/>
    <a href="#"><strong>Eksplorasi Dokumentasi »</strong></a>
    <br/>
    <br/>
  </p>
</div>

## 💡 Tentang SIKESAT

**SIKESAT** adalah solusi sistem informasi berbasis *Enterprise Resource Planning* (ERP) yang dirancang secara khusus untuk menjawab kompleksitas manajemen Puskesmas dan Fasilitas Pelayanan Kesehatan tingkat pertama, khususnya yang menerapkan fleksibilitas tata kelola keuangan BLUD.

Dengan arsitektur *monolith* Laravel yang tangguh, sistem ini mengintegrasikan ujung-ke-ujung proses operasional: mulai dari pasien masuk, penanganan stok farmasi, persetujuan logistik berjenjang, hingga bermuara ke pembuatan Laporan Keuangan dan Laporan Dinas Kesehatan secara presisi dan terotomatisasi.

## 🚀 Modul & Fitur Unggulan

Sistem ini memiliki puluhan entitas manajemen yang dibagi menjadi beberapa modul besar:

### 1. 🏥 Modul Pelayanan & Billing Kasir
*   **Manajemen Pasien & Kunjungan:** Pencatatan demografi pasien terintegrasi.
*   **Kasir/Billing Terpadu:** Transaksi langsung terhubung dengan stok gudang dan pencatatan Akuntansi Pendapatan.
*   **Cetak Struk Thermal:** Bukti pembayaran instan ramah lingkungan *(Print ready)*.

### 2. 💰 Modul Keuangan & Akuntansi BLUD
*   **Arus Kas (Penerimaan & Pengeluaran):** Lengkap dengan mekanisme *Multi-Tier Approval* (Verifikasi SPJ oleh Bendahara & KTU).
*   **Sistem Buku Besar:** Pencatatan otomatis ke Jurnal Umum, Jurnal Penyesuaian, Buku Besar, hingga Neraca Saldo.
*   **Rencana Anggaran (RBA & RKA):** Pantau dan kelola anggaran belanja RKA BLUD secara transparan.
*   **Laporan Keuangan Otomatis:** Menghasilkan laporan neraca dan arus kas sekali klik.

### 3. 💊 Modul Gudang, Logistik & E-Procurement
*   **E-Procurement Berjenjang:** Alur pengajuan pengadaan barang mulai dari Draft ➔ Diverifikasi KTU ➔ Disetujui Kepala Puskesmas.
*   **Manajemen Apotek:** Inventarisasi Obat & Alkes dengan metode pemotongan stok *real-time* saat pelayanan.
*   **Distribusi Internal:** Pencatatan Mutasi Stok dan distribusi dari Gudang Induk ke Poli/Unit Pelayanan.

### 4. 🗄️ Modul Aset & Penyusutan
*   **Inventarisasi Aset Tetap:** Pencatatan lokasi, kondisi, dan nomor seri aset.
*   **Kalkulator Penyusutan Aset:** Mesin penyusutan otomatis berdasarkan masa manfaat tahunan.
*   **Pemeliharaan Aset:** *Log* riwayat reparasi dan perawatan instrumen medis.

### 5. 👥 Modul Kepegawaian (HRIS) & Jaspel
*   **Manajemen Pegawai:** Pemantauan profil pegawai dan dokter medis.
*   **Alert Kedaluwarsa Izin (SIP/STR):** Sistem proaktif memberikan peringatan otomatis jika masa berlaku SIP/STR dokter tersisa kurang dari 30 hari.
*   **Perhitungan Jaspel (Jasa Pelayanan):** Kalkulasi insentif bulanan berbasis formula beban kerja.

### 6. 📊 Modul Eksekutif & Laporan Dinkes
*   **Dashboard Visual Interaktif:** Ringkasan sisa kas, trend pendapatan 12 bulan, peringatan stok menipis, dan peringatan kontrak vendor.
*   **Generator Laporan (LB1 - LB4):** Cetak laporan standar Kementerian Kesehatan (Morbiditas, LPLPO, KIA, dan Kunjungan) hanya dengan satu tombol.
*   **Indikator Mutu & SPM:** Penilaian realisasi standar minimal (Survei Kepuasan Masyarakat terintegrasi).

### 7. ⚙️ Manajemen Pengguna & Keamanan
*   **Profil Mandiri:** Modifikasi *password* dan info dasar oleh tiap pengguna.
*   **Manajemen Peran Terpusat:** Role-Based Access Control (RBAC) via Spatie (Super Admin, Kasir, Gudang, dll).

## 🛠️ Stack Teknologi

Sistem dibangun dengan teknologi modern dan mapan:

*   **Framework:** [Laravel 12.x](https://laravel.com)
*   **Bahasa:** PHP 8.2+
*   **Database:** MySQL 8+
*   **Styling & UI:** Vanilla CSS, Bootstrap 5.x, FontAwesome 6, dan gaya Premium minimalis "Glassmorphism".
*   **Time Processing:** Carbon
*   **Auth & Roles:** Spatie Laravel-Permission

## 💻 Cara Instalasi

Ikuti langkah-langkah berikut untuk menjalankan SIKESAT secara lokal:

1. **Kloning Repositori**
   ```bash
   git clone https://github.com/ardhikaxx/sikesat.git
   cd sikesat
   ```
2. **Instalasi Dependensi**
   ```bash
   composer install
   npm install && npm run build
   ```
3. **Konfigurasi Environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   *Sesuaikan kredensial `DB_DATABASE`, `DB_USERNAME`, dan `DB_PASSWORD` di berkas `.env`.*
4. **Migrasi & Penanaman Data Awal (Seeder)**
   ```bash
   php artisan migrate:fresh --seed
   ```
   *Catatan: Sistem akan langsung terisi dengan 5.000+ baris data simulasi siap pakai (Obat, Pegawai, Stok, Pengeluaran, dll).*
5. **Jalankan Peladen (Server)**
   ```bash
   php artisan serve
   ```
6. **Akses Aplikasi**
   Buka peramban dan navigasikan ke `http://localhost:8000`.

---
> **Hak Cipta & Lisensi:** Dikembangkan dengan tingkat ketelitian tinggi khusus untuk fasilitas kesehatan modern.
