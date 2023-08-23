<?php
session_start();
error_reporting(0);

require_once '../../config/dbcon.php';

if (isset($_POST['collect'])) {
    $userID = $_SESSION['sessionid'];
    $earnings = $_POST['earnings'];
    $acct_bal = $_POST['acct_bal'];

    $newBal = $acct_bal + $earnings;
    $newRef = 0;
    
    if ($earnings > 0) {
        $sql = "UPDATE users SET ref_earnings='$newRef', acct_bal='$newBal' WHERE id='$userID'";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo '<script>
            alert("Earnings collected successfully.");
            window.location="./referrals.php";
            </script>';
        } else {
            echo '<script>
            alert("SQL Error");
            window.location="./referrals.php";
            </script>';
        }
    } else {
        echo '<script>
            alert("No earnings available");
            window.location="./referrals.php";
            </script>';
    }

}