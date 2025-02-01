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
            <?php } ?>

            <form action="checkDB.php" method="post">
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
                        <td align="left"> <input type='text' name='new_housenumber'> </td> 
                    </tr>
                    <tr>
                        <td align="right"> village : </td>
                        <td align="left"> <input type='text' name='new_village'> </td> 
                    </tr>
                    <tr>
                        <td align="right"> district : </td>
                        <td align="left"> <input type='text' name='new_district'> </td>
                    </tr>
                    <tr>
                        <td align="right"> district2 : </td>
                        <td align="left"> <input type='text' name='new_district2'> </td>
                    </tr>
                    <tr>
                        <td align="right"> province : </td>
                        <td align="left"> <input type='text' name='new_province'> </td>
                    </tr>
                    <tr>
                        <td align="right"> building : </td>
                        <td align="left"> <input type='text' name='new_building'> </td>
                    </tr>
                    <tr>
                        <td align="right"> phonenumber : </td>
                        <td align="left"> <input type='text' name='new_phonenumber' pattern='[0]{1}[0-9]{9}'> </td>
                    </tr>
                    <tr>
                        <td align="right"> Date of membership : </td>
                        <td align="left"> <?php echo $row['created_at'] ?> </td>
                    </tr>
                </table>
                <input type="submit" name='btnEdit' class='edit' value=" Confirm ">
            </form>
        </div>
    </div>
</body>
</html>

<!-- TEST XAMPP CSS -->
<style>
    body {cursor: url("img/oth928.cur"), auto;}
</style>