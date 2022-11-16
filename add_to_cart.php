<?php
session_start();
include_once "class_database.php";
include_once "class_cart.php";
include_once "style.css";
include_once "header_footer.php";
echo "<div id='container'>";
echo top_header();
$cart-> total_item();
if ( isset( $_GET ['action']) && $_GET['action'] == 'add_to_cart'){
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
if ( isset( $_GET ['action']) && $_GET['action'] == 'reduce_quantity'){
    $barcode = $_GET['barcode'];
    $cart -> reduce_quantity($barcode);
    header ("Location: add_to_cart.php");
}
$cart -> show_cart();
echo "<p><a href='logout.php?action=unset'>Logout</a></p>";
echo bottom_footer();
echo "</div>";

?>