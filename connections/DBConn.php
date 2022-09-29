<?php
//Creating connection to MySQL Database using PHP
//SOURCE: https://www.alphacodingskills.com/mysqli/mysqli-connection.php
//Declaring database credentials
$servername = "localhost"; //Did not include :8080 for a successful connection as it refused previous time
$username = "root";
$password = "";
$dbname = "bookstore";

//Making the connection
$mysqli = mysqli_connect($servername, $username, $password, $dbname);

//checking if the connection works
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL: ". mysqli_connect_error();
    exit();
}
echo "Connected successfully.";

//Closing the connection
mysqli_close($mysqli);


?>