<?php
session_start();

if (!isset($_SESSION['sessionuser'])) {
    header("location:../login.php");
} elseif ($_SESSION['sessionusertype'] != 'admin') {
    header("location:../login.php"); 
} 

require_once '../../config/dbcon.php';
$userid = $_SESSION['sessionid'];

if (isset($_POST['updatePlan'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $amount = $_POST['amount'];
    $icon = $_POST['icon'];
    $percentage = $_POST['percentage'];
    $status = isset($_POST['status']) ? '1':'0';

    $sql = "UPDATE products SET name='$name', amount='$amount', image='$icon', percentage='$percentage' 
    WHERE id = '$id' ";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '
        <script>
        alert("Updated Successfully");
        window.location.href="editplan.php?id='.$id.'";
        </script>';
    } else {
        echo '
        <script>
        alert("SQL Error");
        window.location.href="editplan.php?id='.$id.'";
        </script>';
    }
} else if (isset($_GET['deposit'])) {
    
        $id = $_GET['deposit'];
        $amount = $_GET['amount'];
        $user_id = $_GET['user_id'];
    
        $sql = "UPDATE deposit SET status=1 WHERE id='$id'";
    
        $result = mysqli_query($conn, $sql);

        $sql1 = "SELECT * FROM deposit WHERE user_id='$user_id'";
        $result1 = mysqli_query($conn, $sql1);
        $oldBal = mysqli_fetch_array($result1);
        $newBal = $oldBal['acct_bal'] + $amount;
        
        $sql2 = "UPDATE users SET acct_bal='$newBal' WHERE id='$user_id'";

        $result3 = mysqli_query($conn, $sql2);
    
        if ($result) {
            echo '
            <script>
            alert("Deposit confirmation successful and user has been credited.");
            window.location.href="deposit.php";
            </script>';
        } else {
            echo '
            <script>
            alert("SQL Error");
            window.location.href="deposit.php";
            </script>';
        }
}

else if (isset($_GET['uid'])) {
    
    $userid = $_GET['uid'];
    $investmentid = $_GET['iid'];
    $amount = $_GET['amount'];

    $sql = "SELECT * FROM users WHERE id='$userid'";

    $result = mysqli_query($conn, $sql);

    $oldBal = mysqli_fetch_array($result);
    $newBal = $oldBal['acct_bal'] + $amount;
    
    #$sql2 = "UPDATE investment SET status=0 WHERE id='$investmentid' AND user_id='$userid'";

    #$result3 = mysqli_query($conn, $sql2);

    $sql3 = "UPDATE users SET acct_bal='$newBal' WHERE id='$userid'";

    $result4 = mysqli_query($conn, $sql3);

    if ($result4) {
        echo '
        <script>
        alert("User successfully credited.");
        window.location.href="investment.php";
        </script>';
    } else {
        echo '
        <script>
        alert("SQL Error");
        window.location.href="investment.php";
        </script>';
    }
}

if (isset($_GET['uidd'])) {
    
    $userid = $_GET['uidd'];
    $investmentid = $_GET['iid'];

    $sql2 = "UPDATE investment SET status=0 WHERE id='$investmentid' AND user_id='$userid'";

    $result3 = mysqli_query($conn, $sql2);
    
    $sql3 = "DELETE FROM investment WHERE id='$investmentid' AND user_id='$userid'";

    $result4 = mysqli_query($conn, $sql3);

    if ($result4) {
        echo '
        <script>
        alert("Investment successfully deleted.");
        window.location.href="investment.php";
        </script>';
    } else {
        echo '
        <script>
        alert("SQL Error");
        window.location.href="investment.php";
        </script>';
    }
}

else if (isset($_GET['withdrawal'])) {
    
    $id = $_GET['withdrawal'];

    $sql = "UPDATE withdrawal SET status=1 WHERE id='$id'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '
        <script>
        alert("Withdrawal confirmation successful and user will be notified.");
        window.location.href="withdrawal.php";
        </script>';
    } else {
        echo '
        <script>
        alert("SQL Error");
        window.location.href="withdrawal.php";
        </script>';
    }
}

else if (isset($_GET['kyc'])) {
    
    $id = $_GET['kyc'];

    $sql = "UPDATE kyc SET status=1 WHERE id='$id'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '
        <script>
        alert("KYC confirmation successful and user will be notified.");
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

else if (isset($_GET['support'])) {
    
    $id = $_GET['support'];

    $sql = "UPDATE requests SET status=1 WHERE id='$id'";
 
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '
        <script>
        alert("Request confirmation successful and user will be notified.");
        window.location.href="support.php";
        </script>';
    } else {
        echo '
        <script>
        alert("SQL Error");
        window.location.href="support.php";
        </script>';
    }
}

else if (isset($_POST['updateProfile'])) {
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