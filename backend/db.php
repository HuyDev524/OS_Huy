<?php
$host = 'sql301.infinityfree.com'; // Kiểm tra lại mã server trong vPanel
$dbname = 'if0_40701573_db';      // Tên DB bạn đã tạo
$username = 'if0_40701573';
$password = 'lth050204'; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Lỗi kết nối: " . $e->getMessage());
}
?>