<?php 
session_start(); 
include "db.php";
include "functions.php";
$count = 0;

if (isset($_POST["submit"])){
    $bookid = $_POST['bookid'];  // Data sent from form 
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = $_POST['year'];
    $bookCondition = $_POST['bookcondition'];
    $price = $_POST['price'];
    $userid = $_POST['userid'];
	  //Calling the validating functions from functions php file
  	emptyBookValidation($bookid,$title,$author,$year,$bookCondition,$price,$userid);
    yearVal($year);
    priceVal($price);
		//Query to check if book id exists
	  $sql = "SELECT * FROM books WHERE book_id='$bookid' ";
		$result = mysqli_query($db, $sql);
		bookIDexists($bookid); //Calling the function to check if book id exists or not

		if ($count == 0) { //Writing to database table and confirming their registration
			$sql2 = "INSERT INTO books(book_id, title, author, year, book_condition, price, user_id) VALUES('$bookid','$title','$author','$year','$bookCondition','$price','$userid')";
			$result2 = mysqli_query($db, $sql2);
			echo "<script>alert('Book successfully added. Click the back button to return to admin page!')</script>";
		}else{
			echo "";
		}
	
}else{
	echo "";
} 

if (isset($_POST["back"])){
	header("Location: adminbook.php"); //Takes admin to admin page
}
else{
	echo"";
}
?>
<!DOCTYPE html>
    <html>
      <head>
        <title>Add Book</title>
        <link rel="stylesheet" type="text/css" href="css/registerstyle1.css">

      </head>
      <img src="images/WestBuy Logo.jpg">
        <body style="background-image: url('images/alfons-morales-YLSwjSy7stw-unsplash.jpg');">
            <form action="" method="POST">

            <h2>Add Book</h2>
            
            <label>Book ID</label>
            <input type="text" name="bookid" placeholder="Book ID" value="<?php if (isset($_POST['bookid'])) echo $_POST['bookid']; ?>"/> <!-- Sticky forms -->

            <label>Title</label>
            <input type="text" name="title" placeholder="Title" value="<?php if (isset($_POST['title'])) echo $_POST['title']; ?>"/>

            <label>Author</label>
            <input type="text" name="author" placeholder="Author" value="<?php if (isset($_POST['author'])) echo $_POST['author']; ?>"/>

            <label>Year</label>
            <input type="text" name="year" placeholder="Year" value="<?php if (isset($_POST['year'])) echo $_POST['year']; ?>"/> 

            <label>Book Condition</label><br>
            <div class="select">
            <select name="bookcondition">  
              <option type = "text" value="Fair">Fair</option>  
              <option type = "text" value="Good">Good</option>  
              <option type = "text" value="Very Good">Very Good</option>   
            </select> 
            </div>
            <br>
            <label>Price</label>
            <input type="text" name="price" placeholder="Price" value="<?php if (isset($_POST['price'])) echo $_POST['price']; ?>"/>

            <label>User ID</label>
            <input type="text" name="userid" placeholder="User ID" value="<?php if (isset($_POST['userid'])) echo $_POST['userid']; ?>"/>

            <div class="buttonplaceholder"> 
              <button type="submit" name="submit">Submit</button><button type="submit" name="back" style ="margin-left: 310px;">< Back</button>
            </div>
            </form>
        </body>
    </html>
