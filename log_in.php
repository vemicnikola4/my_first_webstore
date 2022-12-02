<?php
session_start();
include_once "class_database.php";
include_once "header_footer.php";
include_once "style.css";

echo "<div id='container'>";
echo top_header();
if (isset($_SESSION['user']) || isset($_COOKIE['user'])){
    header ("Location: products.php");
}
if (isset($_GET['action'])&& $_GET['action'] == "log_in"){
    if ( isset ($_GET['email']) && isset($_GET['password'])){
        $email = $_GET['email'];
        $password = $_GET['password'];
        if ( $email !== "" || $password !== ""){
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
       
        }
        echo "<div class='form_div'>";
        echo "<div class='log_in_div'>";
        echo "<p>INVALID EMAIL OR PASSWORD TRY AGAIN</p>";
        echo  '<form action="log_in.php">';
        echo  '<input type="hidden" name="action" value="log_in">';
        echo  '<input class="text" type="text" name="email" placeholder="email">';
        echo  '<input class="text" type="password" name="password" placeholder="password">';
        echo "<br>";
        echo  '<p>Remember me on this computer <input type="checkbox" name="remember"></p>';
        echo "<br>";
        echo  '<input class="button" type="submit" value="log_in">';
        echo  '</form>';
        echo "</div>";
        echo "</div>";
    }
}
if (isset($_GET['action'])&& $_GET['action'] !== "log_in"){
    echo "<div class='form_div'>";
    echo "<div class='log_in_div'>";
    echo  '<form action="log_in.php">';
    echo  '<input type="hidden" name="action" value="log_in">';
    echo  '<input class="text" type="text" name="email" placeholder="email">';
    echo  '<input class="text" type="password" name="password" placeholder="password">';
    echo  '<br>';
    echo  '<p>Remember me on this computer <input type="checkbox" name="remember"></p>';
    echo  '<br>';
    echo  '<input class="button" type="submit" value="log_in">';
    echo  '</form>';
    echo "</div>";
    echo "</div>";
}
echo bottom_footer();
echo "</div>";


?>