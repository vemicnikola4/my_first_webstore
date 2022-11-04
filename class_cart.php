<?php
if (!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}

class Cart{
    public $cart_items;

    function __construct(){
        $this -> cart_items = $_SESSION['cart'];
    }
    function add_item($barcode,$name,$price,$quantity){
        $new_item = ['barcode'=>$barcode , 'name'=>$name , 'price'=>$price , 'quantity'=>$quantity ];
        array_push($this -> cart_items, $new_item );
        $_SESSION['cart'] = $this -> cart_items;
    }
    function show_cart(){
        echo "<div class='form_div'>";
        echo "<table border=solid >";
        echo "<th>BARCODE</th><th>NAME</th><th>PRICE</th><th>QUANTITY</th>";
        for ( $i = 0; $i < count ($this->cart_items); $i++){    
        echo "<tr>";
        echo "<td>".$this->cart_items[$i]['barcode']."</td>";
        echo "<td>".$this->cart_items[$i]['name']."</td>";
        echo "<td>".$this->cart_items[$i]['price']."</td>";
        echo "<td>".$this->cart_items[$i]['quantity']."</td>";
        echo "</tr>";
        }
        echo "</table>";
        echo "</div >";
    }
}
$cart = new Cart();
?>