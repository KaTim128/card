<?php require("connection.php"); ?>
<?php require("header.php");
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header("Location: lock.php");
    exit();
} ?>
<nav class="navbar navbar-expand-sm bg-pink" style="background-color:#ffeaf7;">
    <div class="container bg-pink">
        <ul class="navbar-nav align-items-center mx-auto" style="width: fit-content;">
            <li class="nav-item">
                <a class="nav-link font active mx-5" href="index.php">
                    <h6>Morning💗</h6>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link font  mx-5" href="afternoon.php">
                    <h6>Afternoon/Evening💗</h6>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link font  mx-5" href="night.php">
                    <h6>Night💗</h6>
                </a>
            </li>
        </ul>
    </div>
</nav>
<div class='container flex-grow-1 outings-container'>
    <div class="row">
        <?php
        // Fetch all morning
        $select_query = "SELECT * FROM morning";
        $query_result = mysqli_query($conn, $select_query);

        // Fetch all planned morning
        $select_plans = "SELECT morning_id FROM plans";
        $query_result_plans = mysqli_query($conn, $select_plans);

        // Store planned morning in an array
        $planned_morning = [];
        while ($plan = mysqli_fetch_assoc($query_result_plans)) {
            $planned_morning[] = $plan['morning_id'];
        }

        if (!$query_result) {
            die("Query failed: " . mysqli_error($conn));
        }

        while ($row = mysqli_fetch_array($query_result)) {
            $morning_id = $row["morning_id"];
            $morning_name = $row["morning_name"];
            $morning_image = $row["morning_image"];
            $is_in_plan = in_array($morning_id, $planned_morning);
            ?>

            <div class="col-md-4">
                <div class='m-4' style="border: 2px solid #000; border-radius:10px;">
                    <div
                        style='background-color:pink; width:100%; height:300px; position: relative; overflow: hidden;  border-radius:10px;'>
                        <img src="./images/<?= $morning_image ?>"
                            style="width: 100%; height: 100%; object-fit: cover; position: absolute; top: 0; left: 0;">
                        <div
                            style="position: absolute; bottom: 0; left: 0; width: 100%; background-color: rgba(255, 255, 255, 0.7); padding: 10px;">
                            <h4 class="ml-3"><?php echo $morning_name; ?></h4>

                            <button class="mt-2 select-btn <?= !$is_in_plan ? 'btn-pink' : 'btn-disabled' ?>"
                                id="select-btn-<?= $morning_id ?>" onclick="addToPlan(<?= $morning_id ?>, 'morning')"
                                <?= $is_in_plan ? 'disabled' : '' ?>>
                                <?= $is_in_plan ? 'In Plans' : 'Select' ?>
                            </button>

                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>
    </div>
</div>

<script>
    function addToPlan(placeId, type) {
        console.log("Adding to plan:", placeId, "Type:", type); // Debugging

        fetch('add_to_plan.php', {
            // sending data to be processed by the server
            method: 'POST',
            //An object containing the request headers
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            //The data being sent to the server
            body: 'place_id=' + placeId + '&type=' + type
        })
            // built-in method that parses the response body into a JavaScript object.
            .then(response => response.json())
            .then(data => {
                console.log("Server response:", data); // Debugging
                if (data.success) {
                    let button = document.getElementById('select-btn-' + placeId);
                    button.innerText = 'In Plans';
                    button.disabled = true;
                    button.classList.remove('btn-pink');
                    button.classList.add('btn-disabled');
                } else {
                    alert('Failed to add to plans: ' + data.error);
                }
            })
            .catch(error => console.error('Error:', error));
    }

    if (localStorage.getItem("dateAccepted") === "true") {
        localStorage.removeItem("dateAccepted"); // Remove flag after use

        const defaults = {
            spread: 360,
            ticks: 100,
            gravity: 0,
            decay: 0.94,
            startVelocity: 30,
            shapes: ["heart"],
            colors: ["FFC0CB", "FF69B4", "FF1493", "C71585"],
        };

        confetti({ ...defaults, particleCount: 50, scalar: 2 });
        confetti({ ...defaults, particleCount: 25, scalar: 3 });
        confetti({ ...defaults, particleCount: 10, scalar: 4 });
    }

</script>

</body>

</html>