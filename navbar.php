<div class='logo'>
    <a href="home.php"> <img src="img/logo.png"> </a>
</div>

<div class='search'>
    <i class="fa-solid fa-magnifying-glass"></i>
    <input type="search" placeholder='Search'>

    <audio id='audio'>
        <source src="img/audio.mp3" type="audio/mpeg">
    </audio>
    <button class='muteButton' id="muteButton"><i class="fa-solid fa-play"></i></button>
</div>

<div class='box'>
    <ul>
        <li class='About'> <a href="about.php"> About </a> </li>

        <li class='Service'> 
            <a href="#"> 
                <p> Product 
                <i class="fa-solid fa-caret-down"></i>
                </p>
            </a>
            <ul>
                <li> <a href="shop.php"> Shop </a> </li>
                <li> <a href="orders.php"> Orders </a> </li>
            </ul>
        </li>

        <li class='Service'> 
            <a href="#"> 
                <p> Service 
                <i class="fa-solid fa-caret-down"></i>
                </p>
            </a>
            <ul>
                <li> <a href="repair.php"> Repair </a> </li>
                <li> <a href="details.php"> Details </a> </li>
            </ul>
        </li>  
    </ul>
    <ul>
        <?php 
            if (isset($_COOKIE['user'])) { 
                $user_id = $_COOKIE['user'];
                $stmt = $conn->query("SELECT * FROM users WHERE id = $user_id");
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
        ?>
            <div class="user-block">
                <form action="logoutDB.php">
                        <button  class='user-link'>  
                            <span> 
                                <?php echo $row['username']; ?> 
                                <i class="fa-solid fa-right-from-bracket"></i> 
                            </span> 
                        </button> 
                </form>
                <a class='setting' href="person.php"> <i class="fa-solid fa-gear"></i> </a>
            </div>
        <?php } else { ?>
            <a href="login.php"> <button class='btnLogin'> Login </button> </a>
            <a href="signUp.php"> <button class='btnSign'> Sign Up </button> </a>
        <?php } ?>
    </ul> 
</div>   

<!-- for audio -->
<script>
    var audio = document.querySelector('audio'); 
    var muteButton = document.getElementById('muteButton'); 

    muteButton.addEventListener('click', function() {
        if (audio.paused) { 
            audio.play();
            audio.muted = false;
            muteButton.innerHTML = '<i class="fa-regular fa-circle-stop"></i>'; 
        } else { 
            audio.pause(); 
            audio.muted = true; 
            muteButton.innerHTML = '<i class="fa-solid fa-play"></i>'; 
        }
    });
</script>