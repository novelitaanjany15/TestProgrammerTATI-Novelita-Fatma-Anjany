# Test Programmer (Intern) - PT. Tatacipta Teknologi Indonesia (TATI)

Repositori ini berisi penyelesaian tugas seleksi Programmer (Intern) untuk PT. Tatacipta Teknologi Indonesia (TATI). Tugas ini mencakup pengembangan sistem manajemen log, pembuatan RESTful API, dan implementasi logika algoritma menggunakan framework Laravel.

**Nama:** Novelita Fatma Anjany  
**Posisi:** Programmer (Intern)  
**URL Repositori:** [https://github.com/novelitaanjany15/TestProgrammerTATI-Novelita-Fatma-Anjany](https://github.com/novelitaanjany15/TestProgrammerTATI-Novelita-Fatma-Anjany)

---

## 🛠️ Ringkasan Penyelesaian Tugas

### 1. Soal 1: CRUD Log Harian & Verifikasi (Point 50)
Sistem manajemen log harian pegawai dengan struktur hierarki atasan-bawahan (Kepala Dinas -> Kepala Bidang -> Staff).
* **Fitur Utama**: Input log harian dengan status otomatis **Pending**.
* **Fitur Verifikasi**: Atasan memiliki akses untuk menyetujui (**Disetujui**) atau menolak (**Ditolak**) log kerja bawahan langsungnya.
* **Folder**: `logharian/`

### 2. Soal 2: REST API Provinsi Indonesia (Point 25)
REST API untuk manajemen data provinsi di Indonesia menggunakan database MySQL.
* **Data Source**: Sinkronisasi data dari [wilayah.id](https://wilayah.id/) sesuai Kepmendagri No 300.2.2-2138 Tahun 2025.
* **Endpoints**: 
  - `GET /api/provinsi` (Daftar semua provinsi)
  - `GET /api/provinsi/{id}` (Detail provinsi)
  - `POST /api/provinsi` (Tambah data baru)
  - `PUT /api/provinsi/{id}` (Update data)
  - `DELETE /api/provinsi/{id}` (Hapus data)
* **Folder**: `data_provinsi/`

### 3. Soal 3: Matriks Predikat Kinerja (Point 15)
Fungsi PHP `predikat_kinerja($hasil_kerja, $perilaku)` untuk menentukan predikat kinerja pegawai (Sangat Baik, Baik, Butuh Perbaikan, dsb) berdasarkan matriks hasil kerja dan perilaku.
* **Folder**: `predikat_kinerja/`

### 4. Soal 4: Fungsi HelloWorld (Point 10)
Fungsi `helloworld($n)` yang menampilkan deret bilangan 1 sampai $n$ dengan logika:
* Kelipatan 4: **"hello"**
* Kelipatan 5: **"world"**
* Kelipatan 4 & 5: **"helloworld"**
* **Folder**: `helloworld/`

---

## 🚀 Cara Menjalankan Project (Laravel)

Untuk mencoba **Soal 1** dan **Soal 2**, ikuti langkah berikut:

1. **Clone Repositori**:
   ```bash
   git clone [https://github.com/novelitaanjany15/TestProgrammerTATI-Novelita-Fatma-Anjany.git](https://github.com/novelitaanjany15/TestProgrammerTATI-Novelita-Fatma-Anjany.git)
