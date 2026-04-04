<?= $this->include('template/admin_header'); ?>

<h2>Edit Artikel</h2>

<form method="post">
    <input type="text" name="judul" value="<?= $data['judul']; ?>">

    <textarea name="isi" rows="10"><?= $data['isi']; ?></textarea>

    <button type="submit">Kirim</button>
</form>

<?= $this->include('template/admin_footer'); ?>