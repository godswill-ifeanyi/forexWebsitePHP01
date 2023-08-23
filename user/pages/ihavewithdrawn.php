<?php
session_start();
error_reporting(0);

require_once '../../config/dbcon.php';

if (isset($_POST['withdraw'])) {
    $userID = $_SESSION['sessionid'];
    $userEmail = $_SESSION['sessionuser'];
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);
    $bal = mysqli_real_escape_string($conn, $_POST['bal']);
    $wallet = mysqli_real_escape_string($conn, $_POST['wallet']);

    if ($amount <= $bal) {
        $newBal = $bal - $amount;
        $sql1 = "UPDATE users SET acct_bal='$newBal' WHERE id='$userID'";

        $result1 = mysqli_query($conn,$sql1);

        $sql = "INSERT INTO withdrawal (user_id,user_email,amount,wallet) VALUES ('$userID','$userEmail','$amount','$wallet')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo '<script>
            alert("You will be credited as soon as the deposit is confirmed, thank you for your trust.");
            window.location="./withdrawal.php";
            </script>';
        } else {
            echo '<script>
            alert("SQL Error");
            window.location="./withdrawal.php";
            </script>';
        }
    } else {
        echo '<script>
            alert("Insufficient balance");
            window.location="./withdrawal.php";
            </script>';
    }
}
?>