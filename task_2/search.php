<?php

require_once "../config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];

    $result = searchProfiles($name);

    foreach ($result as $row) {
        echo "<p>Firstname: {$row['Firstname']} <br/><br/> Lastname: {$row['Surname']} <br/><br/> Email: {$row['emailaddress']}</p>";
    }
}

function searchProfiles($name) {
    global $conn;
    $sql = "SELECT p.UserRefID, p.Firstname, p.Surname, e.emailaddress
            FROM profiles p
            JOIN emails e ON p.UserRefID = e.UserRefID
            WHERE p.Firstname LIKE '%$name%' OR p.Surname LIKE '%$name%'";
    $result = $conn->query($sql);

    $profiles = [];
    while ($row = $result->fetch_assoc()) {
        $profiles[] = $row;
    }

    return $profiles;
}
