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

# Lab7Web (3)
## 1. Membuat Layout Utama

Membuat template utama agar semua halaman memiliki struktur yang sama.

Lokasi:

```
app/Views/layout/main.php
```

### Fungsi yang digunakan:

* `<?= $this->renderSection('content') ?>`
  Digunakan untuk menampilkan isi konten dari halaman yang menggunakan layout

* `base_url()`
  Untuk membuat URL dinamis (CSS, link menu, dll)

---

## 2. Menggunakan Layout di View

Contoh implementasi pada file view (misalnya `home.php`):

```php
<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<h1><?= $title; ?></h1>
<p><?= $content; ?></p>

<?= $this->endSection() ?>
```

### Penjelasan:

* `$this->extend('layout/main')`
  Menghubungkan view dengan layout utama

* `$this->section('content')`
  Mendefinisikan bagian yang akan dimasukkan ke layout

* `$this->endSection()`
  Menutup section

---

## 3. View Cell (Komponen Modular)

View Cell digunakan untuk membuat komponen yang bisa dipanggil berulang, seperti:

* Sidebar
* Widget
* Menu
* Artikel terbaru

---

## 4. Membuat View Cell

Lokasi:

```
app/Cells/ArtikelTerkini.php
```

### Contoh kode:

```php
class ArtikelTerkini extends Cell
{
    public function render()
    {
        $model = new ArtikelModel();
        $artikel = $model->orderBy('created_at', 'DESC')
                         ->limit(5)
                         ->findAll();

        return view('components/artikel_terkini', ['artikel' => $artikel]);
    }
}
```

### Penjelasan:

* `Cell`
  Class bawaan CodeIgniter untuk membuat View Cell

* `orderBy('created_at', 'DESC')`
  Mengurutkan artikel terbaru

* `limit(5)`
  Membatasi jumlah data

* `view()`
  Mengembalikan tampilan komponen

---

## 5. Membuat View untuk Cell

Lokasi:

```
app/Views/components/artikel_terkini.php
```

### Contoh:

```php
<h3>Artikel Terkini</h3>
<ul>
    <?php foreach ($artikel as $row): ?>
        <li>
            <a href="<?= base_url('/artikel/' . $row['slug']) ?>">
                <?= $row['judul'] ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
```

---

## 6. Memanggil View Cell di Layout

Di dalam `main.php`:

```php
<?= view_cell('App\\Cells\\ArtikelTerkini::render') ?>
```

### Penjelasan:

* `view_cell()`
  Untuk memanggil class View Cell dan menampilkan hasilnya

---

### ✅ Perbedaan View vs View Cell:

| View Biasa                    | View Cell                      |
| ----------------------------- | ------------------------------ |
| Digunakan untuk halaman utama | Digunakan untuk komponen kecil |
| Dipanggil dari controller     | Dipanggil langsung di view     |
| Tidak modular                 | Modular & reusable             |

<img width="1593" height="1148" alt="Screenshot 2026-04-04 222419" src="https://github.com/user-attachments/assets/a17002b3-5b53-464e-ac8d-c72186470e9b" />

# Lab7Web (4)
## 1. Membuat Tabel User

Digunakan untuk menyimpan data login user.

```sql
CREATE TABLE user (
  id INT(11) auto_increment,
  username VARCHAR(200) NOT NULL,
  useremail VARCHAR(200),
  userpassword VARCHAR(200),
  PRIMARY KEY(id)
);
```

---

## 2. Membuat Model User

`app/Models/UserModel.php`

```php
class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['username', 'useremail', 'userpassword'];
}
```

### Fungsi:

* Menghubungkan aplikasi dengan tabel `user`
* Mengelola data user (ambil, insert, dll)

---

## 3. Membuat Controller User

`app/Controllers/User.php`

### Method `index()`

```php
$model = new UserModel();
$users = $model->findAll();
```

Menampilkan semua data user

---

### Method `login()`

```php
$email = $this->request->getPost('email');
$password = $this->request->getPost('password');
```

Mengambil input dari form

```php
$login = $model->where('useremail', $email)->first();
```

Mencari user berdasarkan email

```php
password_verify($password, $pass)
```

Mencocokkan password dengan hash di database

---

### Session Login

```php
$session->set([
    'user_id' => $login['id'],
    'user_name' => $login['username'],
    'user_email' => $login['useremail'],
    'logged_in' => TRUE,
]);
```

Menyimpan status login user

---

### Flash Message (Error)

