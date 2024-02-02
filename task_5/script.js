function addMember() {
    var name = $("#name").val();
    var email = $("#email").val();
    var schoolID = $("#school").val();

    $.ajax({
        type: "POST",
        url: "index.php",
        data: { action: "addMember", name: name, email: email, schoolID: schoolID },
        success: function () {
            alert("Member added successfully!");
        }
    });
}

function getMembers() {
    var schoolID = $("#selectedSchool").val();

    $.ajax({
        type: "POST",
        url: "get_members.php", 
        data: { action: "getMembersBySchool", schoolID: schoolID },
        success: function (result) {
            $("#memberList").html(result);
        },
        error: function (xhr, status, error) {
            console.error("AJAX Error: ", status, error);
        }
    });
}