<?php

/**
 * User Registration Page
 *
 * This file contains the code for managing user accounts, including registration,
 * and login.
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

if (isset($_POST['submit'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $surname = mysqli_real_escape_string($conn, $_POST['surname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);

    $sql = "INSERT INTO user_form (name, surname, email, password) VALUES ('$name', '$surname', '$email', '$pass')";
    if (mysqli_query($conn, $sql)) {
        echo "Registration successful!";
    } else {
        echo "An error occurred: " . mysqli_error($conn);
    }
}

if (isset($_POST['signin'])) {
    $errors = [];

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);

    $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $_SESSION['user_name'] = $row['name'];
        header('location:user_page.php');
    } else {
        $errors['signin'] = 'Blogi prisijungimo duomenys';
    }
}

?>
    
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register form</title>
    <script 
      src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    >
    </script>
    <script 
      src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"
    >
    </script>
    <link 
        rel="stylesheet" 
        href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css"
    >
    <link rel="stylesheet" href="css/styling.css">
</head>

<body>
  <section class="hero is-fullheight">
    <div class="hero-body">
      <div class="container is-widescreen">
        <div class="columns is-centered is-tablet">
          <div 
            class="notification is-success has-text-centered" 
            id="success-message" 
            style="display:none; max-height:80px;"
          >
            <p>Registracija sėkminga! Netrukus galėsite prisijungti.</p>
          </div>
          <div 
            class="column is-one-third" 
            id="form-container" 
            style="min-width:450px;"
          >
            <div class="container mb-4 has-text-centered">
              <h1 class="title has-text-success" id="form-title">PRISIJUNGIMAS</h1>
            </div>
            <div class="container is-flex-touch is-widescreen">
              <form 
                style="width: 100%;" 
                id="signin-form" 
                action="" 
                method="post"
              >
                <div class="field">
                  <label class="label">El. paštas</label>
                  <div class="control">
                  <input 
                    class="input is-medium" 
                    type="email" 
                    name="email" 
                    placeholder="Jūsų el. paštas" 
                  >
                  </div>
                </div>
                <div class="field">
                  <label class="label">Slaptažodis</label>
                  <div class="control">
                  <input 
                    class="input is-medium" 
                    type="password" 
                    name="password" 
                    placeholder="Slaptažodis" 
                  >  
                  </div>
                </div>
                <div class="container has-text-centered">
                  <?php if (isset($errors['signin'])) : ?>
                    <span id="signin-error" class="has-text-danger">
                        <?php echo $errors['signin']; ?>
                    </span>
                  <?php endif; ?>
                </div>
                <div class="field has-text-centered">
                  <button 
                    id="signin" 
                    class="button is-success is-fullwidth" 
                    type="submit" name="signin" 
                  >
                    Prisijungti
                  </button>
                  <p>Neturite paskyros?</p>
                  <p 
                    class="has-text-success pointer" 
                    id="signup-button"
                  >
                  Užsiregistruokite
                  </p>
                </div>
              </form>
              <form 
                style="width:100%; display:none;" 
                id="signup-form" 
                action="register_form.php" 
                method="post"
              >
                <div class="field">
                  <label class="label">Vardas</label>
                  <div class="control is-expanded">
                  <input 
                    class="input is-medium" 
                    type="text" 
                    name="name" 
                    id="name" 
                    placeholder="Jūsų vardas" 
                  >
                  </div>
                  <span id="name-error"></span>
                </div>
                <div class="field">
                  <label class="label">Pavardė</label>
                  <div class="control">
                  <input 
                    class="input is-medium" 
                    type="text" 
                    name="surname" 
                    id="surname" 
                    placeholder="Jūsų pavardė" 
                  >
                  </div>
                  <span id="surname-error"></span>
                </div>
                <div class="field">
                  <label class="label">El. paštas</label>
                  <div class="control">
                  <input 
                    class="input is-medium" 
                    type="email" 
                    name="email" 
                    id="email" 
                    placeholder="Jūsų el. paštas" 
                  >
                  </div>
                  <span id="email-error"></span>
                </div>
                <div class="field">
                  <label class="label">Slaptažodis</label>
                  <div class="control">
                  <input 
                    class="input is-medium" 
                    type="password" 
                    name="password" 
                    id="password" 
                    placeholder="Slaptažodis"
                  >
                  </div>
                  <span id="password-error"></span>
                </div>
                <div class="field mb-4">
                  <label class="label">Slaptažodžio patvirtinimas</label>
                  <div class="control">
                  <input 
                    class="input is-medium" 
                    type="password" 
                    name="cpassword" 
                    id="cpassword" 
                    placeholder="Pakartokite slaptažodį"
                  >
                  </div>
                  <span id="cpassword-error"></span>
                </div>
                <div class="field has-text-centered">
                  <button 
                    id="signup" 
                    class="button is-success is-fullwidth" 
                    type="submit" name="submit" 
                    value="Registruotis"
                  >
                    Registruotis
                  </button>
                  <p>Jau turite paskyrą?</p>
                  <p 
                    class="has-text-success pointer" 
                    id="signin-button"
                  >
                    Prisijunkite
                  </p>
                </div>
              </form>
            </div>
          </div>
        <div class="column is-half is-hidden-touch">
          <img src="assets/register3.png"/>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="script.js"></script>

</body>
</html>
