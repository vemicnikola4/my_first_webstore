<?php
function top_header(){
    echo "<div class='header'>";
    echo "<div class='iner_header'>";
    echo "<div class='logo_container'>";
    echo "<h1><a href='index.php'>WEBSTORE</a></h1>";
    echo "</div>";
    echo "<ul class='navigation'>";
    echo "<li><a href='index.php'>Home</a></li>";
    echo "<li><a href='products.php'>Products</a></li>";
    echo "<li><a href='add_to_cart.php'>Cart</a></li>";
    echo "</div>";
    echo "</div>";
}
function bottom_footer(){
    echo "<div class='footer_container'>";
    echo "<div class='iner_footer'>";
    echo "<ul class='navigation'>";
    echo "<li><a href='index.php'>Home</a></li>";
    echo "<li><a href='products.php'>Products</a></li>";
    echo "<li><a href='cart.php'>Cart</a></li>";
    echo "<h3>Copyrights by WEBSTORE</h3>";
    echo "</ul>";
    echo "</div>";
    echo "</div>";
}

?>