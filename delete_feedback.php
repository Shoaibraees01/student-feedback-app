<?php
// delete_feedback.php
header('Content-Type: application/json; charset=utf-8');
require 'db.php';

// accept id via JSON or GET/POST
$raw = file_get_contents('php://input');
$data = json_decode($raw, true);
if (!$data) $data = $_POST;

$id = isset($data['id']) ? (int)$data['id'] : (isset($_GET['id']) ? (int)$_GET['id'] : 0);

if (!$id) {
    http_response_code(400);
    echo json_encode(['error' => 'id required']);
    exit;
}

try {
    $stmt = $pdo->prepare("DELETE FROM feedbacks WHERE id = ?");
    $stmt->execute([$id]);
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Server error']);
}
