<?php
include 'includes/db.php';

$stmt = $pdo->query("SELECT id, password FROM user");
$userrs = $stmt->fetchAll();
foreach ($userrs as $user) {
    $hashedPassword = password_hash($user['password'], PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("UPDATE user SET password = ? WHERE id = ?");
    $stmt->execute([$hashedPassword, $user['id']]);
}
echo "Passwords have been hashed successfully.";

dataHash();