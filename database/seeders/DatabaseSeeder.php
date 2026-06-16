<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        // 1. ROLES
        $roles = [
            'super_admin', 'kepala_puskesmas', 'ppk_blud', 'bendahara_penerimaan',
            'bendahara_pengeluaran', 'staf_akuntansi', 'petugas_gudang',
            'unit_pengadaan', 'auditor_internal', 'petugas_pelayanan'
        ];
        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        // 2. UNIT PELAYANAN
        $units = [
            ['kode' => 'U01', 'nama' => 'Poli Umum', 'jenis' => 'rawat_jalan', 'kepala_unit' => 'dr. Andi Sutanto'],
            ['kode' => 'U02', 'nama' => 'IGD 24 Jam', 'jenis' => 'rawat_inap', 'kepala_unit' => 'dr. Budi Setiawan'],
            ['kode' => 'U03', 'nama' => 'Laboratorium', 'jenis' => 'penunjang', 'kepala_unit' => 'Siti Aminah, Amd.AK'],
            ['kode' => 'U04', 'nama' => 'Gudang Farmasi', 'jenis' => 'farmasi', 'kepala_unit' => 'Rina Wijaya, S.Farm, Apt'],
            ['kode' => 'U05', 'nama' => 'Tata Usaha / Administrasi', 'jenis' => 'administrasi', 'kepala_unit' => 'Drs. Herman Mulyadi'],
            ['kode' => 'U06', 'nama' => 'Poli Gigi', 'jenis' => 'rawat_jalan', 'kepala_unit' => 'drg. Sarah Melati'],
            ['kode' => 'U07', 'nama' => 'Poli KIA & KB', 'jenis' => 'rawat_jalan', 'kepala_unit' => 'Bidan Rahmawati, SST'],
        ];
        foreach ($units as $u) {
            $id = DB::table('unit_pelayanans')->insertGetId(array_merge($u, ['created_at' => $now, 'updated_at' => $now]));
            if ($u['nama'] === 'Tata Usaha / Administrasi') $tuId = $id;
            if ($u['nama'] === 'Gudang Farmasi') $gudangId = $id;
            if ($u['nama'] === 'Poli Umum') $poliUmumId = $id;
        }

        // 3. USERS & PEGAWAI
        $usersData = [
            ['email' => 'admin@sikesat.com', 'name' => 'Super Administrator', 'role' => 'super_admin', 'nip' => '198001012005011001', 'jabatan' => 'IT System Administrator'],
            ['email' => 'kepala@sikesat.com', 'name' => 'dr. H. Wahyu Hartono, M.Kes', 'role' => 'kepala_puskesmas', 'nip' => '197502122001121003', 'jabatan' => 'Kepala Puskesmas'],
            ['email' => 'bendahara.keluar@sikesat.com', 'name' => 'Lestari Ningsih, SE', 'role' => 'bendahara_pengeluaran', 'nip' => '198505202010122005', 'jabatan' => 'Bendahara Pengeluaran'],
            ['email' => 'bendahara.masuk@sikesat.com', 'name' => 'Teguh Prakoso, SE', 'role' => 'bendahara_penerimaan', 'nip' => '198808172015041002', 'jabatan' => 'Bendahara Penerimaan'],
            ['email' => 'akuntansi@sikesat.com', 'name' => 'Dewi Sartika, S.Ak', 'role' => 'staf_akuntansi', 'nip' => '199203142018012001', 'jabatan' => 'Staf Akuntansi BLUD'],
            ['email' => 'apoteker@sikesat.com', 'name' => 'Rina Wijaya, S.Farm, Apt', 'role' => 'petugas_gudang', 'nip' => '198711112014022004', 'jabatan' => 'Apoteker Penanggung Jawab'],
        ];

        foreach ($usersData as $ud) {
            $user = User::firstOrCreate([
                'email' => $ud['email'],
            ], [
                'name' => $ud['name'],
                'password' => Hash::make('password'),
                'nip' => $ud['nip'],
                'jabatan' => $ud['jabatan'],
                'unit_id' => $tuId ?? 1,
                'is_active' => 1,
            ]);
            $user->assignRole($ud['role']);

            DB::table('pegawais')->updateOrInsert(['nip' => $ud['nip']], [
                'user_id' => $user->id,
                'nama' => $ud['name'],
                'jenis_kelamin' => 'P',
                'jabatan' => $ud['jabatan'],
                'jenis_pegawai' => 'PNS',
                'unit_id' => $tuId ?? 1,
                'created_at' => $now,
            ]);
        }

        // Tambah Pegawai Dummy
        for ($i=1; $i<=15; $i++) {
            DB::table('pegawais')->insert([
                'nip' => '199001012020011' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'nama' => 'Pegawai Kesehatan Dummy ' . $i,
                'jenis_kelamin' => $i % 2 == 0 ? 'L' : 'P',
                'jabatan' => 'Perawat Pelaksana',
                'jenis_pegawai' => $i % 3 == 0 ? 'PPPK' : 'PNS',
                'unit_id' => $poliUmumId ?? 1,
                'created_at' => $now,
            ]);
        }

        // 4. CHART OF ACCOUNTS (COA)
        $coas = [
            ['kode_akun' => '1.1.1.01', 'nama_akun' => 'Kas di Bendahara Penerimaan', 'jenis_akun' => 'aset', 'kelompok_akun' => 'aset_lancar', 'level' => 4, 'saldo_normal' => 'debit'],
            ['kode_akun' => '1.1.1.02', 'nama_akun' => 'Kas di Bendahara Pengeluaran', 'jenis_akun' => 'aset', 'kelompok_akun' => 'aset_lancar', 'level' => 4, 'saldo_normal' => 'debit'],
            ['kode_akun' => '1.1.1.03', 'nama_akun' => 'Rekening Kas BLUD', 'jenis_akun' => 'aset', 'kelompok_akun' => 'aset_lancar', 'level' => 4, 'saldo_normal' => 'debit'],
            ['kode_akun' => '1.1.7.01', 'nama_akun' => 'Persediaan Obat-obatan', 'jenis_akun' => 'aset', 'kelompok_akun' => 'aset_lancar', 'level' => 4, 'saldo_normal' => 'debit'],
            ['kode_akun' => '1.3.2.01', 'nama_akun' => 'Peralatan Medis', 'jenis_akun' => 'aset', 'kelompok_akun' => 'aset_tetap', 'level' => 4, 'saldo_normal' => 'debit'],
            
            ['kode_akun' => '4.1.4.01', 'nama_akun' => 'Pendapatan Layanan Pasien Umum', 'jenis_akun' => 'pendapatan', 'kelompok_akun' => 'pendapatan_lra', 'level' => 4, 'saldo_normal' => 'kredit'],
            ['kode_akun' => '4.1.4.02', 'nama_akun' => 'Pendapatan Kapitasi JKN', 'jenis_akun' => 'pendapatan', 'kelompok_akun' => 'pendapatan_lra', 'level' => 4, 'saldo_normal' => 'kredit'],
            ['kode_akun' => '4.1.4.03', 'nama_akun' => 'Pendapatan Non Kapitasi JKN', 'jenis_akun' => 'pendapatan', 'kelompok_akun' => 'pendapatan_lra', 'level' => 4, 'saldo_normal' => 'kredit'],
            
            ['kode_akun' => '5.1.1.01', 'nama_akun' => 'Beban Gaji dan Tunjangan PNS', 'jenis_akun' => 'beban', 'kelompok_akun' => 'beban', 'level' => 4, 'saldo_normal' => 'debit'],
            ['kode_akun' => '5.1.1.02', 'nama_akun' => 'Beban Jasa Pelayanan JKN', 'jenis_akun' => 'beban', 'kelompok_akun' => 'beban', 'level' => 4, 'saldo_normal' => 'debit'],
            ['kode_akun' => '5.1.2.01', 'nama_akun' => 'Beban Persediaan Obat', 'jenis_akun' => 'beban', 'kelompok_akun' => 'beban', 'level' => 4, 'saldo_normal' => 'debit'],
            ['kode_akun' => '5.1.2.02', 'nama_akun' => 'Beban Pemeliharaan Alat Medis', 'jenis_akun' => 'beban', 'kelompok_akun' => 'beban', 'level' => 4, 'saldo_normal' => 'debit'],
        ];
        foreach ($coas as $coa) {
            DB::table('akun_akuntansis')->insert(array_merge($coa, ['created_at' => $now, 'updated_at' => $now]));
        }

        // 5. SUMBER DANA & TAHUN ANGGARAN
        $taId = DB::table('tahun_anggarans')->insertGetId([
            'tahun' => 2026, 'status' => 'aktif', 'tanggal_mulai' => '2026-01-01', 'tanggal_selesai' => '2026-12-31', 'created_at' => $now
        ]);

        $sd_pad = DB::table('sumber_danas')->insertGetId(['kode' => 'SD-01', 'nama' => 'Pendapatan BLUD (Umum)', 'jenis' => 'PAD', 'tahun_anggaran' => 2026, 'total_pagu' => 2000000000, 'created_at' => $now]);
        $sd_jkn = DB::table('sumber_danas')->insertGetId(['kode' => 'SD-02', 'nama' => 'Dana Kapitasi JKN', 'jenis' => 'BPJS_Kapitasi', 'tahun_anggaran' => 2026, 'total_pagu' => 4500000000, 'created_at' => $now]);
        $sd_bok = DB::table('sumber_danas')->insertGetId(['kode' => 'SD-03', 'nama' => 'Bantuan Operasional Kesehatan (BOK)', 'jenis' => 'BOK', 'tahun_anggaran' => 2026, 'total_pagu' => 1200000000, 'created_at' => $now]);

        // 6. RBA (Rencana Bisnis Anggaran)
        $akun_pendapatan = DB::table('akun_akuntansis')->where('kode_akun', '4.1.4.01')->value('id');
        $akun_belanja = DB::table('akun_akuntansis')->where('kode_akun', '5.1.2.01')->value('id');
        
        DB::table('rencana_bisnis_anggarans')->insert([
            ['tahun_anggaran_id' => $taId, 'unit_id' => $tuId ?? 1, 'jenis' => 'pendapatan', 'akun_id' => $akun_pendapatan ?? 1, 'sumber_dana_id' => $sd_pad, 'total_target' => 2000000000, 'status' => 'disetujui', 'created_at' => $now],
            ['tahun_anggaran_id' => $taId, 'unit_id' => $gudangId ?? 1, 'jenis' => 'belanja', 'akun_id' => $akun_belanja ?? 1, 'sumber_dana_id' => $sd_jkn, 'total_target' => 4500000000, 'status' => 'disetujui', 'created_at' => $now],
        ]);

        // 7. SUPPLIER
        $suppliers = [
            ['kode' => 'SUP-001', 'nama' => 'PT. Kimia Farma Trading', 'jenis' => 'Obat', 'no_telepon' => '021-123456'],
            ['kode' => 'SUP-002', 'nama' => 'CV. Medika Alat Sejahtera', 'jenis' => 'Alkes', 'no_telepon' => '021-987654'],
            ['kode' => 'SUP-003', 'nama' => 'Toko Mitra ATK', 'jenis' => 'ATK', 'no_telepon' => '08123456789'],
            ['kode' => 'SUP-004', 'nama' => 'PT. Enseval Putera Megatrading', 'jenis' => 'Obat', 'no_telepon' => '021-444555'],
            ['kode' => 'SUP-005', 'nama' => 'PT. Indofarma Global Medika', 'jenis' => 'Obat', 'no_telepon' => '021-777888'],
        ];
        foreach ($suppliers as $s) {
            DB::table('suppliers')->insert(array_merge($s, ['created_at' => $now]));
        }

        // 8. KATEGORI ASET & ASET
        $katAset1 = DB::table('aset_kategoris')->insertGetId(['kode' => 'K-MED', 'nama' => 'Alat Medis & Keperawatan', 'jenis' => 'Peralatan', 'masa_manfaat_tahun' => 5]);
        $katAset2 = DB::table('aset_kategoris')->insertGetId(['kode' => 'K-IT', 'nama' => 'Komputer & IT', 'jenis' => 'Peralatan', 'masa_manfaat_tahun' => 3]);
        
        for ($i=1; $i<=10; $i++) {
            DB::table('asets')->insert([
                'kode_aset' => 'AST-MED-' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'nama_aset' => 'Tensimeter Digital Omron ' . $i,
                'kategori_id' => $katAset1,
                'tanggal_perolehan' => Carbon::now()->subMonths(rand(1, 24))->format('Y-m-d'),
                'nilai_perolehan' => 750000,
                'nilai_buku' => 750000,
                'kondisi' => 'Baik',
                'status' => 'Aktif',
                'created_at' => $now,
            ]);
        }
        for ($i=1; $i<=5; $i++) {
            DB::table('asets')->insert([
                'kode_aset' => 'AST-IT-' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'nama_aset' => 'PC Desktop Lenovo Core i5 Unit ' . $i,
                'kategori_id' => $katAset2,
                'tanggal_perolehan' => Carbon::now()->subMonths(rand(1, 12))->format('Y-m-d'),
                'nilai_perolehan' => 12000000,
                'nilai_buku' => 12000000,
                'kondisi' => 'Baik',
                'status' => 'Aktif',
                'created_at' => $now,
            ]);
        }

        // 9. OBAT & ALKES KATEGORI
        $katObat = DB::table('obat_alkes_kategoris')->insertGetId(['kode' => 'KO-01', 'nama' => 'Obat-obatan Medis', 'jenis' => 'Obat']);
        $katAlkes = DB::table('obat_alkes_kategoris')->insertGetId(['kode' => 'KA-01', 'nama' => 'Alat Kesehatan & BMHP', 'jenis' => 'Alkes']);

        $obats = [
            ['kategori_id' => $katObat, 'kode_barang' => 'OBT-001', 'nama_generik' => 'Paracetamol 500mg', 'satuan' => 'Tablet'],
            ['kategori_id' => $katObat, 'kode_barang' => 'OBT-002', 'nama_generik' => 'Amoxicillin 500mg', 'satuan' => 'Kapsul'],
            ['kategori_id' => $katObat, 'kode_barang' => 'OBT-003', 'nama_generik' => 'Ibuprofen 400mg', 'satuan' => 'Tablet'],
            ['kategori_id' => $katObat, 'kode_barang' => 'OBT-004', 'nama_generik' => 'Vitamin C 50mg', 'satuan' => 'Tablet'],
            ['kategori_id' => $katObat, 'kode_barang' => 'OBT-005', 'nama_generik' => 'Cetirizine 10mg', 'satuan' => 'Tablet'],
            ['kategori_id' => $katAlkes, 'kode_barang' => 'ALK-001', 'nama_generik' => 'Masker Bedah 3 Ply', 'satuan' => 'Box'],
            ['kategori_id' => $katAlkes, 'kode_barang' => 'ALK-002', 'nama_generik' => 'Handscoon Non-Steril', 'satuan' => 'Box'],
            ['kategori_id' => $katAlkes, 'kode_barang' => 'ALK-003', 'nama_generik' => 'Spuit 3cc', 'satuan' => 'Pcs'],
        ];
        foreach ($obats as $o) {
            DB::table('obat_alkes')->insert(array_merge($o, ['created_at' => $now]));
        }

        // 10. INDIKATOR MUTU
        $mutus = [
            ['kode' => 'IM-01', 'nama' => 'Waktu Tunggu Rawat Jalan', 'satuan' => 'Menit', 'jenis' => 'waktu_tunggu', 'target_nilai' => 60, 'arah_target' => 'min'],
            ['kode' => 'IM-02', 'nama' => 'Ketersediaan Obat Essensial', 'satuan' => 'Persen', 'jenis' => 'ketersediaan_obat', 'target_nilai' => 100, 'arah_target' => 'max'],
            ['kode' => 'IM-03', 'nama' => 'Kepuasan Pasien', 'satuan' => 'Persen', 'jenis' => 'kepuasan', 'target_nilai' => 85, 'arah_target' => 'max'],
            ['kode' => 'IM-04', 'nama' => 'Kunjungan Pasien Hipertensi Terkendali', 'satuan' => 'Persen', 'jenis' => 'lainnya', 'target_nilai' => 80, 'arah_target' => 'max'],
            ['kode' => 'IM-05', 'nama' => 'Kecepatan Respon Komplain', 'satuan' => 'Jam', 'jenis' => 'waktu_tunggu', 'target_nilai' => 24, 'arah_target' => 'min'],
        ];
        foreach ($mutus as $m) {
            DB::table('indikator_mutus')->insert(array_merge($m, ['created_at' => $now]));
        }

        // 11. PENERIMAAN KAS
        for ($i=1; $i<=20; $i++) {
            DB::table('penerimaan_kass')->insert([
                'sumber_dana_id' => $sd_pad,
                'no_bukti' => 'BKM-PAD-' . date('Ym') . '-' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'tanggal' => Carbon::now()->subDays(rand(1, 30))->format('Y-m-d'),
                'jenis_penerimaan' => 'Layanan_Umum',
                'keterangan' => 'Penerimaan Retribusi Pasien Umum Poli',
                'jumlah' => rand(150000, 1500000),
                'metode_pembayaran' => 'Tunai',
                'status' => 'posted',
                'input_oleh' => 1,
                'created_at' => $now
            ]);
        }
        // Penerimaan JKN Bulanan
        for ($i=1; $i<=3; $i++) {
            DB::table('penerimaan_kass')->insert([
                'sumber_dana_id' => $sd_jkn,
                'no_bukti' => 'BKM-JKN-' . date('Ym') . '-' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'tanggal' => Carbon::now()->subMonths($i)->format('Y-m-d'),
                'jenis_penerimaan' => 'BPJS_Kapitasi',
                'keterangan' => 'Penerimaan Dana Kapitasi JKN Bulan Ke-' . $i,
                'jumlah' => 350000000,
                'metode_pembayaran' => 'Transfer',
                'status' => 'posted',
                'input_oleh' => 1,
                'created_at' => $now
            ]);
        }

        // 12. PENGELUARAN KAS
        for ($i=1; $i<=15; $i++) {
            DB::table('pengeluaran_kass')->insert([
                'sumber_dana_id' => $sd_pad,
                'no_bukti' => 'BKK-PAD-' . date('Ym') . '-' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'tanggal' => Carbon::now()->subDays(rand(1, 30))->format('Y-m-d'),
                'jenis_pengeluaran' => 'ATK',
                'keterangan' => 'Pembayaran Tagihan ATK Puskesmas Bulan Ini ' . $i,
                'jumlah_bruto' => rand(500000, 5000000),
                'jumlah_neto' => rand(500000, 5000000),
                'metode_pembayaran' => 'Transfer',
                'status' => 'dibayar',
                'input_oleh' => 1,
                'created_at' => $now
            ]);
        }
        for ($i=1; $i<=5; $i++) {
            DB::table('pengeluaran_kass')->insert([
                'sumber_dana_id' => $sd_jkn,
                'no_bukti' => 'BKK-JKN-' . date('Ym') . '-' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'tanggal' => Carbon::now()->subDays(rand(1, 30))->format('Y-m-d'),
                'jenis_pengeluaran' => 'Jasa_Pegawai',
                'keterangan' => 'Pembayaran Jasa Pelayanan JKN Petugas Medis',
                'jumlah_bruto' => 120000000,
                'jumlah_neto' => 114000000,
                'metode_pembayaran' => 'Transfer',
                'status' => 'dibayar',
                'input_oleh' => 1,
                'created_at' => $now
            ]);
        }

        // 13. JURNAL UMUM
        for ($i=1; $i<=25; $i++) {
            DB::table('jurnal_umums')->insert([
                'no_jurnal' => 'JU-' . date('Ym') . '-' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'tanggal' => Carbon::now()->subDays(rand(1, 30))->format('Y-m-d'),
                'keterangan' => 'Pencatatan Transaksi Harian Ke-' . $i,
                'sumber' => $i % 2 == 0 ? 'penerimaan' : 'pengeluaran',
                'referensi_id' => $i,
                'total_debit' => rand(100000, 10000000),
                'total_kredit' => rand(100000, 10000000),
                'status' => 'posted',
                'dibuat_oleh' => 1,
                'created_at' => $now
            ]);
        }

        $this->command->info('Database Seeded Successfully with Massive Realistic Dummy Data!');
    }
}
