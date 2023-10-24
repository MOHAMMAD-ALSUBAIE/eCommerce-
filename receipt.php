<?php
require_once "tamplates/header.php";
require "databases/conaction.php";

if(!isset($_SESSION['orderID'])){
    // if orderID not declared
    header('location:http://localhost/COLLAGE_PROJECT/indxe.php');

}
try{
    $order=$conn->query("select * from orders where id='$_SESSION[orderID]'")->fetch_assoc();
    $user=$conn->query("select * from user where id='$order[usernameID]'")->fetch_assoc();
    $product=$conn->query("select * from proudcts where id='$order[ProudctID]'")->fetch_assoc();
}catch(Exception $e){
    echo $e->getMessage();
}

?>

<section id='container'>
    <div>
        <h3 id='storeName'>TechTrends</h3>
    </div>
    <div id='top'>
        <!-- left side -->
     <div >
        <h3><?php echo $user['name']?></h3>
        <h4><span>inovice Date:</span> <?php echo date('Y-m-d')?></h4>
        <h4><span>inovice No:</span> <?php echo $_SESSION['orderID'] ?></h4>

     </div> 
     <!-- rigth side -->
     <div >
        <h3>TechTrends Co</h3>
        <h4>123 Main Steet</h4>
        <h4>Jubail</h4>
        <h4>TechTrends@gmail.com</h4>


     </div> 
    </div>
    <div>
    <table class="noBorder">
        <tr id="bottomOrder" class="noBorder">
            <td class="noBorder">QTY</td>
            <td class="noBorder" colspan="3">DESCRIPTION</td>
            <td class="noBorder">PRICE</td>
            <td class="noBorder">SUBTOTAL</td>
        

        </tr>
        <tr class="noBorder">
            <td class="noBorder"><?php echo $order['quantity']?></td>
            <td class="noBorder" colspan="3"><?php echo $product['ProudctType']?></td>
            <td class="noBorder" ><?php echo $product['price']?> SAR</td>
            <td class="noBorder"><?php echo $order['Total_Price']?> SAR</td>

        </tr>
    </table>
    <!-- bottom -->
      <div > 
        <div class="rowFirst">
            <p>PAYMENT INFO</p>
            <p>DUE BY</p>

            <p>TOTAL DUE</p>

        </div>
        <hr>
        <div class="rowSecond">
            <p>Account No:<?php echo $user['id']?></p>
            <p><?php echo date('Y-m-d')?></p>

            <p id="totalpricePargraph"><?php echo $order['Total_Price']?> SAR</p>

     </div>
      </div>
    </div>
</section>


<?php
unset($_SESSION['orderID']);//i removed orderid from $_session, becuse i do not want user come back agine to this page

require_once "tamplates/footer.php";
?>
