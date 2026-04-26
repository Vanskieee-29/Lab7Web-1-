<?= $this->include('template/admin_header'); ?>

<h2>Tambah Artikel</h2>

<form method="post">

    <label>Judul</label>
    <input type="text" name="judul">

    <label>Isi</label>
    <textarea name="isi" rows="10"></textarea>

    <!-- 🔥 DROPDOWN KATEGORI -->
    <label>Kategori</label>
    <select name="id_kategori" required>
        <option value="">-- Pilih Kategori --</option>
        <?php foreach ($kategori as $k): ?>
            <option value="<?= $k['id_kategori']; ?>">
                <?= $k['nama_kategori']; ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Kirim</button>
</form>

<?= $this->include('template/admin_footer'); ?>