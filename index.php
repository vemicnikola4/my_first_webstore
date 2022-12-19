<?php
    session_start();
    include "style.css";
    include "header_footer.php";
    if (isset($_SESSION['user']) || isset($_COOKIE['user'])){
        header ("Location: products.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class='container' id='container'>
    <?php echo top_header(); ?>
    <div class='form_div'>
    <div class='form_subdiv'>
   <form action="register.php">
    <label><p>SING IN:</p></label>
    <input type="hidden" name="action" value="register">
    <input class='text' type='text' name="name" placeholder="name">
    <input class='text' type="text" name="lastname" placeholder="lastname">
    <input class='text' type="text" name="email" placeholder="email">
    <input class='text' type="password" name="password" placeholder="password">
    <input class='text' type="passeord" name="repeat_password" placeholder="repeat password">
    <input class='button' type="submit" value="REGISTER">
   </form>
    <form action="log_in.php">
        <input type="hidden" name="action" value="log_in_form">
        <p>Allready have an account?</p>
        <input class='button' type="submit" value="LOG IN">
    </form>
    </div>
    </div >
</div>
<?php echo bottom_footer(); ?>

</body>
</html>