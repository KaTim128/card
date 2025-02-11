<?php
require("connection.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $activity_id = intval($_POST["id"]);
    $time_of_day = $_POST["timeOfDay"];
    $time_type = $_POST["timeType"]; // Expecting "start" or "end"
    $new_time = $_POST["time"];

    // Validate inputs
    if (empty($activity_id) || empty($time_of_day) || empty($time_type) || empty($new_time)) {
        echo "Invalid input";
        exit();
    }

    // Determine column name dynamically
    if ($time_of_day === "morning") {
        $id_column = "morning_id";
        $column_name = ($time_type === "start") ? "morning_start_time" : "morning_end_time";
    } elseif ($time_of_day === "afternoon") {
        $id_column = "afternoon_id";
        $column_name = ($time_type === "start") ? "afternoon_start_time" : "afternoon_end_time";
    }elseif ($time_of_day === "night") {
        $id_column = "night_id";
        $column_name = ($time_type === "start") ? "night_start_time" : "night_end_time";
    }else {
        echo "Invalid time category";
        exit();
    }

    // Prepare dynamic query
    $update_query = "UPDATE plans SET $column_name = ? WHERE $id_column = ?";
    $stmt = $conn->prepare($update_query);

    if ($stmt) {
        $stmt->bind_param("si", $new_time, $activity_id);
        if ($stmt->execute()) {
            echo "success";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
