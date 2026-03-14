<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pelacakan Alumni - {{ $alumnis->count() }} Data</title>
    <style>
        body { font-family: sans-serif; margin: 40px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #f4f4f4; }
        .btn-track { background-color: #007bff; color: white; border: none; padding: 5px 10px; cursor: pointer; border-radius: 4px; }
        .status-badge { padding: 4px 8px; border-radius: 4px; font-size: 12px; }
    </style>
</head>
<body>
    <h1>Sistem Pelacakan Alumni</h1>

    @if(session('success'))
        <div style="color: green; margin-bottom: 20px;">{{ session('success') }}</div>
    @endif

    <h3>1. Input Data Alumni Baru (Aktor Admin)</h3>
    <form action="{{ route('alumni.store') }}" method="POST">
        @csrf
        <input type="text" name="nama" placeholder="Nama Lengkap" required>
        <input type="text" name="nim" placeholder="NIM" required>
        <input type="text" name="prodi" placeholder="Prodi (Informatika, dll)" required>
        <input type="number" name="tahun_lulus" placeholder="Tahun Lulus" required>
        <button type="submit">Simpan Data</button>
    </form>

    <hr>

    <h3>2. Daftar Pelacakan (Aktor Sistem)</h3>
    <table>
        <thead>
            <tr>
                <th>Nama Alumni</th>
                <th>Prodi</th>
                <th>Tahun Lulus</th>
                <th>Status Terakhir</th>
                <th>Confidence Score</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alumnis as $a)
            <tr>
                <td>{{ $a->nama }}</td>
                <td>{{ $a->prodi }}</td>
                <td>{{ $a->tahun_lulus }}</td>
                <td>
                    @php $lastTrack = $a->trackingResults->last(); @endphp
                    @if($lastTrack)
                        <span class="status-badge">{{ $lastTrack->status }}</span>
                    @else
                        <span style="color: #999;">Belum Dilacak</span>
                    @endif
                </td>
                <td>{{ $lastTrack ? $lastTrack->score . '%' : '-' }}</td>
                <td>
                    <form action="{{ route('alumni.track', $a->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn-track">Jalankan Job Pelacakan</button>
                    </form>
                    @if($lastTrack)
                        <a href="{{ $lastTrack->link_bukti }}" target="_blank" style="font-size: 11px;">Lihat Bukti Digital</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>