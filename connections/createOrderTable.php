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

if($result = mysqli_query($mysqli,"SHOW TABLES FROM bookstore LIKE '%orders%'")){
    if(mysqli_num_rows($result) == 1){
        echo nl2br("Table orders exists\r\n");
    }
}else{
    echo nl2br("Table orders does not exist\r\n");
}

$query = 'DROP TABLE IF EXISTS `orders`';
if(mysqli_query($mysqli,$query)){
    echo nl2br("Table orders has been deleted.\r\n");
}else{
    echo nl2br("Table orders has not been deleted.\r\n");
}

$query = "CREATE TABLE orders(
    order_id int(50) NOT NULL,
    order_number int(10) NOT NULL,
    book_id VARCHAR(50) NOT NULL,
    student_id VARCHAR(50) NOT NULL,
    CONSTRAINT PK_order_id PRIMARY KEY(order_id),
    CONSTRAINT FK_stud_id FOREIGN KEY(student_id) REFERENCES user(student_id),
    CONSTRAINT FK_bk_id FOREIGN KEY(book_id) REFERENCES books(student_id)
)";

if(mysqli_query($mysqli,$query)){
    echo nl2br("Table orders created successfully\r\n");

}else{
    echo nl2br("Error creating table orders: \r\n"). @mysqli_error($mysqli);
} 

//creating new instance of connection
$mysqli = new mysqli('localhost','root','','bookstore');
//opening file stream and reads it only 'r'
$file = fopen("orderData.txt","r");

while(!feof($file)){
    $content = fgets($file);
    //data was separated with ';' in text file
    $carray = explode(";", $content);
    //assingin varibales to table column heading to link data
    list($order_id,$order_number,$book_id,$student_id) = $carray;
    $sql = "insert into `orders`(`order_id`,`order_number`,`book_id`,`student_id`) values('$order_id','$order_number','$book_id','$student_id')";
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