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
    <link rel='stylesheet' href='css/home.css'>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/gsap/1.16.1/TweenMax.min.js"></script>
</head>
<body>
    <video id="background-video" autoplay muted loop>
        <source src="img/move.mp4" type="video/mp4">
    </video>

    <div class='head'>
        <?php include('navbar.php') ?>
    </div>

    <figure>
        <svg x="0px" y="0px" viewBox="0 0 883 105.2" xml:space="preserve" overflow="visible">
            <text x="10" y="30" font-family="Arial" font-size="40" fill="black">K</text>
            <text x="40" y="30" font-family="Arial" font-size="40" fill="black">M</text>
            <text x="70" y="30" font-family="Arial" font-size="40" fill="black">U</text>
            <text x="100" y="30" font-family="Arial" font-size="40" fill="black">T</text>
            <text x="130" y="30" font-family="Arial" font-size="40" fill="black">N</text>
            <text x="160" y="30" font-family="Arial" font-size="40" fill="black">B</text>
            <text x="190" y="30" font-family="Arial" font-size="40" fill="black"></text>
            <text x="220" y="30" font-family="Arial" font-size="40" fill="black">A</text>
            <text x="250" y="30" font-family="Arial" font-size="40" fill="black">U</text>
            <text x="280" y="30" font-family="Arial" font-size="40" fill="black">T</text>
            <text x="310" y="30" font-family="Arial" font-size="40" fill="black">O</text>
            <text x="340" y="30" font-family="Arial" font-size="40" fill="black"></text>
            <text x="370" y="30" font-family="Arial" font-size="40" fill="black">S</text>
            <text x="400" y="30" font-family="Arial" font-size="40" fill="black">H</text>
            <text x="430" y="30" font-family="Arial" font-size="40" fill="black">O</text>
            <text x="460" y="30" font-family="Arial" font-size="40" fill="black">P</text>
        </svg>
    </figure>

    <div class="footer">
        <div class="text">
            <h2>Contact Us</h2>
            <p class='con'>Email: kmutnb@email.com</p>
        </div>
    </div>
</body>
</html>

<!-- TEST XAMPP CSS -->
<style>
    body {cursor: url("img/oth928.cur"), auto;}
</style>

<!-- for animation text -->
<script>
    var tmax_optionsGlobal = {
    repeat: -1,
    repeatDelay: 1,
    yoyo: true
    };

    CSSPlugin.useSVGTransformAttr = true;

    var tl = new TimelineMax(tmax_optionsGlobal),
        path = 'svg *',
        stagger_val = 0.075,
        duration = 2;

    $.each($(path), function(i, el) {
    tl.set($(this), {
        x: '+=' + getRandom(-1000, 1000),
        y: '+=' + getRandom(-1000, 1000),
        rotation: '+=' + getRandom(-720, 720),
        scale: 0,
        opacity: 0
    });
    });


    var stagger_opts_to = {
    x: 0,
    y: 0,
    opacity: 1,
    scale: 1,
    rotation: 0,
    ease: Power4.easeInOut
    };

    tl.staggerTo(path, duration, stagger_opts_to, stagger_val);

    var $svg = $('svg');
    $svg.hover(
    function() {
        tl.timeScale(5);
    },
    function() {
        tl.timeScale(5);
    });

    function getRandom(min, max) {
        return Math.random() * (max - min) + min;
    }
</script>