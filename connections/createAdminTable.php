<?php
include 'DBConn.php';
//Declaring database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore";

//Creating the connection;
$mysqli = mysqli_connect($servername, $username, $password, $dbname);

//Checking the connection
if(@mysqli_connect_errno()){
    echo "Failed to connect to MySQL: ". @mysqli_connect_error();
    exit();
}

/*Checking if the admin table exist befor creating it */
if($result = mysqli_query($mysqli,"SHOW TABLES FROM bookstore LIKE '%admin%'")){
    if(mysqli_num_rows($result) == 1){
        echo nl2br("Table admin exists\r\n");
    }
}else{
    echo nl2br("Table admin does not exist\r\n");
}

$query = 'DROP TABLE IF EXISTS `admin`';
if(mysqli_query($mysqli,$query)){
    echo nl2br("Table admin has been deleted.\r\n");
}else{
    echo nl2br("Table admin has not been deleted.\r\n");
}

//Creating the tables and then notifying if successful creation or not
$query = "CREATE TABLE admin(
    admin_id VARCHAR(50) NOT NULL,
    name VARCHAR(50) NOT NULL,
    surname VARCHAR(50) NOT NULL,
    admin_email VARCHAR(50) NOT NULL,
    cellnumber INT(10) not null,
    password VARCHAR(50) NOT NULL,
    CONSTRAINT PK_Admin_id PRIMARY KEY(admin_id)
)";

if(mysqli_query($mysqli,$query)){
    echo nl2br("Table admin created successfully\r\n");

}else{
    echo nl2br("Error creating table admin: \r\n"). @mysqli_error($mysqli);
} 

//creating new instance of connection
$mysqli = new mysqli('localhost','root','','bookstore');
//opening file stream and reads it only 'r'
$file = fopen("adminData.txt","r");

while(!feof($file)){
    $content = fgets($file);
    //data was separated with ';' in text file
    $carray = explode(";", $content);
    //assingin varibales to table column heading to link data
    list($admin_id,$name,$surname,$admin_email,$cellnumber,$password) = $carray;
    $sql = "insert into `admin`(`admin_id`,`name`,`surname`,`admin_email`,`cellnumber`,`password`) values('$admin_id','$name','$surname','$admin_email','$cellnumber','$password')";
    //Displays/sorta file contents into array
    mysqli_query($mysqli,$sql);
    //--REMOVING UNNECESSARY NOTICE ERROR DUE TO CODE PRODUCING DESIRED RESULTS
//SOURCE: https://phoenixnap.com/kb/php-error-reporting
error_reporting(0);
} 
fclose($file);

 $qEdit = "UPDATE `admin` SET `password` = 'admin123' WHERE `admin`.`admin_id` = 'L10910500'";
 mysqli_query($mysqli,$qEdit);

//Closing the connection
@mysqli_close($mysqli);
?>