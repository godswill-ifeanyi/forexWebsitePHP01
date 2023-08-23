<?php

session_start();

if (!isset($_SESSION['sessionuser'])) {
    header("location:../login.php");
} elseif ($_SESSION['sessionusertype'] != 'admin') {
    header("location:../login.php"); 
} 

require_once '../../config/dbcon.php';

$id = $_GET['id'];
$plan = $_GET['plan'];


$sql = "DELETE FROM users WHERE id='$id'";
$result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script>
        alert("User delete successful");
        window.location="./users.php";
        </script>';
    } else {
        echo '<script>
        alert("SQL Error");
        window.location="./users.php";
        </script>';
    }

