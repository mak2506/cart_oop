<?php

class Product
{
    public $product;

    public function __construct()
    {
        $this->product=array(
            array("id"=>101, "image"=>"football.png", "name"=>"Football", "price"=>150.00, "quantity"=>1),
            array("id"=>102, "image"=>"tennis.png", "name"=>"Tennis Ball", "price"=>120.00, "quantity"=>1),
            array("id"=>103, "image"=>"basketball.png", "name"=>"Basketball", "price"=>90.00, "quantity"=>1),
            array("id"=>104, "image"=>"table-tennis.png", "name"=>"Table tennis ball", "price"=>110.00, "quantity"=>1),
            array("id"=>105, "image"=>"soccer.png", "name"=>"Soccer", "price"=>80.00, "quantity"=>1),
        );
    }

    public function showProduct()
    {
        echo "<a href='logout.php'>Logout</a>";
        foreach($this->product as $product)
        {
            echo '<div id="'.$product["id"].'" class="product">';
            //echo '<img src="images/'.$product->image.'">';
            echo '<h3 class="title"><a href="#">'.$product["name"].'</a></h3>';
            echo '<span>Price: $'.$product["price"].'</span>';
            echo "<form action='index.php' method='post'><input type='hidden' name='product' value='".json_encode($product)."'><input type='submit' name='action' value='Add'></form>";
            //"<a class="add-to-cart" href="#" data-id="'.$product["id"].'">Add To Cart</a>';
            echo '</div>';
        }
    }
}

?>