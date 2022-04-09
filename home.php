<?php 
session_start();
include('connect.php');

if(!isset($_SESSION['cEmail'])){

    $email = $_SESSION['email'] ;
    $sequel = "SELECT * FROM notes WHERE email = '$email'";
    $show = $db->query($sequel);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Space</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>CODE <span>SPACE</span></h1>
        </div>
         <div class="welcome">
         <h4>WELCOME <span><?=$_SESSION['cName'] . " " . $_SESSION['surname']?></span> </h4>
         </div>
        <ul id="navlist">
            <li><a href="Profile.php">Profile</a></li>
            <li><a href="projects.php">Projects</a></li>
            <li><a href="pictures.php">Pictures</a></li>
            <li><a href="notes.php">Quotes</a></li>
            <li><a href="login.php">Logout</a></li>
        </ul>


        <div class="quote">
            <h3>Daily Quotes</h3>
            <p>
            <?php 
                foreach($show as $sh){
                    echo '<h4>'. $sh['note_']. '</h4>
                          <p> - '. $sh['author_'] . '</p>';
                }
                
                ?>
            </p>
            <p>
                
            </p>
        </div>

    </div>
</body>
</html>
<?php
} else {
    header("Location: login.php");
}
?>