```php
$session->setFlashdata("flash_msg", "Password salah.");
```

Menampilkan pesan error sementara

---

## 4. Membuat View Login

`app/Views/user/login.php`

### Fungsi yang digunakan:

* `session()->getFlashdata()`
  Menampilkan pesan error

* `set_value('email')`
  Menyimpan input sebelumnya jika gagal login

---

## 5. Database Seeder

Seeder digunakan untuk membuat data dummy user.

### Membuat Seeder:

```bash
php spark make:seeder UserSeeder
```

### Isi Seeder:

```php
$model->insert([
    'username' => 'admin',
    'useremail' => 'admin@email.com',
    'userpassword' => password_hash('admin123', PASSWORD_DEFAULT),
]);
```

### Jalankan Seeder:

```bash
php spark db:seed UserSeeder
```

---

## 6. Auth Filter

`app/Filters/Auth.php`

```php
if (!session()->get('logged_in')) {
    return redirect()->to('/user/login');
}
```

Mengecek apakah user sudah login atau belum

---

## 7. Konfigurasi Filter

`app/Config/Filters.php`

```php
'auth' => \App\Filters\Auth::class,
```

Mendaftarkan filter ke sistem

---

## 8. Routing

`app/Config/Routes.php`

```php
$routes->match(['get','post'], '/user/login', 'User::login');
$routes->get('/user/logout', 'User::logout');

$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('artikel', 'Artikel::index');
});
```

Semua route `admin` akan dilindungi login

---

## 9. Logout

```php
session()->destroy();
```

Menghapus session (logout user)

---

## 10. Testing Login

Akses:

```
http://localhost:8080/user/login
```

Gunakan:

```
Email    : admin@email.com
Password : admin123
```

---

## Kesimpulan

### Login System

* Menggunakan email & password
* Password disimpan dalam bentuk hash

### Session

* Digunakan untuk menyimpan status login

### Filter

* Mengamankan halaman tertentu (admin)

<img width="1919" height="1150" alt="Screenshot 2026-04-04 234503" src="https://github.com/user-attachments/assets/787a36dd-eb57-42ee-b88e-547b632278d9" />

# Penambahan Fitur Pagination & Pencarian (Search)

Pada tahap ini, sistem admin artikel telah dikembangkan dengan menambahkan fitur **pagination (halaman)** dan **pencarian data** untuk mempermudah pengelolaan artikel.

---

## Pagination (Pembagian Halaman)

Pagination digunakan untuk membatasi jumlah data yang ditampilkan dalam satu halaman.

### Implementasi:

* Menggunakan method `paginate()` dari CodeIgniter Model
* Menampilkan maksimal **5 artikel per halaman**
* Menggunakan `$pager` untuk navigasi halaman

### Kode (Controller):

```php
public function admin_index()
{
    $model = new ArtikelModel();

    $data = [
        'artikel' => $model->paginate(5),
        'pager'   => $model->pager,
    ];

    return view('artikel/admin_index', $data);
}
```

### Menampilkan pagination di View:

```php
<?= $pager->links(); ?>
```

---

## Pencarian Artikel (Search)

Fitur pencarian digunakan untuk mencari artikel berdasarkan judul.

### Implementasi:

* Menggunakan method `like()` pada model
* Input pencarian menggunakan method GET (`?q=keyword`)

### Kode (Controller):

```php
$q = $this->request->getVar('q') ?? '';

$data = [
    'q'       => $q,
    'artikel' => $model->like('judul', $q)->paginate(5),
    'pager'   => $model->pager,
];
```

---

### Form Pencarian di View:

```php
<form method="get">
    <input type="text" name="q" value="<?= $q; ?>" placeholder="Cari artikel...">
    <button type="submit">Cari</button>
</form>
```

---

## Integrasi Search + Pagination

Agar pencarian tetap aktif saat berpindah halaman, digunakan:

```php
<?= $pager->only(['q'])->links(); ?>
```

### Fungsi:

* Menjaga parameter pencarian (`q`) tetap ada saat pagination
* Mencegah hasil pencarian hilang saat pindah halaman

---

Dengan fitur ini, admin dapat:

* Melihat data artikel secara bertahap (pagination)
* Mencari artikel dengan cepat berdasarkan judul
* Menggunakan pencarian tanpa kehilangan data saat berpindah halaman

---

<img width="1919" height="1083" alt="image" src="https://github.com/user-attachments/assets/8e557618-4f89-4d2a-b1df-fe189dade031" />
