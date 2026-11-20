<?php
$pageTitle = 'Đăng Nhập';
$styles = ['auth.css'];
require_once __DIR__ . '/../layouts/header.php';
?>


<main class="auth">
    <form action="" method="post" class="auth__form">
        <div class="auth__title">
            <h1><?= $pageTitle ?></h1>
        </div>

        <?php
        if (!empty($error)) {
            echo '<p class="auth__error">' . htmlspecialchars($error) . '</p>';
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
                <a href="#">Đăng ký</a>
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