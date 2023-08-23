<?php
session_start();
error_reporting(0);

require_once '../../config/dbcon.php';

if (isset($_POST['submit'])) {
    $userID = $_SESSION['sessionid'];
    $userEmail = $_SESSION['sessionuser'];
    $referrerID = mysqli_real_escape_string($conn, $_POST['referrerID']);

    $sql = "INSERT INTO referrals (user_id,user_email,referrer_id) VALUES ('$userID','$userEmail','$referrerID')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script>
        alert("Submit Successfully.");
        window.location="./referrals.php";
        </script>';
    } else {
        echo '<script>
        alert("SQL Error");
        window.location="./referrals.php";
        </script>';
    }
}