$(document).ready(function() {
  var modal = $('#success-modal');
	var table = $('#myTable');
	var tbody = $('#tableBody');
	var pagination = $('#pagination');
	var rowsPerPage = 10; // Number of rows to display per page
	var currentPage = 1; // Current page number
  var searchTerm = ''; // Search term

	function loadTableData(page, searchTerm) {
	  $.ajax({
		  url: './server/users_db.php',
		  method: 'POST',
		  data: {page: page, rowsPerPage: rowsPerPage, searchTerm: searchTerm},
		  dataType: 'json',
		  success: function(response) {
			 tbody.html(response.tableRows);
			 pagination.html(response.pagination);
		  }
	  });
	}

  function fetchNotifications(searchTerm) {
    // Send an AJAX request to retrieve data from the server
    $.ajax({
      url: './server/get_pokes.php',
      method: 'GET',
      data: { searchTerm: searchTerm },
      dataType: 'json',
      success: function(response) {
        console.log('text');
        // Update the notification count
        $('#notifications-dropdown').html(response.pokes);
        $('#pokes').text(response.count);
      },
      error: function(xhr, status, error) {
        console.error('AJAX error: ' + status + ' ' + error);
      }
    });
} 
	
	loadTableData(currentPage, searchTerm); // Load initial table data
  fetchNotifications();// Load notifications
	
	// Pagination click event
	pagination.on('click', '.pagination-link', function(event) {
	  event.preventDefault();
	  currentPage = $(this).data('page');
	  loadTableData(currentPage, searchTerm);
	});

  // Search input keyup event
  $('#search-input').on('keyup', function() {
    searchTerm = $(this).val();
    loadTableData(1, searchTerm);
  });

	table.on('click', '#email-btn', function() {
    // Get the email recipient from the button's data-recipient attribute
    var recipient = $(this).data('recipient');
    var sender = $('#sender-email').text();
    var message = 'siunčia tau poke';
    var sending_date = new Date().toLocaleString('lt-LT');

    //Send the email information to the server using Ajax
    $.ajax({
      url: './user_page.php',
      method: 'POST',
      data: {
        recipient: recipient,
        message: message,
        sending_date: sending_date,
        sender: sender,
      },
      success: function() {
        // Handle the success response
        modal.addClass('is-active');
        setTimeout(function() {
        modal.removeClass('is-active');
      }, 2000);

      var paginglink = pagination.find('#paging');
      var value = parseInt(paginglink.attr('data-page'));
      loadTableData(value, searchTerm);
      fetchNotifications(searchTerm);
            
      },
      error: function(xhr, status, error) {
        // Handle the error response
        alert('Error sending email: ' + error);
      }
    });
  }); 
});