# Lab7Web (1)
- Nama: Askaria Davan Dafyanza
- NIM: 312410298
- Kelas: I241B
- Mata Kuliah: Pemrograman Web 2

# PHP Codeigniter

# 📌 Praktikum Pemrograman Web 2  
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
