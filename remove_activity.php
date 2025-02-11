<?php
require("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST["id"]); // Ensure ID is integer
    $timeOfDay = strtolower(trim($_POST["timeOfDay"])); // Normalize case

    // Verify if ID is valid
    if ($id <= 0) {
        echo "error";
        exit();
    }

    // Determine the correct deletion query
    if ($timeOfDay === "morning") {
        $delete_query = "DELETE FROM plans WHERE morning_id = $id";
    } elseif ($timeOfDay === "afternoon") {
        $delete_query = "DELETE FROM plans WHERE afternoon_id = $id";
    }elseif ($timeOfDay === "night") {
        $delete_query = "DELETE FROM plans WHERE night_id = $id";
    } else {
        echo "error";
        exit();
    }

    if (mysqli_query($conn, $delete_query)) {
        echo "success";
    } else {
        echo "error";
    }
}

mysqli_close($conn);
?>