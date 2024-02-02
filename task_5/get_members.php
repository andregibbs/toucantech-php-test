<?php
require_once "functions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST["action"];

    if ($action == "getMembersBySchool") {
        $schoolID = $_POST["schoolID"];
        $members = getMembersBySchool($schoolID);

        foreach ($members as $member) {
            echo "<p><strong>Name:</strong> {$member['name']} <br> <strong>Email:</strong> {$member['email']}</p>";
        }
    }
}
?>