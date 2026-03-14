# 🎓 Alumni Tracer System (Daily Project RK 3)

Sistem pelacakan alumni otomatis berbasis web yang memanfaatkan teknik **OSINT (Open Source Intelligence)** untuk memantau jejak digital dan distribusi karir lulusan secara real-time.

---

## 🛠️ Tech Stack
- **Framework:** Laravel 11
- **Styling:** Tailwind CSS
- **Database:** MySQL
- **Basis Data:** Google Search Aggregator (Automated OSINT)

---

## 🔍 Alur OSINT & Disambiguasi
Sistem bekerja dengan mengotomatisasi pencarian jejak digital berdasarkan parameter identitas yang diinput:
1. **Profiling**: Penggabungan kata kunci (Nama + Institusi + Prodi) secara otomatis.
2. **Tracking**: Sistem men-generate link bukti yang mengarah langsung ke web publik (LinkedIn, E-prints, Berita).
3. **Scoring**: Penentuan status alumni berdasarkan *Confidence Score* untuk membedakan alumni asli dengan data palsu (Disambiguasi Nama).

---

## 🧪 Pengujian Aspek Kualitas

| ID | Aspek Kualitas | Skenario Pengujian | Hasil Diharapkan | Status |
|:---|:---|:---|:---|:---|
| **U-01** | **Fungsionalitas** | Admin meregistrasi profil alumni baru | Data tersimpan dan muncul di tabel dashboard | ✅ Pass |
| **U-02** | **Otomatisasi** | Klik tombol "Lacak" pada baris alumni | Sistem otomatis men-generate link pencarian OSINT | ✅ Pass |
| **U-03** | **Akurasi** | Pencarian data alumni asli (UMM) | Skor mencapai 80-100% karena data relevan | ✅ Pass |
| **U-04** | **Reliabilitas** | Input data non-alumni (Kasus: Zaki) | Skor rendah (<50%) karena jejak digital tidak cocok | ✅ Pass |
| **U-05** | **Integritas** | Menghapus data utama alumni | Data utama dan hasil tracking hilang | ✅ Pass |

---

## 🔗 Tautan Project
- **Repositori:** [https://github.com/ErkPH/alumni-tracer](https://github.com/ErkPH/alumni-tracer)

---
**Erik Putra Hernanda** - Informatika Universitas Muhammadiyah Malang
