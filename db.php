<?php

//Your Mysql Config
$servername = "us-cdbr-iron-east-04.cleardb.net";
$username = "bb56df46aaa6c7";
$password = "12df3dfb";
$dbname = "heroku_0139983e98b2932";

//Create New Database Connection
$conn = new mysqli($servername, $username, $password, $dbname);

//Check Connection
if($conn->connect_error) {
	die("Connection Failed: ". $conn->connect_error);
}