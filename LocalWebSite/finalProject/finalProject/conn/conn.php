<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_forum";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

//Check connection
if ($conn->error) {
	die("Connection failed: " . $conn->connect_error . "/br/n Try again later.");
}

mysqli_query($conn, "set names utf-8");	
?>