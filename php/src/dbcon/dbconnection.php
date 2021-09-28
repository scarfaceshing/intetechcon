<?php
$localhost = "localhost";
$username = "user";
$password = "password2";
$database = "dadb";
 
// Create connection and Check connection
// if(!$con = mysqli_connect($localhost, $username, $password) or die("Error in connection!"));
// mysqli_select_db($con, $database ) or die("Could not select database");

$conn = new mysqli($localhost, $username, $password, $database);

if ($conn) {
    echo "Connected";
} else {
    echo "Not Connected";
}
?>
