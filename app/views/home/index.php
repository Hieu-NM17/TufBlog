<?php
$styles = ['base.css', 'home.css'];
require_once __DIR__ . '/../layouts/header.php';
?>

<body>
    <aside class="sidebar">
        <!-- Logo -->
        <div class="sidebar__logo">
            <a href="/">TUFBLOG</a>
        </div>

        <!-- Thanh công cụ -->
        <nav class="sidebar__nav">
            <ul class="sidebar__menu">
                <li class="sidebar__item">
                    <a href="/" class="sidebar__link sidebar__link--active">
                        Trang chủ
                    </a>
                </li>

                <li class="sidebar__item">
                    <a href="/profile.php" class="sidebar__link">
                        Trang cá nhân
                    </a>
                </li>

                <li class="sidebar__item">
                    <a href="/search.php" class="sidebar__link">
                        Tìm kiếm
                    </a>
                </li>

                <li class="sidebar__item">
                    <a href="/settings.php" class="sidebar__link">
                        Cài đặt
                    </a>
                </li>
            </ul>
        </nav>
    </aside>
    <main class="main-content">
        <div class="main-content__header">
            <a href="#" class="main-content__title">Trang chủ</a>
        </div>
        <?php if (isset($_SESSION['user_id'])): ?>
            <section class="composer">
                <div class="avatar"><?= htmlspecialchars(mb_strtoupper(mb_substr($_SESSION['username'], 0, 1, 'UTF-8'), 'UTF-8')) ?></div>
                <form id="post-form" class="composer__form">
                    <div class="composer__name"><?= htmlspecialchars($_SESSION['username']) ?></div>
                    <textarea id="post-content" name="content" class="composer__input" rows="2" maxlength="500" placeholder="Có gì mới?"></textarea>
                    <div class="composer__footer">
                        <span id="post-error" class="composer__error"></span>
                        <button type="submit" class="btn btn--primary">Đăng</button>
                    </div>
                </form>
            </section>
        <?php else: ?>
            <section class="composer composer--guest">
                <a href="/login.php">Đăng nhập</a>&nbsp;để đăng bài
            </section>
        <?php endif; ?>
        <section id="feed"></section>

    </main>
    <aside class="right-sidebar"></aside>
    <script src="/assets/js/home.js"></script>
</body>

</html>