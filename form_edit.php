<?= $this->include('template/admin_header'); ?>

<h2>Edit Artikel</h2>

<form method="post">

    <label>Judul</label>
    <input type="text" name="judul" value="<?= $data['judul']; ?>">

    <label>Isi</label>
    <textarea name="isi" rows="10"><?= $data['isi']; ?></textarea>

    <!-- 🔥 DROPDOWN KATEGORI -->
    <label>Kategori</label>
    <select name="id_kategori" required>
        <?php foreach ($kategori as $k): ?>
            <option value="<?= $k['id_kategori']; ?>" 
                <?= ($data['id_kategori'] == $k['id_kategori']) ? 'selected' : ''; ?>>
                <?= $k['nama_kategori']; ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Kirim</button>
</form>

<?= $this->include('template/admin_footer'); ?>