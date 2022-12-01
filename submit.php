<?php
session_start();
include_once "class_database.php";
include_once "class_cart.php";
include_once "header_footer.php";
include_once "style.css";
echo "<div id='container'>";
echo top_header();
echo "<div class='form_div'>";
if ( !isset($_SESSION['order_number'])){
    $_SESSION['order_number']=mt_rand(10000000,999999999);
}
if ( isset( $_GET['action']) && $_GET['action'] == 'submit'){
    $time = date ( 'Y-m-d H-i-s');
    $cart = $_SESSION['cart'];
    if ( $cart !== []){
        for ( $i = 0; $i <count ( $cart ); $i++){
            $order_number =  $_SESSION['order_number']; 
            $user_email = $_SESSION['user']; 
            $product_barcode = $cart[$i]['barcode'];
            $quantity = $cart[$i]['quantity'];
            $price = $cart[$i]['price'];
            $total_price = $cart[$i]['quantity'] * $cart[$i]['price'];
            $base -> submit_order($order_number,$user_email,$product_barcode,$quantity,$price,$total_price, $time);
        }   
        echo "<p>Your order number is <a href='submit.php?action=submited&order_number=$order_number'> $order_number</a></p>";
        echo "<p><a href='products.php'> Back to products </a></p>";
        unset($_SESSION['cart'] );
        unset($_SESSION['order_number'] );
    }else{
        header ("Location: add_to_cart.php");
    }

}
if ( isset( $_GET['action']) && $_GET['action'] == 'submited'){
    $order_number = $_GET['order_number'];
    echo "<p style='margin-left:50px'>ORDER NUMBER: $order_number</p>";
    $base -> show_order_by_number($order_number);
}
echo "</div>";
echo bottom_footer();
echo "</div>";


?>