<?php
$pageTitle = 'Đăng ký';
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
            <input class="auth__input auth__input--username" type="text" name="username" placeholder="Tên đăng nhập" required value="<?= htmlspecialchars($username ?? '') ?>">
            <input class="auth__input auth__input--display-name" type="text" name="username" placeholder="Tên hiển thị" required value="<?= htmlspecialchars($display_name ?? '') ?>">
        </div>

        <div class="auth__info">
            <input class="auth__input" type="password" name="password" placeholder="Mật khẩu" required>
        </div>

        <div class="auth__info">
            <input class="auth__input" type="email" name="email" placeholder="Email" required>
        </div>

        <button class="auth__button" type="submit">Đăng ký</button>
    </form>
</main>
<?php
// require_once __DIR__ . '/../layouts/footer.php';
?>