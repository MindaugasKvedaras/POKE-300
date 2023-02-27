<?php

/**
 * Server Code for Getting Logged In Users ID in to the SESSION
 *
 * This file contains the code for getting logged in user information
 *
 * PHP version 7.4
 *
 * @category No_Category
 * @package  No_Package
 * @author   Mindaugas Kvedaras <kvedaras.mindaugas@gmail.com>
 * @license  No License
 * @link     No link
 */

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