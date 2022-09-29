<?php
    session_start();
    include "db.php"; //Connecting to the database bookstore

       
    if (isset($_POST["submit"])){
    $id = $_POST['ID'];     // student ID and password sent from form 
    $pwd = $_POST['password'];
    $count = 0;
    if(empty($id) || empty($pwd)) //Form validations
        {
            $count++;
            $error = "Fill in all Fields!";
        }
        else{

    $pwd = md5($pwd); //Undoing the hashing for the password
    $sql = "SELECT name, surname FROM user WHERE student_id = '$id' and password = '$pwd'"; //Sql query to retrieve data from table        
    $result = mysqli_query($db,$sql);
    $count2 = 0; //Error counter
    if($result -> num_rows > 0) { //Validating data against data entered
        $row = mysqli_fetch_assoc($result);
        $_SESSION['Uid'] = $id;  
        $_SESSION['name'] = $row['name'];
        $_SESSION['surname'] = $row['surname'];
        echo "<script>alert('Please wait, awaiting confirmation...')</script>";
        header("Location: homepage.php"); //Takes user to next page
    }else {  
        $count2++;
        $error = "Incorrect User ID or Password, try again!";
    }
 }
}
if (isset($_POST["admin"])){
  // admin email and password sent from form 
  $id = $_POST['ID'];
  $pwd = $_POST['password'];
  $count = 0;
  if(empty($id) || empty($pwd)) //Form validations
      {
          $count++;
          $error = "Fill in all Fields!";
      }
      else{

  $sql = "SELECT name, surname FROM admin WHERE admin_email = '$id' and password = '$pwd'";  //Sql query to retrieve data from table 
  
  $pwd = md5($pwd); //Undoing the hashing for the password
  $result = mysqli_query($db,$sql);
  $count2 = 0;   //Error counter
  if(mysqli_num_rows($result) == 1) {  //Validating data against data entered
      $row = mysqli_fetch_assoc($result);
      header("Location: admin.php"); //Takes admin to admin page
  }else {  
      $count2++;
      $error = "Incorrect User ID or Password, try again!";
  }
}
}

?>
<!DOCTYPE html>
    <html>
      <head>
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="css/logincss.css">
      </head>
      <img src="images/WestBuy Logo.jpg">
        <body style="background-image: url('images/alfons-morales-YLSwjSy7stw-unsplash.jpg');">
            <form action="" method="post">  
            <h2>Login</h2>
            <?php global $count, $count2; if($count > 0 || $count2 > 0) {?>
                <h3 class ="error"><?php echo $error; ?></h3> <!--Displaying error messages -->
                <?php } ?>
            <label>User ID/Admin Email</label>
            <input type="text" name="ID" placeholder="Student ID / Admin Email" value="<?php if (!empty($id)){ echo $id; }?>"/>  <!-- Sticky forms -->

            <label>Password</label>
            <input type="password" name="password" placeholder="Password" value="<?php if (isset($_POST['password'])){ echo $_POST['password']; } ?>"/>  <!-- Sticky forms -->
            <div class="userplaceholder"> 
              <button type="submit" name="submit">Submit</button><button type="submit" name="admin" style ="margin-left: 310px;">Admin</button>
            </div>

            <p class="Register">Not registered?<a href="register.php">Register here</a></p>
            </form>
            
        </body>
    </html>