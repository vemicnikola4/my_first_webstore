<?php
session_start();

include_once "class_database.php";
include_once "class_cart.php";
include_once "style.css";
include_once "header_footer.php";
echo "<div id='container'>";
echo top_header();
$cart-> total_item();
if ( isset($_SESSION['user']) || isset($_COOKIE['user'])){
    if ( isset( $_GET ['action']) && $_GET['action'] == 'add_to_cart'){
        $order_number=$_SESSION['order_number'];
        $barcode = $_GET['barcode'];
        $product = $base -> select_one_product($barcode);
        $name = $product[0]['name'];
        $price = $product[0]['price'];
        $quantity = 1;
        $cart-> add_item($barcode,$name,$price,$quantity);
        header ("Location: add_to_cart.php");
    }
    if ( isset( $_GET ['action']) && $_GET['action'] == 'add_quantity'){
        $barcode = $_GET['barcode'];
        $cart -> change_quantity($barcode);
        header ("Location: add_to_cart.php");
    }
    if ( isset( $_GET ['action']) && $_GET['action'] == 'delite'){
        $barcode = $_GET['barcode'];
        $cart -> delite_item($barcode);
        header ("Location: add_to_cart.php");
    
    }   
    if ( isset( $_GET ['action']) && $_GET['action'] == 'reduce_quantity'){
        $barcode = $_GET['barcode'];
        $cart -> reduce_quantity($barcode);
        header ("Location: add_to_cart.php");
    }
    if ( isset( $_GET ['action']) && $_GET['action'] == 'delete_cart'){
        $cart -> delete_cart();
        header ("Location: add_to_cart.php");
    }
    
    $cart -> show_cart();
    echo "<p><a href='logout.php?action=unset'>Logout</a></p>";

}else{
    echo "<div class='form_div'>";
        echo "<p>NISTE ULOGOVANI</p>";
        echo "<a href='index.php'><button class='button'>ULOGUJTE SE</button></a></a>";
        echo "</div>";
}



echo "</div>";
echo bottom_footer();

?>