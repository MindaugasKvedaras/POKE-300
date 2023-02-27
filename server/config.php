<?php

/**
 * Server Code for Connection to Database
 *
 * This file contains the code for connection to database
 *
 * PHP version 7.4
 *
 * @category No_Category
 * @package  No_Package
 * @author   Mindaugas Kvedaras <kvedaras.mindaugas@gmail.com>
 * @license  No License
 * @link     No link
 */

require_once __DIR__ . '../../vendor/autoload.php';

use Dotenv\Dotenv;
// Load environment variables from .env file
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Get database connection details from environment variables
$db_host = $_ENV['DB_HOST'];
$db_name = $_ENV['DB_NAME'];
$db_user = $_ENV['DB_USER'];
$db_pass = $_ENV['DB_PASS'];


try {
    // Connect to the database using PDO
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
} catch (PDOException $e) {
    // Handle the error
    echo 'Connection failed: ' . $e->getMessage();
    exit();
}