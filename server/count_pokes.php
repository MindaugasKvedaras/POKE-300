<?php

require 'config.php';

// // Prepare the query to count the number of emails received by each user
$count_query = $pdo->prepare("SELECT recipient_email, COUNT(*) AS count FROM poke_history JOIN user_form ON poke_history.recipient_email = user_form.email GROUP BY user_form.user_id");
$count_query->execute();
$count_results = $count_query->fetchAll(PDO::FETCH_ASSOC);
$count_map = [];
foreach ($count_results as $result) {
    $count_map[$result['recipient_email']] = $result['count'];
}

// // Prepare the query to get the number of emails sent by each user
$count_query = $pdo->prepare('SELECT sender_email, COUNT(*) AS count FROM poke_history GROUP BY sender_email');
$count_query->execute();

// // Fetch the result into an associative array
$email_counts = $count_query->fetchAll(PDO::FETCH_ASSOC);

?>