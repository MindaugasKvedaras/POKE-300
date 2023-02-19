<?php

@include 'config.php';

session_start();

if (!isset($_SESSION['user_name'])) {
    header('location:register_form.php');
}

// Query database to get user data
$sql = "SELECT id, name, surname, email FROM user_form";
$result = $conn->query($sql);

// Create array of user objects
$users = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $user = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'surname' => $row['name'],
            'email' => $row['email'],
        );
        array_push($users, $user);
    }
}

// Close MySQL database connection
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user page</title>
    <link 
        rel="stylesheet" 
        href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css"
    >
    <link rel="stylesheet" href="css/styling.css">
</head>
<body>
<section class="hero is-success mb-4">
  <div class="hero-body">
    <div class="container">
      <div class="container is-flex is-justify-content-space-between">
        <div>
            <h1 class="title">
                Sveiki, <span><?php echo $_SESSION['user_name'] ?></span>
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
    <div class="container is-flex is-justify-content-center">
        <div class="table-container">
            <table class="table is-striped is-fullwidth is-hoverable is-centered" style="min-width:800px;">
                <thead class="has-background-success">
                    <tr>
                    <th class="has-text-white">ID</th>
                    <th class="has-text-white">Vardas</th>
                    <th class="has-text-white">Pavardė</th>
                    <th class="has-text-white">El. paštas</th>
                    <th class="has-text-white">Išsiųsti el. laišką</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo $user['name']; ?></td>
                            <td><?php echo $user['surname']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td>
                            <button class="button is-primary send-email-button" data-email="<?php echo $user['email']; ?>">Send Email</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <!-- <?php
                        $select = "SELECT * FROM user_form";
                        $result = mysqli_query($conn, $select);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["name"] . "</td>";
                            echo "<td>" . $row["surname"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3'>No results found</td></tr>";
                        }
                    ?> -->
                </tbody>
            </table>    
        </div>
    </div>
</body>
</html>
