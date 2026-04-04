# Lab7Web (1)
- Nama: Askaria Davan Dafyanza
- NIM: 312410298
- Kelas: I241B
- Mata Kuliah: Pemrograman Web 2

# PHP Codeigniter

# Praktikum Pemrograman Web 2  
## Implementasi Routing dan Layouting Menggunakan CodeIgniter 4

Project ini dibuat untuk memenuhi tugas Praktikum Pemrograman Web 2 dengan menggunakan framework CodeIgniter 4.  
Fokus utama project ini adalah memahami konsep **Routing, Controller, View, dan Layouting (Template)**.

---

# Perubahan Navigation Bar

Navigation bar diperbaiki agar sesuai dengan route yang telah didaftarkan pada `Routes.php`.  
Sebelumnya terjadi error 404 karena URL pada navbar tidak sesuai dengan routing.

Navbar diperbarui menggunakan `base_url()` agar lebih dinamis dan tidak menyebabkan error ketika project dipindahkan.

Contoh:
- `/` → Home
- `/about` → About
- `/contact` → Contact
- `/faqs` → FAQ
- `/page/tos` → Terms of Service

---

# Routing (Routes.php)

Routing digunakan untuk menghubungkan URL dengan method pada controller.

Contoh konfigurasi:
- `/` diarahkan ke `Page::home`
- `/about` diarahkan ke `Page::about`
- `/contact` diarahkan ke `Page::contact`
- `/faqs` diarahkan ke `Page::faqs`
- `/page/tos` diarahkan ke `Page::tos`

AutoRoute juga diaktifkan untuk mempermudah pemanggilan method controller.

Fungsi routing:
- Mengatur halaman yang ditampilkan berdasarkan URL
- Menghindari error 404 akibat URL yang tidak terdaftar

---

# Controller (Page.php)

Controller `Page` berfungsi untuk:
- Menerima request dari route
- Mengirim data ke view
- Menentukan tampilan yang ditampilkan

Setiap method (home, about, contact, faqs, tos) mengirimkan:
- `title`
- `content`

ke masing-masing view.

# Layouting Menggunakan Template

Agar semua halaman memiliki tampilan yang sama, digunakan template:

- `template/header.php`
- `template/footer.php`

Setiap view menggunakan:
- $this->include('template/header');
- $this->include('template/footer');

Tujuan penggunaan template:
- Menghindari pengulangan kode HTML
- Membuat tampilan konsisten
- Mempermudah pengelolaan layout

# Styling

Styling dilakukan menggunakan file CSS yang berada di folder `public/`.

CSS digunakan untuk:
- Mengatur warna tampilan
- Membuat card/kotak biru
- Mengatur layout halaman
- Membuat tampilan lebih rapi dan modern

# Struktur Project

- Controllers → Mengatur logika aplikasi
- Views → Menampilkan halaman
- Template → Header dan Footer
- Public → File CSS

# Hasil Akhir

Semua menu pada navigation bar:
- Berhasil terhubung dengan route yang benar
- Menggunakan layout yang sama
- Menggunakan template header & footer
- Memiliki tampilan yang konsisten

Project ini menunjukkan pemahaman dasar tentang konsep **MVC (Model-View-Controller)** pada CodeIgniter 4.

<img width="1920" height="1200" alt="Home" src="https://github.com/user-attachments/assets/1f2ca80f-5c49-498f-b854-6fe0eb2985d2" />
<img width="1920" height="1200" alt="About" src="https://github.com/user-attachments/assets/d2e9b51a-b330-43b5-af29-f4821eab7340" />
<img width="1920" height="1200" alt="Contact" src="https://github.com/user-attachments/assets/cb181128-a4f0-41cb-be15-dff63df29017" />
<img width="1920" height="1200" alt="FAQ" src="https://github.com/user-attachments/assets/f7804164-f5d0-4497-9ac2-9737a4c1775c" />
<img width="1920" height="1200" alt="TOS" src="https://github.com/user-attachments/assets/c451bf59-0f95-4e36-bbd6-2edd43112ce5" />

# Lab7Web (2)
## 1. Pembuatan Database dan Tabel

Pada tahap awal, kita membuat database dan tabel untuk menyimpan data artikel.

* Database dibuat dengan nama:

  ```
  lab_ci4
  ```

