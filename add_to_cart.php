<?php
session_start();
include_once "class_database.php";
include_once "class_cart.php";
if ( isset ( $_GET['action']) && $_GET['action'] == 'add_to_cart'){
    $barcode = $_GET['barcode'];
    $product = $base ->select_one_product($barcode);
    $name = $product[0]['name'];
    $price = $product[0]['price'];
    $cart -> add_item($barcode,$name,$price,1);

}
?>