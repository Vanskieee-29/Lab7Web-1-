<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url('style.css'); ?>">
</head>
<body>

<div class="login-wrapper">
    <div class="login-box">
        
        <div class="login-left">
            <h1>Welcome Back</h1>
            <p>Silakan login untuk masuk ke dashboard admin.</p>
        </div>

        <div class="login-right">
            <h2>Login</h2>

            <?php if(session()->getFlashdata('flash_msg')): ?>
                <div class="error">
                    <?= session()->getFlashdata('flash_msg'); ?>
                </div>
            <?php endif; ?>

            <form method="post">
                <input type="text" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>

                <button type="submit">Login</button>
            </form>
        </div>

    </div>
</div>

</body>
</html>