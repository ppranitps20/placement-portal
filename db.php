<?php

//Your Mysql Config
$servername = "localhost";
$username = "root";
$password = "y10e140pp4585";
$dbname = "job";

//Create New Database Connection
$conn = new mysqli($servername, $username, $password, $dbname);

//Check Connection
if($conn->connect_error) {
	die("Connection Failed: ". $conn->connect_error);
}