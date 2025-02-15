<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Go on a Date?</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            background-color: #ffeaf7;
        }

        h2 {
            font-size: 24px;
            color: #212529;
            margin-bottom: 20px;
        }

        .btn-container {
            display: flex;
            justify-content: center;
            gap: 50px;
            width: 100%;
        }

        .btn-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .btn {
            font-size: 18px;
            font-weight: bold;
            border-radius: 10px;
            border: 2px solid #212529;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-yes,
        .btn-no {
            width: 120px;
            height: 50px;
        }

        .btn-yes {
            background-color: #66ff66;
            color: #212529;
        }

        .btn-yes:hover {
            background-color: #44cc44;
        }

        .btn-no {
            background-color: #ff6666;
            color: #fff;
        }

        .btn-no:hover {
            background-color: #cc4444;
        }

        /* Custom Alert Styles */
        .custom-alert {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #ffeaf7;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            display: none; /* Initially hidden */
        }

        .custom-alert-content {
            background: linear-gradient(135deg, #ff66c4, #ffb340);
            padding: 25px 35px;
            text-align: center;
            border-radius: 15px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            color: white;
            font-size: 18px;
            font-weight: bold;
            width: 320px;
            position: relative;
        }

        .custom-alert-content p {
            margin: 15px 0;
        }

        #customAlertClose {
            background: white;
            color: #ff66c4;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }

        #customAlertClose:hover {
            background: #ff66c4;
            color: white;
        }
    </style>
</head>

<body>

    <h2>Will you go on a date with me? 💖</h2>

    <div class="btn-container">
        <div class="btn-wrapper">
            <button class="btn btn-yes" id="yesBtn">Yes 😊</button>
        </div>
        <div class="btn-wrapper">
            <button class="btn btn-no" id="noBtn">No 😢</button>
        </div>
    </div>

    <!-- Custom Alert -->
    <div class="custom-alert" id="customAlert">
        <div class="custom-alert-content">
            <p>Yay! Let's go on a date! Kekeke 💕</p>
            <button id="customAlertClose">OK</button>
        </div>
    </div>

    <script>
        let yesSize = 120;
        let yesHeight = 50;
        let noSize = 120;
        let noHeight = 50;

        document.getElementById("yesBtn").addEventListener("click", function () {
            localStorage.setItem("dateAccepted", "true");

            // Show the custom alert
            document.getElementById("customAlert").style.display = "flex";
        });

        document.getElementById("noBtn").addEventListener("click", function () {
            // Increase "Yes" button size
            yesSize += 25;
            yesHeight += 10;

            // Shrink "No" button but keep it clickable
            noSize = Math.max(noSize - 10, 30);
            noHeight = Math.max(noHeight - 5, 15);

            document.getElementById("yesBtn").style.width = yesSize + "px";
            document.getElementById("yesBtn").style.height = yesHeight + "px";
            document.getElementById("yesBtn").style.fontSize = (yesHeight / 2.5) + "px";

            document.getElementById("noBtn").style.width = noSize + "px";
            document.getElementById("noBtn").style.height = noHeight + "px";
            document.getElementById("noBtn").style.fontSize = (noHeight / 2.5) + "px";
        });

        document.getElementById("customAlertClose").addEventListener("click", function () {
            window.location.href = "index.php"; // Redirect when closing the alert
        });
    </script>

</body>

</html>
