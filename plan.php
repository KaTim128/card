<?php
require("connection.php");
require("header.php");
?>

<?php
$hasActivities = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM plans")) > 0;

if ($hasActivities) {

    // Morning Activities
    $morning = [];
    $select_query = "SELECT morning_id FROM plans WHERE morning_id IS NOT NULL";
    $select_result = mysqli_query($conn, $select_query);

    while ($row = mysqli_fetch_array($select_result)) {
        $morning[] = $row["morning_id"];
    }

    if (!empty($morning)) {
        $morning_ids = implode(',', array_map('intval', $morning));

        $select_morning = "
        SELECT m.*, p.morning_start_time, p.morning_end_time 
        FROM morning m
        INNER JOIN plans p ON m.morning_id = p.morning_id
        WHERE p.morning_id IN ($morning_ids)";

        $morning_result = mysqli_query($conn, $select_morning);

        echo '<table class="styled-table" id="morningTable">';
        echo '<thead>
            <tr>
                <th class="bg-pink">Time of Day</th>
                <th class="bg-pink">From</th>
                <th class="bg-pink">To</th>
                <th class="bg-pink">Place</th>
                <th class="bg-pink">Actions</th>
            </tr>
          </thead>';
        echo '<tbody>';

        while ($row = mysqli_fetch_array($morning_result)) {
            $morning_id = $row["morning_id"];
            $morning_name = $row["morning_name"];
            // $morning_location = $row["morning_location"];
            $morning_img = $row["morning_image"];
            $morning_start_time = $row["morning_start_time"] ?? '';
            $morning_end_time = $row["morning_end_time"] ?? '';

            echo '<tr data-id="' . $morning_id . '" data-timeofday="Morning">';
            echo '<td style="color:#7ed957";"><b>Morning</b></td>';
            echo '<td>
                <input type="time" class="time-picker from-time"
                    value="' . (!empty($morning_start_time) ? date('H:i', strtotime($morning_start_time)) : '') . '" 
                    data-id="' . $morning_id . '" data-timeofday="morning" min="00:00" >
              </td>';
            echo '<td>
                <input type="time" class="time-picker to-time"
                    value="' . (!empty($morning_end_time) ? date('H:i', strtotime($morning_end_time)) : '') . '" 
                    data-id="' . $morning_id . '" data-timeofday="morning" min="00:00" >
              </td>';
            echo '<td>
              <div style="text-align: center;">
                  <img src="./images/' . $morning_img . '" class="activity-image mb-2" style="display: block; margin: 0 auto;">
                  <span><b>' . $morning_name . '</b></span>
              </div>
            </td>';
            // echo '<td>' . $morning_location . '</td>';
            echo '<td>
                <button class="move-up zoom btn-arrow">⬆️</button>
                <button class="move-down zoom btn-arrow">⬇️</button>
                <button class="remove zoom btn-remove">❌</button>
              </td>';
            echo '</tr>';
        }

        echo '</tbody></table>';
    }

    // Afternoon Activities
    $afternoon = [];
    $select_query = "SELECT afternoon_id FROM plans WHERE afternoon_id IS NOT NULL";
    $select_result = mysqli_query($conn, $select_query);

    while ($row = mysqli_fetch_array($select_result)) {
        $afternoon[] = $row["afternoon_id"];
    }

    if (!empty($afternoon)) {
        $afternoon_ids = implode(',', array_map('intval', $afternoon));

        $select_afternoon = "
        SELECT a.*, p.afternoon_start_time, p.afternoon_end_time 
        FROM afternoon a
        INNER JOIN plans p ON a.afternoon_id = p.afternoon_id
        WHERE p.afternoon_id IN ($afternoon_ids)";

        $afternoon_result = mysqli_query($conn, $select_afternoon);

        echo '<table class="styled-table" id="afternoonTable">';
        echo '<thead class="">
            <tr class="bg-pink">
                <th class="bg-pink">Time of Day</th>
                <th class="bg-pink">From</th>
                <th class="bg-pink">To</th>
                <th class="bg-pink">Place</th>
                <th class="bg-pink">Actions</th>
            </tr>
          </thead>';
        echo '<tbody>';

        while ($row = mysqli_fetch_array($afternoon_result)) {
            $afternoon_id = $row["afternoon_id"];
            $afternoon_name = $row["afternoon_name"];
            // $afternoon_location = $row["afternoon_location"];
            $afternoon_img = $row["afternoon_image"];
            $afternoon_start_time = $row["afternoon_start_time"] ?? '';
            $afternoon_end_time = $row["afternoon_end_time"] ?? '';

            echo '<tr data-id="' . $afternoon_id . '" data-timeofday="Afternoon">';
            echo '<td style="color:#ffb340;"><b>Afternoon</b></td>';
            echo '<td>
                <input type="time" class="time-picker from-time"
                    value="' . (!empty($afternoon_start_time) ? date('H:i', strtotime($afternoon_start_time)) : '') . '" 
                    data-id="' . $afternoon_id . '" data-timeofday="afternoon" min="12:00" >
              </td>';
            echo '<td>
                <input type="time" class="time-picker to-time"
                    value="' . (!empty($afternoon_end_time) ? date('H:i', strtotime($afternoon_end_time)) : '') . '" 
                    data-id="' . $afternoon_id . '" data-timeofday="afternoon" min="12:00" >
              </td>';
            echo '<td>
              <div style="text-align: center;">
                  <img src="./images/' . $afternoon_img . '" class="activity-image mb-2" style="display: block; margin: 0 auto;">
                  <span><b>' . $afternoon_name . '</b></span>
              </div>
            </td>';
            // echo '<td>' . $afternoon_location . '</td>';
            echo '<td>
                <button class="move-up zoom btn-arrow">⬆️</button>
                <button class="move-down zoom btn-arrow">⬇️</button>
                <button class="remove zoom btn-remove">❌</button>
              </td>';
            echo '</tr>';
        }

        echo '</tbody></table>';
    }

    // night Activities
    $night = [];
    $select_query = "SELECT night_id FROM plans WHERE night_id IS NOT NULL";
    $select_result = mysqli_query($conn, $select_query);

    while ($row = mysqli_fetch_array($select_result)) {
        $night[] = $row["night_id"];
    }

    if (!empty($night)) {
        $night_ids = implode(',', array_map('intval', $night));

        $select_night = "
        SELECT a.*, p.night_start_time, p.night_end_time 
        FROM night a
        INNER JOIN plans p ON a.night_id = p.night_id
        WHERE p.night_id IN ($night_ids)";

        $night_result = mysqli_query($conn, $select_night);

        echo '<table class="styled-table" id="nightTable">';
        echo '<thead>
            <tr>
                <th class="bg-pink">Time of Day</th>
                <th class="bg-pink">From</th>
                <th class="bg-pink">To</th>
                <th class="bg-pink">Place</th>
                <th class="bg-pink">Actions</th>
            </tr>
          </thead>';
        echo '<tbody>';

        while ($row = mysqli_fetch_array($night_result)) {
            $night_id = $row["night_id"];
            $night_name = $row["night_name"];
            // $night_location = $row["night_location"];
            $night_img = $row["night_image"];
            $night_start_time = $row["night_start_time"] ?? '';
            $night_end_time = $row["night_end_time"] ?? '';

            echo '<tr data-id="' . $night_id . '" data-timeofday="night">';
            echo '<td style="color:#5760d9;"><b>Night</b></td>';
            echo '<td>
                <input type="time" class="time-picker from-time"
                    value="' . (!empty($night_start_time) ? date('H:i', strtotime($night_start_time)) : '') . '" 
                    data-id="' . $night_id . '" data-timeofday="night" min="12:00" >
              </td>';
            echo '<td>
                <input type="time" class="time-picker to-time"
                    value="' . (!empty($night_end_time) ? date('H:i', strtotime($night_end_time)) : '') . '" 
                    data-id="' . $night_id . '" data-timeofday="night" min="12:00" >
              </td>';
            echo '<td>
              <div style="text-align: center;">
                  <img src="./images/' . $night_img . '" class="activity-image mb-2" style="display: block; margin: 0 auto;">
                  <span><b>' . $night_name . '</b></span>
              </div>
            </td>';
            // echo '<td>' . $night_location . '</td>';
            echo '<td>
                <button class="move-up zoom btn-arrow">⬆️</button>
                <button class="move-down zoom btn-arrow">⬇️</button>
                <button class="remove zoom btn-remove">❌</button>
              </td>';
            echo '</tr>';
        }

        echo '</tbody></table>';
    }
} else {
    echo '<p class="font"; style="text-align: center; font-size: 18px; font-weight: bold; color: #ff66c4; margin:60px;">Add in some ideas and I will do the rest for you my love! 🌹 <img class="zoom"
                    src="https://media.giphy.com/media/DniPZt06139PZEsDn4/giphy.gif?cid=790b7611nxtcfjymng08wjp4hrq8xu3ga15ojeeqwzpb9y7h&ep=v1_stickers_search&rid=giphy.gif&ct=s"
                    alt="Animated GIF" style=" height: 50px;"></p>';

}
?>
<?php if ($hasActivities) { ?>
    <div class="d-flex justify-content-center"> <!-- Centering container -->
        <a id="doneButton" class="font my-5 btn btn-done py-2 mx-5 d-flex align-items-center justify-content-center"
            href="left.php" style="border-radius: 8px; font-size: 1rem; font-weight: 600;">
            Lock In 👽🍷
        </a>
    </div>
<?php } ?>

