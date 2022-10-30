<?php
    session_start();
    unset($_SESSION['login_id']);
    setcookie('login_id', 0, time()-60*60*24, "/");
    echo "<p>Uspesno ste se izlogovali!</p>";
    echo "<a href='login_forma.php'>Mozete se logovati opet</a>";
?>