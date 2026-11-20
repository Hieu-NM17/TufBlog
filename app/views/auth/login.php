<?php
$pageTitle = 'Đăng nhập';
require_once __DIR__ . '/../layouts/header.php';
?>


<main class="login">
    <form action="" method="post" class="login__form">
        <div class="login__title">
            <h1><?= $pageTitle ?></h1>
        </div>

        <?php
        if (!empty($error)) {
            echo '<p class="login__error">' . htmlspecialchars($error) . '</p>';
        }
        ?>

        <div class="login__info">
            <input class="login__input" type="text" name="username" placeholder="Tên đăng nhập" required value="<?= htmlspecialchars($username ?? '') ?>">
        </div>

        <div class="login__info">
            <input class="login__input" type="password" name="password" placeholder="Mật khẩu" required>
        </div>

        <div class="login__forgot">
            <a href="#">Quên mật khẩu</a>
        </div>

        <button class="login__button" type="submit">Đăng nhập</button>
    </form>
</main>
<?php
// require_once __DIR__ . '/../layouts/footer.php';
?>