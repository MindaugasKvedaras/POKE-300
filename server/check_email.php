<?php

/**
 * User Registration Page
 *
 * This file contains the code for checking if email is existing in database
 *
 * PHP version 7.4
 *
 * @category No_Category
 * @package  No_Package
 * @author   Mindaugas Kvedaras <kvedaras.mindaugas@gmail.com>
 * @license  No License
 * @link     No link
 */
require 'config.php'; // include database connection

if (isset($_POST['email'])) {

    $email = $_POST['email'];

    $stmt = $pdo->prepare('SELECT * FROM user_form WHERE email = ?');
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Email address is already registered
        echo 'false';
    } else {
        echo 'true';
        exit();
    }
}

?>