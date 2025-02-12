<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valentines Date 🌹</title>
    <link rel="icon" href="./images/heart1.png">
    <link rel="stylesheet" href="bootstrap.css">
    <script defer src="bootstrap.bundle.js"></script>
    <script src="jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="d-flex flex-column element" style="background-color:#ffeaf7">
        <div class="p-4 text-center no-padding" style="background-color:#ffd7f0;">
            <h1 class="container-fluid text-center mt-1"
                style="color:#ff66c4; display: flex; align-items: center; justify-content: center;">
                <img class="zoom d-none d-sm-inline"
                    src="https://media.giphy.com/media/12PXNbcHW8C9Bm/giphy.gif?cid=790b7611bihh336e3vh24zn7tr8p2rkfy4ckxzlch40cmk7h&ep=v1_stickers_search&rid=giphy.gif&ct=s"
                    alt="Animated GIF" style=" height: 50px;">
                <img class="zoom d-none d-sm-inline"
                    src="https://media.giphy.com/media/12PXNbcHW8C9Bm/giphy.gif?cid=790b7611bihh336e3vh24zn7tr8p2rkfy4ckxzlch40cmk7h&ep=v1_stickers_search&rid=giphy.gif&ct=s"
                    alt="Animated GIF" style=" height: 80px;">
                <img class="zoom d-none d-sm-inline"
                    src="https://media.giphy.com/media/12PXNbcHW8C9Bm/giphy.gif?cid=790b7611bihh336e3vh24zn7tr8p2rkfy4ckxzlch40cmk7h&ep=v1_stickers_search&rid=giphy.gif&ct=s"
                    alt="Animated GIF" style=" height: 110px;">
                <button class="heart zoom mx-2" style="color:#ff66c4;">
                    <b class="valentine-text ">Valentines Date</b>
                </button>
                <script
                    src="https://cdn.jsdelivr.net/npm/@tsparticles/confetti@3.0.3/tsparticles.confetti.bundle.min.js"></script>
                <script>
                    const fireBtn = document.querySelector(".heart");
                    fireBtn.addEventListener("click", () => {
                        const defaults = {
                            spread: 360,
                            ticks: 100,
                            gravity: 0,
                            decay: 0.94,
                            startVelocity: 30,
                            shapes: ["heart"],
                            colors: ["FFC0CB", "FF69B4", "FF1493", "C71585"],
                        };

                        confetti({
                            ...defaults,
                            particleCount: 50,
                            scalar: 2,
                        });

                        confetti({
                            ...defaults,
                            particleCount: 25,
                            scalar: 3,
                        });

                        confetti({
                            ...defaults,
                            particleCount: 10,
                            scalar: 4,
                        });
                    })
                </script>
                <img class="zoom d-none d-sm-inline"
                    src="https://media.giphy.com/media/12PXNbcHW8C9Bm/giphy.gif?cid=790b7611bihh336e3vh24zn7tr8p2rkfy4ckxzlch40cmk7h&ep=v1_stickers_search&rid=giphy.gif&ct=s"
                    alt="Animated GIF" style=" height: 110px;">
                <img class="zoom d-none d-sm-inline"
                    src="https://media.giphy.com/media/12PXNbcHW8C9Bm/giphy.gif?cid=790b7611bihh336e3vh24zn7tr8p2rkfy4ckxzlch40cmk7h&ep=v1_stickers_search&rid=giphy.gif&ct=s"
                    alt="Animated GIF" style=" height: 80px;">
                <img class="zoom d-none d-sm-inline"
                    src="https://media.giphy.com/media/12PXNbcHW8C9Bm/giphy.gif?cid=790b7611bihh336e3vh24zn7tr8p2rkfy4ckxzlch40cmk7h&ep=v1_stickers_search&rid=giphy.gif&ct=s"
                    alt="Animated GIF" style=" height: 50px;">
            </h1>
        </div>
        <nav class="navbar navbar-expand-sm bg-pink" style="background-color:#ffeaf7;">
            <div class="container bg-pink">
                <ul class="navbar-nav align-items-center mx-auto" style="width: fit-content;">
                    <li class="nav-item">
                        <a class="nav-link font active mx-5" href="index.php">
                            <h5><b>Ideas💡</b></h5>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font active mx-5" href="plan.php">
                            <h5><b>Plan🍷</b></h5>
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link font active mx-5" href="add.php">
                            <h5><b>Add</b></h5>
                        </a>
                    </li> -->
                </ul>
                <img class="zoom"
                    src="https://media.giphy.com/media/4NWT0Ry3dtTLW/giphy.gif?cid=ecf05e47ecu6zmu89vhqog8ooeg1rhiuy7c62vd8kfuuem6m&ep=v1_stickers_search&rid=giphy.gif&ct=s"
                    alt="Animated GIF"
                    style="margin-right:10px; height: 60px; position: absolute; top: 50%; transform: translateY(-50%); right: 10px;">
            </div>
        </nav>