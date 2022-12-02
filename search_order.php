<?php
session_start();
include_once "class_database.php";
include_once "style.css";
include_once "header_footer.php";
echo "<div id='container'>";
echo top_header();
if ( isset ($_GET['action']) && $_GET['action']=='search_order'){
    $order_number = $_GET['order_number'];
    $order = $base->order_by_number ($order_number);
    if ($order[0]['user_email'] == $_SESSION['user']){
        if ( $order[0]['user_email'] == $_SESSION['user']){
            $base -> show_order_by_number($order_number);
        }else{
            echo "<p>You dont have any orders with this order number.</p>";
            echo "<a href='index.php'>Try different ordernumber</a>";
        }
    }else{
        echo "<p>You dont have any orders with this order number.</p>";
        echo "<a href='index.php'>Try different ordernumber</a>";        
    }
    
}
echo "</div>";
echo bottom_footer();


?>