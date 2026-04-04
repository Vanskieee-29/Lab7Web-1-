<!DOCTYPE html>
<html>
<head>
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url('style.css'); ?>">
</head>
<body>

<div class="container"> <!-- INI PENTING -->
<header>
    <h1>Admin Portal Berita</h1>
</header>

<nav>
    <a href="<?= base_url('admin/artikel'); ?>">Dashboard</a>
    <a href="<?= base_url('admin/artikel'); ?>">Artikel</a>
    <a href="<?= base_url('admin/artikel/add'); ?>">Tambah Artikel</a>
    
    <!-- LOGOUT -->
    <a href="<?= base_url('user/logout'); ?>" class="logout">Logout</a>
</nav>