<?php
session_start();
include_once "class_database.php";
include_once "class_cart.php";
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
        header ("Location: add_to_cart.php?action=submited");
    
    }else{
        header ("Location: add_to_cart.php");
    }

}


?>