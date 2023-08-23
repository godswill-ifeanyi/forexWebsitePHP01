<?php
session_start();
error_reporting(0);

require_once '../../config/dbcon.php';

if (isset($_POST['request'])) {
    $userID = $_SESSION['sessionid'];
    $userEmail = $_SESSION['sessionuser'];
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $details = mysqli_real_escape_string($conn, $_POST['details']);

    $sql = "INSERT INTO requests (user_id,user_email,subject,details) VALUES ('$userID','$userEmail','$subject','$details')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo '<script>
            alert("Sent successfully, an admin will get back to get as soon as possible, thank you for your trust.");
            window.location="./support.php";
            </script>';
        } else {
            echo '<script>
            alert("SQL Error");
            window.location="./support.php";
            </script>';
        }

}