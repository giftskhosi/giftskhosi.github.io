<?php 
session_start();
include('connect.php');

if(!isset($_SESSION['cEmail'])){

    $email = $_SESSION['email'] ;

    // The input 
    $title = filter_input(INPUT_POST, 'title');
    $author = filter_input(INPUT_POST, 'author');
    $note = filter_input(INPUT_POST, 'note');
    $btnSave = filter_input(INPUT_POST, 'btnSave');
    $btnBack = filter_input(INPUT_POST, 'btnBack');
    
    if(isset($btnSave)){
        $sql = "UPDATE notes
                SET title_ = '$title',author_ = '$author',note_ = '$note'
                WHERE email = '$email'";
        $query = $db->query($sql);

        if($query){
            header("Location: notes.php?=Note-Saved!!!");
        } else {
            header("Location: notes.php?=Note-Not-Saved");
        }
    }

    // Retrieve notes

    $sequel = "SELECT * FROM notes WHERE email = '$email'";
    $show = $db->query($sequel);

    // Back button
    
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
    <link rel="stylesheet" href="note.css">
    <script src="jquery.min.js"></script>
    <script src="notesquery.js"></script>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>CODE <span>SPACE</span></h1>
        </div>

        <div class="notes">
            <form action="" method="post">
                <h2>Q<span>U</span>O<span>T</span>E<span>S</span></h2>
                Title: <input type="text" class="input-text" name="title" id=""><br>
                Author: <input type="text" class="input-text" name="author" id=""><br>
                Quote: <textarea name="note" class="area-text" id="note" cols="30" rows="10"></textarea><br>
                <input type="submit" class="btn" name="btnSave" value="Save">
                <input type="submit" class="btn" name="btnBack" value="Back">
            </form>
            
            
                <h2>My Quote</h2>
                <input type="submit" class="btn-btn" value="View Quote">


            <div id="view">
                <?php 
                foreach($show as $sh){
                    echo '<h3>'. $sh['title_'] . '</h3>
                          <h4>'. $sh['author_'] . '</h4>
                          <p>'. $sh['note_']. '</p>';
                }
                
                ?>
            </div>

        </div>
    </div>
</body>
</html>
<?php
} else {
    header("Location: login.php");
}
?>