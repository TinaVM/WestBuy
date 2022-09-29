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

/*Checking if the user table exists befor creating it */
if($result = mysqli_query($mysqli,"SHOW TABLES FROM bookstore LIKE '%user%'")){
    if(mysqli_num_rows($result) == 1){
        echo nl2br("Table user exists\r\n");
    }
}else{
    echo nl2br("Table user does not exist\r\n");
}


$query = 'DROP TABLE IF EXISTS `user`';
if(mysqli_query($mysqli,$query)){
    echo nl2br("Table user has been deleted.\r\n");
}else{
    echo nl2br("Table user has not been deletd.\r\n");
}

//Creating the tables and then notifying if successful creation or not
$query = "CREATE TABLE user(
    student_id VARCHAR(50) NOT NULL,
    name VARCHAR(50) NOT NULL,
    surname VARCHAR(50) NOT NULL,
    student_email VARCHAR(50) NOT NULL,
    cellnumber INT(10) not null,
    usertype VARCHAR(30) NOT NULL,
    address VARCHAR(100) NOT NULL,
    password VARCHAR(50) NOT NULL,
    CONSTRAINT PK_Student_id PRIMARY KEY(student_id)
)";

if(mysqli_query($mysqli,$query)){
    echo nl2br("Table user created successfully\r\n");

}else{
    echo nl2br("Error creating table user: \r\n"). @mysqli_error($mysqli);
} 
 

//Reading text file and inserting data

//creating new instance of connection
$mysqli = new mysqli('localhost','root','','bookstore');
//opening file stream and reads it only 'r'
$file = fopen("userData.txt","r");

while(!feof($file)){
    $content = fgets($file);
    //data was separated with ';' in text file
    $carray = explode(";", $content);
    //assingin varibales to table column heading to link data
    list($student_id,$name,$surname,$student_email,$cellnumber,$usertype,$address,$password) = $carray;
    $sql = "insert into `user`(`student_id`,`name`,`surname`,`student_email`,`cellnumber`,`usertype`,`address`,`password`) values('$student_id','$name','$surname','$student_email','$cellnumber','$usertype','$address','$password')";
    //Displays/sorta file contents into array
    @mysqli_query($mysqli,$sql);
    //--REMOVING UNNECESSARY NOTICE ERROR DUE TO CODE PRODUCING DESIRED RESULTS
//SOURCE: https://phoenixnap.com/kb/php-error-reporting
error_reporting(0);
} 
fclose($file);


//Closing the connection
mysqli_close($mysqli);

?>