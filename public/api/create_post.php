<?php
session_start();
require_once __DIR__ . '/../../app/config/database.php';

header('Content-Type: application/json; charset=utf-8');

function fail($code, $message)
{
    http_response_code($code);
    echo json_encode(['error' => $message], JSON_UNESCAPED_UNICODE);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    fail(405, 'Phương thức không hợp lệ');
}

if (!isset($_SESSION['user_id'])) {
    fail(401, 'Bạn cần đăng nhập để đăng bài');
}

$content = trim($_POST['content'] ?? '');

if ($content === '') {
    fail(400, 'Nội dung không được để trống');
}

if (mb_strlen($content, 'UTF-8') > 500) {
    fail(400, 'Nội dung không được quá 500 ký tự');
}

$userId = $_SESSION['user_id'];

$stmt = $conn->prepare('INSERT INTO posts (user_id, content) VALUES (?, ?)');
$stmt->bind_param('is', $userId, $content);
$stmt->execute();
$newId = $conn->insert_id;

$stmt = $conn->prepare(
    'SELECT posts.id, posts.content, posts.created_at,
            users.username, users.display_name, users.avatar
     FROM posts
     JOIN users ON posts.user_id = users.id
     WHERE posts.id = ?'
);
$stmt->bind_param('i', $newId);
$stmt->execute();
$post = $stmt->get_result()->fetch_assoc();

echo json_encode(['success' => true, 'post' => $post], JSON_UNESCAPED_UNICODE); 