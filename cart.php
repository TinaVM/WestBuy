<?php
include 'db.php';
session_start();
$Uid="";
$no;
if(isset($_SESSION['Uid']))
{
      $Uid = $_SESSION['Uid'];
}
    
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="css/admincss.css">
    <link rel="stylesheet" href="css/style-2.css">
    <script type="text/javascript" src="javascript/script.js"></script>
  </head>
  <body style="background-image: url('images/library.jpg');">
  <section class = "nb">
  <div class="topnavbar" id="myTopNavbar">
        <img src="./images/westbuy-logo.png" alt="" class="logo" style="height:70px ;">
        <?php echo '<a href="homepage.php">HOME</a>';?> 
        <?php echo '<a href="bookpage.php">BOOKS</a>';?>
        <?php echo '<a href="contact.php">CONTACT</a>';?>
        <?php echo '<a href="about.php">ABOUT</a>';?> 
        <?php echo '<a href="sellpage.php">REQUEST TO SELL</a>';?> 
        <?php echo '<a href="logout.php">Log Out</a>';?> 
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
          <i class="fa fa-bars"></i>
        </a>
</div>
<img src="./images/cart.png" alt="" class="cart" onclick="document.location.href='cart.php';return '';">
</section>
<br><br><br>
<h1 style="font-size:50px; text-align: center; color: white">Cart</h1>
          <form action="" method="POST"> 
          <?php 
          $total = 0;
          if(isset($_SESSION['cart'])){?>  
          <table border="7" style="margin-left: auto; margin-right: auto;">
          <thead>
            <tr style= "color: white">
              <th scope="col"></th>
              <th scope="col">Title</th>
              <th scope="col">Quantity</th> 
              <th scope="col">Price</th> 
              <th scope="col"></th> 
            </tr>
          </thead>
          <tbody>
            <?php
            $pos = 0;
            $num = 1;
                foreach ($_SESSION['cart'] as $key => $value){    //Adding up the prices of items
                    $sum = $value['quantity'] * $value['price'];
                    $total = $total + $sum;
                    ?>
                    <tr>
                        <td><?=$num++?></td>
                        <td><?=$value['bookTitle']?></td>
                        <td><?=$value['quantity']?></td>
                        <td><?=$sum?></td>
                        <td><a href="cartIndex.php?getID=remove_book&index=<?=$key?>">Remove</a></td> <!--Removing items from cart -->
                      </tr>
                      <?php $pos++; }?>
                      <tr>
                        <td></td>
                        <td></td>
                        <td>Total:</td>
                        <td><?=$total?></td>
                        <?php $_SESSION['total'] = $total;?>
                        <td></td>
                      </tr>
                </tbody>
                </table>
                  <div class = "buttons" style="text-align:center;" >
                <button type="submit" name="cs" style="width:176px;">< Continue Shopping</button> 
                <br>
                <br>
                <button type="submit" name="co" style="width:176px;">Checkout ></button>
                <?php } ?>
                <div class = "buttons" style="text-align:center;" >
                <button type="submit" name="vr" style="width:176px;">View Past Purchases</button> 
                </div>
                <?php 
                if(isset($_POST['cs'])) //Continuing to shop
                {
                  header('location:bookpage.php');
                }
                echo "";
                
                if(isset($_POST['co']))  //Checking out
                {
                  header('location:banking.php');
                }

                if(isset($_POST['vr']))   //Viewing past purchases for users
                {
                  $sql1 = "SELECT order_id FROM orders WHERE student_id = '".$Uid."'";
                  $result1 = mysqli_query($db, $sql1);
                  $orderid="";
                  while($row1 = mysqli_fetch_array($result1)) {
                    $orderid = $row1['order_id'];
                  }
                  if(!empty($orderid)){
                        $sql2 = "SELECT * FROM receipts WHERE student_id = '".$Uid."'";  
                        $resultR = mysqli_query($db, $sql2);
                        while($row = mysqli_fetch_assoc($resultR))
                        {
                          $receiptid = $row['receipt_id'];
                          $orderid = $row['order_id'];
                          $total = $row['total'];
                          echo "<script>alert('Order number: $orderid\\nPurchase No.: $receiptid\\nTotal Price Purchased: R$total')</script>";
                        }
                  }else{
                    echo "<script>alert('You have no past purchases!\\nComplete a purchase to view history!')</script>";
                  }
                }

              
?>
</form>
    </body>
</html> 
