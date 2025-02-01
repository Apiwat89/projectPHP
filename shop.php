<?php 
    session_start();
    require_once('database/db.php');

    // check if there is a login
    if (!isset($_COOKIE['user'])) header('location: login.php');

    if ($_SESSION['autoLOG'] == 1) header('location: checkDB.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> shop </title>
    <link rel='stylesheet' href='css/shop.css'>
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
            <!-- text error && success -->
            <?php if (isset($_SESSION['error'])) { ?>
                <div class='checkerr'> 
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </div>
            <?php } else if (isset($_SESSION['success'])) {?>
                <div class='check'> 
                    <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </div>
            <?php } else { ?>
            <!-- cart -->
            <div class="cart">
                <a href="cart.php">
                    <p> cart </p>
                    <i class="fa-solid fa-cart-shopping"></i>
                    <?php if ($_COOKIE['cart'] > 0) { ?>
                        <p class='num'> <?php echo $_COOKIE['cart']; ?> </p>
                    <?php } ?>
                </a>
            </div> <?php } ?> <br>

            <form action="checkDB.php" method='post'>
                <!-- product list -->
                <div class="list">
                    <img src="img/rubber.png" alt="">
                    <div class="about">
                        <h3> Tire </h3>
                        <p> price : 500.- </p>
                        <input type="number" name='rubber' placeholder='amount' min='0' max='10'>
                        <input type="submit" name='sub' value=' ADD '>
                    </div>
                </div>
                <div class="listc">
                    <img src="img/nutset.png" alt="">
                    <div class="about">
                        <h3> Nut set </h3>
                        <p> price : 100.- </p>
                        <input type="number" name='nutset' placeholder='amount' min='0' max='10'>
                        <input type="submit" name='sub' value=' ADD '>
                    </div>
                </div>
                <div class="listc">
                    <img src="img/sparkplug.png" alt="">
                    <div class="about">
                        <h3> Spark plug </h3>
                        <p> price : 100.- </p>
                        <input type="number" name='sparkplug' placeholder='amount' min='0' max='10'>
                        <input type="submit" name='sub' value=' ADD '>
                    </div>
                </div>
                <div class="listc">
                    <img src="img/filter.png" alt="">
                    <div class="about">
                        <h3> Filter </h3>
                        <p> price : 200.- </p>
                        <input type="number" name='filter' placeholder='amount' min='0' max='10'>
                        <input type="submit" name='sub' value=' ADD '>
                    </div>
                </div>
                <div class="listc">
                    <img src="img/shockabsorber.png" alt="">
                    <div class="about">
                        <h3> Shock absorber </h3>
                        <p> price : 500.- </p>
                        <input type="number" name='shockabsorber' placeholder='amount' min='0' max='10'>
                        <input type="submit" name='sub' value=' ADD '>
                    </div>
                </div>
                <div class="listc">
                    <img src="img/headlight.png" alt="">
                    <div class="about">
                        <h3> Headlight </h3>
                        <p> price : 300.- </p>
                        <input type="number" name='headlight' placeholder='amount' min='0' max='10'>
                        <input type="submit" name='sub' value=' ADD '>
                    </div>
                </div>
                <div class="listcb">
                    <img src="img/discbrakes.png" alt="">
                    <div class="about">
                        <h3> Disc brakes </h3>
                        <p> price : 400.- </p>
                        <input type="number" name='discbrekes' placeholder='amount' min='0' max='10'>
                        <input type="submit" name='sub' value=' ADD '>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

<!-- TEST XAMPP CSS -->
<style>
    body {cursor: url("img/oth928.cur"), auto;}
</style>