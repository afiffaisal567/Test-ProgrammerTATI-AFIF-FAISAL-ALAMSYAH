# 📝 Log Pegawai – Laravel Project

Sistem manajemen **log harian pegawai** dengan fitur autentikasi, struktur atasan-bawahan, verifikasi log, dan REST API untuk data wilayah Indonesia. Dibangun dengan Laravel 11, Breeze, dan Tailwind CSS.

---

## 🚀 Fitur Utama

### 🔐 Autentikasi
- Register/Login menggunakan Laravel Breeze
- Role-based access (`staf`, `kepala_bidang`, `kepala_dinas`)

### ✍️ Log Harian Pegawai
- Pegawai mengisi log aktivitas harian
- Status default: `Pending`
- Atasan dapat memverifikasi log → `Disetujui` atau `Ditolak`

### ✅ Verifikasi Log
- Hanya role `kepala_bidang` dan `kepala_dinas` yang dapat mengakses halaman verifikasi log bawahan

### 🌍 REST API Provinsi (Soal 2)
- CRUD data provinsi Indonesia dengan endpoint:
  - `GET /api/provinsi`
  - `GET /api/provinsi/{id}`
  - `POST /api/provinsi`
  - `PUT /api/provinsi/{id}`
  - `DELETE /api/provinsi/{id}`
- Import otomatis dari [wilayah.id](https://wilayah.id/api/provinces.json)

### 📊 Fungsi Predikat Kinerja (Soal 3)
- Fungsi `predikat_kinerja($hasil, $perilaku)`:
  - "Sangat Baik", "Baik", "Cukup", "Kurang"
- Tersedia halaman uji coba sederhana di `/uji-predikat`

### 🔁 Fungsi HelloWorld (Soal 4)
- Route: `/helloworld/{n}`
- Menampilkan angka 1–n dengan aturan:
  - Kelipatan 4 → "hello"
  - Kelipatan 5 → "world"
  - Kelipatan 4 dan 5 → "helloworld"

---
