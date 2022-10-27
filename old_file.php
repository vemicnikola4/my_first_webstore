<?php
session_start();
include_once "class_database.php";
if (isset($_COOKIE['user'])){
    if (isset($_SESSION['user'])){
        echo "ulogovaniste bravo!";
    }else{
        echo '<form action="log_in.php">';
        echo '<input type="hidden" name="action" value="log_in">';
        echo '<input type="text" name="email" placeholder="unesite svoj email">';
        echo '<input type="text" name="password" placeholder="unsite pasword">';
        echo '<input type="submit" value = "log_in">';
        echo "</form>";
    }
}else{
    echo "SIGN IN";
    echo '<form action="log_in.php">';
    echo '<input type="hidden" name="action" value="sing_in">';
    echo '<input type="text" name="email" placeholder="unesite svoj email">';
    echo '<input type="text" name="password" placeholder="unsite pasword">';
    echo '<input type="text" name="name" placeholder="unsite ime i prezime">';
    echo '<input type="submit" value = "sing_in">';
    echo "</form>";
}
if ( isset( $_GET['action']) && $_GET['action'] == 'sing_in'){
    if ( isset( $_GET['email'])  &&  isset( $_GET['password']) &&  isset( $_GET['name']));
    $email = $_GET['email'];
    $password = $_GET['password'];
    $name = $_GET['name'];
    $base->insert_user($email,$password,$name);
    setcookie('user', $email, time() + (60 * 60 * 24 * 30), "/");
    header("Location: log_in.php");
}
if ( isset( $_GET['action']) && $_GET['action'] == 'log_in'){
    if ( isset( $_GET['email'])  &&  isset( $_GET['password']) &&  isset( $_GET['name']));
    $email = $_GET['email'];
    $password = $_GET['password'];
    $all_users = $base -> all_users();
    for ( $i = 0; $i<count($all_users); $i++){
        $ind = array_search( $email,$all_users[$i]);
        if ($ind == false){
            echo "Invalid email";
            break;
        }else{
            if( $all_users[$i]['password'] !== $password){
                echo "Invalid password ";
                break;
            }
        }
        $_SESSION['user']=$email;
        header("Location: log_in.php");
        
    }
}
?>