<?php 
    session_start();
    require_once('database/db.php');

    // check if there is a login
    if (!isset($_COOKIE['user'])) header('location: login.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> cart </title>
    <link rel='stylesheet' href='css/cart.css'>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <video id="background-video" autoplay muted loop>
        <source src="img/move.mp4" type="video/mp4">
    </video>

    <div class='head'>
        <?php include('navbar.php') ?>
    </div>

    <div class="content">
        <div class='boxcon'>
            <div class="cart">
                <!-- cart -->
                <a href="cart.php">
                    <p> cart </p>
                    <i class="fa-solid fa-cart-shopping"></i>
                    <p class='num'> <?php echo $_COOKIE['cart']; ?> </p>
                </a>
            </div>

            <form action="checkDB.php" method='post'>
            <?php if (isset($_POST['Tire'])) { ?>
                    <div class="list">
                        <img src="img/rubber.png" alt="">
                        <div class="about">
                            <h3> Tire </h3>
                            <p> amount : <input type="number" name='new_rubber' min='0'> item </p>
                        </div>
                    </div>
            <?php } if (isset($_POST['Nutset'])) { ?>
                    <div class="listc">
                        <img src="img/nutset.png" alt="">
                        <div class="about">
                            <h3> Nut set </h3>
                            <p> amount : <input type="number" name='new_nutset' min='0'> item </p>
                        </div>
                    </div>
            <?php } if (isset($_POST['Sparkplug'])) { ?>
                    <div class="listc">
                        <img src="img/sparkplug.png" alt="">
                        <div class="about">
                            <h3> Spark plug </h3>
                            <p> amount : <input type="number" name='new_sparkplug' min='0'> item </p>
                        </div>
                    </div>
            <?php } if (isset($_POST['Filter'])) { ?>
                    <div class="listc">
                        <img src="img/filter.png" alt="">
                        <div class="about">
                            <h3> Filter </h3>
                            <p> amount : <input type="number" name='new_filter' min='0'> item </p>
                        </div>
                    </div>
            <?php } if (isset($_POST['Shockabsorber'])) { ?>
                    <div class="listc">
                        <img src="img/shockabsorber.png" alt="">
                        <div class="about">
                            <h3> Shock absorber </h3>
                            <p> amount : <input type="number" name='new_shockabsorber' min='0'> item </p>
                        </div>
                    </div>
            <?php } if (isset($_POST['Headlight'])) { ?>
                    <div class="listc">
                        <img src="img/headlight.png" alt="">
                        <div class="about">
                            <h3> Headlight </h3>
                            <p> amount : <input type="number" name='new_headlight' min='0'> item </p>
                        </div>
                    </div>
            <?php } if (isset($_POST['Discbrakes'])) { ?>
                    <div class="listcb">
                        <img src="img/discbrakes.png" alt="">
                        <div class="about">
                            <h3> Disc brakes </h3>
                            <p> amount : <input type="number" name='new_discbrakes' min='0'> item </p>
                        </div>
                    </div>
            <?php } ?> <br>

            <div class="confirm">
                <input type="submit" name='editcart' value=' Confirm '>
            </div>
            </form>
        </div> 
    </div>
</body>
</html>

<!-- TEST XAMPP CSS -->
<style>
    body {cursor: url("img/oth931.cur"), auto;}
</style>