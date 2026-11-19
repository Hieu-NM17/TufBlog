<?php
$pageTitle = 'Trang chủ';

require_once __DIR__ . '/../app/config/database.php';
require_once __DIR__ . '/../app/views/layouts/header.php';
require_once __DIR__ . '/../app/views/layouts/navbar.php';
?>

<main>
    <h1>Chào mừng đến với TufBlog</h1>
    <p>Nơi chia sẻ kiến thức, câu chuyện và ý tưởng.</p>
</main>

<?php
require_once __DIR__ . '/../app/views/layouts/footer.php';
?>