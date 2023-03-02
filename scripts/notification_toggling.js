$(document).ready(function() {
    $('#message-button').click(function() {
      $('#message-dropdown').toggleClass('is-active');

      if ($(this).attr('data-button-name')) {
        $(this).removeAttr('data-button-name');
      } else {
        $(this).attr('data-button-name', 'Pranešimai');
      }
    });

    $(document).on('click', function(event) {
      var dropdown = $('#message-dropdown');
      var button = $('#message-button');

      if (!dropdown.is(event.target) && dropdown.has(event.target).length === 0 &&
        !button.is(event.target) && button.has(event.target).length === 0) {
          dropdown.removeClass('is-active');
          button.attr('data-button-name', 'Pranešimai');
        }
});
});