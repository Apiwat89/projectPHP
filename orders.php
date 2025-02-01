<?php 
    session_start();
    require_once('database/db.php');

    // check if there is a login
    if (!isset($_COOKIE['user'])) header('location: login.php');

    // check data orders
    $id = $_COOKIE['user'];
    $check_OD = $conn->prepare("SELECT * FROM orders WHERE id = :id"); 
    $check_OD->bindParam(":id", $id);
    $check_OD->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> orders </title>
    <link rel='stylesheet' href='css/orders.css'>
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
        <div class='boxcon' align='center'>
            <br>
            <?php 
                $num = 1;
                if ($check_OD->rowCount() > 0) {
                    while ($row = $check_OD->fetch(PDO::FETCH_ASSOC)) { 
                        $code = $row['code'];
                        $list = $row['list'];
                        $id = $row['id'];
                        $rubber = $row['rubber'];
                        $nutset = $row['nutset'];
                        $sparkplug = $row['sparkplug'];
                        $filter = $row['filter'];
                        $shockabsorber = $row['shockabsorber'];
                        $headlight = $row['headlight'];
                        $discbrekes = $row['discbrekes'];
                        $created_at = $row['created_at'];
            ?>
                        <div class="row">
                            <table class='top'>
                                <tr>
                                    <td> Code <?php echo $code ?> </td>
                                    <td> Cart <?php echo $list ?> </td>
                                    <td> ID <?php echo $id ?> </td>
                                    <td> <?php echo $created_at ?> </td>
                                </tr>
                            </table> <br><hr>
                            <table class='buttom'>
                                <tr>
                                    <td> Tire </td>
                                    <td> Nut set </td>
                                    <td> Spark plug </td>
                                    <td> Filter </td>
                                    <td> Shock absorber </td>
                                    <td> Headlight </td>
                                    <td> Disc brekes </td>
                                </tr>
                                <tr>
                                    <td> <?php echo number_format($rubber) ?> </td>
                                    <td> <?php echo number_format($nutset) ?> </td>
                                    <td> <?php echo number_format($sparkplug) ?> </td>
                                    <td> <?php echo number_format($filter) ?> </td>
                                    <td> <?php echo number_format($shockabsorber) ?> </td>
                                    <td> <?php echo number_format($headlight) ?> </td>
                                    <td> <?php echo number_format($discbrekes) ?> </td>
                                </tr>
                            </table> <br>
                        </div>
            <?php $num++; } } else { header('location: shop.php'); }?>
        </div> 
    </div>
</body>
</html>

<!-- TEST XAMPP CSS -->
<style>
    body {cursor: url("img/oth928.cur"), auto;}
</style>