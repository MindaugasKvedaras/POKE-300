<?php

/**
 * Server Code for Counting the Number of Pokes
 *
 * This file contains the code for saving poke information in to database
 *
 * PHP version 7.4
 *
 * @category No_Category
 * @package  No_Package
 * @author   Mindaugas Kvedaras <kvedaras.mindaugas@gmail.com>
 * @license  No License
 * @link     No link
 */

if (isset($_POST['recipient'])) {

    // The key exists, so it's safe to access it
    $recipient = $_POST['recipient'];
    $message = $_SESSION['user_name'] . ' ' . $_POST['message'];
    $sending_date = $_POST['sending_date'];

    if (!filter_var($recipient, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        exit();
    }
  
    try {
        $stmt = $pdo->prepare('INSERT INTO poke_history (sender_email, recipient_email, message, date) VALUES (?, ?, ?, ?)');
        $stmt->execute([$sender_email, $recipient, $message, $sending_date]);
        http_response_code(200);
    } catch (PDOException $e) {
        http_response_code(500);
        exit();
    }

} else {
    // The key doesn't exist, so you might want to handle the error here
    $error =  "Error: recipient key not found in POST data";
}
?>