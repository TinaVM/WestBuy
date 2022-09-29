<?php 
    include 'DBConn.php';

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

//creating new instance of connection
$mysqli = new mysqli('localhost','root','','bookstore');
//opening file stream and reads it only 'r'

/*$file = new SplFileObject('searchbooksData.txt');
while(!$file->eof()){
    $line = $file -> fgets();
    list($title,$author,$price) = explode(';',$line);
    $sth = $mysqli->prepare('INSERT INTO searchbooks values(NULL,?,?,?)');
    $sth->bindValue(1,$title,PDO::PARAM_STR);
}*/
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
mysqli_close($mysqli)
?>