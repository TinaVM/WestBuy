<?php 
require_once('./operations.php');
if(isset($_POST['submit']))
{
     echo "<script>alert('Thank you for submitting your book!\\nPlease wait as we validate your book.\\nConfirmation will be sent to you by email within 24 hours.');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SellPage</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style-1.css">
    <link rel="stylesheet" href="css/style-2.css">
    <link rel="stylesheet" href="css/sellpage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script type="text/javascript" src="javascript/script.js"></script>
    <script src="https://kit.fontawesome.com/ea6eaed102.js" crossorigin="anonymous"></script>

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
          <h1 class="heading">BOOK INFORMATION</h1>
          <div class="container d-flex justify-content-center h-75">
            <form action="" method="POST" class="w-50">
                <?php 
                /*Writing functions for input fields so that
                dont have to write form groups for each field*/
                  inputFields("title","title","","text")
                ?>
                <?php inputFields("author","author","","text") ?>
                <?php inputFields("price","price","","text") ?>
                <?php inputFields("","image","","file") ?>
                <button class="btn btn-dark" type="submit" name="submit" style="top:100%">Submit</button>
            </form>
          </div>
          </div>
          </div>
</body>
</html>