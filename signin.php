<?php

require './server/config.php';

session_start();

if (isset($_POST['signin'])) {
    $errors = [];
  
    $email = $_POST['email'];
    $pass = md5($_POST['password']);
  
      $stmt = $pdo->prepare("SELECT * FROM user_form WHERE email = ? AND password = ? ");
      $stmt->execute([$email, $pass]);
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
  
    if ($result) {
        $_SESSION['user_name'] = $result['name'];
        header('Location: user_page.php');
    } else {
        $errors['signin'] = 'Blogi prisijungimo duomenys';
    }
  }
  

    // if ($stmt->rowCount() > 0) {
    //             session_start();
    //     $_SESSION['user_name'] = $result['name'];
    //     echo 'success';
    //             header('Location: /login/user_page.php');

    // } else {
    //     echo 'Incorrect username or password';
    // }
    // if ($stmt) {
    //     session_start();
    //     $_SESSION['user_name'] = $result['name'];
    //     echo 'success';
    //     // header('Location: /login/user_page.php');

    // } else {
    //     echo "error"
        // header('Location:/login/register_form.php');
        // exit();

        // $error =  'error';
        // $error = 'Blogi prisijungimo duomenys';
        // header('Location: /login/register_form.php');
    // }
