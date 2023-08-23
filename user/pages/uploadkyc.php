<?php
session_start();
require_once '../../config/dbcon.php';

if (isset($_POST['upload'])) {
    $userID = $_SESSION['sessionid'];
    $userEmail = $_SESSION['sessionuser'];
    $status = 0;
    
    $image = $_FILES['image']['name'];

    $path = "../../uploads";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);

    $filename = time().'.'.$image_ext;

    $sql = "INSERT INTO kyc (user_id,user_email,user_document,status)
    VALUES ('$userID','$userEmail','$filename','$status')";

    $result = mysqli_query($conn, $sql);
    

    if ($result) {
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);

        echo '
        <script>
        alert("Uploaded Successfully");
        window.location.href="kyc.php";
        </script>';
        
    } else {
        echo '
        <script>
        alert("SQL Error");
        window.location.href="kyc.php";
        </script>';
    }
}