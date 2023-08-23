<?php

session_start();

if (!isset($_SESSION['sessionuser'])) {
    header("location:../login.php");
} elseif ($_SESSION['sessionusertype'] != 'admin') {
    header("location:../login.php"); 
} 

require_once '../../config/dbcon.php';

$id = $_GET['id'];

$sql = "DELETE FROM products WHERE id='$id'";
$result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script>
        alert("Plan delete successful");
        window.location="./plans.php";
        </script>';
    } else {
        echo '<script>
        alert("SQL Error");
        window.location="./plans.php";
        </script>';
    }
