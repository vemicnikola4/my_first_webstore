<?php
    session_start();
    if (isset( $_GET['action']) && $_GET['action'] == 'unset'){
        unset($_SESSION['user']);
        setcookie('user', 0, time()-60*60*24, "/");
        echo "<p>Uspesno ste se izlogovali!</p>";
        header("Location: index.php");
    }

?>