<?php
// Thông tin kết nối từ InfinityFree bạn đã cung cấp
$host = 'sql301.infinityfree.com';
$user = 'if0_40701573';
$pass = 'lth050204';
// LƯU Ý: Bạn phải tạo Database này trước trong vPanel (Control Panel) của InfinityFree
$dbname = 'if0_40701573_db'; 

$conn = new mysqli($host, $user, $pass, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Tạo bảng (Dùng cấu hình bạn muốn)
$sql = "CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    phone VARCHAR(20),
    major VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "<h1>Thành công!</h1>";
    echo "Bảng 'students' đã được tạo trong database: " . $dbname;
} else {
    echo "Lỗi khi tạo bảng: " . $conn->error;
}

$conn->close();
?>