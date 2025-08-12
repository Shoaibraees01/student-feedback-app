-- database.sql
CREATE DATABASE IF NOT EXISTS feedback_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE feedback_db;

CREATE TABLE IF NOT EXISTS feedbacks (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(150) NOT NULL,
  email VARCHAR(255) NOT NULL,
  feedback TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
