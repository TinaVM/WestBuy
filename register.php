<?php 
session_start(); 
include "db.php"; //File that establishes a connection with the bookstore database
include "functions.php"; //File that contains validation functions
$count = 0;

if (isset($_POST["submit"])){
	$studentid = $_POST['sID'];  // Data sent from form 
	$name = $_POST['name'];
    $surname = $_POST['surname'];
	$studentemail = $_POST['email'];
    $cellnumber = $_POST['cellnumber'];
	$usertype = $_POST['buyorsell'];
    $address = $_POST['address'];
	$psd = $_POST['pass'];

   //Calling the validating functions from functions php file
	emptyValidation($studentid,$name,$surname,$studentemail,$cellnumber,$usertype,$address,$psd);
	studentIDvalidation($studentid);
	emailValidation($studentemail);
	userType($usertype);
	cellValidation($cellnumber);
    passwordValidation($psd);

		// hashing the password
        $psd = md5($psd);
		//Query to check if student id exists
	    $sql = "SELECT * FROM user WHERE student_id='$studentid' ";
		$result = mysqli_query($db, $sql);
		studentIDexists($studentid); //Calling the function to check if student id exists or not

		if ($count == 0) { //Writing to database table and confirming their registration
			$sql2 = "INSERT INTO user(student_id, name, surname, student_email, cellnumber,usertype,address,password) VALUES('$studentid','$name','$surname','$studentemail','$cellnumber','$usertype','$address','$psd')";
			$result2 = mysqli_query($db, $sql2);
			echo "<script>alert('Please wait, awaiting confirmation...')</script>";
			echo "<script>alert('You have successfully registered, click login to login.')</script>";
		}else{
			echo "";
		}
	
}else{
	echo "";
} 
?>
<!DOCTYPE html>
    <html>
      <head>
        <title>Register</title>
        <link rel="stylesheet" type="text/css" href="css/registerstyle.css">

      </head>
      <img src="images/WestBuy Logo.jpg">
        <body style="background-image: url('images/alfons-morales-YLSwjSy7stw-unsplash.jpg');">
            <form action="" method="POST">
			<p></p>
            <h2>Register</h2>
           
            <label>Student ID</label>
            <input type="text" name="sID" placeholder="User ID" value="<?php if (isset($_POST['sID'])) echo $_POST['sID']; ?>"/> <!-- Sticky forms -->

            <label>Name</label>
            <input type="text" name="name" placeholder="Name" value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>"/>

            <label>Surname</label>
            <input type="text" name="surname" placeholder="Surname" value="<?php if (isset($_POST['surname'])) echo $_POST['surname']; ?>"/>

            <label>Email</label>
            <input type="text" name="email" placeholder="Email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"/> 

            <label>Cellphone</label>
            <input type="text" name="cellnumber" placeholder="Cellphone" value="<?php if (isset($_POST['cellnumber'])) echo $_POST['cellnumber']; ?>"/>

            <label>User Type</label><br>
            <div class="select">
            <select name="buyorsell">  
              <option type = "text" value="Buyer">Buyer</option>  
              <option type = "text" value="Seller">Seller</option>  
            </select> 
            </div>
            <br>

            <label>Address</label>
            <input type="text" name="address" placeholder="Address" value="<?php if (isset($_POST['address'])) echo $_POST['address']; ?>"/>

            <label>Password</label>
            <input type="password" name="pass" placeholder="Password" value="<?php if (isset($_POST['pass'])) echo $_POST['pass']; ?>"/>

            <div class="buttonplaceholder"> 
              <button type="submit" name="submit">Submit</button>
            </div>
			<p class="Register">Click here to Login: <a href="login.php">Login</a></p>
            </form>
			
        </body>
    </html>
