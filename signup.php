<?php
include('connect.php');

// declare fields
$name = filter_input(INPUT_POST, 'cName');
$surname = filter_input(INPUT_POST, 'surname');
$age = filter_input(INPUT_POST, 'age');
$occupation = filter_input(INPUT_POST, 'occupation');
$email = filter_input(INPUT_POST, 'cEmail');
$password = filter_input(INPUT_POST, 'cPassword');
$confirm_password = filter_input(INPUT_POST, 'ccPassword');

$submit = filter_input(INPUT_POST, 'btnSubmit');
 if(isset($submit)){
     if(!empty($email) || !empty($name) || $password !== $confirm_password){
        $sql = "INSERT INTO signup (cName, surname, age, occupation, email, cPassword, confirm_password)
                 VALUES ('$name','$surname','$age','$occupation','$email','$password','$confirm_password') LIMIT 1";
        $query = $db->query($sql);

        $sql2 = "INSERT INTO projects (email) VALUES ('$email')";
        $query2 = $db->query($sql2);
        
        $sql3 = "INSERT INTO notes (email) VALUES ('$email')";
        $query3 = $db->query($sql3);

        $sql4 = "INSERT INTO messages (email) VALUES ('$email')";
        $query4 = $db->query($sql4);

        if($query){
            header("Location: signup.php?=Successfully_registered");
        } else {
            header("Location: signup.php?=ERROR_TRYING_TO_SIGNUP");
        }
     } else {
        header("Location: signup.php?=ERROR_TRYING_TO_SIGNUP");
    }

 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Space</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>CODE <span>SPACE</span></h1>
        </div>
        <div class="info">
            <form method="post">
                <h3>Sign-Up</h3>
                <p>If already have an account, click <a href="login.php">Here</a>. Or return to the <a href="index.html">home</a> page</p>
                Name: <input type="text" class="input-text" name="cName" id="cName"><br>
                Surname: <input type="text" class="input-text" name="surname" id="surname"><br>
                Age: <input type="number" class="input-text" name="age" id="age"><br>
                Occupation: <input type="text" class="input-text" name="occupation" id="occupation"><br>
                Email: <input type="email" class="input-text" name="cEmail" id="cEmail"><br>
                Password: <input type="password" class="input-text" name="cPassword" id="cPassword"><br>
                confirm Password: <input type="password" class="input-text" name="ccPassword" id="ccPassword"><br>

                <div class="butt">
                <input type="submit" name="btnSubmit" value="Sign-Up" >
                <input type="reset" name="btnReset" value="Reset">
                </div>
                
            </form>
        </div>
    </div>
</body>
</html>