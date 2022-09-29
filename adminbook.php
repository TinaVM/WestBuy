<?php
include "db.php";

    if(isset($_GET['dID'])) //Deleting a user
    {
    $ID = $_GET['dID'];
    
    $sql = "Delete FROM books WHERE book_id='".$ID."'";

    $delete = mysqli_query($db, $sql);

    if($delete)
    {
    echo "<script>alert('You have successfully deleted a book!')</script>";
    }
    else{
        echo "Failed to execute deletion, try again!";
    }
    }

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Admin Book</title>
    <link rel="stylesheet" type="text/css" href="css/admincss.css"> 
  </head>
   <body style="background-image: url('images/alfons-morales-YLSwjSy7stw-unsplash.jpg');"> 
    <div class="container">  

          <?php 
          if (isset($_POST["back"])){
            header("Location: admin.php"); //Takes admin back to admin page
          }
          else{
            echo"";
          }
           if (isset($_POST["create"])){
            header("Location: addbook.php"); //Takes admin to add book page
          }
          else{
            echo"";
          }
          if (isset($_POST["exit"])){
            header("Location: login.php"); //Takes admin to admin page
          }
          else{
            echo"";
          }
          ?>
          
          <form action="" method="POST"> 
          <h1>Book Details</h1>
          
          <button type="submit" name="back" style="left: 415px;">< Back</button><button type="submit" name="create" style="margin-left: 512px;">Add Book</button><button type="submit" name="exit" style="margin-left: 518px;">Exit</button>
          <table border="7">
          <thead>
            <tr>
              <th scope="col">Book ID</th>
              <th scope="col">Title</th>
              <th scope="col">Author</th>
              <th scope="col">Year</th> 
              <th scope="col">Book condition</th> 
              <th scope="col">Price</th> 
              <th scope="col">User ID</th> 
            </tr>
          </thead>
<?php
            $sql = "SELECT * from books order by book_id"; //Getting data from user table 

            $result = mysqli_query($db,$sql);

            while($row = mysqli_fetch_assoc($result)){
              $bookid = $row['book_id'];  // Data sent from form 
              $title = $row['title'];
              $author = $row['author'];
              $year = $row['year'];
              $bookCondition = $row['book_condition'];
              $price = $row['price'];
              $userid = $row['user_id'];

              //Displaying data from user table
              echo "<tbody> 
              <tr>
                  <td>".$bookid."</td>
                  <td>".$title."</td>
                  <td>".$author."</td>
                  <td>".$year."</td>
                  <td>".$bookCondition."</td>
                  <td>".$price."</td>
                  <td>".$userid."</td>
                  <td>
                  <a href='?dID=".$bookid."'>Delete</a>
                  &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp;    
                  &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp; 
                  <a href='updatebook.php?GetID=".$bookid."'>Update</a>
                  </td>
                                    
                  </tr>
          </tbody>";
            }
?>
        </table>
          </form>
          </div>
            </body>
        </html> 