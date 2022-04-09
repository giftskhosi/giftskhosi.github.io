<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Space</title>
    <link rel="stylesheet" href="pictures.css">
    <script src="jquery.min.js"></script>
    <script src="picturequery.js"></script>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>CODE <span>SPACE</span></h1>
        </div>

        <input type="submit" class="button" value="ADD Picture">
        

        <form id="upload" method="post">
            <input type="file" name="pickImg" class="file" id=""><br>
            <input type="submit" value="Upload" class="input-btn"><br>
        </form>
        
        <div class="picture-box" id="picture-box">
            <h2>My Pictures</h2>
            <img src="/Code Space/pics/pic.jpg" alt="pic" srcset="">
            <img src="/Code Space/pics/pic1.jpg" alt="pic1" srcset="">
            <img src="/Code Space/pics/pic2.jpg" alt="pic2" srcset="">
            <img src="/Code Space/pics/pic3.jpg" alt="pic3" srcset="">
            <img src="/Code Space/pics/pic4.jpg" alt="pic4" srcset="">
            <img src="/Code Space/pics/pic5.jpg" alt="pic5" srcset="">
        </div>
        <a href="home.php">Back</a>

    </div>
</body>
</html>