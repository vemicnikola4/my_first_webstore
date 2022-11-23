<?php
    session_start();
if (isset( $_GET['action']) && $_GET['action'] == 'unset'){
    unset($_SESSION['user']);
    unset( $_SESSION['order_number']);
    setcookie('user', 0, time()-60*60*24, "/");
    header ("Location: index.php");
}
?>