<?php

include 'config.php'; // include database connection

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