* Tabel `artikel` dibuat untuk menyimpan data dengan beberapa field seperti:

  * `id` (primary key, auto increment)
  * `judul`
  * `isi`
  * `status`
  * `slug`

Tujuan:
Menyediakan struktur penyimpanan data yang akan digunakan dalam operasi CRUD.

---

## ⚙️ 2. Konfigurasi Database

Konfigurasi database dilakukan pada file `.env` dengan mengatur:

* hostname
* database
* username
* password

Fungsi:
Agar aplikasi CodeIgniter dapat terhubung dengan database MySQL.

---

## 3. Pembuatan Model

Model dibuat dengan nama `ArtikelModel`.

Di dalam model ini:

* Menggunakan `$table = 'artikel'`
* Mengaktifkan `$allowedFields` untuk menentukan field yang boleh diisi
* Menggunakan `$useTimestamps` jika diperlukan

Fungsi:
Model digunakan untuk mengelola interaksi dengan database seperti:

* mengambil data
* menyimpan data
* mengupdate data
* menghapus data

---

## 4. Pembuatan Controller

Controller dibuat dengan nama `Artikel`.

Beberapa method yang dibuat antara lain:

### `index()`

* Mengambil semua data artikel dari database
* Mengirim data ke view

Digunakan untuk menampilkan daftar artikel.

---

### `view($slug)`

* Mengambil satu data artikel berdasarkan slug
* Jika data tidak ditemukan, menampilkan error 404

Digunakan untuk menampilkan detail artikel.

---

### `admin_index()`

* Menampilkan daftar artikel khusus halaman admin

Digunakan untuk mengelola data (edit & delete).

---

### `add()`

* Menampilkan form tambah artikel
* Menyimpan data baru ke database menggunakan method `insert()`

Digunakan untuk menambahkan data baru.

---

### `edit($id)`

* Mengambil data berdasarkan ID
* Menampilkan form edit
* Mengupdate data menggunakan method `update()`

Digunakan untuk mengubah data artikel.

---

### `delete($id)`

* Menghapus data berdasarkan ID menggunakan method `delete()`

Digunakan untuk menghapus data artikel.

---

## 5. Pembuatan View

Beberapa view yang dibuat:

### `index.php`

* Menampilkan daftar artikel
* Menampilkan judul, isi, dan gambar (jika ada)

---

### `detail.php`

* Menampilkan detail artikel secara lengkap

---

### `admin_index.php`

* Menampilkan tabel data artikel
* Menyediakan tombol:

  * Edit
  * Delete

---

### `form_add.php` & `form_edit.php`

* Digunakan untuk input data artikel
* Berisi field:

  * Judul
  * Isi

Fungsi:
View digunakan sebagai tampilan antarmuka pengguna.

---

## 🔗 6. Routing

Routing ditambahkan untuk menghubungkan URL dengan controller, seperti:

* `/artikel` → menampilkan daftar artikel
* `/artikel/{slug}` → detail artikel
* `/admin/artikel` → halaman admin
* `/artikel/add` → tambah artikel
* `/artikel/edit/{id}` → edit artikel
* `/artikel/delete/{id}` → hapus artikel

Fungsi:
Mengatur alur navigasi dalam aplikasi.

---

## 7. Implementasi CRUD

Pada praktikum ini, seluruh operasi CRUD berhasil diimplementasikan:

* **Create** → menambahkan data artikel
* **Read** → menampilkan daftar & detail artikel
* **Update** → mengedit data artikel
* **Delete** → menghapus data artikel

<img width="1593" height="1152" alt="Screenshot 2026-04-04 213454" src="https://github.com/user-attachments/assets/22e85098-a9e6-43f7-b2fb-17603bd68c61" />
<img width="1604" height="1150" alt="Screenshot 2026-04-04 213511" src="https://github.com/user-attachments/assets/796303ae-42a7-4455-9213-9dc64870db52" />
<img width="1603" height="1148" alt="Screenshot 2026-04-04 213528" src="https://github.com/user-attachments/assets/e8152905-c8c2-4f68-8e0d-7fa10daddb9d" />
<img width="1601" height="1149" alt="Screenshot 2026-04-04 213548" src="https://github.com/user-attachments/assets/964dd06d-e5b5-4bf8-9099-9c91960ec569" />
