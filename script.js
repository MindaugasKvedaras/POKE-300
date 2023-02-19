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
    // add validation rules to the form fields
    $('#signup-form').validate({
      rules: {
        name: 'required',
        email: {
          required: true,
          email: true,
        },
        password: {
          required: true,
          minlength: 6,
        },
        cpassword: {
          required: true,
          minlength: 6,
          equalTo: '#password'
        }
      },
      messages: {
        name: 'Please enter your name',
        email: {
          required: 'Please enter your email address',
          email: 'Please enter a valid email address',
        },
        password: {
          required: 'Please enter a password',
          minlength: 'Password must be at least 6 characters long',
        },
        confirm_password: {
          required: 'Please confirm your password',
          minlength: 'Password must be at least 6 characters long',
          equalTo: 'Passwords do not match'
        }
      },
      // handle form submission
      submitHandler: function(form) {
        // get the form data
        var formData = $(form).serialize();
  
        // submit the form data
        $.ajax({
          type: 'POST',
          url: 'register_form.php',
          data: formData,
          success: function(response) {
            // display success message
            alert('Form submitted successfully');
            // redirect to registered users table page
            location.reload();
          },
          error: function(xhr, status, error) {
            // display error message
            alert('Form submission failed: ' + error);
          }
        });
      }
    });
  });