<?php 
    session_start();
    require_once('database/db.php');

    // check if there is a login
    if (!isset($_COOKIE['user'])) header('location: login.php');

    // check data details repairs
    $id = $_COOKIE['user'];
    $check_PT = $conn->prepare("SELECT * FROM repairs WHERE id = :id"); 
    $check_PT->bindParam(":id", $id);
    $check_PT->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> details </title>
    <link rel='stylesheet' href='css/details.css'>
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
                if ($check_PT->rowCount() > 0) {
                    while ($row = $check_PT->fetch(PDO::FETCH_ASSOC)) { 
                        $car = $row['car'];
                        $problem = $row['problem'];
                        $problemDT = $row['problemDT'];
            ?>
                        <div class="row">
                            <div class="column">Details <?php echo $num ?></div> <br>
                            <div class="column">Car : <?php echo $car ?></div> <br>
                            <div class="column">Problem : <?php echo $problem ?></div> <br>
                            <div class="column"><p> Problem details :  <?php echo $problemDT ?></p></div> <br>
                            <div class="column"> Status : Inspecting 
                                <button> <a href='checkDB.php?list=<?php echo $row['list'] ?>'> cancel </a> </button>
                            </div>
                        </div>
            <?php $num++; } } else { header('location: repair.php'); }?>
        </div> 
    </div>
</body>
</html>

<!-- TEST XAMPP CSS -->
<style>
    body {cursor: url("img/oth929.cur"), auto;}
</style>