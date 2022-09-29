<?php 
    include "db.php";
    include "functions.php";
    function emptyCheck($studentid,$name,$surname,$studentemail,$cellnumber,$usertype,$address) //Form validation
    {
        $flag = true;
        if(empty($studentid) || empty($name) || empty($surname) || empty($studentemail) || empty($cellnumber) || empty($usertype)|| empty($address)){
            echo "<script>alert('Please fill in all fields!')</script>";
            global $count;
            $count++;
        }
        else{
            $flag = false;
        }
        return $flag;
    }

    if (isset($_POST["back"])){
        header("Location: admin.php"); //Takes admin to admin page
    }
    else{
        echo"";
    }
    $count = 0;

    $studentid = $_GET['GetID'];
    // Assigning data from table user 
    $sql = "SELECT * FROM user WHERE student_id='".$studentid."'";

    $result = mysqli_query($db, $sql);

    while($row = mysqli_fetch_assoc($result))
    {
        $studentid = $row['student_id'];  
        $name = $row['name'];
        $surname = $row['surname'];
        $studentemail = $row['student_email'];
        $cellnumber = $row['cellnumber'];
        $usertype = $row['usertype'];
        $address = $row['address'];
    }


    if(isset($_POST['update'])){ //Updating user details
        //Validating the information
        $studentid = $_POST['sID'];  // Data sent from form 
        $uname = $_POST['name'];
        $surname = $_POST['surname'];
        $studentemail = $_POST['email'];
        $cellnumber = $_POST['cellnumber'];
        $usertype = $_POST['buyorsell'];
        $address = $_POST['address'];
        //Validating the updated information
        emptyCheck($studentid,$uname,$surname,$studentemail,$cellnumber,$usertype,$address);
        studentIDvalidation($studentid);
        emailValidation($studentemail);
        userType($usertype);
        cellValidation($cellnumber);
        //Updating a user
        if($count == 0)
        {
        $updateSql = "UPDATE user set student_id='".$studentid."', 
        name= '".$uname."',surname='".$surname."',student_email='".$studentemail."',
        cellnumber='".$cellnumber."',usertype='".$usertype."',address='".$address."' WHERE student_id = '".$studentid."'";

        $updateResult = mysqli_query($db, $updateSql);

        echo "<script>alert('You have successfully updated the user! \\nPress the back button to return to admin page.')</script>";
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
        <title>User Details</title>
        <link rel="stylesheet" type="text/css" href="css/registerstyle.css">
    </head>
    <img src="images/WestBuy Logo.jpg">
    <body style="background-image: url('images/alfons-morales-YLSwjSy7stw-unsplash.jpg');">
    <body>
    <form action="" method="POST">

        <h2>Update User</h2>

        <label>Student ID</label>
        <input type="text" name="sID" placeholder="User ID" value="<?php echo $studentid; ?>"/> <!-- Sticky forms -->

        <label>Name</label>
        <input type="text" name="name" placeholder="Name" value="<?php echo $name;?>"/>

        <label>Surname</label>
        <input type="text" name="surname" placeholder="Surname" value="<?php echo $surname ?>"/>

        <label>Email</label>
        <input type="text" name="email" placeholder="Email" value="<?php echo $studentemail?>"/> 

        <label>Cellphone</label>
        <input type="text" name="cellnumber" placeholder="Cellphone" value="<?php echo $cellnumber ?>"/>

        <label>User Type</label><br>
            <div class="select">
            <select name="buyorsell">  
              <option type = "text" value="Buyer">Buyer</option>  
              <option type = "text" value="Seller">Seller</option>  
            </select> 
            </div>
            <br>

        <label>Address</label>
        <input type="text" name="address" placeholder="Address" value="<?php echo $address ?>"/>

        <div class="buttonplaceholder"> 
        <button type="submit" name="update">Update</button><button type="submit" name="back" style ="margin-left: 310px;">< Back</button>
        </div>
</form>
</body>
</html>