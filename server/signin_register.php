<?php
/**
 * Server Code for Sign Up and Sign In
 *
 * This file contains the code for managing user accounts, including registration
 * and login.
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

if (isset($_POST['submit'])) {
  
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);

    $stmt = $pdo->prepare('INSERT INTO user_form (name, surname, email, password) VALUES (?, ?, ?, ?)');
    $stmt->execute([$name, $surname, $email, $pass]);

    if ($stmt) {
        echo json_encode(['success' => true, 'message' => "Registration successful!"]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error submitting data']);
    }
}

if (isset($_POST['signin'])) {

    $email = $_POST['email'];
    $pass = md5($_POST['password']);

    $stmt = $pdo->prepare("SELECT * FROM user_form WHERE email = ? AND password = ? ");
    $stmt->execute([$email, $pass]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $_SESSION['user_id'] = $result['user_id'];
        $_SESSION['user_name'] = $result['name'];
        $_SESSION['email'] = $result['email'];
        header('location:user_page.php');
    } else {
        $error = 'Blogi prisijungimo duomenys';
    }
}
?>