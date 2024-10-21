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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $order_id = $_POST['order_id'];
  $reason = $_POST['reason'];
  $sql = "INSERT INTO cancellations (order_id, reason) VALUES (:order_id, :reason)";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['order_id' => $order_id, 'reason' => $reason]);
  echo "Заказ #$order_id успешно отменен!";
  }
  ?>