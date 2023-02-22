$(document).ready(function() {
  var modal = $('#success-modal');

      $('#user-table').on('click', '#email-btn', function() {

        // Get the email recipient from the button's data-recipient attribute
        var recipient = $(this).data('recipient');
        
        var message = 'siunčia tau poke';

        var sending_date = new Date().toLocaleString('lt-LT');

        //Send the email information to the server using Ajax
        $.ajax({
          url: './user_page.php',
          method: 'POST',
          data: {
            recipient: recipient,
            message: message,
            sending_date: sending_date
          },
          success: function() {
            // Handle the success response
            modal.addClass('is-active');
            setTimeout(function() {
              modal.removeClass('is-active');
            }, 2000);

            // Reload the table to show the updated email count
            $('#user-table').load('user_page.php #user-table');
          },
          error: function(xhr, status, error) {
            // Handle the error response
            alert('Error sending email: ' + error);
          }
        });
    }); 
});