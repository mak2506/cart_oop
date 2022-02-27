<?php

class Cart
{
    public $cart;
    public function setCart()
    {
            $this->cart=array();
    }

   

    public function addToCart($product)
    {
        if(!($this->isExistInCart($product)))
        {
            array_push($this->cart, json_decode($product));
            array_push($_SESSION["cart"], $this->cart);
        }       
        
    }

    public function isExistInCart($product)
    {
        $this->cart=$_SESSION["cart"];
        foreach($this->cart as $cart)
        {           
            $product=json_decode($product);
            if($product->id == $cart[0]->id)            
            {
                $cart[0]->quantity +=1;
                return true;
            }            
        }
        return false;
    }

    public function showCart()
    {
        $this->cart=$_SESSION["cart"];
        if(count($this->cart)==0)
        {
            echo "<h1>Cart Empty</h1>";
        }
        else{
            echo "Cart<br>";
            foreach($this->cart as $cart)
            {
                // print_r($cart[0]->id);
                // echo "<br>";
                echo '<div id="'.$cart[0]->id.'" class="product">';
                //echo '<img src="images/'.$product->image.'">';
                echo '<h3 class="title"><a href="#">'.$cart[0]->name.'</a></h3>';
                echo '<span>Price: $'.$cart[0]->price.'</span>';
                //echo "<form action='index.php' method='post'><input type='hidden' name='product' value='".json_encode($product)."'><input type='submit' name='action' value='Add'></form>";
                //"<a class="add-to-cart" href="#" data-id="'.$product["id"].'">Add To Cart</a>';
                echo '</div>';
            }
        }
    }

    public function getCart()
    {
        return $this->cart;
    }
}

?>