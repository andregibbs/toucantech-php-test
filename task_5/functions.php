<?php
require_once "../config.php";

function addMember($name, $email, $schoolID){
    // Logic for adding a member to the database

    global $conn;

    $sql = "INSERT INTO members (name, email, schoolID) VALUES ('$name', '$email', $schoolID)";
    $conn->query($sql);
}

function getSchools() {
    // Logic for fetching schools from the database

    global $conn;

    $sql = "SELECT * FROM schools";
    $result = $conn->query($sql);

    $schools = [];
    while ($row = $result->fetch_assoc()) {
        $schools[] = $row;
    }

    return $schools;
}

function getMembersBySchool($schoolID) {
     // Logic for fetching members by school from the database
     
    global $conn;

    $sql = "SELECT * FROM members WHERE schoolID = $schoolID";
    $result = $conn->query($sql);

    $members = [];
    while ($row = $result->fetch_assoc()) {
        $members[] = $row;
    }

    return $members;
}
