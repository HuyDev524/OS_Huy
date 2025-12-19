<?php
include 'db.php';
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type');

$method = $_SERVER['REQUEST_METHOD'];

// Lấy dữ liệu từ body (cho POST, PUT, DELETE)
$data = json_decode(file_get_contents('php://input'), true);

if ($method == 'GET') {
    $stmt = $pdo->query("SELECT * FROM students ORDER BY id DESC");
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
} 

if ($method == 'POST') {
    if(!empty($data['name'])) {
        $stmt = $pdo->prepare("INSERT INTO students (name, email, phone, major) VALUES (?, ?, ?, ?)");
        $stmt->execute([$data['name'], $data['email'], $data['phone'], $data['phone']]); 
        echo json_encode(['status' => 'success']);
    }
}

if ($method == 'PUT') {
    if(!empty($data['id'])) {
        $stmt = $pdo->prepare("UPDATE students SET name=?, email=?, phone=?, major=? WHERE id=?");
        $stmt->execute([$data['name'], $data['email'], $data['phone'], $data['phone'], $data['id']]);
        echo json_encode(['status' => 'updated']);
    }
}

if ($method == 'DELETE') {
    if(!empty($data['id'])) {
        $stmt = $pdo->prepare("DELETE FROM students WHERE id = ?");
        $stmt->execute([$data['id']]);
        echo json_encode(['status' => 'deleted']);
    }
}
?>