<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // if (isset ($_SESSION['user']) || isset($_COOKIE['user'])){
    //     header("Location: proizvodi.php");
    // }
  
    ?>
    <?php
    if (isset($_SESSION['user']) || isset($_COOKIE['user'])){
        header ("Location: products.php");
    }
    ?>
   <form action="register.php">
   <input type="hidden" name="action" value="register">
    <input type="text" name="name" placeholder="name">
    <input type="text" name="lastname" placeholder="lastname">
    <input type="text" name="email" placeholder="email">
    <input type="text" name="password" placeholder="password">
    <input type="text" name="repeat_password" placeholder="repeat password">
    <input type="submit" value="REGISTER">
   </form>
    <form action="log_in.php">
        <input type="hidden" name="action" value="log_in_form">
        <p>Allready have an account</p>
        <input type="submit" value="log_in">
    </form>
</body>
</html>