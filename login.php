<?php 
    session_start();
    require_once('database/db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> home </title>
    <link rel='stylesheet' href='css/login.css'>
    <link href="https://fonts.googleapis.com/css2?family=Signika+Negative:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <video id="background-video" autoplay muted loop>
        <source src="img/move.mp4" type="video/mp4">
    </video>

    <div class="bodylogin">
        <div class='login'>
            <form action="checkDB.php" method="post">
                <h1> Login </h1>

                <!-- text error -->
                <?php if(isset($_SESSION['error'])) { ?>
                    <div class='alert alert-danger' rol='alert'> 
                        <?php 
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        ?>
                    </div>
                <?php } ?>

                <div class='username'> 
                    <input type="text" name='username' placeholder='username'>
                </div>

                <div class='password'> 
                    <input type="password" name='password' placeholder='password'>
                </div>

                <div class='button'> 
                    <input type="submit" name='btnOK' class='btnOK' value=' OK '>
                </div>
            </form>
            <p> If you don't remember your password, <a href="consider.php">click here.</a> </p>
        </div>
    </div>
</body>
</html>

<!-- TEST XAMPP CSS -->
<style>
    body {cursor: url("img/oth928.cur"), auto;}
</style>