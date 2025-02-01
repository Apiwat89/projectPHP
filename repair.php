<?php 
    session_start();
    require_once('database/db.php');

    // check if there is a login
    if (!isset($_COOKIE['user']))  header('location: login.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> repair </title>
    <link rel='stylesheet' href='css/repair.css'>
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
        <div class='boxcon' align='center'> <br>
            <!-- text success -->
            <?php if(isset($_SESSION['success'])) { ?>
                <div class='check'> 
                    <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </div>
            <?php } ?>

            <form action="checkDB.php" method='post'>
                <table align='center'>
                    <tr>
                        <td colspan='2' align='center'> Fill in information </td>
                    </tr>
                    <tr>
                        <td align='right'> Car : </td>
                        <td> <input type="text" name='car' placeholder=' Car ' required> </td>
                    </tr>
                    <tr>
                        <td align='right'> Problem : </td>
                        <td> <input type="text" name='problem' placeholder=' Problem ' required> </td>
                    </tr>
                    <tr>
                        <td align='right'> Problem details : </td>
                        <td> <textarea name='problemDT' cols="30" rows="10" placeholder=' Problem details ' required></textarea> </td>
                    </tr>
                </table>
                <div class="sub">
                    <input type="submit" name='Sc' value=' Confirm '>
                    <input type="reset" value=' Clear '>
                </div>
            </form>
        </div> 
    </div>
</body>
</html>

<!-- TEST XAMPP CSS -->
<style>
    body {cursor: url("img/oth930.cur"), auto;}
</style>