$(document).ready(function() {

  var inputs = $(".input");
  inputs.on("input", function() {
      this.value.length > 0 ? $(this).addClass("is-success") : null;
  });

  $('#profile').click(function() {
    // Display modal
    $('#profile-modal').addClass('is-active');
  })
  
  $('#modal-close').click(function() {
    // Close modal
    $('#profile-modal').removeClass('is-active');
  })  

    // Get the user's data from the server and populate the form fields
    $.ajax({
        url: './server/get_user_data.php',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            $('#fname').val(response.name);
            $('#surname').val(response.surname);
            $('#password').val(response.password);
            $('#cpassword').val(response.password);
        },
        error: function(xhr, status, error) {
            alert('Error getting user data: ' + error);
        }
    });

  // add the pattern method to the validation plugin
  $.validator.addMethod("pattern", function(value, element, pattern) {
    if (pattern instanceof RegExp) {
      return pattern.test(value);
    } else {
      return new RegExp(pattern).test(value);
    }
  }, "Invalid format.");

  // Handle form submission
  $('#edit-profile-form').validate({
    rules: {
      fname: {
        required: true
      },
      surname: {
        required: true
      },
      password: {
        required: true,
        minlength: 8,
        // pattern: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/

      },
      cpassword: {
        required: true,
        minlength: 8,
        equalTo: '#password'
      }
    },
    messages: {
      fname: {
        required: 'Įveskite vardą'
      },
      surname: {
        required: 'Įveskite pavardę'
      },
      password: {
        required: 'Įveskite slaptažodį',
        minlength: 'Slaptažodį turi sudaryti ne mažiau 8 simboliai',
        // pattern: 'Slaptažodis turi turėti bent vieną didžiają raidę ir vieną skaičių'
      },
      cpassword: {
        required: 'Įveskite slaptažodį',
        minlength: 'Slaptažodį turi sudaryti ne mažiau 8 simboliai',
        // pattern: 'Slaptažodis turi turėti bent vieną didžiają raidę ir vieną skaičių'
      }
    },
    highlight: function(element) {
      $(element).addClass('is-danger');
    },
    unhighlight: function(element) {
      $(element).removeClass('is-danger');
    },
    errorPlacement: function(error, element) {
      // add error message styling
      error.addClass('help is-danger');
      // insert error message after the invalid input field
      error.insertAfter(element);
    },
    submitHandler: function(form) {
      var formData = $(form).serialize();

      $.ajax({
        url: './server/update_user_data.php',
        type: 'POST',
        data: formData,
        success: function(response) {
          // Close form submission modal
            $('#profile-modal').removeClass('is-active');

          // Show success message modal for 2 seconds
            $('#success-edit-modal').addClass('is-active');
  
          // Close success message modal after 2 seconds
          setTimeout(function() {
            $('#success-edit-modal').removeClass('is-active');
          }, 2000);

          // Update name in HTML
          $('#greeting').text(response.name);
        },
        error: function(xhr, status, error) {
          console.log(xhr.responseText);
        }
      });
    }
  });
});
