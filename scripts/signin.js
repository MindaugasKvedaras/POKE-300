$(document).ready(function() {
    $('#signin-form').submit(function(event) {
       event.preventDefault(); 
       console.log('cliced'); 
      var email = $('#email').val();
      var password = $('#password').val();
      
      $.ajax({
        url: 'register_form.php',
        type: 'POST',
        data: { email: email, pass: password },
        success: function(response) {
          if (response == 'success') {
            window.location = 'user_page.php';
          } 
        },
        error: function() {
            $('#signin-error').text('An error occurred while trying to log in');
        }
      });
    });
  });