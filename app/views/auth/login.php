<?php
$pageTitle = 'Đăng Nhập';
$styles = ['base.css', 'auth.css'];
require_once __DIR__ . '/../layouts/header.php';
?>


<main class="auth">
    <form action="" method="post" class="auth__form">
        <div class="auth__title">
            <h1><?= $pageTitle ?></h1>
        </div>

        <?php
        if (!empty($errors)) {
            echo '<p class="auth__error">' . htmlspecialchars($errors['wrong_info']) . '</p>';
        }

        if (!empty($success)) {
            echo '<p class="auth__success">' . htmlspecialchars($success) . '</p>';
        }
        ?>

        <div class="auth__info">
            <input class="auth__input" type="text" name="username" placeholder="Tên đăng nhập" required value="<?= htmlspecialchars($username ?? '') ?>">
        </div>

        <div class="auth__info">
            <input class="auth__input" type="password" name="password" placeholder="Mật khẩu" required>
        </div>

        <div class="auth__function">
            <div class="auth__function--register">
                <a href="register.php">Đăng ký</a>
            </div>

            <div class="auth__function--forgot">
                <a href="#">Quên mật khẩu</a>
            </div>
        </div>

        <button class="auth__button" type="submit">Đăng nhập</button>
    </form>
</main>
<?php
// require_once __DIR__ . '/../layouts/footer.php';
?>