# 🎓 Alumni Tracer & Tracking System
**Pengembangan Sistem Informasi Alumni - Informatika Universitas Muhammadiyah Malang**

Sistem ini dikembangkan dalam dua tahap utama (Daily Project 3 & 4) untuk mencakup pelacakan digital otomatis serta pendataan database alumni yang komprehensif.

---

## 🚀 Fitur Utama Sistem

### 🔍 1. Daily Project 3: Automated OSINT Tracking
Sistem pelacakan alumni otomatis yang memanfaatkan teknik **OSINT (Open Source Intelligence)** untuk memantau jejak digital lulusan secara real-time.
- **Profiling & Tracking:** Otomatisasi pencarian (Nama + Institusi + Prodi) ke platform LinkedIn, E-prints, dan Berita.
- **Scoring System:** Penentuan validitas data berdasarkan *Confidence Score* untuk disambiguasi nama alumni.

### 📋 2. Daily Project 4: Database Alumni 2000-2025
Pendataan mandiri 8 poin informasi penting untuk database internal kampus:
- **Informasi Lengkap:** Nama, Email, No HP, Status Kerja, Instansi, Posisi, hingga Sosial Media (LinkedIn, IG, FB, TikTok).
- **Manajemen Data:** CRUD system untuk mengelola ribuan data alumni dari tahun 2000 hingga 2025.

---

## 🔐 Sistem Keamanan & Akses (PENTING)
Sesuai instruksi, seluruh sistem kini **terlindungi oleh Middleware Auth**. Pengguna harus login terlebih dahulu untuk mengakses Dashboard Tracking maupun Database Alumni.

### 🔑 Akun Login Penilaian:
- **URL Hosting:** [https://alumni-tracer-erik.42web.io/](https://alumni-tracer-erik.42web.io/)
- **Email Admin:** `erik@umm.ac.id`
- **Password:** `admin123`

---

## 🛠️ Tech Stack
- **Framework:** Laravel 12.x
- **Styling:** Tailwind CSS (Responsive Design)
- **Database:** MySQL (Local: Laragon | Hosting: InfinityFree)
- **Auth:** Manual Authentication System (Middleware protected)

---

## 🧪 Pengujian Kualitas (UAT)

| ID | Aspek | Skenario Pengujian | Hasil | Status |
|:---|:---|:---|:---|:---|
| **U-01** | **Security** | Akses URL dashboard tanpa login | Otomatis redirect ke halaman /login | ✅ Pass |
| **U-02** | **OSINT** | Klik tombol "Lacak" (Daily 3) | Generate link pencarian digital otomatis | ✅ Pass |
| **U-03** | **Database** | Input data alumni 8 poin (Daily 4) | Data tersimpan di DB & muncul di tabel | ✅ Pass |
| **U-04** | **Navigasi** | Pindah antar tab Tugas 3 & 4 | Navigasi lancar tanpa logout otomatis | ✅ Pass |
| **U-05** | **Integrity** | Hapus data alumni | Data utama & hasil tracking ikut terhapus | ✅ Pass |

---
**Erik Putra Hernanda** (202310370311250)
*Informatika - Universitas Muhammadiyah Malang*
