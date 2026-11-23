<?php
session_start();
$pageTitle = 'Trang chủ';
require_once __DIR__ . '/../app/config/database.php';
require_once __DIR__ . '/../app/views/home/index.php';