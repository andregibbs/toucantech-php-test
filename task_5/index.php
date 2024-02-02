<?php require_once "logic.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToucanTech Test</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="script.js"></script>
</head>
<body>
    <h1>ToucanTech Members</h1>

    <label for="name">Name:</label>
    <input type="text" id="name" name="name">

    <label for="email">Email:</label>
    <input type="email" id="email" name="email">

    <label for="school">School:</label>
    <select id="school" name="school">
        <?php
        foreach ($schools as $school) {
            echo "<option value='{$school['schoolID']}'>{$school['schoolName']}</option>";
        }
        ?>
    </select>

    <button onclick="addMember()">Add Member</button>

    <hr>

    <label for="selectedSchool">Select School:</label>
    <select id="selectedSchool" name="selectedSchool" onchange="getMembers()">
        <?php
        foreach ($schools as $school) {
            echo "<option value='{$school['schoolID']}'>{$school['schoolName']}</option>";
        }
        ?>
    </select>

    <div id="memberList"></div>
</body>
</html>
