<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Go on a Date?</title>
    <style>
        /* Remove unnecessary horizontal scrolling */
        html,
        body {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            width: 100%;
        }

        /* Centered Layout */
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            font-family: "Pacifico", cursive;
            background-color: #ffeaf7;
            text-align: center;
            padding: 15px;
            box-sizing: border-box;
        }

        /* Optimized Text Styling */
        h2 {
            font-size: 22px;
            color: #212529;
            margin-bottom: 20px;
            max-width: 80%;
            line-height: 1.3;
        }

        /* Button Container - Fix Width */
        .btn-container {
            display: flex;
            flex-direction: row;
            justify-content: center;
            gap: 20px;
            max-width: 220px;
            /* Prevents unnecessary stretching */
            width: 100%;
        }

        /* Button Styling */
        .btn {
            font-size: 16px;
            font-weight: bold;
            border-radius: 10px;
            border: 2px solid #212529;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100px;
            height: 45px;
        }

        /* Yes Button */
        .btn-yes {
            background-color: #66ff66;
            color: #212529;
        }

        .btn-yes:hover {
            background-color: #44cc44;
        }

        /* No Button */
        .btn-no {
            background-color: #ff6666;
            color: #fff;
        }

        .btn-no:hover {
            background-color: #cc4444;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            h2 {
                font-size: 20px;
            }

            .btn {
                width: 90px;
                height: 40px;
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            h2 {
                font-size: 18px;
            }

            .btn-container {
                flex-direction: column;
                gap: 15px;
                max-width: 100%;
            }

            .btn {
                width: 100%;
                height: 50px;
                font-size: 16px;
            }
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

    <script>
        let yesSize = 120;
        let yesHeight = 50;
        let noSize = 120;
        let noHeight = 50;

        document.getElementById("yesBtn").addEventListener("click", function () {
            localStorage.setItem("dateAccepted", "true");
            window.location.href = "index.php"; // Directly redirects to index.php
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
    </script>

</body>

</html>