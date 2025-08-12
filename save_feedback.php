<?php
// save_feedback.php
header('Content-Type: application/json; charset=utf-8');
require 'db.php';

// read JSON body
$raw = file_get_contents('php://input');
$data = json_decode($raw, true);

// fallback to POST form data
if (!$data) {
    $data = $_POST;
}

$name = trim($data['name'] ?? '');
$email = trim($data['email'] ?? '');
$feedback = trim($data['feedback'] ?? '');

if ($name === '' || $email === '' || $feedback === '') {
    http_response_code(422);
    echo json_encode(['error' => 'All fields are required']);
    exit;
}

try {
    $stmt = $pdo->prepare("INSERT INTO feedbacks (name, email, feedback) VALUES (:name, :email, :feedback)");
    $stmt->execute([':name' => $name, ':email' => $email, ':feedback' => $feedback]);
    $id = $pdo->lastInsertId();

    // return created row
    $stmt2 = $pdo->prepare("SELECT * FROM feedbacks WHERE id = ?");
    $stmt2->execute([$id]);
    $row = $stmt2->fetch();

    echo json_encode(['success' => true, 'feedback' => $row]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Server error']);
}
