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

if($result = mysqli_query($mysqli,"SHOW TABLES FROM bookstore LIKE '%books%'")){
    if(mysqli_num_rows($result) == 1){
        echo nl2br("Table books exists\r\n");
    }
}else{
    echo nl2br("Table books does not exist\r\n");
}

$query = 'DROP TABLE IF EXISTS `books`';
if(mysqli_query($mysqli,$query)){
    echo nl2br("Table books has been deleted.\r\n");
}else{
    echo nl2br("Table books has not been deleted.\r\n");
}

$query = "CREATE TABLE books(
    book_id VARCHAR(50) NOT NULL,
    title VARCHAR(100) NOT NULL,
    author VARCHAR(100) NOT NULL,
    year int(10) NOT NULL,
    book_condition varchar(10) not null,
    price int(10) NOT NULL,
    user_id VARCHAR(50) NOT NULL,
    CONSTRAINT PK_book_id PRIMARY KEY(book_id),
    CONSTRAINT FK_st_id FOREIGN KEY(user_id) REFERENCES user(user_id)
)";

if(mysqli_query($mysqli,$query)){
    echo nl2br("Table books created successfully\r\n");

}else{
    echo nl2br("Error creating table books: \r\n"). @mysqli_error($mysqli);
} 

//creating new instance of connection
$mysqli = new mysqli('localhost','root','','bookstore');
//opening file stream and reads it only 'r'
$file = fopen("bookData.txt","r");

while(!feof($file)){
    $content = fgets($file);
    //data was separated with ';' in text file
    $carray = explode(";", $content);
    //assingin varibales to table column heading to link data
    list($book_id,$title,$author,$year,$book_condition,$price,$user_id) = $carray;
    $sql = "insert into `books`(`book_id`,`title`,`author`,`year`,`book_condition`,`price`,`user_id`) values('$book_id','$title','$author','$year','$book_condition','$price','$user_id')";
    //Displays/sorta file contents into array
    mysqli_query($mysqli,$sql);
    //--REMOVING UNNECESSARY NOTICE ERROR DUE TO CODE PRODUCING DESIRED RESULTS
//SOURCE: https://phoenixnap.com/kb/php-error-reporting
error_reporting(0);
} 
fclose($file);

//Closing the connection
mysqli_close($mysqli)

?>