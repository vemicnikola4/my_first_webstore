<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
include_once "header_footer.php";
include_once "style.css";
?>
<body>
    <div id='container'>
    <?php  
        echo top_header();
        if ( isset($_SESSION['user']) || isset($_COOKIE['user'])){
    ?>
    <h1>HAllo welcome to our product page</h1>
    <a href="logout.php?action=unset">LOGOUT</a>
    <?php  
        }else{
            echo "<p>NISTE ULOGOVANI</p>";
            echo "<a href='index.php'>ULOGUJTE SE</a>";
        }
        echo bottom_footer();
    ?>
    </div>
</body>
</html>