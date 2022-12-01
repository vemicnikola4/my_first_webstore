<?php
include_once "class_database.php";
include_once "header_footer.php";
include_once "style.css";
echo "<div id='container'>";
echo top_header();
echo "<div class='form_div'>";
if (isset($_SESSION['user']) || isset($_COOKIE['user'])){
    header ('Location:proizvodi.php');
}
if ( isset( $_GET['action']) && $_GET['action'] == 'register'){
    if (isset($_GET['name'])&& isset($_GET['lastname']) && isset($_GET['email']) && isset($_GET['password']) && isset($_GET['repeat_password']));
    $name = $_GET['name'];
    $lastname = $_GET['lastname'];
    $email = $_GET['email'];
    $password = $_GET['password'];
    $repeat_password = $_GET['repeat_password'];
    $all_users = $base -> all_users();
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //this function only checks if the input looks like an email. If we whant to realy check if the email is real we need send a email to that address and ask a person to click on link we just sent so the validation process is complet.
        $emailErr = "Invalid email format";
        die ("Invalid email format");
    }else{
        if ( $password == $repeat_password){
        $have_account = false;
        for ( $i = 0; $i < count($all_users); $i++){
            if ($all_users[$i]['email'] == $email ){
                $have_account = true;
            }
        }
        if ( $have_account == true){
            echo "already have an account";
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
        }else{
            $base -> insert_user($email,$password,$name);
            echo "Successfully registrated!";
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
    }else{
        echo "REPEAT THE SAME PASSWORD";
        echo "<a href='index.php'>BACK TO REGISTRATION FORM</a>";
        }
    }
    
}
echo bottom_footer();
echo "</div>";
echo "</div>";
?>