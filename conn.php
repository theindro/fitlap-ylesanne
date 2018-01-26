<?php
/**
 * Created by PhpStorm.
 * User: indro
 * Date: 26.01.2018
 * Time: 13:42
 */

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fitlap_owapi";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

