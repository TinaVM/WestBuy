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

if($result = mysqli_query($mysqli,"SHOW TABLES FROM bookstore LIKE '%receipts%'")){
    if(mysqli_num_rows($result) == 1){
        echo nl2br("Table receipts exists\r\n");
    }
}else{
    echo nl2br("Table receipts does not exist\r\n");
}

$query = 'DROP TABLE IF EXISTS `receipts`';
if(mysqli_query($mysqli,$query)){
    echo nl2br("Table receipts has been deleted.\r\n");
}else{
    echo nl2br("Table receipts has not been deleted.\r\n");
}

$query = "CREATE TABLE receipts(
    receipt_id int(20) NOT NULL,
    total int(10) NOT NULL,
    order_id int(10) NOT NULL,
    student_id VARCHAR(50) NOT NULL,
    CONSTRAINT PK_receipt_id PRIMARY KEY(receipt_id),
    CONSTRAINT FK_stud_id FOREIGN KEY(student_id) REFERENCES user(student_id)
)";

if(mysqli_query($mysqli,$query)){
    echo nl2br("Table receipts created successfully\r\n");

}else{
    echo nl2br("Error creating table receipts: \r\n"). @mysqli_error($mysqli);
} 

//creating new instance of connection
$mysqli = new mysqli('localhost','root','','bookstore');
//opening file stream and reads it only 'r'
$file = fopen("receiptData.txt","r");

while(!feof($file)){
    $content = fgets($file);
    //data was separated with ';' in text file
    $carray = explode(";", $content);
    //assingin varibales to table column heading to link data
    list($receipt_id,$total,$order_id,$student_id) = $carray;
    $sql = "insert into `receipts`(`receipt_id`,`total`,`order_id`,`student_id`) values('$receipt_id','$total','$order_id','$student_id')";
    //Displays/sorta file contents into array
    mysqli_query($mysqli,$sql);
    //--REMOVING UNNECESSARY NOTICE ERROR DUE TO CODE PRODUCING DESIRED RESULTS
//SOURCE: https://phoenixnap.com/kb/php-error-reporting
error_reporting(0);
} 
fclose($file);

//Closing the connection
mysqli_close($mysqli);
?>