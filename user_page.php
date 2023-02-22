<?php

session_start();

foreach (glob("./server/*.php") as $filename) {
    include $filename;
}

if (isset($_POST['recipient'])) {
    // The key exists, so it's safe to access it
    $recipient = $_POST['recipient'];
    $message = $_SESSION['user_name'] . ' ' . $_POST['message'];


    if (!filter_var($recipient, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        exit();
    }
    
    try {
        $stmt = $pdo->prepare('INSERT INTO poke_history (sender_email, recipient_email, message) VALUES (?, ?, ?)');
        $stmt->execute([$sender_email, $recipient, $message]);
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user page</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
    <link 
        rel="stylesheet" 
        href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css"
    >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<section class="hero is-success mb-4">
  <div class="hero-body">
    <div class="container">
      <div class="container is-flex is-justify-content-space-between">
        <div>
            <h1 class="title">
                Sveiki, <span><?php echo $sender_name ?></span>
            </h1>
        </div>
        <div>
            <a href="logout.php" class="button is-primary is-inverted">Atsijungti</a>
        </div>
      </div>  
      <h2 class="subtitle">
        Žemiau yra pateikta visų prisiregistravusių vartotojų lentelė
      </h2>
    </div>
  </div>
</section>
<div class="container is-flex is-justify-content-center custom-height">
  <div class="table-container">
    <div class="field">
      <div class="control has-icons-left">
        <input id="search-input" class="input is-success" type="text" placeholder="Ieškoti vartotojų">
        <span class="icon is-left has-text-success">
          <i class="fas fa-search"></i>
        </span>
      </div>
    </div>
    <table class="table is-striped is-fullwidth is-hoverable is-centered" id="user-table" style="min-width:800px;">
      <thead class="has-background-success">
        <tr>
          <th class="has-text-white">ID</th>
          <th class="has-text-white">Vardas</th>
          <th class="has-text-white">Pavardė</th>
          <th class="has-text-white">El. paštas</th>
          <th class="has-text-white">Pokes(gauti)</th>
          <th class="has-text-white">Pokes(išsiųsti)</th>
          <th class="has-text-white">Išsiųsti el. laišką</th>
        </tr>
      </thead>
        <tbody id="user-table-body">
          <?php foreach ($users as $user): ?>
            <tr>
              <td><?php echo $user['user_id']; ?></td>
              <td><?php echo $user['name']; ?></td>
              <td><?php echo $user['surname']; ?></td>
              <td><?php echo $user['email']; ?></td>
              <td><?php echo isset($count_map[$user['email']]) ? $count_map[$user['email']] : 0; ?></td>
              <td>
                <?php 
                  $count = 0;
                foreach ($email_counts as $email_count) {
                    $count = $email_count['sender_email'] === $user['email'] ? $email_count['count'] : $count;
                }
                    echo $count;
                ?>
              </td>
              <td>
                <button class="button is-primary send-email-button" id="email-btn" type="submit" data-recipient="<?php echo $user['email']; ?>">Send Email</button>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
    </table>    
  </div>
</div>
  <div id="success-modal" class="modal">
    <div class="modal-background"></div>
    <div class="modal-content has-text-centered">
      <article class="message is-success">
        <div class="message-body">
            <p class="is-size-3">Žinutė sėkmingai išsiųsta!</p>
        </div>
      </article>
    </div>
</div>  

<script src="scripts/send_pokes.js"></script>
<script src="scripts/search_users.js"></script>    

</body>
</html>
