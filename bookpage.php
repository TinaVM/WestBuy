<?php
    include "db.php";
	session_start();
    $bookid="";
	$bname="";
	$price="";
	function fetchData() //Function for getting book data 
	{
		global $bookid, $db, $bname, $price;
		$sql = "SELECT * FROM books WHERE book_id='".$bookid."'";
		$result = mysqli_query($db, $sql);

		while($row = mysqli_fetch_assoc($result))
    {
		$bname = $row['title'];
        $price = $row['price'];
    }
	}
    if(isset($_POST['book1'])) //Condition for each book
	{
		$bookid = "B180900105";
		fetchData();
        echo "<script>alert('Price: R$price \\nItem added to cart!')</script>";
	}

	if(isset($_POST['book2']))
	{
        $bookid = "B180900102";
		fetchData();
		echo "<script>alert('Price: R550 \\nItem added to cart!')</script>";
	}

	if(isset($_POST['book3']))
	{
        $bookid = "B180900104";
		fetchData();
		echo "<script>alert('Price: R340 \\nItem added to cart!')</script>";
	}

	if(isset($_POST['book4']))
	{
        $bookid = "B180900101";
		fetchData();
		echo "<script>alert('Price: R500 \\nItem added to cart!')</script>";
	}

	if(isset($_POST['book5']))
	{
        $bookid = "B180900103";
		fetchData();
		echo "<script>alert('Price: R320 \\nItem added to cart!')</script>";
	}
?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Books</title>
     <!-- https://colorlib.com/wp/bootstrap-slider/ -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i&display=swap" rel="stylesheet">
		
		<link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
		<link rel="stylesheet" href="css/bookstyle.css">
		<link rel="stylesheet" href="css/style-2.css">
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
		<form action ="" method="POST">
		<section class="ftco-section">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<h2 style = "color: white">Books</h2>
					</div>
                    <div class = "box">
                  
					<div class="col-md-12">
						<div class="featured-carousel owl-carousel">
							<div class="item">
								<div class="work">
									<div class="img d-flex align-items-end justify-content-center" style="background-image: url(images/adv-acc.jpg);">
										<div class="text w-100">
											<h3 style="font-size:25px; text-align: center"><a href="#">Advanced Management Accounting (Paperworks)</a></h3>
                                            <div>
                                                <h3 style="font-size:20px; text-align: center; color: white">Price: R550</h3>
                                            </div>
											   <button name="AMC"> <a href="cartIndex.php?getItem=book1&id=B180900105&bookname=Advanced Management Accounting (Paperworks)&quantity=1&price=550">Add to cart</a></button>                                     
										
											</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="work">
									<div class="img d-flex align-items-end justify-content-center" style="background-image: url(images/c-med.jpg);">
										<div class="text w-100">
											<h3 style="font-size:25px; text-align: center"><a href="#">Clinical Medicine</a></h3>
                                            <div>
                                                <h3 style="font-size:20px; text-align: center; color: white">Price: R450</h3>
                                            </div>

											<button type="submit" name="CM"><a href="cartIndex.php?getItem=book2&id=B180900102&bookname=Kumar and Clarks Clinical Medicine: International Edition (Paperback 9th Revised Edition)&quantity=1&price=450">Add to cart</a></button>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="work">
									<div class="img d-flex align-items-end justify-content-center" style="background-image: url(images/sa-law.jpg);">
										<div class="text w-100">
											<h3 style="font-size:25px; text-align: center"><a href="#">South African Constitutional Law In Context (Paperback)</a></h3>
											<div>
                                                <h3 style="font-size:20px; text-align: center; color: white">Price: R500</h3>
                                            </div>
                                            <button type="submit" name="SAC"><a href="cartIndex.php?getItem=book3&id=B180900101&bookname=South African Constitutional Law In Context (Paperback)&quantity=1&price=500">Add to cart</a></button>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="work">
									<div class="img d-flex align-items-end justify-content-center" style="background-image: url(images/it-law.jpg);">
										<div class="text w-100">
											<h3 style="font-size:25px; text-align: center"><a href="#">Information And Communications Technology Law (Paperback, 2nd)</a></h3>
											<div>
                                                <h3 style="font-size:20px; text-align: center; color: white">Price: R340</h3>
                                            </div>
                                            <button type="submit" name="ICT"><a href="cartIndex.php?getItem=book4&id=B180900104&bookname=Information And Communications Technology Law (Paperback, 2nd)&quantity=1&price=340">Add to cart</a></button>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="work">
									<div class="img d-flex align-items-end justify-content-center" style="background-image: url(images/per-psy.jpg);">
										<div class="text w-100">
											<h3 style="font-size:25px; text-align: center"><a href="#">Personnel Psychology - An Applied Perspective (Paperback, 2nd Edition)</a></h3>
											<div>
                                                <h3 style="font-size:20px; text-align: center; color: white">Price: R320</h3>
                                            </div>
                                            <button type="submit" name="PPA"><a href="cartIndex.php?getItem=book5&id=B180900103&bookname=Personnel Psychology - An Applied Perspective (Paperback, 2nd Edition)&quantity=1&price=320">Add to cart</a></button>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="work">
									<div class="img d-flex align-items-end justify-content-center" style="background-image: url(images/conserv-bio.jpg);">
										<div class="text w-100">
											<h3 style="font-size:25px; text-align: center"><a href="#">Conservation Biology</a></h3>
											<div>
                                                <h3 style="font-size:20px; text-align: center; color: white">Price: R480</h3>
                                            </div>
                                            <button type="submit" name="CB"><a href="cartIndex.php?getItem=book6&id=B180900109&bookname=Conservation Biology&quantity=1&price=480">Add to cart</a></button>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="work">
									<div class="img d-flex align-items-end justify-content-center" style="background-image: url(images/sof-engi.jpg);">
										<div class="text w-100">
											<h3 style="font-size:25px; text-align: center"><a href="#">Software Engineering</a></h3>
											<div>
                                                <h3 style="font-size:20px; text-align: center; color: white">Price: R580</h3>
                                            </div>
                                            <button type="submit" name="PPA"><a href="cartIndex.php?getItem=book7&id=B180900118&bookname=Software Engineering&quantity=1&price=580">Add to cart</a></button>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="work">
									<div class="img d-flex align-items-end justify-content-center" style="background-image: url(images/intro-phys.jpg);">
										<div class="text w-100">
											<h3 style="font-size:25px; text-align: center"><a href="#">Introduction To Physics</a></h3>
											<div>
                                                <h3 style="font-size:20px; text-align: center; color: white">Price: R800</h3>
                                            </div>
                                            <button type="submit" name="PPA"><a href="cartIndex.php?getItem=book8&id=B180900115&bookname=Introduction To Physics&quantity=1&price=800">Add to cart</a></button>
										</div>
									</div>
								</div>
							</div>



							
						</div>
					</div>
				</div>
			</div>
</div>	
		</section>
           <!--https://colorlib.com/wp/bootstrap-slider/ -->
    <script src="javascript/jquery.min.js"></script>
    <script src="javascript/popper.js"></script>
    <script src="javascript/bootstrap.min.js"></script>
    <script src="javascript/owl.carousel.min.js"></script>
    <script src="javascript/main.js"></script>

  </body>
</html>