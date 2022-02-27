<?php
session_start();
require 'classes/product.php';
require 'classes/cart.php';
if(!isset($_SESSION["cart"]))
{
    $_SESSION["cart"]=array();
}
$_SESSION["c"]=1;

$product=new Product();
$product->showProduct();
$cart=new Cart();

if($_POST["action"])
{
    $action=$_POST["action"];
    switch($action)
    {
        case "Add": $product=$_POST["product"];
            if($_SESSION["c"]==1)
            {
                $cart->setCart();
                $cart->addToCart($product);
                $_SESSION["c"]=0;
                $cart->showCart();
            }
            else{
                $cart->addToCart($product);
                $cart->showCart();
            }
              
            break;
    }
}
// print_r($cart->getCart());
// print_r($_SESSION["cart"]);

?>