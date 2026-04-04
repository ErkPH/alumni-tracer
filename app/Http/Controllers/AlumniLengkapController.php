<?php

namespace App\Http\Controllers;

use App\Models\AlumniLengkap; 
use Illuminate\Http\Request;

class AlumniLengkapController extends Controller
{
    // Menampilkan halaman input dan daftar data
    public function index()
    {
        $alumnis = AlumniLengkap::all();
        return view('alumni_lengkap.index', compact('alumnis'));
    }

    // Menyimpan data alumni baru dari Form
    public function store(Request $request)
    {
        // Validasi simpel biar data nggak kosong
        $request->validate([
            'nama' => 'required',
        ]);

        // Simpan semua inputan (LinkedIn, IG, dll) ke database
        AlumniLengkap::create($request->all());

        return redirect()->back()->with('success', 'Data alumni berhasil disimpan!');
    }
}