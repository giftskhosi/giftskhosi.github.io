<?php
session_start();
include('connect.php');

if(isset($_POST['cEmail']) && isset($_POST['cPassword'])){
    $email = filter_input(INPUT_POST, 'cEmail');
    $password = filter_input(INPUT_POST, 'cPassword');
    
    if(empty($email)){
        header("Location: login.php?error=Email is required");
    } else if (empty($password)){
        header("Location: login.php?error=Password is required&email=$email");
    } else {
        $stmt = $db->prepare("SELECT * FROM signup WHERE email = '$email' LIMIT 1");
        $stmt->execute([$email]);

        if ($stmt->rowCount() == 1){
            $userr = $stmt->fetch();

            $id = $userr['id'];
            $name = $userr['cName'];
            $surname = $userr['surname'];
            $age = $userr['age'];
            $occupation = $userr['occupation'];
            $cEmail = $userr['email'];
            $cPassword = $userr['cPassword'];

            if($email === $cEmail && $password === $cPassword){
                $_SESSION['id'] = $id;
                $_SESSION['surname'] = $surname;
                $_SESSION['cName'] = $name;
                $_SESSION['occupation'] = $occupation;
                $_SESSION['email'] = $cEmail;
                $_SESSION['age'] = $age;

                header("Location: home.php");
            } else {
                header("Location: login.php?error=Incorrect User name or Password");
            }
        } else {
            header("Location: login.php?error=Incorrect User name or Password");
        }
    } 
}

$btnBack = filter_input(INPUT_POST, 'btnBack');

    if(isset($btnBack)){
        header("Location: index.html");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Space</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<div class="container">
        <div class="header">
            <h1>CODE <span>SPACE</span></h1>
        </div>
        <div class="info">
            <form method="post">
                <h3>Login</h3>
                <p>Don't have an account? click <a href="signup.php">Here</a></p>
                Email: <input type="email" class="input-text" name="cEmail" id="cEmail"><br>
                Password: <input type="password" class="input-text" name="cPassword" id="cPassword"><br>

                <div class="butt">
                <input type="submit" value="Login" >
                <input type="submit" value="Back" name="btnBack">
                </div>
                
            </form>
        </div>
    </div>
</body>
</html>