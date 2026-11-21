<?php
$pageTitle = 'Đăng Ký';
$styles = ['auth.css'];
require_once __DIR__ . '/../layouts/header.php';
?>


<main class="auth">
    <form action="" method="post" class="auth__form">
        <div class="auth__title">
            <h1><?= $pageTitle ?></h1>
        </div>

        <?php
        if (!empty($errors['user_exist'])) {
            echo '<p class="auth__error">' . htmlspecialchars($errors['user_exist']) . '</p>';
        }
        ?>

        <div class="auth__info">
            <input class="auth__input auth__input--username" type="text" name="username" placeholder="Tên đăng nhập" required value="<?= htmlspecialchars($username ?? '') ?>">
            <input class="auth__input auth__input--display-name" type="text" name="display_name" placeholder="Tên hiển thị" required value="<?= htmlspecialchars($display_name ?? '') ?>">
        </div>

        <?php
        if (!empty($errors['username'])) {
            echo '<p class="auth__error">' . htmlspecialchars($errors['username']) . '</p>';
        }
        ?>
        
        <?php
        if (!empty($errors['display_name'])) {
            echo '<p class="auth__error">' . htmlspecialchars($errors['display_name']) . '</p>';
        }
        ?>

        <div class="auth__info">
            <input class="auth__input" type="password" name="password" placeholder="Mật khẩu" required>
        </div>

        <?php
        if (!empty($errors['password'])) {
            echo '<p class="auth__error">' . htmlspecialchars($errors['password']) . '</p>';
        }
        ?>

        <div class="auth__info">
            <input class="auth__input" type="password" name="retype_password" placeholder="Nhập lại mật khẩu" required>
        </div>

        <?php
        if (!empty($errors['retype_password'])) {
            echo '<p class="auth__error">' . htmlspecialchars($errors['retype_password']) . '</p>';
        }
        ?>

        <div class="auth__info">
            <input class="auth__input" type="email" name="email" placeholder="Email" value="<?= htmlspecialchars($email ?? '') ?>" required>
        </div>

        <?php
        if (!empty($errors['email'])) {
            echo '<p class="auth__error">' . htmlspecialchars($errors['email']) . '</p>';
        }
        ?>

        <div class="auth__return">
            Đã có tài khoản? <a href="login.php">Đăng Nhập</a>
        </div>

        <button class="auth__button" type="submit">Đăng Ký</button>
    </form>
</main>
<?php
// require_once __DIR__ . '/../layouts/footer.php';
?>