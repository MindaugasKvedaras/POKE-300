$(document).ready(function() {
    $("#search-input").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#user-table-body tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});