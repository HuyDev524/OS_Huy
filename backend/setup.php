<?php
include 'db.php';
$sql = "CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    phone VARCHAR(20),
    major VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
try {
    $pdo->exec($sql);
    echo "<h1>Thành công!</h1>Bảng 'students' đã sẵn sàng.";
} catch (PDOException $e) {
    echo "Lỗi tạo bảng: " . $e->getMessage();
}
?>