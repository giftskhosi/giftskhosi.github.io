<?php
session_start();

include('connect.php');

if(!isset($_SESSION['cEmail'])){

    $email = $_SESSION['email'] ;

    // Declare Variable
    $name = filter_input(INPUT_POST, 'cName');
    $email_ = filter_input(INPUT_POST, 'cEmail');
    $message = filter_input(INPUT_POST, 'message');
    $btn = filter_input(INPUT_POST, 'btnSend');

    if(isset($btn)){
        $sql = "INSERT INTO messages (name_,email,message_) VALUES ('$name','$email_','$message')";
        $query = $db->query($sql);

        if($query){
            header("Location: contact.php?=Message-Sent-Successfully");
        } else {
            header("Location: contact.php?=Message-Not-Sent");
        }
    }

    // Back Button
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
    <link rel="stylesheet" href="contacts.css">
</head>
<body>
<div class="container">
        <div class="header">
            <h1>CODE <span>SPACE</span></h1>
        </div>
        <div class="info">
            <form method="post">
                <h3>Contact Us</h3>
                Name: <input type="text" class="input-text" name="cName" id="cName"><br>
                Email: <input type="email" class="input-text" name="cEmail" id="cEmail"><br>
                Message: <textarea name="message" id="message" class="input-textarea"></textarea>
                <div class="butt">
                <input type="submit" value="Send" name="btnSend">
                <input type="submit" value="Back" name="btnBack">
                </div>
                
            </form>
        </div>
    </div>
</body>
</html>
<?php
} else {
    header("Location: login.php");
}
?>