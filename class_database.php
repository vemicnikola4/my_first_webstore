<?php
class Database{
    public $conn;
    function __construct($database){
        $this->conn = new mysqli('localhost','root','',$database);
        if ($this->conn->connect_error){
            echo "JDK connection error " . $this->conn->connect_error;
        }else{
            echo "<p style='display:none'>Connected</p>";
        }
    }
    function select($select){
        $data = $this-> conn -> query($select);
        if ( $data == false){
            return ['sucssesful'=>false,'message'=> $this->conn->error];
        }else{
            $array= $data->fetch_all(MYSQLI_ASSOC);
            return['sucssesful'=>true,'array'=>$array];
        }
    }
    function comand($comand){
        $execute = $this->conn->query($comand);
        if  ($execute == false){
            die("JDK " .$this->conn->error);
        }else{
           return "Sucssesfuly executed !";
        }
    }
    function insert_user($email,$password,$name){
        $email = $this -> conn-> real_escape_string($email);
        $password = $this -> conn-> real_escape_string($password);
        $name = $this -> conn-> real_escape_string($name);
        $insert = $this->comand("INSERT INTO user (`email`, `password`, `name`) VALUES ('$email','$password','$name')");
    }
    function all_users(){
        $all_users = $this->select("SELECT * FROM user");
        if ($all_users['sucssesful'] == true){
            return $all_users['array'];
        }else{
            die( "NEUSPESAN UPIT ". $all_users['message']);
        }
    }
    function show_all_products(){
        $all_products = $this-> select("SELECT * FROM products");
        if ($all_products['sucssesful'] == true){
            return $all_products['array'];
        }else{
            die( "NEUSPESAN UPIT ". $all_products['message']);
        }
    }
    function add_to_cart($user_email,$product_barcode,$time){
        $insert = $this->comand("INSERT INTO cart (`user_email`, `product_barcode`, `time`) VALUES ('$user_email','$product_barcode','$time')");
    }
    function show_cart($user){
        $all_products = $this-> select("SELECT * FROM products WHERE user_email=$user");
        if ($all_products['sucssesful'] == true){
            return $all_products['array'];
        }else{
            die( "NEUSPESAN UPIT ". $all_products['message']);
        }
    }
    function select_one_product($barcode){
        $product = $this-> select("SELECT * FROM products WHERE barcode=$barcode");
        if ($product['sucssesful'] == true){
            return $product['array'];
        }else{
            die( "NEUSPESAN UPIT ". $product['message']);
        }
    }
}
$base = new Database('web_store');

?>