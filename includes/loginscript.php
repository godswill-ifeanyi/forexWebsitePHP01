<?php

if (isset($_POST['submit'])) {
    require_once '../config/dbcon.php';

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (empty($email) || empty($password)) {
        echo '<script>
                alert("Empty Fields");
                window.location="../account/login.php";
                </script>';
        exist();
    } else {
        $sql = "SELECT * FROM users WHERE  email = ?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo '<script>
                alert("SQL Error");
                window.location="../account/login.php";
                </script>';
            exist();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                $passCheck = password_verify($password, $row['password']);
                if ($passCheck == false) {
                    echo '<script>
                alert("Wrong Password");
                window.location="../account/login.php"; 
                </script>';
                    exist();
                } elseif ($passCheck == true) {
                    session_start();
                    $_SESSION['auth'] = true;

                    $_SESSION['auth_user'] = [
                        'user_id' => $row['id'],
                        'email' => $row['email']
                    ];
                    $_SESSION['sessionid'] = $row['id'];
                    $_SESSION['sessionuser'] = $row['email'];
                    $_SESSION['sessionname'] = $row['firstname'];
                    $_SESSION['sessionusertype'] = $row['usertype'];

                    if ($row['usertype'] == 'admin') {
                        echo '<script>
                        alert("Login Successful");
                        window.location="../admin/index.php"; 
                        </script>';
                    exist();
                    } else if ($row['usertype'] == 'user') {
                        echo '<script>
                        alert("Login Successful");
                        window.location="../user/index.php"; 
                        </script>';
                    } else {
                        header("location: ../index.php");
                    }
                } else {
                    echo '<script>
                alert("Wrong Password");
                window.location="../account/login.php";
                </script>';
                    exist();
                }

            } else {
                echo '<script>
                alert("No user found");
                window.location="../account/login.php";
                </script>';
                exist();
            }
        }
    }

} else {
    echo '<script>
                alert("Forbidden access");
                window.location="../account/login.php";
                </script>';
    exist();
}

?>
