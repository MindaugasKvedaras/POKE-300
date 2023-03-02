<?php

/**
 * Server Code for Users Database
 *
 * This file contains the code for displaying users data in the table
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
require 'count_pokes.php';
require 'sent_poke.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    header('location:register_form.php');
}

$page = isset($_POST['page']) ? $_POST['page'] : 1;
$rowsPerPage = isset($_POST['rowsPerPage']) ? $_POST['rowsPerPage'] : 10;
$searchTerm = isset($_POST['searchTerm']) ? $_POST['searchTerm'] : '';
$user_email = $_SESSION['email'];

// Calculate limit and offset for SQL query
$limit = $rowsPerPage;
$offset = ($page - 1) * $rowsPerPage;

if ($page === "1") {
    $searchTerm = $_POST['searchTerm'];
    $_SESSION['searchTerm'] = $searchTerm;
} else {
    $searchTerm = $_POST['searchTerm'];
}

// Build SQL query based on search term
$sql = "SELECT * FROM user_form";
if (!empty($searchTerm)) {
    $sql .= " WHERE name LIKE '%$searchTerm%' OR surname LIKE '%$searchTerm%' OR email LIKE '%$searchTerm%'";
}
$sql .= " LIMIT $limit OFFSET $offset";

// Query database to get user data
$stmt = $pdo->query($sql);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Generate table rows
$tableRows = '';

foreach ($users as $row) {
    $tableRows .= "<tr id='tableRow'>";
    $tableRows .= "<td>".$row['user_id']."</td>";
    $tableRows .= "<td>".$row['name']."</td>";
    $tableRows .= "<td>".$row['surname']."</td>";
    $tableRows .= "<td>".$row['email']."</td>";
    $tableRows .= '<td id="recipient-email-count">' . (isset($count_map[$row['email']]) ? $count_map[$row['email']] : 0) . '</td>';
    $count = 0;
    foreach ($email_counts as $email_count) {
        $count = $email_count['sender_email'] === $row['email'] ? $email_count['count'] : $count;
    }
    $tableRows .= '<td data-sender="' . $row['email'] . '" id="sender-email-counts">' . $count . '</td>';
    $tableRows .= '<td><button class="button is-primary send-email-button" id="email-btn" type="submit" data-recipient="' . $row['email'] . '">POKE</button></td>';
    $tableRows .= "</tr>";
}

// Query to get total number of rows in the table
$totalRowsQuery = "SELECT COUNT(*) AS totalRows FROM user_form";
if (!empty($searchTerm)) {
    $totalRowsQuery .= " WHERE name LIKE '%$searchTerm%' OR surname LIKE '%$searchTerm%' OR email LIKE '%$searchTerm%'";
}
$totalRowsResult = $pdo->query($totalRowsQuery);
$totalRows = $totalRowsResult->fetch(PDO::FETCH_ASSOC)['totalRows'];

// Generate pagination links
$numPages = ceil($totalRows / $rowsPerPage);
$pagination = '';

for ($i = 1; $i <= $numPages; $i++) {
    if ($i == $page) {
        $pagination .= "<span class='pagination-link current-page has-text-white has-background-success is-light' id='paging' data-page='".$i."'>".$i."</span>";
    } else {
        $pagination .= "<a class='pagination-link' href='#' data-page='".$i."'>".$i."</a>";
    }
}


// Return JSON response
$response = array(
  'tableRows' => $tableRows,
  'pagination' => $pagination,
);
echo json_encode($response);

?>
