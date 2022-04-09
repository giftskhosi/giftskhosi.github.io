<?php 
session_start();

include('connect.php');

if(!isset($_SESSION['cEmail'])){
    $email = $_SESSION['email'] ;

    $btnBack = filter_input(INPUT_POST, 'btnBack');

    if(isset($btnBack)){
        header("Location: home.php");
    }

    $age = filter_input(INPUT_POST, 'age');
    $occupation = filter_input(INPUT_POST, 'occupation');
    $password = filter_input(INPUT_POST, 'cPassword');
    $conf_pword = filter_input(INPUT_POST, 'ccPassword');

    $btnSave = filter_input(INPUT_POST, 'btnSave');
    if(isset($btnSave)){
        if($password === $conf_pword){
            $sql = "UPDATE signup
                    SET age = '$age',occupation = '$occupation',cPassword = '$password',confirm_password = '$conf_pword' 
                    WHERE email = '$email'";
            $query = $db->query($sql);

                if($query){
                    header("Location: profile.php?=Successfuly-updated");
                } else {
                    header("Location: profile.php?=error-while-updating");
                }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CODE SPACE</title>
    <link rel="stylesheet" href="profile.css">
    <script src="jquery.min.js"></script>
    <script src="profilequery.js"></script>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>CODE <span>SPACE</span></h1>
            <h3>Profile</h3>
        </div>
         <div class="welcome">
         <p>Name: <span><?=$_SESSION['cName']?></span> </p>
         <p>Surname: <span><?=$_SESSION['surname']?></span></p>
         <p>Age: <span><?=$_SESSION['age']?></span></p>
         <p>Occupation: <span><?=$_SESSION['occupation']?></span></p>
         <p>Email: <span><?=$_SESSION['email']?></span></p>
         <input type="submit" class="button" value="Edit Profile" id="btnEdit" name="btnEdit"><br>
         
         <form method="post">
         <input type="submit" id="button" value="Back" name="btnBack">
         </form>
         
         </div>

         <form id="form" method="post">
             <h3>Edit Profile</h3>
             Age: <input type="text" class="input-text" name="age" id="cName"><br>
             Occupation: <input type="text" class="input-text" name="occupation" id="cName"><br>
             Password: <input type="password" class="input-text" name="cPassword" id="cName"><br>
             Confirm Password: <input type="password" class="input-text" name="ccPassword" id="cName"><br>
             <input type="submit" class="button" value="Save" name="btnSave">
         </form>
    </div>
</body>
</html>
<?php
} else {
    header("Location: login.php");
}
?>