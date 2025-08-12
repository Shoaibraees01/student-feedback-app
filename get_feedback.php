<?php
// get_feedback.php
header('Content-Type: application/json; charset=utf-8');
require 'db.php';

try {
    $stmt = $pdo->query("SELECT * FROM feedbacks ORDER BY created_at DESC");
    $rows = $stmt->fetchAll();
    echo json_encode($rows);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([]);
}
