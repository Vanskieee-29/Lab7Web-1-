<?= $this->include('template/admin_header'); ?>

<div class="card">
    <h2>Daftar Artikel</h2>

    <!-- 🔍 SEARCH + FILTER KATEGORI -->
    <form method="get" class="form-search">
        <input type="text" name="q" value="<?= $q; ?>" placeholder="Cari artikel...">

        <select name="kategori_id">
            <option value="">Semua Kategori</option>
            <?php foreach ($kategori as $k): ?>
                <option value="<?= $k['id_kategori']; ?>" <?= ($kategori_id == $k['id_kategori']) ? 'selected' : ''; ?>>
                    <?= $k['nama_kategori']; ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button type="submit">Cari</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Kategori</th> <!-- 🔥 TAMBAHAN -->
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

                <!-- 🔥 TAMPIL KATEGORI -->
                <td><?= $row['nama_kategori'] ?? '-'; ?></td>

                <td>
                    <?php if ($row['status'] == 1): ?>
                        <span style="color: green;">Publish</span>
                    <?php else: ?>
                        <span style="color: orange;">Draft</span>
                    <?php endif; ?>
                </td>
                <td>
                    <a class="btn btn-edit" href="<?= base_url('admin/artikel/edit/' . $row['id']); ?>">Ubah</a>
                    <a class="btn btn-delete" href="<?= base_url('admin/artikel/delete/' . $row['id']); ?>">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- 📄 PAGINATION -->
    <div style="margin-top:15px;">
        <?= $pager->only(['q', 'kategori_id'])->links(); ?>
    </div>

</div>

<?= $this->include('template/admin_footer'); ?>