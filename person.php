<?php 
    session_start();
    require_once('database/db.php');

    // check if there is a login
    if (!isset($_COOKIE['user'])) header('location: login.php');

    // check data details users
    $id = $_COOKIE['user'];
    $check_PT = $conn->prepare("SELECT * FROM users WHERE id = :id"); 
    $check_PT->bindParam(":id", $id);
    $check_PT->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> person </title>
    <link rel='stylesheet' href='css/person.css'>
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
            <form action="person2.php" method="post">
                <table colspan='2'>
                    <tr>
                        <td colspan='2'> <big> Information </big> </td>
                    </tr>
                    <tr>
                        <td align="right"> id : </td>
                        <td align="left"> <?php echo $row['id'] ?> </td>
                    </tr>
                    <tr>
                        <td align="right"> username : </td>
                        <td align="left"> <?php echo $row['username'] ?> </td>
                    </tr>
                    <tr>
                        <td align="right"> housenumber : </td>
                        <td align="left"> <?php echo $row['housenumber'] ?> </td>
                    </tr>
                    <tr>
                        <td align="right"> village : </td>
                        <td align="left"> <?php echo $row['village'] ?> </td>
                    </tr>
                    <tr>
                        <td align="right"> district : </td>
                        <td align="left"> <?php echo $row['district'] ?> </td>
                    </tr>
                    <tr>
                        <td align="right"> district2 : </td>
                        <td align="left"> <?php echo $row['district2'] ?> </td>
                    </tr>
                    <tr>
                        <td align="right"> province : </td>
                        <td align="left"> <?php echo $row['province'] ?> </td>
                    </tr>
                    <tr>
                        <td align="right"> building : </td>
                        <td align="left"> <?php echo $row['building'] ?> </td>
                    </tr>
                    <tr>
                        <td align="right"> phonenumber : </td>
                        <td align="left"> <?php echo $row['phonenumber'] ?> </td>
                    </tr>
                    <tr>
                        <td align="right"> Date of membership : </td>
                        <td align="left"> <?php echo $row['created_at'] ?> </td>
                    </tr>
                </table>
                <input type="submit" name='edit' class='edit' value=" Edit ">
            </form>
        </div>
    </div>
</body>
</html>

<!-- TEST XAMPP CSS -->
<style>
    body {cursor: url("img/oth928.cur"), auto;}
</style>