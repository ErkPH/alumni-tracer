<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni Tracer | Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .glass { background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(10px); }
    </style>
</head>
<body class="bg-[#F9FAFB] min-h-screen text-slate-900">

    <div class="max-w-6xl mx-auto py-12 px-6">
        
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-10 gap-4">
            <div>
                <h1 class="text-3xl font-extrabold tracking-tight text-slate-900">Alumni Tracer System</h1>
                <p class="text-slate-500 mt-1">Pantau karir dan distribusi lulusan secara otomatis.</p>
            </div>
            <div class="flex gap-3">
                <span class="px-4 py-2 bg-white border border-slate-200 rounded-full text-sm font-semibold shadow-sm text-slate-700">
                    {{ date('F Y') }}
                </span>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
                <p class="text-slate-500 text-sm font-medium">Total Terdata</p>
                <h3 class="text-3xl font-bold mt-1">{{ $alumnis->count() }} <span class="text-sm font-normal text-slate-400">Alumni</span></h3>
            </div>
            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm border-l-4 border-l-green-500">
                <p class="text-slate-500 text-sm font-medium">Teridentifikasi Otomatis</p>
                <h3 class="text-3xl font-bold mt-1 text-green-600">
                    {{ $alumnis->filter(fn($a) => $a->trackingResults->last()?->status == 'Alumni ditemukan otomatis')->count() }}
                </h3>
            </div>
            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm border-l-4 border-l-yellow-500">
                <p class="text-slate-500 text-sm font-medium">Perlu Verifikasi</p>
                <h3 class="text-3xl font-bold mt-1 text-yellow-600">
                    {{ $alumnis->filter(fn($a) => $a->trackingResults->last()?->status == 'Perlu verifikasi manual')->count() }}
                </h3>
            </div>
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
                Registrasi Alumni Baru
            </h2>
            <form action="{{ route('alumni.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-6 gap-4">
                @csrf
                <div class="md:col-span-2">
                    <input type="text" name="nama" placeholder="Nama Lengkap" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white outline-none transition-all text-sm" required>
                </div>
                <div>
                    <input type="text" name="nim" placeholder="NIM" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white outline-none transition-all text-sm" required>
                </div>
                <div>
                    <input type="text" name="prodi" placeholder="Prodi" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white outline-none transition-all text-sm" required>
                </div>
                <div>
                    <input type="text" name="kampus" placeholder="Kampus" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white outline-none transition-all text-sm" required>
                </div>
                <div>
                    <input type="number" name="tahun_lulus" placeholder="Tahun" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white outline-none transition-all text-sm" required>
                </div>
                <div class="md:col-span-6 flex justify-end">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-8 py-3 rounded-xl transition shadow-lg shadow-blue-200">
                        Simpan Data Alumni
                    </button>
                </div>
            </form>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-100 text-slate-500 text-xs font-bold uppercase tracking-widest">
                            <th class="px-8 py-5">Informasi Alumni</th>
                            <th class="px-6 py-5">Pendidikan</th>
                            <th class="px-6 py-5 text-center">Status Verifikasi</th>
                            <th class="px-6 py-5 text-center">Skor</th>
                            <th class="px-8 py-5 text-right">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @foreach($alumnis as $a)
                        <tr class="hover:bg-slate-50/50 transition">
                            <td class="px-8 py-6">
                                <div class="font-bold text-slate-900">{{ $a->nama }}</div>
                                <div class="text-xs text-slate-400 font-medium">NIM · {{ $a->nim }}</div>
                            </td>
                            <td class="px-6 py-6">
                                <div class="text-sm font-semibold text-slate-700">{{ $a->prodi }}</div>
                                <div class="text-xs text-slate-400">{{ $a->kampus ?? 'UMM' }} · {{ $a->tahun_lulus }}</div>
                            </td>
                            <td class="px-6 py-6 text-center">
                                @php $lastTrack = $a->trackingResults->last(); @endphp
                                @if($lastTrack)
                                    <span class="px-3 py-1.5 text-[10px] font-extrabold uppercase rounded-lg {{ $lastTrack->score > 80 ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700' }}">
                                        {{ $lastTrack->status }}
                                    </span>
                                @else
                                    <span class="text-xs text-slate-300 font-medium italic">Menunggu Antrean</span>
                                @endif
                            </td>
                            <td class="px-6 py-6 text-center">
                                <span class="text-sm font-black {{ $lastTrack ? 'text-slate-800' : 'text-slate-200' }}">
                                    {{ $lastTrack ? $lastTrack->score . '%' : '-' }}
                                </span>
                            </td>
                            <td class="px-8 py-6 text-right">
                                <div class="flex justify-end items-center gap-2">
                                    <form action="{{ route('alumni.track', $a->id) }}" method="POST">
                                        @csrf
                                        <button class="bg-slate-900 hover:bg-blue-600 text-white text-xs font-bold px-4 py-2 rounded-lg transition-all active:scale-95 shadow-sm">
                                            Lacak
                                        </button>
                                    </form>
                                    
                                    <form action="{{ route('alumni.destroy', $a->id) }}" method="POST" onsubmit="return confirm('Hapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="w-8 h-8 flex items-center justify-center text-slate-300 hover:text-red-500 hover:bg-red-50 rounded-lg transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                                @if($lastTrack)
                                    <div class="mt-2">
                                        <a href="{{ $lastTrack->link_bukti }}" target="_blank" class="text-[10px] font-bold text-blue-500 hover:text-blue-700 transition-colors uppercase tracking-tight">Lihat Jejak Bukti →</a>
                                    </div>
                                @endif
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