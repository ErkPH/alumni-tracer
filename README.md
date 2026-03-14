# 🎓 Alumni Tracer System (Daily Project RK 3)

Sistem pelacakan alumni otomatis berbasis web yang memanfaatkan teknik **OSINT (Open Source Intelligence)** melalui Google Search untuk memantau jejak digital dan karir lulusan.

---

## 🛠️ Tech Stack
- **Framework:** Laravel 11
- **Styling:** Tailwind CSS
- **Database:** MySQL
- **Basis Data:** Google Search Aggregator

---

## 🔍 Skema OSINT (Sesuai Laporan)
Sistem bekerja dengan melakukan *automated search* berdasarkan parameter identitas:
1. **Bentuk Profil**: Penggabungan kata kunci Nama + Institusi + Prodi.
2. **Pencarian**: Sistem mengarahkan admin langsung ke hasil pencarian web publik (LinkedIn, Portal Berita, E-prints).
3. **Verifikasi**: Pemberian skor kecocokan berdasarkan temuan data di internet untuk memvalidasi status alumni.

---

## 🧪 Pengujian Aspek Kualitas

| ID | Aspek Kualitas | Skenario Pengujian | Hasil Diharapkan | Status |
|:---|:---|:---|:---|:---|
| **U-01** | **Fungsionalitas** | Admin input data alumni baru | Data muncul di tabel dashboard | ✅ Pass |
| **U-02** | **Otomatisasi** | Klik tombol "Lacak" | Sistem men-generate link pencarian OSINT | ✅ Pass |
| **U-03** | **Akurasi** | Pencarian alumni asli UMM | Skor tinggi jika data di internet relevan | ✅ Pass |
| **U-04** | **Reliabilitas** | Input data orang belum kuliah | Skor rendah karena tidak ada jejak alumni | ✅ Pass |
| **U-05** | **Integritas** | Hapus data alumni | Data utama dan hasil tracking hilang | ✅ Pass |

---

## 🔗 Tautan Project
- **Repositori:** [https://github.com/ErkPH/alumni-tracer](https://github.com/ErkPH/alumni-tracer)

---
**Erik Putra Hernanda** Informatika - Informatika UMM
