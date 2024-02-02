function searchUser() {
    // Get the name from the input field
    var name = $("#name").val();

    $.ajax({
        type: "POST",
        url: "search.php",
        data: { name: name },
        success: function(response) {
            $("#results").html(response);
        }
    });
}
