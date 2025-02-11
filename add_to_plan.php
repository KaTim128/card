<?php
require("connection.php");
// tells the browser that the server will return JSON
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['place_id']) && isset($_POST['type'])) {
    $place_id = intval($_POST['place_id']);
    $type = $_POST['type']; // 'morning' or 'afternoon'

    // Determine the correct column based on type
    if ($type === "morning") {
        $column_name = "morning_id";
    } elseif ($type === "afternoon") {
        $column_name = "afternoon_id";
    } elseif ($type === "night") {
        $column_name = "night_id";
    } else {
        echo json_encode(["success" => false, "error" => "Invalid type"]);
        exit;
    }

    // $column_name = "morning_id" and $place_id = 5
    //SELECT * FROM plans WHERE morning_id = 5;
    $check_query = "SELECT * FROM plans WHERE $column_name = $place_id";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        echo json_encode(["success" => false, "error" => "Already in plans"]);
        exit;
    }

    //Insert into the plans table if its not there yet
    //INSERT INTO plans (morning_id) VALUES (5)
    $insert_query = "INSERT INTO plans ($column_name) VALUES ($place_id)";
    if (mysqli_query($conn, $insert_query)) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => mysqli_error($conn)]);
    }
} else {
    echo json_encode(["success" => false, "error" => "Invalid request"]);
}
?>