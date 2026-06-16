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
            'unit_pengadaan', 'auditor_internal', 'petugas_pelayanan',
            'dokter_umum', 'dokter_spesialis', 'perawat', 'bidan'
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
            ['kode' => 'U08', 'nama' => 'Poli Anak', 'jenis' => 'rawat_jalan', 'kepala_unit' => 'dr. Citra Ananda, Sp.A'],
            ['kode' => 'U09', 'nama' => 'Poli Penyakit Dalam', 'jenis' => 'rawat_jalan', 'kepala_unit' => 'dr. Surya Dharma, Sp.PD'],
            ['kode' => 'U10', 'nama' => 'Ruang Rawat Inap Melati', 'jenis' => 'rawat_inap', 'kepala_unit' => 'Ns. Ratna Sari, S.Kep'],
            ['kode' => 'U11', 'nama' => 'Ruang Bersalin / PONED', 'jenis' => 'rawat_inap', 'kepala_unit' => 'Bidan Ningsih, Amd.Keb'],
            ['kode' => 'U12', 'nama' => 'Radiologi', 'jenis' => 'penunjang', 'kepala_unit' => 'Hendri Kusuma, Amd.Rad'],
        ];
        $unitIds = [];
        foreach ($units as $u) {
            $id = DB::table('unit_pelayanans')->insertGetId(array_merge($u, ['created_at' => $now, 'updated_at' => $now]));
            $unitIds[] = $id;
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

        // Tambah Pegawai Dummy Lebih Variatif
        $firstNamesL = ['Budi', 'Agus', 'Andi', 'Rudi', 'Hendra', 'Eko', 'Dedi', 'Bambang', 'Ahmad', 'Reza', 'Surya', 'Teguh', 'Arif', 'Herman', 'Iwan'];
        $firstNamesP = ['Siti', 'Ayu', 'Rini', 'Dewi', 'Sri', 'Nina', 'Lestari', 'Fitri', 'Nurul', 'Anita', 'Maya', 'Rika', 'Dina', 'Putri', 'Sari'];
        $lastNames = ['Setiawan', 'Pratama', 'Saputra', 'Wijaya', 'Kurniawan', 'Hidayat', 'Santoso', 'Gunawan', 'Nugroho', 'Wibowo', 'Wahyudi', 'Lubis', 'Siregar', 'Harahap', 'Kusuma'];
        $jabatans = ['Dokter Umum', 'Perawat Pelaksana', 'Bidan Pelaksana', 'Analis Kesehatan', 'Asisten Apoteker', 'Staf Administrasi', 'Petugas Rekam Medis', 'Petugas Kebersihan', 'Supir Ambulans', 'Petugas Keamanan'];

        for ($i=1; $i<=80; $i++) {
            $jk = rand(0, 1) ? 'L' : 'P';
            $fName = $jk == 'L' ? $firstNamesL[array_rand($firstNamesL)] : $firstNamesP[array_rand($firstNamesP)];
            $lName = $lastNames[array_rand($lastNames)];
            $jabatan = $jabatans[array_rand($jabatans)];
            $isNakes = in_array($jabatan, ['Dokter Umum', 'Perawat Pelaksana', 'Bidan Pelaksana', 'Analis Kesehatan', 'Asisten Apoteker']);
            DB::table('pegawais')->insert([
                'nip' => '19' . rand(70,99) . str_pad(rand(1,12), 2, '0', STR_PAD_LEFT) . str_pad(rand(1,28), 2, '0', STR_PAD_LEFT) . '20' . rand(10,24) . str_pad(rand(1,12), 2, '0', STR_PAD_LEFT) . rand(1,2) . str_pad($i, 3, '0', STR_PAD_LEFT),
                'nama' => $fName . ' ' . $lName,
                'jenis_kelamin' => $jk,
                'jabatan' => $jabatan,
                'jenis_pegawai' => rand(1, 100) > 60 ? 'PPPK' : (rand(1, 100) > 50 ? 'PNS' : 'Honorer'),
                'unit_id' => $unitIds[array_rand($unitIds)],
                'no_str' => $isNakes ? 'STR-' . rand(100000000, 999999999) : null,
                'tanggal_berakhir_str' => $isNakes ? Carbon::now()->addDays(rand(-60, 365))->format('Y-m-d') : null,
                'no_sip' => $isNakes ? 'SIP-' . rand(1000, 9999) . '/2026' : null,
                'tanggal_berakhir_sip' => $isNakes ? Carbon::now()->addDays(rand(-60, 365))->format('Y-m-d') : null,
                'created_at' => $now,
            ]);
        }

        // 4. CHART OF ACCOUNTS (COA) - Diperbanyak
        $coas = [
            ['kode_akun' => '1.1.1.01', 'nama_akun' => 'Kas di Bendahara Penerimaan', 'jenis_akun' => 'aset', 'kelompok_akun' => 'aset_lancar', 'level' => 4, 'saldo_normal' => 'debit'],
            ['kode_akun' => '1.1.1.02', 'nama_akun' => 'Kas di Bendahara Pengeluaran', 'jenis_akun' => 'aset', 'kelompok_akun' => 'aset_lancar', 'level' => 4, 'saldo_normal' => 'debit'],
            ['kode_akun' => '1.1.1.03', 'nama_akun' => 'Rekening Kas BLUD', 'jenis_akun' => 'aset', 'kelompok_akun' => 'aset_lancar', 'level' => 4, 'saldo_normal' => 'debit'],
            ['kode_akun' => '1.1.1.04', 'nama_akun' => 'Piutang Pelayanan Kesehatan', 'jenis_akun' => 'aset', 'kelompok_akun' => 'aset_lancar', 'level' => 4, 'saldo_normal' => 'debit'],
            ['kode_akun' => '1.1.1.05', 'nama_akun' => 'Piutang Klaim BPJS', 'jenis_akun' => 'aset', 'kelompok_akun' => 'aset_lancar', 'level' => 4, 'saldo_normal' => 'debit'],
            ['kode_akun' => '1.1.7.01', 'nama_akun' => 'Persediaan Obat-obatan', 'jenis_akun' => 'aset', 'kelompok_akun' => 'aset_lancar', 'level' => 4, 'saldo_normal' => 'debit'],
            ['kode_akun' => '1.1.7.02', 'nama_akun' => 'Persediaan Bahan Medis Habis Pakai (BMHP)', 'jenis_akun' => 'aset', 'kelompok_akun' => 'aset_lancar', 'level' => 4, 'saldo_normal' => 'debit'],
            ['kode_akun' => '1.1.7.03', 'nama_akun' => 'Persediaan Alat Tulis Kantor (ATK)', 'jenis_akun' => 'aset', 'kelompok_akun' => 'aset_lancar', 'level' => 4, 'saldo_normal' => 'debit'],
            ['kode_akun' => '1.3.2.01', 'nama_akun' => 'Peralatan Medis', 'jenis_akun' => 'aset', 'kelompok_akun' => 'aset_tetap', 'level' => 4, 'saldo_normal' => 'debit'],
            ['kode_akun' => '1.3.2.02', 'nama_akun' => 'Peralatan Komputer & IT', 'jenis_akun' => 'aset', 'kelompok_akun' => 'aset_tetap', 'level' => 4, 'saldo_normal' => 'debit'],
            ['kode_akun' => '1.3.2.03', 'nama_akun' => 'Kendaraan Ambulans', 'jenis_akun' => 'aset', 'kelompok_akun' => 'aset_tetap', 'level' => 4, 'saldo_normal' => 'debit'],
            
            ['kode_akun' => '2.1.1.01', 'nama_akun' => 'Utang Belanja Barang', 'jenis_akun' => 'kewajiban', 'kelompok_akun' => 'kewajiban_jangka_pendek', 'level' => 4, 'saldo_normal' => 'kredit'],
            ['kode_akun' => '2.1.1.02', 'nama_akun' => 'Utang Jasa Pelayanan', 'jenis_akun' => 'kewajiban', 'kelompok_akun' => 'kewajiban_jangka_pendek', 'level' => 4, 'saldo_normal' => 'kredit'],
            
            ['kode_akun' => '3.1.1.01', 'nama_akun' => 'Ekuitas BLUD', 'jenis_akun' => 'ekuitas', 'kelompok_akun' => 'ekuitas', 'level' => 4, 'saldo_normal' => 'kredit'],
            
            ['kode_akun' => '4.1.4.01', 'nama_akun' => 'Pendapatan Layanan Pasien Umum', 'jenis_akun' => 'pendapatan', 'kelompok_akun' => 'pendapatan_lra', 'level' => 4, 'saldo_normal' => 'kredit'],
            ['kode_akun' => '4.1.4.02', 'nama_akun' => 'Pendapatan Kapitasi JKN', 'jenis_akun' => 'pendapatan', 'kelompok_akun' => 'pendapatan_lra', 'level' => 4, 'saldo_normal' => 'kredit'],
            ['kode_akun' => '4.1.4.03', 'nama_akun' => 'Pendapatan Non Kapitasi JKN', 'jenis_akun' => 'pendapatan', 'kelompok_akun' => 'pendapatan_lra', 'level' => 4, 'saldo_normal' => 'kredit'],
            ['kode_akun' => '4.1.4.04', 'nama_akun' => 'Pendapatan APBD/BOK', 'jenis_akun' => 'pendapatan', 'kelompok_akun' => 'pendapatan_lra', 'level' => 4, 'saldo_normal' => 'kredit'],
            
            ['kode_akun' => '5.1.1.01', 'nama_akun' => 'Beban Gaji dan Tunjangan PNS', 'jenis_akun' => 'beban', 'kelompok_akun' => 'beban', 'level' => 4, 'saldo_normal' => 'debit'],
            ['kode_akun' => '5.1.1.02', 'nama_akun' => 'Beban Jasa Pelayanan JKN', 'jenis_akun' => 'beban', 'kelompok_akun' => 'beban', 'level' => 4, 'saldo_normal' => 'debit'],
            ['kode_akun' => '5.1.2.01', 'nama_akun' => 'Beban Persediaan Obat', 'jenis_akun' => 'beban', 'kelompok_akun' => 'beban', 'level' => 4, 'saldo_normal' => 'debit'],
            ['kode_akun' => '5.1.2.02', 'nama_akun' => 'Beban Persediaan BMHP', 'jenis_akun' => 'beban', 'kelompok_akun' => 'beban', 'level' => 4, 'saldo_normal' => 'debit'],
            ['kode_akun' => '5.1.2.03', 'nama_akun' => 'Beban Pemeliharaan Alat Medis', 'jenis_akun' => 'beban', 'kelompok_akun' => 'beban', 'level' => 4, 'saldo_normal' => 'debit'],
            ['kode_akun' => '5.1.2.04', 'nama_akun' => 'Beban Listrik, Air, dan Telepon', 'jenis_akun' => 'beban', 'kelompok_akun' => 'beban', 'level' => 4, 'saldo_normal' => 'debit'],
        ];
        foreach ($coas as $coa) {
            DB::table('akun_akuntansis')->insert(array_merge($coa, ['created_at' => $now, 'updated_at' => $now]));
        }

        // 5. SUMBER DANA & TAHUN ANGGARAN
        $taId = DB::table('tahun_anggarans')->insertGetId([
            'tahun' => 2026, 'status' => 'aktif', 'tanggal_mulai' => '2026-01-01', 'tanggal_selesai' => '2026-12-31', 'created_at' => $now
        ]);
        $taIdLalu = DB::table('tahun_anggarans')->insertGetId([
            'tahun' => 2025, 'status' => 'tutup', 'tanggal_mulai' => '2025-01-01', 'tanggal_selesai' => '2025-12-31', 'created_at' => Carbon::now()->subYear()
        ]);

        $sd_pad = DB::table('sumber_danas')->insertGetId(['kode' => 'SD-01', 'nama' => 'Pendapatan BLUD (Umum)', 'jenis' => 'PAD', 'tahun_anggaran' => 2026, 'total_pagu' => 2500000000, 'created_at' => $now]);
        $sd_jkn = DB::table('sumber_danas')->insertGetId(['kode' => 'SD-02', 'nama' => 'Dana Kapitasi JKN', 'jenis' => 'BPJS_Kapitasi', 'tahun_anggaran' => 2026, 'total_pagu' => 5000000000, 'created_at' => $now]);
        $sd_bok = DB::table('sumber_danas')->insertGetId(['kode' => 'SD-03', 'nama' => 'Bantuan Operasional Kesehatan (BOK)', 'jenis' => 'BOK', 'tahun_anggaran' => 2026, 'total_pagu' => 1500000000, 'created_at' => $now]);
        $sd_apbd = DB::table('sumber_danas')->insertGetId(['kode' => 'SD-04', 'nama' => 'APBD Murni', 'jenis' => 'APBD', 'tahun_anggaran' => 2026, 'total_pagu' => 800000000, 'created_at' => $now]);

        // 6. RBA (Rencana Bisnis Anggaran) - Diperbanyak
        $akun_pend_umum = DB::table('akun_akuntansis')->where('kode_akun', '4.1.4.01')->value('id');
        $akun_pend_jkn = DB::table('akun_akuntansis')->where('kode_akun', '4.1.4.02')->value('id');
        $akun_belanja_obat = DB::table('akun_akuntansis')->where('kode_akun', '5.1.2.01')->value('id');
        $akun_belanja_gaji = DB::table('akun_akuntansis')->where('kode_akun', '5.1.1.02')->value('id');
        $akun_belanja_alat = DB::table('akun_akuntansis')->where('kode_akun', '5.1.2.03')->value('id');
        
        DB::table('rencana_bisnis_anggarans')->insert([
            ['tahun_anggaran_id' => $taId, 'unit_id' => $tuId ?? 1, 'jenis' => 'pendapatan', 'akun_id' => $akun_pend_umum ?? 1, 'sumber_dana_id' => $sd_pad, 'total_target' => 2500000000, 'status' => 'disetujui', 'created_at' => $now],
            ['tahun_anggaran_id' => $taId, 'unit_id' => $tuId ?? 1, 'jenis' => 'pendapatan', 'akun_id' => $akun_pend_jkn ?? 1, 'sumber_dana_id' => $sd_jkn, 'total_target' => 5000000000, 'status' => 'disetujui', 'created_at' => $now],
            ['tahun_anggaran_id' => $taId, 'unit_id' => $gudangId ?? 1, 'jenis' => 'belanja', 'akun_id' => $akun_belanja_obat ?? 1, 'sumber_dana_id' => $sd_jkn, 'total_target' => 2000000000, 'status' => 'disetujui', 'created_at' => $now],
            ['tahun_anggaran_id' => $taId, 'unit_id' => $tuId ?? 1, 'jenis' => 'belanja', 'akun_id' => $akun_belanja_gaji ?? 1, 'sumber_dana_id' => $sd_jkn, 'total_target' => 2500000000, 'status' => 'disetujui', 'created_at' => $now],
            ['tahun_anggaran_id' => $taId, 'unit_id' => $poliUmumId ?? 1, 'jenis' => 'belanja', 'akun_id' => $akun_belanja_alat ?? 1, 'sumber_dana_id' => $sd_pad, 'total_target' => 500000000, 'status' => 'draft', 'created_at' => $now],
        ]);

        // 7. SUPPLIER - Diperbanyak
        $suppliers = [
            ['kode' => 'SUP-001', 'nama' => 'PT. Kimia Farma Trading', 'jenis' => 'Obat', 'no_telepon' => '021-123456', 'alamat' => 'Jl. Veteran No. 9, Jakarta'],
            ['kode' => 'SUP-002', 'nama' => 'CV. Medika Alat Sejahtera', 'jenis' => 'Alkes', 'no_telepon' => '021-987654', 'alamat' => 'Jl. Sudirman No. 12, Bandung'],
            ['kode' => 'SUP-003', 'nama' => 'Toko Mitra ATK', 'jenis' => 'ATK', 'no_telepon' => '08123456789', 'alamat' => 'Pasar Induk Blok B, Surabaya'],
            ['kode' => 'SUP-004', 'nama' => 'PT. Enseval Putera Megatrading', 'jenis' => 'Obat', 'no_telepon' => '021-444555', 'alamat' => 'Kawasan Industri Pulo Gadung'],
            ['kode' => 'SUP-005', 'nama' => 'PT. Indofarma Global Medika', 'jenis' => 'Obat', 'no_telepon' => '021-777888', 'alamat' => 'Jl. Gatot Subroto No 5'],
            ['kode' => 'SUP-006', 'nama' => 'PT. Anugerah Pharmindo Lestari', 'jenis' => 'Obat', 'no_telepon' => '021-111222', 'alamat' => 'Cikarang Industrial Estate'],
            ['kode' => 'SUP-007', 'nama' => 'PT. Antam Medika Alat', 'jenis' => 'Alkes', 'no_telepon' => '022-333444', 'alamat' => 'Jl. Braga No 15, Bandung'],
            ['kode' => 'SUP-008', 'nama' => 'Maju Jaya Komputer', 'jenis' => 'Lainnya', 'no_telepon' => '081122334455', 'alamat' => 'Mangga Dua Square, Jakarta'],
            ['kode' => 'SUP-009', 'nama' => 'CV. Bina Sarana Medika', 'jenis' => 'Alkes', 'no_telepon' => '024-555666', 'alamat' => 'Semarang Barat'],
            ['kode' => 'SUP-010', 'nama' => 'PT. Auto Indo Ambulans', 'jenis' => 'Lainnya', 'no_telepon' => '021-999000', 'alamat' => 'Jl. MT Haryono, Jakarta'],
        ];
        foreach ($suppliers as $s) {
            DB::table('suppliers')->insert(array_merge($s, ['created_at' => $now]));
        }

        // 8. KATEGORI ASET & ASET - Diperbanyak
        $katAset1 = DB::table('aset_kategoris')->insertGetId(['kode' => 'K-MED', 'nama' => 'Alat Medis & Keperawatan', 'jenis' => 'Peralatan', 'masa_manfaat_tahun' => 5]);
        $katAset2 = DB::table('aset_kategoris')->insertGetId(['kode' => 'K-IT', 'nama' => 'Komputer & IT', 'jenis' => 'Peralatan', 'masa_manfaat_tahun' => 3]);
        $katAset3 = DB::table('aset_kategoris')->insertGetId(['kode' => 'K-MBL', 'nama' => 'Mebel & Furnitur', 'jenis' => 'Peralatan', 'masa_manfaat_tahun' => 5]);
        $katAset4 = DB::table('aset_kategoris')->insertGetId(['kode' => 'K-KND', 'nama' => 'Kendaraan Bermotor', 'jenis' => 'Kendaraan', 'masa_manfaat_tahun' => 10]);
        
        $asetMedNames = ['Tensimeter Digital Omron', 'Stetoskop Littmann', 'Kursi Roda Standar', 'Tabung Oksigen 1m3', 'Bed Pasien Elektrik', 'ECG Monitor 3 Channel', 'Doppler Fetal Monitor', 'Lampu Tindakan Halogen', 'Sterilisator Kering', 'Timbangan Bayi Digital'];
        for ($i=1; $i<=30; $i++) {
            DB::table('asets')->insert([
                'kode_aset' => 'AST-MED-' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'nama_aset' => $asetMedNames[array_rand($asetMedNames)] . ' Unit ' . $i,
                'kategori_id' => $katAset1,
                'tanggal_perolehan' => Carbon::now()->subMonths(rand(1, 48))->format('Y-m-d'),
                'nilai_perolehan' => rand(50, 1500) * 10000,
                'nilai_buku' => rand(20, 100) * 10000,
                'kondisi' => rand(1,10) > 8 ? 'Rusak_Ringan' : (rand(1,10) > 9 ? 'Rusak_Berat' : 'Baik'),
                'status' => 'Aktif',
                'created_at' => $now,
            ]);
        }
        for ($i=1; $i<=20; $i++) {
            DB::table('asets')->insert([
                'kode_aset' => 'AST-IT-' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'nama_aset' => (rand(1,2) == 1 ? 'PC Desktop Lenovo Core i5' : 'Printer Epson L3110') . ' Unit ' . $i,
                'kategori_id' => $katAset2,
                'tanggal_perolehan' => Carbon::now()->subMonths(rand(1, 24))->format('Y-m-d'),
                'nilai_perolehan' => rand(200, 1200) * 10000,
                'nilai_buku' => rand(100, 800) * 10000,
                'kondisi' => rand(1,10) > 8 ? 'Rusak_Ringan' : 'Baik',
                'status' => 'Aktif',
                'created_at' => $now,
            ]);
        }
        DB::table('asets')->insert([
            'kode_aset' => 'AST-KND-0001',
            'nama_aset' => 'Ambulans APV Arena',
            'kategori_id' => $katAset4,
            'tanggal_perolehan' => Carbon::now()->subMonths(12)->format('Y-m-d'),
            'nilai_perolehan' => 250000000,
            'nilai_buku' => 225000000,
            'kondisi' => 'Baik',
            'status' => 'Aktif',
            'created_at' => $now,
        ]);

        // 9. OBAT & ALKES KATEGORI - Diperbanyak
        $katObat = DB::table('obat_alkes_kategoris')->insertGetId(['kode' => 'KO-01', 'nama' => 'Obat-obatan Medis', 'jenis' => 'Obat']);
        $katAlkes = DB::table('obat_alkes_kategoris')->insertGetId(['kode' => 'KA-01', 'nama' => 'Alat Kesehatan & BMHP', 'jenis' => 'Alkes']);
        $katSirup = DB::table('obat_alkes_kategoris')->insertGetId(['kode' => 'KO-02', 'nama' => 'Obat Sirup / Cair', 'jenis' => 'Obat']);

        $obats = [
            ['kategori_id' => $katObat, 'kode_barang' => 'OBT-001', 'nama_generik' => 'Paracetamol 500mg', 'satuan' => 'Tablet'],
            ['kategori_id' => $katObat, 'kode_barang' => 'OBT-002', 'nama_generik' => 'Amoxicillin 500mg', 'satuan' => 'Kapsul'],
            ['kategori_id' => $katObat, 'kode_barang' => 'OBT-003', 'nama_generik' => 'Ibuprofen 400mg', 'satuan' => 'Tablet'],
            ['kategori_id' => $katObat, 'kode_barang' => 'OBT-004', 'nama_generik' => 'Vitamin C 50mg', 'satuan' => 'Tablet'],
            ['kategori_id' => $katObat, 'kode_barang' => 'OBT-005', 'nama_generik' => 'Cetirizine 10mg', 'satuan' => 'Tablet'],
            ['kategori_id' => $katObat, 'kode_barang' => 'OBT-006', 'nama_generik' => 'Amlodipine 5mg', 'satuan' => 'Tablet'],
            ['kategori_id' => $katObat, 'kode_barang' => 'OBT-007', 'nama_generik' => 'Metformin 500mg', 'satuan' => 'Tablet'],
            ['kategori_id' => $katObat, 'kode_barang' => 'OBT-008', 'nama_generik' => 'Captopril 25mg', 'satuan' => 'Tablet'],
            ['kategori_id' => $katObat, 'kode_barang' => 'OBT-009', 'nama_generik' => 'Omeprazole 20mg', 'satuan' => 'Kapsul'],
            ['kategori_id' => $katObat, 'kode_barang' => 'OBT-010', 'nama_generik' => 'Antasida Doen', 'satuan' => 'Tablet Kunyah'],
            ['kategori_id' => $katSirup, 'kode_barang' => 'OBT-011', 'nama_generik' => 'Paracetamol Sirup 120mg/5ml', 'satuan' => 'Botol'],
            ['kategori_id' => $katSirup, 'kode_barang' => 'OBT-012', 'nama_generik' => 'Ambroxol Sirup', 'satuan' => 'Botol'],
            ['kategori_id' => $katSirup, 'kode_barang' => 'OBT-013', 'nama_generik' => 'Antasida Doen Suspensi', 'satuan' => 'Botol'],
            ['kategori_id' => $katAlkes, 'kode_barang' => 'ALK-001', 'nama_generik' => 'Masker Bedah 3 Ply', 'satuan' => 'Box'],
            ['kategori_id' => $katAlkes, 'kode_barang' => 'ALK-002', 'nama_generik' => 'Handscoon Non-Steril', 'satuan' => 'Box'],
            ['kategori_id' => $katAlkes, 'kode_barang' => 'ALK-003', 'nama_generik' => 'Spuit 3cc', 'satuan' => 'Pcs'],
            ['kategori_id' => $katAlkes, 'kode_barang' => 'ALK-004', 'nama_generik' => 'Spuit 5cc', 'satuan' => 'Pcs'],
            ['kategori_id' => $katAlkes, 'kode_barang' => 'ALK-005', 'nama_generik' => 'Kasa Steril 16x16', 'satuan' => 'Kotak'],
            ['kategori_id' => $katAlkes, 'kode_barang' => 'ALK-006', 'nama_generik' => 'Plester Gulung', 'satuan' => 'Roll'],
            ['kategori_id' => $katAlkes, 'kode_barang' => 'ALK-007', 'nama_generik' => 'Alkohol 70% 100ml', 'satuan' => 'Botol'],
            ['kategori_id' => $katAlkes, 'kode_barang' => 'ALK-008', 'nama_generik' => 'Betadine 60ml', 'satuan' => 'Botol'],
            ['kategori_id' => $katAlkes, 'kode_barang' => 'ALK-009', 'nama_generik' => 'Infus Set Dewasa', 'satuan' => 'Set'],
            ['kategori_id' => $katAlkes, 'kode_barang' => 'ALK-010', 'nama_generik' => 'Cairan Infus RL 500ml', 'satuan' => 'Botol'],
        ];
        foreach ($obats as $o) {
            DB::table('obat_alkes')->insert(array_merge($o, ['created_at' => $now]));
        }

        // 10. INDIKATOR MUTU - Diperbanyak
        $mutus = [
            ['kode' => 'IM-01', 'nama' => 'Waktu Tunggu Rawat Jalan', 'satuan' => 'Menit', 'jenis' => 'waktu_tunggu', 'target_nilai' => 60, 'arah_target' => 'min'],
            ['kode' => 'IM-02', 'nama' => 'Ketersediaan Obat Essensial', 'satuan' => 'Persen', 'jenis' => 'ketersediaan_obat', 'target_nilai' => 100, 'arah_target' => 'max'],
            ['kode' => 'IM-03', 'nama' => 'Kepuasan Pasien', 'satuan' => 'Persen', 'jenis' => 'kepuasan', 'target_nilai' => 85, 'arah_target' => 'max'],
            ['kode' => 'IM-04', 'nama' => 'Kunjungan Pasien Hipertensi Terkendali', 'satuan' => 'Persen', 'jenis' => 'lainnya', 'target_nilai' => 80, 'arah_target' => 'max'],
            ['kode' => 'IM-05', 'nama' => 'Kecepatan Respon Komplain', 'satuan' => 'Jam', 'jenis' => 'waktu_tunggu', 'target_nilai' => 24, 'arah_target' => 'min'],
            ['kode' => 'IM-06', 'nama' => 'Kepatuhan Cuci Tangan (Hand Hygiene)', 'satuan' => 'Persen', 'jenis' => 'lainnya', 'target_nilai' => 100, 'arah_target' => 'max'],
            ['kode' => 'IM-07', 'nama' => 'Kepatuhan Penggunaan APD', 'satuan' => 'Persen', 'jenis' => 'lainnya', 'target_nilai' => 100, 'arah_target' => 'max'],
            ['kode' => 'IM-08', 'nama' => 'Angka Keterlambatan Masuk Kerja', 'satuan' => 'Persen', 'jenis' => 'lainnya', 'target_nilai' => 5, 'arah_target' => 'min'],
            ['kode' => 'IM-09', 'nama' => 'Waktu Penyediaan Dokumen Rekam Medis', 'satuan' => 'Menit', 'jenis' => 'waktu_tunggu', 'target_nilai' => 10, 'arah_target' => 'min'],
            ['kode' => 'IM-10', 'nama' => 'Kejadian Pasien Jatuh', 'satuan' => 'Kejadian', 'jenis' => 'lainnya', 'target_nilai' => 0, 'arah_target' => 'min'],
        ];
        foreach ($mutus as $m) {
            DB::table('indikator_mutus')->insert(array_merge($m, ['created_at' => $now]));
        }

        // 11. PENERIMAAN KAS - Diperbanyak (70 Data)
        for ($i=1; $i<=70; $i++) {
            DB::table('penerimaan_kass')->insert([
                'sumber_dana_id' => $sd_pad,
                'no_bukti' => 'BKM-PAD-' . date('Ym') . '-' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'tanggal' => Carbon::now()->subDays(rand(1, 180))->format('Y-m-d'),
                'jenis_penerimaan' => 'Layanan_Umum',
                'keterangan' => 'Penerimaan Retribusi Pasien Umum Poli ' . (rand(1,2)==1 ? 'Umum' : 'Gigi'),
                'jumlah' => rand(15, 350) * 10000,
                'metode_pembayaran' => rand(1, 10) > 8 ? 'Qris' : 'Tunai',
                'status' => rand(1, 100) > 5 ? 'posted' : 'draft',
                'input_oleh' => 1,
                'created_at' => $now
            ]);
        }
        // Penerimaan JKN Bulanan (12 Bulan)
        for ($i=1; $i<=12; $i++) {
            DB::table('penerimaan_kass')->insert([
                'sumber_dana_id' => $sd_jkn,
                'no_bukti' => 'BKM-JKN-' . date('Ym') . '-' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'tanggal' => Carbon::now()->subMonths($i)->startOfMonth()->addDays(rand(2, 5))->format('Y-m-d'),
                'jenis_penerimaan' => 'BPJS_Kapitasi',
                'keterangan' => 'Penerimaan Dana Kapitasi JKN Bulan Ke-' . $i,
                'jumlah' => 350000000 + rand(-10000000, 10000000),
                'metode_pembayaran' => 'Transfer',
                'status' => 'posted',
                'input_oleh' => 1,
                'created_at' => $now
            ]);
        }

        // 12. PENGELUARAN KAS - Diperbanyak (80 Data)
        for ($i=1; $i<=50; $i++) {
            DB::table('pengeluaran_kass')->insert([
                'sumber_dana_id' => $sd_pad,
                'no_bukti' => 'BKK-PAD-' . date('Ym') . '-' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'tanggal' => Carbon::now()->subDays(rand(1, 180))->format('Y-m-d'),
                'jenis_pengeluaran' => rand(1, 2) == 1 ? 'ATK' : 'Operasional',
                'keterangan' => 'Pembayaran Tagihan Operasional Puskesmas ' . $i,
                'jumlah_bruto' => rand(50, 500) * 10000,
                'jumlah_neto' => rand(48, 500) * 10000,
                'metode_pembayaran' => rand(1, 10) > 6 ? 'Transfer' : 'Tunai',
                'status' => rand(1, 100) > 5 ? 'dibayar' : 'draft',
                'input_oleh' => 1,
                'created_at' => $now
            ]);
        }
        for ($i=1; $i<=30; $i++) {
            DB::table('pengeluaran_kass')->insert([
                'sumber_dana_id' => $sd_jkn,
                'no_bukti' => 'BKK-JKN-' . date('Ym') . '-' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'tanggal' => Carbon::now()->subDays(rand(1, 180))->format('Y-m-d'),
                'jenis_pengeluaran' => rand(1, 3) == 1 ? 'Jasa_Pegawai' : (rand(1, 2) == 1 ? 'Obat' : 'Alkes'),
                'keterangan' => 'Pembayaran Tagihan JKN / Operasional Medis ' . $i,
                'jumlah_bruto' => rand(1000, 15000) * 10000,
                'jumlah_neto' => rand(950, 14500) * 10000,
                'metode_pembayaran' => 'Transfer',
                'status' => 'dibayar',
                'input_oleh' => 1,
                'created_at' => $now
            ]);
        }

        // 13. JURNAL UMUM - Diperbanyak (150 Data)
        for ($i=1; $i<=150; $i++) {
            $amt = rand(10, 500) * 10000;
            DB::table('jurnal_umums')->insert([
                'no_jurnal' => 'JU-' . date('Ym') . '-' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'tanggal' => Carbon::now()->subDays(rand(1, 360))->format('Y-m-d'),
                'keterangan' => 'Pencatatan Jurnal Akuntansi Harian ' . $i,
                'sumber' => rand(1, 3) == 1 ? 'penerimaan' : (rand(1, 2) == 1 ? 'pengeluaran' : 'manual'),
                'referensi_id' => rand(1, 50),
                'total_debit' => $amt,
                'total_kredit' => $amt,
                'status' => rand(1, 100) > 10 ? 'posted' : 'draft',
                'dibuat_oleh' => 1,
                'created_at' => $now
            ]);
        }

        // ==========================================
        // 13. Jaspel Perhitungan & Details
        // ==========================================
        $jaspelIds = [];
        $sumberJaspel = ['BPJS', 'Umum', 'BOK'];
        $statusJaspel = ['draft', 'verifikasi_ppk', 'approved_kepala', 'dicairkan'];
        
        for ($i = 1; $i <= 12; $i++) {
            $jaspelId = DB::table('jaspel_perhitungans')->insertGetId([
                'periode_bulan' => $i,
                'periode_tahun' => 2026,
                'sumber_dana' => $sumberJaspel[array_rand($sumberJaspel)],
                'total_dana' => rand(500, 2000) * 100000, // 50jt - 200jt
                'status' => $statusJaspel[array_rand($statusJaspel)],
                'created_at' => Carbon::now()->subMonths(12 - $i)
            ]);
            $jaspelIds[] = $jaspelId;
        }

        $pegawaiIds = DB::table('pegawais')->pluck('id')->toArray();

        foreach ($jaspelIds as $jid) {
            $jaspelPerhitungan = DB::table('jaspel_perhitungans')->where('id', $jid)->first();
            // Assign some amount to rand 20-50 pegawai
            $pegawaiRand = (array) array_rand(array_flip($pegawaiIds), rand(20, min(50, count($pegawaiIds))));
            $totalDana = $jaspelPerhitungan->total_dana;
            $danaPerPegawai = $totalDana / count($pegawaiRand);

            foreach ($pegawaiRand as $pid) {
                DB::table('jaspel_details')->insert([
                    'jaspel_perhitungan_id' => $jid,
                    'pegawai_id' => $pid,
                    'skor_total' => rand(50, 200),
                    'nominal_diterima' => $danaPerPegawai + (rand(-10, 10) * 10000), // slight variation
                    'created_at' => $jaspelPerhitungan->created_at
                ]);
            }
        }

        // ==========================================
        // 14. SPM Indikator & Capaian
        // ==========================================
        $spmList = [
            ['jenis_layanan' => 'Pelayanan Gawat Darurat', 'indikator' => 'Waktu tanggap pelayanan Dokter di Gawat Darurat <= 5 menit', 'standar_persentase' => 100],
            ['jenis_layanan' => 'Pelayanan Rawat Jalan', 'indikator' => 'Waktu tunggu di Rawat Jalan <= 60 menit', 'standar_persentase' => 100],
            ['jenis_layanan' => 'Pelayanan Rawat Inap', 'indikator' => 'Tidak adanya kejadian pasien jatuh yang berakibat cacat/kematian', 'standar_persentase' => 100],
            ['jenis_layanan' => 'Pelayanan Bedah', 'indikator' => 'Waktu tunggu operasi elektif <= 2 hari', 'standar_persentase' => 100],
            ['jenis_layanan' => 'Pelayanan Farmasi', 'indikator' => 'Waktu tunggu pelayanan resep obat jadi <= 30 menit', 'standar_persentase' => 100],
            ['jenis_layanan' => 'Pelayanan Rekam Medis', 'indikator' => 'Waktu penyediaan dokumen rekam medis rawat jalan <= 10 menit', 'standar_persentase' => 100],
            ['jenis_layanan' => 'Pelayanan Laboratorium', 'indikator' => 'Waktu tunggu hasil pelayanan laboratorium <= 120 menit', 'standar_persentase' => 100],
        ];

        $spmIds = [];
        foreach ($spmList as $spm) {
            $spmIds[] = DB::table('spm_indikators')->insertGetId([
                'jenis_layanan' => $spm['jenis_layanan'],
                'indikator' => $spm['indikator'],
                'standar_persentase' => $spm['standar_persentase'],
                'is_aktif' => 1,
                'created_at' => Carbon::now(),
            ]);
        }

        foreach ($spmIds as $spmId) {
            for ($bulan = 1; $bulan <= 12; $bulan++) {
                DB::table('spm_capaians')->insert([
                    'spm_indikator_id' => $spmId,
                    'periode_bulan' => $bulan,
                    'periode_tahun' => 2026,
                    'nilai_capaian' => rand(85, 100), // Random capaian 85% to 100%
                    'keterangan' => 'Tercapai dengan baik',
                    'created_at' => Carbon::now()->subMonths(12 - $bulan),
                ]);
            }
        }

        // ==========================================
        // 15. Kontrak Pihak Ketiga (KSO & Limbah)
        // ==========================================
        $kontraks = [
            ['nomor_kontrak' => 'KTR/2026/001', 'nama_vendor' => 'PT Medika Lab Indo', 'jenis_kontrak' => 'KSO_Alat', 'tanggal_mulai' => Carbon::now()->subMonths(10)->format('Y-m-d'), 'tanggal_selesai' => Carbon::now()->addDays(20)->format('Y-m-d'), 'nilai_kontrak' => 150000000, 'status' => 'Aktif'],
            ['nomor_kontrak' => 'KTR/2026/002', 'nama_vendor' => 'CV Hijau Lestari', 'jenis_kontrak' => 'Limbah_B3', 'tanggal_mulai' => Carbon::now()->subMonths(11)->format('Y-m-d'), 'tanggal_selesai' => Carbon::now()->addDays(15)->format('Y-m-d'), 'nilai_kontrak' => 50000000, 'status' => 'Aktif'],
            ['nomor_kontrak' => 'KTR/2026/003', 'nama_vendor' => 'PT Cendana Security', 'jenis_kontrak' => 'Jasa_Keamanan', 'tanggal_mulai' => Carbon::now()->subMonths(6)->format('Y-m-d'), 'tanggal_selesai' => Carbon::now()->addDays(-5)->format('Y-m-d'), 'nilai_kontrak' => 120000000, 'status' => 'Selesai'],
            ['nomor_kontrak' => 'KTR/2026/004', 'nama_vendor' => 'PT IT Health Solution', 'jenis_kontrak' => 'IT_System', 'tanggal_mulai' => Carbon::now()->subMonths(2)->format('Y-m-d'), 'tanggal_selesai' => Carbon::now()->addMonths(10)->format('Y-m-d'), 'nilai_kontrak' => 75000000, 'status' => 'Aktif'],
        ];

        foreach ($kontraks as $k) {
            DB::table('kontrak_pihak_ketigas')->insert(array_merge($k, ['created_at' => Carbon::now()]));
        }

        $this->command->info('Database Seeded Successfully with Massive Realistic Dummy Data!');
    }
}
