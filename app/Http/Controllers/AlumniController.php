<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function index()
    {
        $alumnis = Alumni::with('trackingResults')->get();
        return view('alumni_index', compact('alumnis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|unique:alumnis,nim',
            'prodi' => 'required|string',
            'kampus' => 'required|string',
            'tahun_lulus' => 'required|numeric',
        ]);

        Alumni::create($request->all());
        return back()->with('success', 'Profil alumni berhasil diregistrasi.');
    }

    public function track($id)
    {
        $alumni = Alumni::findOrFail($id);
        
        // Simulasi data yang "ditemukan" sistem di internet [cite: 25, 46]
        $dataTemuan = [
            'instansi' => 'Universitas Muhammadiyah Malang',
            'prodi' => 'Informatika',
            'tahun_lulus' => 2023
        ];

        $score = 0;

        /** * LOGIKA DISAMBIGUASI KETAT (Confidence Score) [cite: 21, 26, 77]
         */
        
        // 1. Verifikasi Kampus (Mandatory Filter)
        // Jika Kampus tidak sama persis, kita beri penalti berat agar skor tidak bisa tinggi.
        if (strcasecmp($dataTemuan['instansi'], $alumni->kampus) == 0) {
            $score += 40;
        } else {
            $score -= 50; // Penalti: Menjamin status tidak akan "Otomatis"
        }
        
        // 2. Verifikasi Tahun Lulus (Sinyal Identitas Utama) 
        if ($dataTemuan['tahun_lulus'] == $alumni->tahun_lulus) {
            $score += 40;
        }
        
        // 3. Verifikasi Program Studi
        if (strcasecmp($dataTemuan['prodi'], $alumni->prodi) == 0) {
            $score += 20;
        }

        // Pastikan skor berada dalam range 0 - 100
        $finalScore = max(0, min(100, $score));

        /**
         * PENENTUAN STATUS VERIFIKASI [cite: 79-85]
         */
        if ($finalScore >= 80) {
            $status = 'Alumni ditemukan otomatis'; // [cite: 80]
        } elseif ($finalScore >= 50) {
            $status = 'Perlu verifikasi manual'; // [cite: 82]
        } else {
            $status = 'Belum ditemukan'; // 
        }

        $alumni->trackingResults()->create([
            'link_bukti' => 'https://www.google.com/search?q=' . urlencode($alumni->nama . " " . $alumni->kampus),
            'score' => $finalScore,
            'status' => $status
        ]);

        return back()->with('success', 'Disambiguasi ketat selesai dijalankan.');
    }

    public function destroy($id)
    {
        $alumni = Alumni::findOrFail($id);
        $alumni->delete(); 
        return back()->with('success', 'Data alumni berhasil dihapus.');
    }
}