<?php
     session_start();
include 'index.php';
      if (isset($_SESSION['name']) && isset($_SESSION['surname'])  ) {
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/style-2.css">
  </head>
  <section class = "nb">
  <div class="topnavbar" id="myTopNavbar" style="right:270px ;">
        <img src="/images/WestBuy Logo.jpg" alt="" class="logo" style="height:70px ;">
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
    <body>
      
    <?php 
          $name = $_SESSION['name'];
          $surname = $_SESSION['surname'];
          $message = "$name $surname has logged in!";
          echo "<script>alert('$message');</script>";
          ?>
    </body>
</html> 

<?php

}else{
    echo "";
}
?>