<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
include_once "header_footer.php";
include_once "class_database.php";
include_once "style.css";
?>
<body>
<div id='container'>
    <?php  
        echo top_header();
       if ( isset($_SESSION['user']) || isset($_COOKIE['user'])){
        echo "<div class='form_div'>";
        echo "<div class='log_in_div'>";
        echo "<p>Search my orders</p>";
        echo "<form action='search_order.php'>";
        echo "<input type='hidden' name='action' value='search_order'>";
        echo "<input class='text' type='text' name='order_number' placeholder='order number'>";
        echo "<input class='button' type='submit' value='SUBMIT'>";
        echo "</form>";
        echo "</div>";
        echo "</div>";
        echo "<div class='all_products_container'>";
           $products = $base -> show_all_products();
           for ( $i = 0; $i < count($products);$i++ ){
            $product_barcode = $products[$i]['barcode'];
            echo "<div id='product_$i' class='product_container'>";
            echo "<table>";
            echo "<tr><td>".$products[$i]['name']."</td></tr>";
            echo "<tr><td><img src='photos/".$products[$i]['picture']."'></td></tr>";
            echo "<tr><td>".$products[$i]['price']."</td></tr>";
            echo "<tr><td>".$products[$i]['promo_price']."</td></tr>";
            echo "<tr><td><a href='add_to_cart.php?action=add_to_cart&barcode=$product_barcode'>ADD TO CART<a/></td></tr>";
            echo "</table>";
            echo "</div>";
           }
        echo "</div>";
           
       }else{
        echo "<div class='form_div'>";
        echo "<p><a class='button' href='index.php'>ULOGUJTE SE</a></p><br>";
        echo "<p>NISTE ULOGOVANI</p>";
        echo "</div>";
        

       }
       echo "<p><a href='logout.php?action=unset'>Logout</a></p>";
       
       
    ?>
    </div>
    <?php
    echo bottom_footer();

    ?>
</body>
</html>