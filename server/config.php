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
require '../../vendor/autoload.php';
// require_once __DIR__ . '../../vendor/autoload.php';

// use Dotenv\Dotenv;
// // Load environment variables from .env file
// $dotenv = Dotenv::createImmutable(__DIR__);
// $dotenv->load();

// // Get database connection details from environment variables
// $db_host = $_ENV['DB_HOST'];
// $db_name = $_ENV['DB_NAME'];
// $db_user = $_ENV['DB_USER'];
// $db_pass = $_ENV['DB_PASS'];

//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = "eu-cdbr-west-03.cleardb.net";
$cleardb_username = "b3a5a08c305463";
$cleardb_password = "604c9c01";
$cleardb_db = "heroku_561a66a5ca5f0f2";

$active_group = 'default';
$query_builder = true;

try {
    // Connect to the database using PDO
    $pdo = new PDO("mysql:host=$cleardb_server;dbname=$cleardb_db", $cleardb_username, $cleardb_password);
} catch (PDOException $e) {
    // Handle the error
    echo 'Connection failed: ' . $e->getMessage();
    exit();
}