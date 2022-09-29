<?php
include "db.php";
     if(isset($_GET['dID'])) //Deleting a user
     {
       $ID = $_GET['dID'];
       
       $sql = "Delete FROM user WHERE student_id='".$ID."'";

       $delete = mysqli_query($db, $sql);

       if($delete)
       {
        echo "<script>alert('You have successfully deleted the user!')</script>";
       }
       else{
         echo "Failed to execute deletion, try again!";
       }
     }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="css/admincss.css"> 
  </head>
   <body style="background-image: url('images/alfons-morales-YLSwjSy7stw-unsplash.jpg');"> 
    <div class="container">  

          <?php 
          if (isset($_POST["books"])){
            header("Location: adminbook.php"); //Takes admin to add user page
          }
          else{
            echo"";
          }
           if (isset($_POST["create"])){
            header("Location: adduser.php"); //Takes admin to add user page
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
          <h1>User Details</h1>
          
          <button type="submit" name="books" style="right: 615px; width:120px">Books Page</button><button type="submit" name="create" style="margin-left: 495px;">Add User</button><button type="submit" name="exit" style="margin-left: 510px;">Exit</button>
          <table border="7">
          <thead>
            <tr>
              <th scope="col">Student ID</th>
              <th scope="col">First Name</th>
              <th scope="col">Surname</th>
              <th scope="col">Email</th> 
              <th scope="col">Phone number</th> 
              <th scope="col">User Type</th> 
              <th scope="col">Address</th> 
              <th scope="col">Password</th> 
            </tr>
          </thead>
<?php
            $sql = "SELECT * from user order by student_id"; //Getting data from user table 

            $result = mysqli_query($db,$sql);

            while($row = mysqli_fetch_assoc($result)){
              $studentid = $row['student_id'];  // Data sent from form 
              $name = $row['name'];
              $surname = $row['surname'];
              $studentemail = $row['student_email'];
              $cellnumber = $row['cellnumber'];
              $usertype = $row['usertype'];
              $address = $row['address'];
              $psd = $row['password'];
              //Displaying data from user table
              echo "<tbody> 
              <tr>
                  <td>".$studentid."</td>
                  <td>".$name."</td>
                  <td>".$surname."</td>
                  <td>".$studentemail."</td>
                  <td>".$cellnumber."</td>
                  <td>".$usertype."</td>
                  <td>".$address."</td>
                  <td>".$psd."</td>
                  <td>
                  <a href='?dID=". $studentid ."'>Delete</a>
                  &nbsp;&nbsp;
                  <a href='update.php?GetID=". $studentid. "'>Update</a>
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
      