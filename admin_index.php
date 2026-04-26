<?= $this->include('template/admin_header'); ?>

<div class="card">
    <h2>Daftar Artikel</h2>

    <!-- 🔍 FORM SEARCH -->
    <form method="get" class="form-search">
        <input type="text" name="q" value="<?= $q; ?>" placeholder="Cari artikel...">
        <button type="submit">Cari</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($artikel as $row): ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td>
                    <strong><?= $row['judul']; ?></strong><br>
                    <small><?= substr($row['isi'], 0, 50); ?></small>
                </td>
                <td><?= $row['status'] ?? 0; ?></td>
                <td>
                    <a class="btn btn-edit" href="<?= base_url('admin/artikel/edit/' . $row['id']); ?>">Ubah</a>
                    <a class="btn btn-delete" href="<?= base_url('admin/artikel/delete/' . $row['id']); ?>">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- 📄 PAGINATION (INI DI BAWAH TABLE) -->
    <div style="margin-top:15px;">
        <?= $pager->only(['q'])->links(); ?>
    </div>

</div>

<?= $this->include('template/admin_footer'); ?>