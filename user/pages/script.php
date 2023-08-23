<?php
session_start();
error_reporting(0);
require_once '../../config/dbcon.php';

$userid = $_SESSION['sessionid'];

if (isset($_POST['updateProfile'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

$query = "UPDATE users SET firstname = '$firstname',lastname = '$lastname',
email = '$email',phone = '$phone' WHERE id = '$userid' ";

if (empty($firstname) || empty($lastname) || empty($email) || empty($phone)) {
    echo '<script>
    alert("Do not keep any field empty");
    window.location="profile.php";
    </script>';
} else {
    $result2 = mysqli_query($conn, $query);
    
    if ($result2) {
        echo '<script>
        alert("Profile update successful");
        window.location="profile.php";
        </script>';
    }
} 
}

else if (isset($_POST['updateContact'])) {
    $address = $_POST['address'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $postalCode = $_POST['postalCode'];

    $query1 = "UPDATE users SET address = '$address',city = '$city',
    country = '$country',postal_code = '$postalCode' WHERE id = '$userid' ";

    if (empty($address) || empty($city) || empty($country) || empty($postalCode)) {
        echo '<script>
        alert("Do not keep any field empty");
        window.location="profile.php";
        </script>';
    } else {
        $result3 = mysqli_query($conn, $query1);
        
        if ($result3) {
            echo '<script>
            alert("Contact update successful");
            window.location="profile.php";
            </script>';
        }
    } 
}

else if (isset($_POST['updateAbout'])) {
    $aboutMe = $_POST['aboutMe'];

    $query1 = "UPDATE users SET about_me = '$aboutMe' WHERE id = '$userid' ";

    if (empty($aboutMe)) {
        echo '<script>
        alert("Do not keep field empty");
        window.location="profile.php";
        </script>';
    } else {
        $result3 = mysqli_query($conn, $query1);
        
        if ($result3) {
            echo '<script>
            alert("About update successful");
            window.location="profile.php";
            </script>';
        }
    } 
}

else if (isset($_POST['updatePass'])) {

    $sql = "SELECT * FROM users WHERE id='$userid'";
    $result = mysqli_query($conn, $sql);
    $info = mysqli_fetch_array($result);

    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];
    $passCheck = password_verify($oldPassword, $info['password']);

    if ($passCheck) {

        if (empty($oldPassword) || empty($newPassword) || empty($confirmPassword)) {
            echo '<script>
            alert(Do not keep any field empty);
            window.location="profile.php";
            </script>';
        } elseif ($newPassword != $confirmPassword) {
            echo '<script>
            alert(New password do not match);
            window.location="profile.php";
            </script>';
        }else {
            $hashPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $query2 = "UPDATE users SET password = '$hashPassword' WHERE id = '$userid' ";
            $result3 = mysqli_query($conn, $query2);
        
            if ($result3) {
                echo '<script>
                alert("Password update successful");
                window.location="profile.php";
                </script>';
            }
        }
    } else {
        echo '<script>
            alert(Old password incorrect);
            window.location="profile.php";
            </script>';
    }
}
