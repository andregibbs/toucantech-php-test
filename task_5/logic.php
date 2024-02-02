<?php
require_once "functions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST["action"];

    if ($action == "addMember") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $schoolID = $_POST["schoolID"];

        addMember($name, $email, $schoolID);
    } elseif ($action == "getMembersBySchool") {
        $schoolID = $_POST["schoolID"];
        $members = getMembersBySchool($schoolID);

        foreach ($members as $member) {
            echo "<p>Name: {$member['name']}, Email: {$member['email']}</p>";
        }
    }
} else {
    $schools = getSchools();
}

?>