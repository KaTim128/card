<?php require("connection.php"); ?>
<?php require("header.php"); ?>
<nav class="navbar navbar-expand-sm bg-pink" style="background-color:#ffeaf7;">
    <div class="container bg-pink">
        <ul class="navbar-nav align-items-center mx-auto" style="width: fit-content;">
            <li class="nav-item">
                <a class="nav-link font mx-5" href="index.php">
                    <h6>Morning💗</h6>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link font active mx-5" href="afternoon.php">
                    <h6>Afternoon/Evening💗</h6>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link font mx-5" href="night.php">
                    <h6>Night💗</h6>
                </a>
            </li>
        </ul>
    </div>
</nav>
<div class='container flex-grow-1 outings-container'>
    <div class="row">
        <?php
        // Fetch all afternoon
        $select_query = "SELECT * FROM afternoon";
        $query_result = mysqli_query($conn, $select_query);

        // Fetch all planned afternoon
        $select_plans = "SELECT afternoon_id FROM plans";
        $query_result_plans = mysqli_query($conn, $select_plans);

        // Store planned afternoon in an array
        $planned_afternoon = [];
        while ($plan = mysqli_fetch_assoc($query_result_plans)) {
            $planned_afternoon[] = $plan['afternoon_id'];
        }

        if (!$query_result) {
            die("Query failed: " . mysqli_error($conn)); // Essential error handling
        }

        while ($row = mysqli_fetch_array($query_result)) {
            $afternoon_id = $row["afternoon_id"];
            $afternoon_name = $row["afternoon_name"];
            $afternoon_image = $row["afternoon_image"];
            $is_in_plan = in_array($afternoon_id, $planned_afternoon);
            ?>

            <div class="col-md-4">
                <div class='m-4' style="border: 2px solid #000; border-radius:10px;">
                    <div style='background-color:pink; width:100%; height:300px; position: relative; overflow: hidden;  border-radius:10px;'>
                        <img src="./images/<?= $afternoon_image ?>"
                            style="width: 100%; height: 100%; object-fit: cover; position: absolute; top: 0; left: 0;">
                        <div
                            style="position: absolute; bottom: 0; left: 0; width: 100%; background-color: rgba(255, 255, 255, 0.7); padding: 10px;">
                            <h4 class="ml-3"><?php echo $afternoon_name; ?></h4>

                            <button class="mt-2 select-btn <?= !$is_in_plan ? 'btn-pink' : 'btn-disabled' ?>"
                                id="select-btn-<?= $afternoon_id ?>" onclick="addToPlan(<?= $afternoon_id ?>, 'afternoon')"
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
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'place_id=' + placeId + '&type=' + type
        })
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

</script>

</body>

</html>