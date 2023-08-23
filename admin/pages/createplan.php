<?php
session_start();

if (!isset($_SESSION['sessionuser'])) {
    header("location:../login.php");
} elseif ($_SESSION['sessionusertype'] != 'admin') {
    header("location:../login.php"); 
} 

require_once '../../config/dbcon.php';

if (isset($_POST['createPlan'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);
    $percentage = mysqli_real_escape_string($conn, $_POST['percentage']);
    $icon = mysqli_real_escape_string($conn, $_POST['icon']);

    $sql = "INSERT INTO products (name,amount,percentage,image) VALUES ('$name','$amount','$percentage','$icon')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo '<script>
            alert("Plan Created Successfully");
            window.location="./plans.php";
            </script>';
        } else {
            echo '<script>
            alert("SQL Error");
            window.location="./plans.php";
            </script>';
        }
}