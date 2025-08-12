<?php
// update_feedback.php
header('Content-Type: application/json; charset=utf-8');
require 'db.php';

$raw = file_get_contents('php://input');
$data = json_decode($raw, true);
if (!$data) $data = $_POST;

$id = isset($data['id']) ? (int)$data['id'] : 0;
$name = trim($data['name'] ?? '');
$email = trim($data['email'] ?? '');
$feedback = trim($data['feedback'] ?? '');

if (!$id || $name === '' || $email === '' || $feedback === '') {
    http_response_code(422);
    echo json_encode(['error' => 'All fields are required']);
    exit;
}

try {
    $stmt = $pdo->prepare("UPDATE feedbacks SET name = :name, email = :email, feedback = :feedback WHERE id = :id");
    $stmt->execute([':name'=>$name, ':email'=>$email, ':feedback'=>$feedback, ':id'=>$id]);

    $stmt2 = $pdo->prepare("SELECT * FROM feedbacks WHERE id = ?");
    $stmt2->execute([$id]);
    $row = $stmt2->fetch();

    echo json_encode(['success' => true, 'feedback' => $row]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Server error']);
}
