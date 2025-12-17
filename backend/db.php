<?php
$host = 'sql301.infinityfree.com';
$dbname = 'if0_40701573_XXX'; // THAY 'XXX' THÀNH TÊN DATABASE BẠN ĐÃ TẠO
$username = 'if0_40701573';
$password = 'lth050204'; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    header('Content-Type: application/json');
    die(json_encode(["error" => "Kết nối thất bại: " . $e->getMessage()]));
}
?>