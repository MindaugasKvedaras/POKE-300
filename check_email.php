<?php

/**
 * User Registration Page
 *
 * This file contains the code for checking if email is existing in database,
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
    $sql = "SELECT * FROM user_form WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "false"; // email already exists
    } else {
        echo "true"; // email is available
    }
}
?>