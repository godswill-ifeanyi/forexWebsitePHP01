<?php
session_start();
error_reporting(0);

require_once '../../config/dbcon.php';

if (isset($_POST['purchase'])) { 
    $userID = $_SESSION['sessionid'];
    $planAmount = mysqli_real_escape_string($conn, $_POST['planAmount']);
    $percentage = mysqli_real_escape_string($conn, $_POST['percentage']);
    $planName = mysqli_real_escape_string($conn, $_POST['planName']);
    $planID = mysqli_real_escape_string($conn, $_POST['planID']);
    $planDuration = mysqli_real_escape_string($conn, $_POST['planDuration']);
    $acctBal = mysqli_real_escape_string($conn, $_POST['acctBal']);
    $status = 1;

    $percent = ($planAmount * $percentage) / 100;
    $roi = $planAmount + $percent;

    if ($acctBal >= $planAmount) {
        $newBal = $acctBal - $planAmount;
        $sql1 = "UPDATE users SET acct_bal='$newBal' WHERE id='$userID'";

        $result1 = mysqli_query($conn,$sql1);

        $sql = "INSERT INTO investment (user_id,plan_id,plan_name,plan_amount,plan_duration,acctBal,status,percentage,roi) 
        VALUES ('$userID','$planID','$planName','$planAmount','$planDuration','$acctBal','$status','$percentage','$roi')";

        $result = mysqli_query($conn,$sql);

        if ($result) {
            echo '<script>
            alert("'.$planName.' PURCHASED SUCCESSFULLY");
            window.location="./plans.php";
            </script>';
        } else {
            echo '<script>
            alert("SQL Error");
            window.location="./invest.php?plan='.$planID.'";
            </script>';
        }

    } else {
        echo '<script>
        alert("INSUFFICIENT FUNDS");
        window.location="./invest.php?plan='.$planID.'";
        </script>';
            
    }

}

?>