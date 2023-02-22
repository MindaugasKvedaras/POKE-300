<?php

require 'config.php';

if (!isset($_SESSION['user_id'])) {
    header('location:register_form.php');
}

// Query database to get user data

$stmt = $pdo->query('SELECT * FROM user_form');
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Prepare the query to retrieve the user's email based on the logged in user's ID
$query = $pdo->prepare("SELECT email, name FROM user_form WHERE user_id = :user_id");
$query->bindParam(':user_id', $_SESSION['user_id']);
$query->execute();

// Get the logged in user's name and email
$result = $query->fetch(PDO::FETCH_ASSOC);
$sender_email = $result['email'];
$sender_name = $result['name'];

?>