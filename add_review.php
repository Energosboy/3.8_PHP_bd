<?php
// Подключение к базе данных
$dsn = "mysql:host=localhost;dbname=my_database";
$username = "root";
$password = "";

try {
$pdo = new PDO($dsn, $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
die("Connection failed: " . $e->getMessage());
}

$sql = "SELECT * FROM reviews";
$stmt = $pdo->query($sql);
$reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
// отзывы
foreach ($reviews as $review) {
echo "<p><strong>{$review['username']}</strong>: {$review['comment']} (Рейтинг: {$review['rating']})</p>";
}