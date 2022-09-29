<?php 
include "db.php";
include "functions.php";

if (isset($_POST["back"])){
    header("Location: adminbook.php"); //Takes admin to admin page
}
else{
    echo"";
}
$count = 0;

$bookid = $_GET['GetID'];
// Assigning data from table user 
$sql = "SELECT * FROM books WHERE book_id='".$bookid."'";

$result = mysqli_query($db, $sql);

while($row = mysqli_fetch_assoc($result))
{
    $bookid = $row['book_id'];  // Data sent from table 
    $title = $row['title'];
    $author = $row['author'];
    $year = $row['year'];
    $bookCondition = $row['book_condition'];
    $price = $row['price'];
    $userid = $row['user_id'];
}

if(isset($_POST['update'])){ //Updating user details
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
    //Updating a book
    if($count == 0)
    {
    $updateSql = "UPDATE books set book_id='".$bookid."', 
    title= '".$title."',author='".$author."',year='".$year."',
    book_Condition='".$bookCondition."',price='".$price."',user_id='".$userid."' WHERE book_id = '".$bookid."'";

    $updateResult = mysqli_query($db, $updateSql);

    echo "<script>alert('You have successfully updated the book! \\nPress the back button to return to admin page.')</script>";
    }else{
        echo "";
    }
}
else{
    echo "";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Details</title>
    <link rel="stylesheet" type="text/css" href="css/registerstyle.css">
</head>
<img src="images/WestBuy Logo.jpg">
<body style="background-image: url('images/alfons-morales-YLSwjSy7stw-unsplash.jpg');">
<body>
<form action="" method="POST">

    <h2>Update Book</h2>

    
            <label>Book ID</label>
            <input type="text" name="bookid" placeholder="Book ID" value="<?php echo $bookid ?>"/> <!-- Sticky forms -->

            <label>Title</label>
            <input type="text" name="title" placeholder="Title" value="<?php echo $title ?>"/>

            <label>Author</label>
            <input type="text" name="author" placeholder="Author" value="<?php echo $author ?>"/>

            <label>Year</label>
            <input type="text" name="year" placeholder="Year" value="<?php echo $year ?>"/> 

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
            <input type="text" name="price" placeholder="Price" value="<?php echo $price ?>"/>

            <label>User ID</label>
            <input type="text" name="userid" placeholder="User ID" value="<?php echo $userid ?>"/>

            <div class="buttonplaceholder"> 
              <button type="submit" name="update">Submit</button><button type="submit" name="back" style ="margin-left: 310px;">< Back</button>
            </div>
</form>
</body>
</html>