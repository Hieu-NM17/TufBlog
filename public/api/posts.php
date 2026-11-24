<?php
require_once __DIR__ . '/../../app/config/database.php';

$sql = "SELECT posts.content, posts.created_at, users.username, users.display_name
        FROM posts
        JOIN users ON posts.user_id = users.id
        WHERE posts.status = 'published'
        ORDER BY posts.created_at DESC";

$result = $conn->query($sql);
$posts = $result->fetch_all(MYSQLI_ASSOC);

header('Content-Type: application/json');
echo json_encode($posts);