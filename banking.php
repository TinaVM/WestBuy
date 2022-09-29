<?php 
include "db.php";
session_start();
$Uid="";
if(isset($_SESSION['Uid'])) //Getting user id
{
      $Uid = $_SESSION['Uid'];
}
                
if(isset($_POST['lo'])) //Logging out
{
  session_destroy(); 
  header('location:login.php');
}
if(isset($_POST['back']))
{
  header('location:cart.php');
}

    if(isset($_POST['confirm']))
    {
      $sql = "SELECT * FROM orders ORDER BY order_id DESC LIMIT 1";
                  $result = mysqli_query($db, $sql);
          
                  if($result){
                        while($row = mysqli_fetch_array($result)) {
                            $orderid = $row['order_id'];
                            $orderNum = $row['order_number'];
                        }
                  }
                  $orderid++;
                  $orderNum++;
                  foreach ($_SESSION['cart'] as $key => $value){ 
                              
                      $sql = "Delete FROM books WHERE book_id='".$value['id']."'"; //Removing books from database after being purchased
                      $delete = mysqli_query($db, $sql); 
                      $bid = $value['id'];
                    }
                   

                  //Adding new order to order table
                  $checkoutSql = "INSERT INTO orders(order_id, order_number, book_id, student_id) VALUES('$orderid','$orderNum','$bid','$Uid')";
                  $checkoutResult = mysqli_query($db, $checkoutSql);
                  
                  $sql2 = "SELECT * FROM receipts ORDER BY receipt_id DESC LIMIT 1";  
                  $result2 = mysqli_query($db, $sql2);
                  $receiptid ="";
                  if($result2){
                        while($row2 = mysqli_fetch_array($result2)) {
                            $receiptid = $row2['receipt_id'];
                        }
                  }
                  $total = 0;
                  $total = $_SESSION['total'];
                  $receiptid++;        //Inserting a new receipt
                  $receiptSql = "INSERT INTO receipts(receipt_id, total, order_id, student_id) VALUES('$receiptid','$total','$orderid','$Uid')";
                  $receiptResult = mysqli_query($db, $receiptSql); 
            
                  echo "<script>alert('Purchase successful!\\nYour order ID: $orderid.\\nYour books will be delivered within 3 working days.\\nYou will be contacted when the delivery is made.')</script>";
                  echo "<script>alert('You may now logout using the log out button!')</script>";
                  unset($items);
                  unset($_SESSION['cart']);
    }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banking Details</title>
    <link rel="stylesheet" href="css/style-11.css">
</head>
<body style="background-image: url('images/alfons-morales-YLSwjSy7stw-unsplash.jpg');">
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
          <div class="big-border">
        <h1 class="heading">Banking Details</h1>
        <div class="small-panel">
        <h2 class="heading-3">Bank Account</h2>
            <form action="" class="action" method="POST">
                <label style="padding-right:40px">Account Name:</label>
    <input style="margin-left:20px" type="text" id="accname" name="accname" placeholder="">
    <br>
    <label style="padding-right:40px">Bank Name:</label>
    <input style="margin-left:38px" type="text" id="bankname" name="bankname" placeholder="">
    <br>
    <label style="padding-right:40px">Account Type:</label>
    <input style="margin-left:25px" type="text" id="acctype" name="acctype" placeholder="">
    <br>
    <label style="padding-right:40px">Account Number: </label>
    <input style="margin-left:5px" type="text" id="accnum" name="accnum" placeholder="">
    <br>

    <button type="submit" name="confirm" style="margin-left:165px">Confirm</button>
                <br>
                <br>
                <button type="submit" name="back" style="margin-left:165px">< Back</button>   <button type="submit" name="lo" style="margin-left:580px">Logout</button>

</form>
        </div>
      </div>
</body>
</html>