<script>
    $(document).ready(function () {
        $(".time-picker").change(function () {
            var newTime = $(this).val(); // Get new time
            var activityId = $(this).data("id"); // Get activity ID
            var timeOfDay = $(this).data("timeofday").toLowerCase(); // Get time of day

            // Determine if this is a "from" (start) or "to" (end) input
            var timeType = $(this).hasClass("from-time") ? "start" : "end";

            // Get the other time input (either "from" or "to") within the same row
            var row = $(this).closest("tr");
            var fromTime = row.find(".from-time").val();
            var toTime = row.find(".to-time").val();

            // Ensure From Time is Less Than To Time
            if (fromTime && toTime && fromTime >= toTime) {
                alert("Invalid time range. 'From' time must be earlier than 'To' time.");
                $(this).val($(this).attr("value")); // Reset to previous value
                return;
            }

            // // Validate AM/PM based on time of day
            // let isValid = false;
            // if (timeOfDay === "morning" && newTime >= "00:00" && newTime <= "11:59") {
            //     isValid = true;
            // } else if (timeOfDay === "afternoon" && newTime >= "12:00" && newTime <= "19:59") {
            //     isValid = true;
            // }

            // if (!isValid) {
            //     alert("Invalid time. Morning activities must be between 12:00 AM and 11:59 AM. Afternoon & evening activities must be between 12:00 PM and 7:59 PM.");
            //     $(this).val($(this).attr("value")); // Reset to previous value
            //     return;
            // }

            // Send data via AJAX to update_time.php
            $.ajax({
                url: "update_time.php",
                type: "POST",
                data: {
                    id: activityId,
                    timeOfDay: timeOfDay,
                    timeType: timeType, // Indicates if it's a start or end time
                    time: newTime
                },
                success: function (response) {
                    if (response.trim() !== "success") {
                        alert("Failed to update time.");
                    }
                },
                error: function () {
                    alert("An error occurred while processing the request.");
                }
            });
        });

        $(".move-up").click(function () {
            var row = $(this).closest("tr");
            if (row.prev().is("tr")) {
                row.prev().before(row);
            }
        });

        $(".move-down").click(function () {
            var row = $(this).closest("tr");
            row.next().after(row);
        });

        $(".remove").click(function () {
            var row = $(this).closest("tr");
            var activityId = row.data("id");
            var timeOfDay = row.data("timeofday").toLowerCase();
            var table = row.closest("table");

            $.ajax({
                url: "remove_activity.php",
                type: "POST",
                data: { id: activityId, timeOfDay: timeOfDay },
                success: function (response) {
                    if (response === "success") {
                        row.fadeOut(300, function () {
                            $(this).remove();
                            if (table.find("tbody tr").length === 0) {
                                table.fadeOut(300, function () {
                                    $(this).remove();
                                });
                            }
                        });
                    } else {
                        alert("Error removing activity.");
                    }
                }
            });
        });
    });

    $(document).ready(function () {
        $(".btn-remove").click(function () {
            var row = $(this).closest("tr");
            var table = row.closest("table");
            var activityId = row.data("id");

            // Remove the activity via AJAX
            $.ajax({
                url: "remove_activity.php", // Adjust this to your actual removal script
                type: "POST",
                data: { id: activityId },
                success: function (response) {
                    row.remove(); // Remove row from table

                    // If table is empty after removal, remove the table
                    if (table.find("tbody tr").length === 0) {
                        table.remove();
                    }

                    // Check if any table remains
                    if ($("table.styled-table").length === 0) {
                        $("#doneButton").remove(); // Remove the Done button if no tables exist
                    }
                }
            });
        });
    });


    $(document).ready(function () {
        $("#doneButton").click(function (e) {
            e.preventDefault();
            showCustomAlert("Can't wait to see you muah 😘", $(this).attr("href"));
        });
    });

    function showCustomAlert(message, redirectUrl) {
        let alertBox = `
        <div id="customAlert" class="custom-alert">
            <div class="custom-alert-content">
                <p>${message}</p>
                <button id="customAlertClose">OK</button>
            </div>
        </div>
    `;

        $("body").append(alertBox);
        $("#customAlert").fadeIn(300);

        $("#customAlertClose").click(function () {
            $("#customAlert").fadeOut(300, function () {
                $(this).remove();
                if (redirectUrl) {
                    window.location.href = redirectUrl;
                }
            });
        });
    }




</script>