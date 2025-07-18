
<?php
session_start();
if(!isset($_SESSION["user_name"])){
    header("location:login.php");
}else if($_SESSION["pre_number"] == 0){
    header("location:PRODUCT.php");
}

$id = $_GET["id"];
require "sqlprod.php";
$sql = "DELETE FROM products WHERE product_id=$id";
if($conn->query($sql)){
    echo "scssacfuly";
     header("location:read_product.php");
}
?>