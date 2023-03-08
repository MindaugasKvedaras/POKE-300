<?php
/**
 * Server Code for Getting Users Profile Data from Database
 *
 * This file contains the code for getting user information
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