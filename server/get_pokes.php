<?php
/**
 * Server Code for Getting Pokes
 *
 * This file contains the code for pokes retrieving from database
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

// Get the logged-in user's email from the Ajax request
$user_email = $_SESSION['email'];

try {
    // Create a prepared statement to retrieve data from database
    $stmt = $pdo->prepare('SELECT * FROM poke_history WHERE recipient_email = :email ORDER BY date DESC');

    // Bind user email to prepared statement
    $stmt->bindParam(':email', $user_email);

    // Execute prepared statement
    $stmt->execute();

    // Fetch data from prepared statement
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $pokes = '';

    if (count($data) === 0) {
        $pokes = '<p>Šiuo metu neturite pranešimų...</p>';
    } else {
        foreach ($data as $item) {
            $pokes .= '<a class="notification-item has-text-black">';
            $pokes .= '<div class="media">';
            $pokes .= '<figure class="media-left">';
            $pokes .= '<p class="image is-96x92 is-rounded">';
            $pokes .= '<img src="https://w7.pngwing.com/pngs/481/915/png-transparent-computer-icons-user-avatar-woman-avatar-computer-business-conversation.png">';
            $pokes .= '</p>';
            $pokes .= '</figure>';
            $pokes .= '<div class="media-content">';
            $pokes .= '<div class="content">';
            $pokes .= '<p>' . '<strong>' . $item['sender_email']. '</strong>' . '</p>';
            $pokes .= '<p>' . $item['message'] . '</p>';
            $pokes .= '<small>' . $item['date'] . '</small>';
            $pokes .= '</div>';
            $pokes .= '</div>';
            $pokes .= '</div>';
            $pokes .= '<hr class="has-background-grey-lighter">';
            $pokes .= '</a>';


            // $pokes .= '<div class="media-content has-text-black">';
            // $pokes .= '<p class="title is-5">' . $item['message'] . '</p>';
            // $pokes .= '<p class="subtitle is-7">' . $item['sender_email'] . '</p>';
            // $pokes .= '<p class="subtitle is-6">' . $item['date'] . '</p>';
            // $pokes .= '</div>';
            // $pokes .= '</p>';
            // $pokes .= '<hr class="navbar-divider">';
            // $pokes .= '</a>';
        }
    }
    
    // Return data as JSON
    $response = array('pokes' => $pokes, 'count' => count($data));
    // header('Content-Type: application/json');
    echo json_encode($response);

} catch (PDOException $e) {
    // Handle the error here, e.g. log it or return an error message
    echo 'Error: ' . $e->getMessage();
}

?>
