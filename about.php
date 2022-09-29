<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style-1.css">
    <link rel="stylesheet" href="css/style-2.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <script type="text/javascript" src="javascript/script.js"></script>
    <script src="https://kit.fontawesome.com/ea6eaed102.js" crossorigin="anonymous"></script>
    <title>ABOUT</title>
</head>
<body>
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
      <div class="big-border">
        <h1 class="heading">ABOUT</h1>
        <div class="small-panel">
            <p class="sml-parag">WestBuy is an online secondhand textbook trader that 
                caters for students studying at the University of North West and aims to provide 
                the best quality of secondhand textbooks at an affordable price while guaranteeing 
                your safety.
            </p>
        </div>
      </div>
</body>
</html>