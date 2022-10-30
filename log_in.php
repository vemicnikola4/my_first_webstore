<?php
session_start();
include_once "class_database.php";
if (isset($_SESSION['user']) || isset($_COOKIE['user'])){
    header ("Location: products.php");
}
if (isset($_GET['action'])&& $_GET['action'] == "log_in"){
    if ( isset ($_GET['email']) && isset($_GET['password'])){
        $email = $_GET['email'];
        $password = $_GET['password'];
        if ( $email == "" || $password == ""){
            die ("ADD EMAIL AND PASWORD");
        }
        $all_users = $base -> all_users();
        for ($i = 0 ; $i < count($all_users); $i++){
            if ( $email == $all_users[$i]['email'] && $password == $all_users[$i]['password'] ){
                $email = $email;
                if ( isset($_GET['remember'])){
                    setcookie('user', $email, time() + (60 * 60 * 24 * 30), "/");
                    header ("Location: products.php");
                }else{
                    $_SESSION['user']=$email;
                    header ("Location: products.php");
                }
            } 
        }
        echo "INVALID EMAIL OR PASSWORD TRY AGAIN";
        echo  '<form action="log_in.php">';
        echo  '<input type="hidden" name="action" value="log_in">';
        echo  '<input type="text" name="email" placeholder="email">';
        echo  '<input type="text" name="password" placeholder="password">';
        echo "<br>";
        echo "Remember me on this computer";
        echo  '<input type="checkbox" name="remember">';
        echo "<br>";
        echo  '<input type="submit" value="log_in">';
        echo  '</form>';
    }
}
if (isset($_GET['action'])&& $_GET['action'] !== "log_in"){
    echo  '<form action="log_in.php">';
    echo  '<input type="hidden" name="action" value="log_in">';
    echo  '<input type="text" name="email" placeholder="email">';
    echo  '<input type="text" name="password" placeholder="password">';
    echo  '<input type="submit" value="log_in">';
    echo  '</form>';
}



?>