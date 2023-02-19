<?php

include 'config.php';
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
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
                <div class="notification is-success has-text-centered" id="success-message" style="display:none; max-height:80px;">
                    <p>Registracija sėkminga! Netrukus galėsite prisijungti.</p>
                </div>
                    <div class="column is-one-third" id="form-container" style="min-width:450px;">
                        <div class="container mb-4 has-text-centered">
                            <h1 class="title has-text-success" id="form-title">PRISIJUNGIMAS</h1>
                        </div>
                        <div class="container is-flex-touch is-widescreen">
                            <?php
                            if (isset($errors['match'])) {
                                echo '<span class="error-msg">' . $errors['match'] . '</span>';
                            };
                            ?>
                            <form style="width: 100%;" id="signin-form" action="" method="post">
                                <div class="field">
                                    <label class="label">El. paštas</label>
                                    <div class="control">
                                        <input class="input is-medium" type="email" name="email" placeholder="Jūsų el. paštas" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>">
                                    </div>
                                    <?php
                                        if (isset($errors['email'])) { ?>
                                            <span id="email-error" class="has-text-danger"><?php echo $errors['email'] ?></span>
                                    <?php } ?>
                                </div>
                                <div class="field">
                                    <label class="label">Slaptažodis</label>
                                    <div class="control">
                                        <input class="input is-medium" type="password" name="password" placeholder="Slaptažodis" value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>">
                                    </div>
                                </div>
                                <div class="container has-text-centered">
                                    <?php
                                        if (isset($errors['signin'])) { ?>
                                            <span id="signin-error" class="has-text-danger"><?php echo $errors['signin'] ?> </span>
                                    <?php } ?>
                                </div>
                                <div class="field has-text-centered">
                                    <input 
                                        id="signin" 
                                        class="button is-success is-fullwidth" 
                                        type="submit" name="signin" 
                                        value="Prisijungti"
                                    >
                                    <p>Neturite paskyros?</p>
                                    <p class="has-text-success pointer" id="signup-button">Užsiregistruokite</p>
                                </div>
                            </form>
                            <form style="width:100%; display:none;" id="signup-form" action="register_form.php" method="post">
                                <div class="field">
                                    <label class="label">Vardas</label>
                                    <div class="control is-expanded">
                                        <input class="input is-medium <?php echo isset($errors['name']) ? 'is-danger' : '' ?>" type="text" name="name" id="name" placeholder="Jūsų vardas" value="<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>">
                                    </div>
                                    <p id="name-error" class="help is-danger error-message"></p>
                                </div>
                                <div class="field">
                                    <label class="label">Pavardė</label>
                                    <div class="control">
                                        <input class="input is-medium <?php echo isset($errors['surname']) ? 'is-danger' : '' ?>" type="text" name="surname" id="surname" placeholder="Jūsų pavardė" value="<?php echo isset($_POST['surname']) ? $_POST['surname'] : '' ?>">
                                    </div>
                                    <span id="surname-error"></span>
                                    <?php
                                    if (isset($errors['surname'])) { ?>
                                            <span id="surname-error" class="help is-danger"><?php echo $errors['surname'] ?> </span>
                                    <?php } ?>
                                </div>
                                <div class="field">
                                    <label class="label">El. paštas</label>
                                    <div class="control">
                                        <input class="input is-medium <?php echo isset($errors['email']) ? 'is-danger' : '' ?>" type="email" name="email" id="email" placeholder="Jūsų el. paštas" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>">
                                    </div>
                                    <span id="email-error"></span>
                                    <?php
                                    if (isset($errors['email'])) { ?>
                                            <span id="email-error" class="help is-danger"><?php echo $errors['email'] ?></span>
                                    <?php } ?>
                                </div>
                                <div class="field">
                                    <label class="label">Slaptažodis</label>
                                    <div class="control">
                                        <input class="input is-medium <?php echo isset($errors['password']) ? 'is-danger' : '' ?>" type="password" name="password" id="password" placeholder="Slaptažodis" value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>">
                                    </div>
                                    <span id="password-error"></span>
                                </div>
                                <div class="field mb-4">
                                    <label class="label">Slaptažodžio patvirtinimas</label>
                                    <div class="control">
                                        <input class="input is-medium <?php echo isset($errors['cpassword']) ? 'is-danger' : '' ?>" type="password" name="cpassword" id="cpassword" placeholder="Pakartokite slaptažodį" value="<?php echo isset($_POST['cpassword']) ? $_POST['cpassword'] : '' ?>">
                                    </div>
                                    <span id="cpassword-error"></span>
                                </div>
                                <div id="success-message" style="display:none;">Form submitted successfully!</div>
                                <div class="field has-text-centered">
                                    <input 
                                        id="signup" 
                                        class="button is-success is-fullwidth" 
                                        type="submit" name="submit" 
                                        value="Registruotis"
                                    >
                                    <p>Jau turite paskyrą?</p>
                                    <p class="has-text-success pointer" id="signin-button">Prisijunkite</p>
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
<!-- <script src="script.js"></script>     -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
  <!-- Include the jQuery Validate plugin -->
