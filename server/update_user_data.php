<?php
/**
 * Server Code for Profile Info Update
 *
 * This file contains the code for updating users profile data in database
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

// Get the logged-in user's ID from the session
$user_id = $_SESSION['user_id'];

// Get the new data from the POST request
$name = $_POST['fname'];
$surname = $_POST['surname'];
$password = $_POST['password'];

try {
    // Create a prepared statement to get the user's current data from the database
    $stmt = $pdo->prepare('SELECT * FROM user_form WHERE user_id = :id');
    $stmt->bindParam(':id', $user_id);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if the submitted password value is the same as the hashed password value in the database
    if ($password === $user['password']) {
        // If the password value is the same, use the existing hashed password value
        $password = $user['password'];
    } else {
        // If the password value is different, hash the submitted password value
        $password = md5($password);
    }

    // Create a prepared statement to update data in database
    $stmt = $pdo->prepare('UPDATE user_form SET name = :name, surname = :surname, password = :password WHERE user_id = :id');

    // Bind data to prepared statement
    $stmt->bindParam(':id', $user_id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':surname', $surname);
    $stmt->bindParam(':password', $password);

    // Execute prepared statement
    $stmt->execute();

    // Get the updated user data
    $stmt = $pdo->prepare('SELECT * FROM user_form WHERE user_id = :id');
    $stmt->bindParam(':id', $user_id);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Return success response with updated user data
    $response = array(
        'status' => 'success',
        'user_id' => $user_id,
        'name' => $user['name'],
        'surname' => $user['surname'],
        'password' => $user['password']
    );
    header('Content-Type: application/json');
    echo json_encode($response);

} catch (PDOException $e) {
    // Handle the error here, e.g. log it or return an error message
    $response = array('status' => 'error', 'message' => $e->getMessage());
    header('Content-Type: application/json');
    echo json_encode($response);
}

?>