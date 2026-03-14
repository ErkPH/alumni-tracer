# 🎓 Alumni Tracer System - Daily Project RK 3

Sistem pelacakan alumni otomatis dengan **Weighted Scoring Algorithm** untuk akurasi data lulusan.

---

## 🛠️ Tech Stack
- **Framework:** Laravel 11
- **Styling:** Tailwind CSS
- **Database:** MySQL
- **Core Logic:** Identity Disambiguation & Automated Web Scraping Simulation

---

## 🧪 Pengujian Aspek Kualitas (Sesuai Desain Daily Project 2)

| ID | Aspek Kualitas | Skenario Pengujian | Hasil Diharapkan | Status | Proof (Evidence) |
|:---|:---|:---|:---|:---|:---|
| **U-01** | **Fungsionalitas** | Admin menginput data alumni baru | Data tersimpan & muncul di dashboard | ✅ Pass | <img src="screenshots/input_test.png" width="250"> |
| **U-02** | **Otomatisasi** | Klik tombol "Lacak" pada baris alumni | Sistem menjalankan logika scoring otomatis | ✅ Pass | <img src="screenshots/track_test.png" width="250"> |
| **U-03** | **Akurasi** | Pencocokan data alumni asli | Skor 100% jika Nama+Kampus+Tahun sesuai | ✅ Pass | <img src="screenshots/score_100.png" width="250"> |
| **U-04** | **Reliabilitas** | Input data non-alumni (Zaki Case) | Sistem memberi penalti skor (Disambiguasi) | ✅ Pass | <img src="screenshots/zaki_test.png" width="250"> |
| **U-05** | **Integritas** | Menghapus data alumni | Data & riwayat tracking terhapus (Cascade) | ✅ Pass | <img src="screenshots/delete_test.png" width="250"> |

---

## 🔗 Tautan Project
- **Repositori:** [https://github.com/ErkPH/alumni-tracer](https://github.com/ErkPH/alumni-tracer)

---
**Erik Putra Hernanda** Informatika - Universitas Muhammadiyah Malang
