<?php

require 'config.php';

session_start();
// Get the user's data from the database
$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare('SELECT name, surname, password FROM user_form WHERE user_id = :id');
$stmt->bindParam(':id', $user_id);
$stmt->execute();
$user_data = $stmt->fetch(PDO::FETCH_ASSOC);

// Return the user's data as a JSON response
header('Content-Type: application/json');
echo json_encode($user_data);

?>