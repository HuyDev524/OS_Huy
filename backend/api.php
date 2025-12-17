<?php
include 'db.php';
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'GET') {
    $stmt = $pdo->query("SELECT * FROM students ORDER BY id DESC");
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
} 

if ($method == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    if(!empty($data['name'])) {
        $stmt = $pdo->prepare("INSERT INTO students (name, email, phone, major) VALUES (?, ?, ?, ?)");
        $stmt->execute([$data['name'], $data['email'], $data['phone'], $data['major']]);
        echo json_encode(['status' => 'success']);
    }
}
?>