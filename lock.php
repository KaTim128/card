<?php
require('connection.php');

// If already authenticated, go to index.php
if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true) {
    header("Location: index.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST["password"];

    // Set your desired password
    $correct_password = "555";

    if ($password === $correct_password) {
        $_SESSION['authenticated'] = true; // Mark user as authenticated
        header("Location: random.php"); // Redirect to main page
        exit();
    } else if ($password === "deletion") {
        // Execute deletion query on the 'plans' table
        $sql = "DELETE FROM plans";

        if (mysqli_query($conn, $sql)) {
            header("Location: lock.php");
        } else {
            echo "<p class='text-danger'>Error deleting records: " . mysqli_error($conn) . "</p>";
        }
    } else {
        $error = "Incorrect password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./images/heart1.png">
    <title>Lock Screen 🔒</title>
    <link rel="stylesheet" href="bootstrap.css">
    <script defer src="bootstrap.bundle.js"></script>
    <script src="jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center vh-100 text-center">
        <div>
            <h2>Enter Password to Continue:</h2>

            <?php if (isset($error))
                echo "<p class='text-danger'>$error</p>"; ?>

            <form method="POST">
                <input type="password" name="password" class="form-control mb-3 w-100" required>
                <div style="display: flex; justify-content: center;">
                    <button type="submit" class="btn btn-lock">Unlock 🔒</button>
                </div>

            </form>
        </div>
    </div>
    <script>
        window.addEventListener("beforeunload", function () {
            navigator.sendBeacon("destroy_session.php");
        });
    </script>
</body>

</html>