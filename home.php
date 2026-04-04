<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<h1><?= $title ?? 'Home'; ?></h1>

<?php if (!empty($artikel)): ?>
    <?php foreach ($artikel as $row): ?>
        <article>
            <h2><?= $row['judul']; ?></h2>
            <p><?= substr($row['isi'], 0, 200); ?>...</p>
            <a href="<?= site_url('/artikel/' . $row['slug']); ?>">Baca selengkapnya</a>
            <hr>
        </article>
    <?php endforeach; ?>
<?php else: ?>
    <p>Belum ada artikel.</p>
<?php endif; ?>

<?= $this->endSection() ?>