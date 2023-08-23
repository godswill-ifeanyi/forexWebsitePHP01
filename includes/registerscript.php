<?php

if (isset($_POST['submit'])) {
    require_once '../config/dbcon.php';

    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirmPass = mysqli_real_escape_string($conn, $_POST['cpassword']);
    $ref = $_SERVER['SERVER_NAME'].rand(1111,9999); 

    if (empty($firstname) || empty($lastname) || empty($email) || empty($country) || empty($phone) || empty($password) || empty($confirmPass)) {
        echo '<script>
        alert("Empty Fields");
        window.location="../account/register.php";
        </script>';
        exist();
    } elseif ($password !== $confirmPass) {
        echo '<script>
        alert("Passwords do not match");
        window.location="../account/register.php";
        </script>';
        exist();
    } else {
        $sql = "SELECT email FROM users WHERE  email = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo '<script>
        alert("SQL Error");
        window.location="../account/register.php";
        </script>';
            exist();
        } else {    
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $rowCount = mysqli_stmt_num_rows($stmt);

            if ($rowCount > 0) {
                echo '<script>
            alert("Email taken");
            window.location="../account/register.php";
            </script>';
                exist(); 
            } else {
                $sql = "INSERT INTO users (firstname, lastname, country, email, phone, password, ref_code) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo '<script>
                alert("SQL Error");
                window.location="../account/register.php";
                </script>';
                    exist();
                } else {
                    $hashedPass = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sssssss", $firstname, $lastname, $country, $email, $phone, $hashedPass, $ref);
                    mysqli_stmt_execute($stmt);
                    echo '<script>
                alert("Congratulations! Your account is ready, login to continue...");
                window.location="../account/login.php";
                </script>';
                    exist();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    echo '<script>
                alert("Forbidden access");
                window.location="../account/register.php";
                </script>';
    exist();
}
?>


