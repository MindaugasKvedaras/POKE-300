$(document).ready(function() {
    var formTitle = $('#form-title');
    var signupBtn = $('#signup-button');
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