<!-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script> -->
<script>
    var inputs = $(".input");
    inputs.on("input", function() {
        var errorElement = $("#" + this.name + "-error");

    if (!this.value.length) {
        $(this).addClass("is-danger");
    } else {
        $(this).removeClass("is-danger");
        this.value.length > 0 ? $(this).addClass("is-success") : null;
    }

    errorElement.css("display", this.value.length > 0 ? "none" : "inline");
    });

    $(document).ready(function() {
    var formTitle = $('#form-title');
    var signupBtn = $('#signup-button');
    var signupBtn2 = $('#signup');
    var signinBtn = $('#signin-button');
    var signinForm = $('#signin-form');
    var signupForm = $('#signup-form');
    var successMessage = $('#success-message');
    var formContainer = $('#form-container');

    signupBtn.click(function() {
      // Hide the sign-in form and show the sign-up form
      signinForm.hide();
      signupForm.show();
      // Update the form title
      formTitle.text('REGISTRACIJA');
    });

    signinBtn.click(function() {
      // Hide the sign-up form and show the sign-in form
      signinForm.show();
      signupForm.hide();
      // Update the form title
      formTitle.text('PRISIJUNGIMAS');
    });

    // add the pattern method to the validation plugin
  $.validator.addMethod("pattern", function(value, element, pattern) {
    if (pattern instanceof RegExp) {
      return pattern.test(value);
    } else {
      return new RegExp(pattern).test(value);
    }
  }, "Invalid format.");
  
  // add validation rules to the form fields
  $('#signup-form').validate({
    rules: {
      name: 'required',
      surname: 'required',
      email: {
        required: true,
        email: true,
        remote: {
            url: 'check_email.php',
            type: 'post',
        }
      },
      password: {
        required: true,
        minlength: 8,
        pattern: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/
      },
      cpassword: {
        required: true,
        minlength: 8,
        equalTo: '#password'
      }
    },
    messages: {
      name: 'Įveskite vardą',
      surname: 'Įveskite pavardę',
      email: {
        required: 'Įveskite el. pašto adresą',
        email: 'Įvedėte ne el. pašto adresą (pvz.: vardas@gmail.com)',
        remote: 'Vartotojas su šiuo el. paštu jau užregistruotas'
      },
      password: {
        required: 'Įveskite slaptažodį',
        minlength: 'Slaptažodį turi sudaryti ne mažiau 8 simboliai',
        pattern: 'Slaptažodis turi turėti bent vieną didžiają raidę ir vieną skaičių'
      },
      cpassword: {
        required: 'Pakartokite savo slaptažodį',
        minlength: 'Slaptažodį turi sudaryti ne mažiau 8 simboliai',
        equalTo: 'Slaptažodžiai nesutampa'
      }
    },
    errorPlacement: function(error, element) {
      // add error message styling
      error.addClass('help is-danger');
      // insert error message after the invalid input field
      error.insertAfter(element);

      element.addClass('is-danger');
      error.appendTo(element.parent());
    },
    // handle form submission
    submitHandler: function(form) {
      console.log('Submitting form...');
      // get the form data
      var formData = $(form).serialize();
      console.log('Form data:', formData);

      // submit the form data
      $.ajax({
        type: 'POST',
        url: 'register_form.php',
        data: formData,
        success: function(response) {
          // display success message
            successMessage.show();
            signupForm.hide();
            formContainer.hide();
          
          // reload the page after 2 seconds
          setTimeout(function() {

            location.reload();
          }, 3000);
        },
        error: function(xhr, status, error) {
          // display error message
          alert('Form submission failed: ' + error);
        }
      });
    }
  });
});
</script>

</body>
</html>
