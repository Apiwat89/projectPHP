<?php 
    session_start();
    require_once('database/db.php');

    // check if there is a login
    if (!isset($_COOKIE['user'])) header('location: login.php');

    // check cart users
    $id = $_COOKIE['user'];
    $check_cart = $conn->prepare("SELECT * FROM carts WHERE id = :id"); 
    $check_cart->bindParam(":id", $id);
    $check_cart->execute();
    $row = $check_cart->fetch(PDO::FETCH_ASSOC);

    if ($_COOKIE['cart'] == 0) header('location: checkDB.php');
    $T = $row['rubber'];
    $N = $row['nutset'];
    $SP = $row['sparkplug'];
    $F = $row['filter'];
    $SB = $row['shockabsorber'];
    $H = $row['headlight'];
    $D = $row['discbrekes'];
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
            </div><br>

            <form action="cart2.php" method='post'>
            <?php if ($T > 0) { ?>
                    <div class="list">
                        <img src="img/rubber.png" alt="">
                        <div class="about">
                            <h3> Tire </h3>
                            <p> amount : <?php echo $T; ?> item </p>
                            <p> price : <?php echo number_format($T * 500, 2); ?> baht </p>
                            <button name='Tire'> Edit </button> 
                        </div>
                    </div>
            <?php } if ($N > 0) { ?>
                    <div class="listc">
                        <img src="img/nutset.png" alt="">
                        <div class="about">
                            <h3> Nut set </h3>
                            <p> amount : <?php echo $N ; ?> item </p>
                            <p> price : <?php echo number_format($N * 100, 2); ?> baht </p>
                            <button name='Nutset'> Edit </button> 
                        </div>
                    </div>
            <?php } if ($SP > 0) { ?>
                    <div class="listc">
                        <img src="img/sparkplug.png" alt="">
                        <div class="about">
                            <h3> Spark plug </h3>
                            <p> amount : <?php echo $SP; ?> item </p>
                            <p> price : <?php echo number_format($SP * 100, 2); ?> baht </p>
                            <button name='Sparkplug'> Edit </button> 
                        </div>
                    </div>
            <?php } if ($F > 0) { ?>
                    <div class="listc">
                        <img src="img/filter.png" alt="">
                        <div class="about">
                            <h3> Filter </h3>
                            <p> amount : <?php echo $F; ?> item </p>
                            <p> price : <?php echo number_format($F * 200, 2); ?> baht </p>
                            <button name='Filter'> Edit </button> 
                        </div>
                    </div>
            <?php } if ($SB > 0) { ?>
                    <div class="listc">
                        <img src="img/shockabsorber.png" alt="">
                        <div class="about">
                            <h3> Shock absorber </h3>
                            <p> amount : <?php echo $SB; ?> item </p>
                            <p> price : <?php echo number_format($SB * 500, 2); ?> baht </p>
                            <button name='Shockabsorber'> Edit </button> 
                        </div>
                    </div>
            <?php } if ($H > 0) { ?>
                    <div class="listc">
                        <img src="img/headlight.png" alt="">
                        <div class="about">
                            <h3> Headlight </h3>
                            <p> amount : <?php echo $H; ?> item </p>
                            <p> price : <?php echo number_format($H * 300, 2); ?> baht </p>
                            <button name='Headlight'> Edit </button> 
                        </div>
                    </div>
            <?php } if ($D > 0) { ?>
                    <div class="listcb">
                        <img src="img/discbrakes.png" alt="">
                        <div class="about">
                            <h3> Disc brakes </h3>
                            <p> amount : <?php echo $D; ?> item </p>
                            <p> price : <?php echo number_format($D * 400, 2); ?> baht </p>
                            <button name='Discbrakes'> Edit </button> 
                        </div>
                    </div>
            <?php } ?> <br>
            </form>

            <div class="confirm">
                <div class="total">
                    <p> Total : 
                        <?php 
                            if ($_COOKIE['cart'] > 0) {
                                echo number_format((($T * 500) + ($N * 100) + ($SP * 100) 
                                + ($F * 200) + ($SB * 500) + ($H * 300) + ($D * 400)), 2);
                            } else echo number_format(0, 2);
                        ?>
                        baht
                    </p>
                </div> <br>
                <form action="checkDB.php" method='post'>
                    <input type="submit" name='Scon' value=' Confirm '>
                    <input type='submit' name='Scer' value=' Clear '>
                </form>
            </div>
        </div> 
    </div>
</body>
</html>

<!-- TEST XAMPP CSS -->
<style>
    body {cursor: url("img/oth931.cur"), auto;}
</style>