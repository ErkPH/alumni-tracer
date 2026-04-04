<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 4 | Data Alumni Lengkap</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#F9FAFB] min-h-screen text-slate-900">

    <nav class="bg-white border-b border-slate-100 sticky top-0 z-50 shadow-sm">
        <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex gap-6">
                <a href="{{ route('alumni.index') }}" class="text-sm font-medium text-slate-500 hover:text-blue-600 transition-colors">
                    Tugas 3: Tracking
                </a>
                <a href="{{ route('alumni_lengkap.index') }}" class="text-sm font-bold text-blue-600 border-b-2 border-blue-600 pb-1">
                    Tugas 4: Alumni 2000-2025
                </a>
            </div>
            <div class="text-xs font-bold text-slate-400 uppercase">ERIK - INFORMATIKA</div>
        </div>
    </nav>

    <div class="max-w-6xl mx-auto py-12 px-6">
        <div class="mb-10">
            <h1 class="text-3xl font-extrabold tracking-tight text-slate-900">Data Alumni Lengkap</h1>
            <p class="text-slate-500 mt-1">Input 8 poin data alumni sesuai instruksi Tugas 4.</p>
        </div>

        @if(session('success'))
            <div class="mb-8 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-8 mb-10">
            <h2 class="text-lg font-bold mb-6 flex items-center gap-2">
                <span class="w-2 h-6 bg-blue-600 rounded-full"></span>
                Tambah Data Alumni Baru
            </h2>
            <form action="{{ route('alumni_lengkap.store') }}" method="POST" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Lengkap</label>
                        <input type="text" name="nama" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white outline-none transition-all text-sm" placeholder="Masukkan nama alumni" required>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Email</label>
                        <input type="email" name="email" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white outline-none transition-all text-sm" placeholder="alumni@example.com">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">No HP / WA</label>
                        <input type="text" name="no_hp" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white outline-none transition-all text-sm" placeholder="08xxxx">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Status Kerja</label>
                        <select name="status_kerja" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white outline-none transition-all text-sm">
                            <option value="PNS">PNS</option>
                            <option value="Swasta">Swasta</option>
                            <option value="Wirausaha">Wirausaha</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 pt-4 border-t border-slate-100">
                    <input type="text" name="linkedin" placeholder="Username LinkedIn" class="px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-xs">
                    <input type="text" name="instagram" placeholder="Username IG" class="px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-xs">
                    <input type="text" name="facebook" placeholder="Username FB" class="px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-xs">
                    <input type="text" name="tiktok" placeholder="Username TikTok" class="px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-xs">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-slate-100">
                    <input type="text" name="tempat_bekerja" placeholder="Nama Perusahaan" class="px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm">
                    <input type="text" name="posisi" placeholder="Jabatan/Posisi" class="px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm">
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-10 py-3 rounded-xl transition shadow-lg shadow-blue-200 active:scale-95">
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-100 text-slate-500 text-xs font-bold uppercase tracking-widest">
                            <th class="px-8 py-5">Nama & Kontak</th>
                            <th class="px-6 py-5">Status</th>
                            <th class="px-6 py-5">Pekerjaan</th>
                            <th class="px-6 py-5">Sosial Media</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @foreach($alumnis as $a)
                        <tr class="hover:bg-slate-50/50 transition">
                            <td class="px-8 py-6">
                                <div class="font-bold text-slate-900">{{ $a->nama }}</div>
                                <div class="text-xs text-slate-400">{{ $a->email }} | {{ $a->no_hp }}</div>
                            </td>
                            <td class="px-6 py-6">
                                <span class="px-3 py-1 bg-blue-50 text-blue-600 text-[10px] font-bold uppercase rounded-lg">
                                    {{ $a->status_kerja }}
                                </span>
                            </td>
                            <td class="px-6 py-6">
                                <div class="text-sm font-semibold text-slate-700">{{ $a->tempat_bekerja }}</div>
                                <div class="text-xs text-slate-400">{{ $a->posisi }}</div>
                            </td>
                            <td class="px-6 py-6 text-xs text-slate-500 italic">
                                LI: {{ $a->linkedin ?? '-' }} | IG: {{ $a->instagram ?? '-' }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>