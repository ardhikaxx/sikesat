<?php

namespace App\Http\Controllers;

use App\Models\JaspelPerhitungan;
use Illuminate\Http\Request;

class JaspelPerhitunganController extends Controller
{
    public function index()
    {
        $data = JaspelPerhitungan::latest()->get();
        return view('jaspel-perhitungan.index', compact('data'));
    }

    public function create()
    {
        return view('jaspel-perhitungan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'periode_bulan' => 'required|numeric|min:1|max:12',
            'periode_tahun' => 'required|numeric',
            'sumber_dana' => 'required',
            'total_dana' => 'required|numeric|min:0',
        ]);

        $jaspel = JaspelPerhitungan::create([
            'periode_bulan' => $request->periode_bulan,
            'periode_tahun' => $request->periode_tahun,
            'sumber_dana' => $request->sumber_dana,
            'total_dana' => $request->total_dana,
            'status' => 'draft'
        ]);

        // Kalkulasi Jaspel Otomatis
        $pegawais = \App\Models\Pegawai::where('status_aktif', 1)->get();
        $details = [];
        $totalSkor = 0;

        // Simulasi penilaian (Pendidikan + Beban Kerja + Kehadiran)
        foreach($pegawais as $pegawai) {
            $skor = rand(50, 150); // Simulasi skor
            if (stripos($pegawai->jabatan, 'Dokter') !== false) {
                $skor += 50;
            }
            $totalSkor += $skor;
            
            $details[] = [
                'pegawai_id' => $pegawai->id,
                'skor_total' => $skor,
            ];
        }

        // Hitung nominal uang
        if ($totalSkor > 0) {
            foreach($details as $d) {
                $nominal = ($d['skor_total'] / $totalSkor) * $jaspel->total_dana;
                \Illuminate\Support\Facades\DB::table('jaspel_details')->insert([
                    'jaspel_perhitungan_id' => $jaspel->id,
                    'pegawai_id' => $d['pegawai_id'],
                    'skor_total' => $d['skor_total'],
                    'nominal_diterima' => $nominal,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }

        return redirect()->route('jaspel-perhitungan.show', $jaspel->id)->with('sukses', 'Perhitungan Jaspel berhasil digenerate secara otomatis!');
    }

    public function show($id)
    {
        $data = JaspelPerhitungan::findOrFail($id);
        $details = \Illuminate\Support\Facades\DB::table('jaspel_details')
                    ->join('pegawais', 'jaspel_details.pegawai_id', '=', 'pegawais.id')
                    ->where('jaspel_perhitungan_id', $id)
                    ->select('jaspel_details.*', 'pegawais.nama', 'pegawais.jabatan', 'pegawais.jenis_pegawai')
                    ->orderByDesc('nominal_diterima')
                    ->get();

        return view('jaspel-perhitungan.show', compact('data', 'details'));
    }

    public function edit($id)
    {
        $data = JaspelPerhitungan::findOrFail($id);
        return view('jaspel-perhitungan.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = JaspelPerhitungan::findOrFail($id);
        $data->update($request->except(['_token', '_method']));
        return redirect()->route('jaspel-perhitungan.index')->with('sukses', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        JaspelPerhitungan::destroy($id);
        return redirect()->route('jaspel-perhitungan.index')->with('sukses', 'Data berhasil dihapus');
    }
}
