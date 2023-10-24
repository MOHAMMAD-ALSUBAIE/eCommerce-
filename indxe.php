<?php 
require_once "tamplates/header.php";

require 'databases/conaction.php';
// use try catch, to catching the error in query mysqle, then return the in undrstand format by use getMassage
try{
    $products= $conn->query('select * from proudcts')->fetch_all(MYSQLI_ASSOC);
    $conn->close();
}catch(Exception $e){
    echo $e->getMessage();
}
?>
<!-- It wii content the header of the home page, that under the navbar -->
<section class="containerHeader header">
    <div>
        <img class="headerImage" src="images/phone.png" height="600px">
    </div>
    <div class="HeaderContent">
     <h1><h1>
        <p>Welcome to TechTrend online store, your one-stop-shop 
            for all things of Phone! We offer a wide range of the
             latest Phone models, at competitive prices. Our user-friendly website allows you to 
            easily browse and compare our products, ensuring you find the perfect Phone to suit your needs.</p>
    </div>
</section>
<!-- Body that content proudcts -->

<section id ='Products' class="container">
<div id="scrollUpContainer">
<a id="scrollUp" href="http://localhost/COLLAGE_PROJECT/indxe.php#navBar"> <i class="fa-solid fa-arrow-up fa-beat-fade"></i></a>
<!-- <p id='textOfScrollup'>Scroll up</p> -->
</div>
    <div class='products'>
        <?php foreach($products as $product):
            $productImage=$product['imagePath'];
            $productName=$product['proudct'];
            $price=$product['price'];
            $size=substr($product['ProudctType'],strpos($product['ProudctType'],',')+1);// $product['ProudctType'] will return name of phone with size of phone as string
            //strpos will the index of "," that between the name of phone and the size of phone, so basa on the index substr will return the size of phone  
            $productId=$product['id'];
            ?>
     <div class='product'>
        <!-- imgae part -->
      <div class='img-product'>
        <img src="<?php echo $productImage?>">
      </div>
           <!-- details of product -->
           <div class='details-image'>
            <div class='title-product'>
                <p><?php echo $productName?></p>
            </div>
        <div class='details'>
        <p><?php echo $price?> SR</p>
        <p><?php echo $size?></p>
        <hr>
        </div>
     </div>
   <div class="productForm">
   <form action="http://localhost/COLLAGE_PROJECT/cart.php"><!--use this form to send the data of product to the page of checkout -->
        <input class="textValueOfProdcut" type="text" name="productId" value='<?php echo $productId?>'> <!--value will be the id of product -->
        <input class="submitOfProduct" type="submit" value="Buy">
      </form>
   </div>
 
    </div>
    <?php endforeach;?>
</div>
</section>
<?php 
require_once "tamplates/footer.php"
?>

