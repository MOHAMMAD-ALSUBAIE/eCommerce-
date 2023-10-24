<?php

require_once "tamplates/header.php";

require "databases/conaction.php";


// after confrim the order
$errorMasageQTY = '';
// echo $_SESSION['userID'];
if (isset($_GET['ProductQTY'])) {

    $ProductQTY = filter_var($_GET['ProductQTY'], FILTER_SANITIZE_STRING);
    $ProductID = filter_var($_GET['productId'], FILTER_SANITIZE_STRING);

    try {

        $stmt = $conn->prepare('select price,quantity from proudcts where id=?');
        $stmt->bind_param('i', $ProductID);
        $stmt->execute();
        $cloumnFromProduct = $stmt->get_result()->fetch_assoc();
        $pricePrdouct = $cloumnFromProduct['price'];
        $ProductQTYFromDatabases = $cloumnFromProduct['quantity'];
        $totalPrice = $pricePrdouct * $ProductQTY;

        // insert to order table
        if ($ProductQTY <= $ProductQTYFromDatabases && $ProductQTY > 0) {
            $stmt = $conn->prepare('insert into  orders(ProudctID,usernameID,quantity,Total_Price) values(?,?,?,?) ');
            $stmt->bind_param('iiii', $ProductID, $_SESSION['userID'], $ProductQTY, $totalPrice);
            $stmt->execute();
            // add the id of order to the sesson globl vrable , we need the id to access the order the receipt page  
            $_SESSION['orderID'] = $stmt->insert_id;//to reach the id of new row in table order from recepit page

            // descresses the  quantity order from product column quantity
            $updateQuantity = $ProductQTYFromDatabases - $ProductQTY;
            $stmt = $conn->prepare("UPDATE  proudcts set quantity=? where id=?");
            $stmt->bind_param('ii', $updateQuantity, $ProductID);
            $stmt->execute();
            $stmt->close();
            //    move to receipt page
            header('location:http://localhost/COLLAGE_PROJECT/receipt.php');
        } else {
            $errorMasageQTY = $ProductQTYFromDatabases?"The remaining of this product just $ProductQTYFromDatabases products.":"Sold out";
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}


//before confrim the order
if ($_SESSION['login'] === false) { // if the user not logined , then he should not alowed to access to this page
    header('location:http://localhost/COLLAGE_PROJECT/login.php');
}
$idProudct = (int) isset($_GET['productId']) ? filter_var($_GET['productId'], FILTER_SANITIZE_STRING) : ""; //remove all HTML tags from a string and to prevent html injection
if($idProudct){
    try {
        $stmt = $conn->prepare("select * from proudcts where id=?"); // use prepare insted of query metohd to avoid sqlInjection
    // so sqle code will send to databases with empty paramter, and will wite us to pass the value to that parameter
        $stmt->bind_param('i', $idProudct);
       
        $stmt->execute();
 
        $productInformation = $stmt->get_result()->fetch_assoc();//return the first row as Associative arrays 
        $stmt->close();
        // $stmt->close();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

?>

<section class="container">

    <form class='formOfCard'>
        <div class='ErrorMassage <?php echo $errorMasageQTY ? "ErrorMassageDisplay" : "" ?>'>

            <p>
                <?php echo $errorMasageQTY ?>
            </p>
        </div>
        <table style='margin-top:10px'>
            <tr>

                <td colspan=2 id="prodctFiled">
                    <h4>Product</h4>
                </td>
                <td>
                    <h4>Qty</h4>
                </td>
                <td>
                    <h4>Price</h4>
                </td>
                <td>
                    <h4>Total</h4>
                </td>


            </tr>
            <tr>
                <td colspan="2">

                    <div id='phoneImageWithPT'>
                        <img style="width:50px" src="<?php echo $productInformation['imagePath'] ?>" />

                        <h4 >
                            <?php echo $productInformation['ProudctType'] ?>

                        </h4>

                    </div>
                </td>
                <td>
                    <input id='numberProducts' style="width:35px"  type='number' value=1 name="ProductQTY" min=1
                        max="<?php echo $productInformation['quantity']?$productInformation['quantity']:$productInformation['quantity']+1; ?>">
                </td>

                <td>
                    <h4 id="priceOfProduct" >
                        <?php echo $productInformation['price'] ?> SR
                    </h4>

                </td>
                <td>
                    <h4 id='TotleOFprice'>
                        <?php echo $productInformation['price'] ?> SR
                    </h4>
                </td>
            </tr>
        </table>
        <div id="BottomFormCart">
            <input type="hidden" name="productId" value='<?php echo $idProudct ?>'>
            <button class="buttonSubmit" > <a class="buttonSubmit" href="http://localhost/COLLAGE_PROJECT/indxe.php">Go
                    back</a></button>
            <input class="buttonSubmit"  type='submit' value='CheckOut'>
        </div>
    </form>
</section>

<?php
require_once "tamplates/footer.php";

?>