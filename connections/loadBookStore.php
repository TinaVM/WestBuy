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

 //--DELETION AND CREATION OF USER TABLE

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
    mysqli_query($mysqli,$sql);
    
//--REMOVING UNNECESSARY NOTICE ERROR DUE TO CODE PRODUCING DESIRED RESULTS
//SOURCE: https://phoenixnap.com/kb/php-error-reporting
    error_reporting(0);
} 
fclose($file);
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
    
} 

$qEdit = "UPDATE `admin` SET `password` = 'admin123' WHERE `admin`.`admin_id` = 'L10910500'";
mysqli_query($mysqli,$qEdit);

fclose($file);

//--BOOKS TABLE DELETION AND CREATION

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
    
} 
fclose($file);

//--CREATION AND DELETION OF ORDER TABLE

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
    
} 
fclose($file);


//--CREATION AND DELETION OF RECEIPT TABLE

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

//Creating the searchbooks table

if($result = mysqli_query($mysqli,"SHOW TABLES FROM bookstore LIKE '%searchbooks%'")){
    if(mysqli_num_rows($result) == 1){
        echo nl2br("Table searchbooks exists\r\n");
    }
}else{
    echo nl2br("Table searchbooks does not exist\r\n");
}

$query = 'DROP TABLE IF EXISTS `searchbooks`';
if(mysqli_query($mysqli,$query)){
    echo nl2br("Table searchbooks has been deleted.\r\n");
}else{
    echo nl2br("Table searchbooks has not been deleted.\r\n");
}

$query = "CREATE TABLE searchbooks(
    SBid INT(10) NOT NULL,
    title VARCHAR(100) NOT NULL,
    author VARCHAR(100) NOT NULL,
    price int(10) NOT NULL,
    CONSTRAINT PK_sbid PRIMARY KEY(SBid)
)";

if(mysqli_query($mysqli,$query)){
    echo nl2br("Table searchbooks created successfully\r\n");

}else{
    echo nl2br("Error creating table searchbooks: \r\n"). @mysqli_error($mysqli);
} 

$mysqli = new mysqli('localhost','root','','bookstore');

$file = fopen("searchbooksData.txt","r");

while(!feof($file)){
    $content = fgets($file);
    //data was separated with ';' in text file
    $carray = explode(";", $content);
    //assingin varibales to table column heading to link data
    list($SBid,$title,$author,$price) = $carray;
    $sql = "insert into `searchbooks`(`SBid`,`title`,`author`,`price`) values('".$SBid."','".$title."','".$author."','".$price."')";
    //Displays/sorta file contents into array
    @mysqli_query($mysqli,$sql);
    //--REMOVING UNNECESSARY NOTICE ERROR DUE TO CODE PRODUCING DESIRED RESULTS
//SOURCE: https://phoenixnap.com/kb/php-error-reporting
error_reporting(0);
}
fclose($file);

//Closing the connection
@mysqli_close($mysqli);
?>
