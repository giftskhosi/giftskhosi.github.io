<?php 
session_start();
include('connect.php');

if(!isset($_SESSION['cEmail'])){

    $email = $_SESSION['email'] ;

    // Updates the data base and adds your project
    $btnSave = filter_input(INPUT_POST, 'btnSave');
    $projectName = filter_input(INPUT_POST, 'projectName');
    $description = filter_input(INPUT_POST, 'description');
    $projectUrl = filter_input(INPUT_POST, 'projectUrl');

    if(isset($btnSave)){
        $sql = "UPDATE projects 
                SET project_name = '$projectName', description_ = '$description', project_url = '$projectUrl'
                WHERE email = '$email'";
        $query = $db->query($sql);

        if($query){
            header("Location: projects.php?=Project-Saved!!!");
        } else {
            header("Location: projects.php?=Project-Not-Saved");
        }
    }

    // Fetch project from database and display on the page

    $show = "SELECT * FROM projects
             WHERE email = '$email'";
    $display = $db->query($show);

    // Back button
    $btnBack = filter_input(INPUT_POST, 'btnBack');

    if(isset($btnBack)){
        header("Location: home.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Space</title>
    <link rel="stylesheet" href="projects.css">
    <script src="jquery.min.js"></script>
    <script src="projectquery.js"></script>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>CODE <span>SPACE</span></h1>
        </div>
        
        <input type="submit" class="button" id="button" value="ADD Project"><br>
        <form action="" method="post">
            <input type="submit" class="button" name="btnBack" value="Return Home">
        </form>
        

        <form id="form" action="" method="post">
            <h1>ADD PROJECT</h1>

            Project Name: <input type="text" class="input-text" name="projectName" id=""><br>
            Project Description: <textarea name="description" class="area-text" id="" cols="30" rows="10"></textarea><br>
            Project URL: <input type="url" class="input-text" name="projectUrl" id=""><br>
            <input type="submit" class="input-button" name="btnSave" value="Save">
            <input type="reset" class="input-button" value="Reset">
        </form>

        <div class="display">
            <?php
                echo '<h2>My Projects</h2>';
              foreach($display as $dis){
                  echo '
                        <p>Project Name: ' . $dis['project_name'] . '</p><br>
                        <p>Desciption: ' . $dis['description_'] . '</p><br>
                        <p>Project URL: ' . $dis['project_url'] . '</p><br>';
              }
            ?>
        </div>
    </div>
</body>
</html>
<?php
} else {
    header("Location: login.php");
}
?>