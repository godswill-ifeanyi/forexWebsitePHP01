<?php

$dbHost = "localhost";
$dbUser = "idmegatr_forex";
$dbPass = "##Pass22word##";
$dbName = "idmegatr_forex";

$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

if (!$conn) {
    die("Database Connection Failed!".mysqli_connect_error());
}
?>