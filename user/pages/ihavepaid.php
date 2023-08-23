<?php
session_start();
error_reporting(0);

require_once '../../config/dbcon.php';

if (isset($_POST['ihavepaid'])) {
    $userID = $_SESSION['sessionid'];
    $userEmail = $_SESSION['sessionuser'];
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);
    $acctBal = mysqli_real_escape_string($conn, $_POST['acctBal']);

    $sql = "INSERT INTO deposit (user_id,user_email,amount,acct_bal) VALUES ('$userID','$userEmail','$amount','$acctBal')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script>
        alert("You will be credited as soon as the deposit is confirmed, thank you for your trust.");
        window.location="./deposit.php";
        </script>';
    } else {
        echo '<script>
        alert("SQL Error");
        window.location="./deposit.php";
        </script>';
    }
}

?>