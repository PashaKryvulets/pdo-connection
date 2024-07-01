<?php

require_once __DIR__ . '/config/autoload.php';

$host = 'localhost';
$dbname = 'pdo';
$username = 'root';
$password = '';
$port = 3306;

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;port=$port", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exception) {
    echo "Error: {$exception->getMessage()}";
    exit;
}

$sql = "SELECT * FROM users";

$stmt = $pdo->query($sql);

while ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "ID: " . $user['id'] . "<br>";
    echo "Name: " . $user['name'] . "<br>";
    echo "Email: " . $user['email'] . "<br>";
    echo "Password: " . $user['password'] . "<br><br>";
}
