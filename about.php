<?php 
    session_start();
    require_once('database/db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> about </title>
    <link rel='stylesheet' href='css/about.css'>
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
            <h1> Website system </h1>
            <p> 1. Selling car parts. </p>
            <p> 2. Get car repairs at home. </p>
            <p> 3. Car pick-up service to the center. </p> <br>
            <h1> Using the website </h1>
            <p> 1. Apply for membership before using. </p>
            <p> 2. Log in every time before use. </p>
            <p> 3. Every time you purchase a product, you must log in first. </p>
            <p> 4. Every time you report a repair item You must log in first. </p> <br>
            <h1> You can inquire at </h1>
            <p> Email : kmutnb@email.com </p>
            <p> Tel : 123-456-7890 </p>
            <p> Address: 1234 Street Name, City, Country </p> <br>
            <h1> Current </h1>
            <p> We are working to make the system better for all users. </p>
        </div>
    </div>
</body>
</html>

<!-- TEST XAMPP CSS -->
<style>
    body {cursor: url("img/oth928.cur"), auto;}
</style>