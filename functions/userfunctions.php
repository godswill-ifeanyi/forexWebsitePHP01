<?php


function getAllActive($table) {
    global $conn;
    $query = "SELECT * FROM $table WHERE status='1' ORDER BY id DESC";
    return $query_run = mysqli_query($conn, $query);

}


function getAll($table) {
    global $conn;
    $query = "SELECT * FROM $table";
    return $query_run = mysqli_query($conn, $query);

}

function getAllPending($table) {
    global $conn;
    $query = "SELECT * FROM $table WHERE status = 0";
    return $query_run = mysqli_query($conn, $query);

}

function getAllConfirmed($table) {
    global $conn;
    $query = "SELECT * FROM $table WHERE status = 1";
    return $query_run = mysqli_query($conn, $query);

}

function getActivePlan($id) {
    global $conn;
    $query = "SELECT * FROM investment WHERE user_id ='$id' AND status=1";
    return $query_run = mysqli_query($conn, $query);

}

function getReferrals($id) {
    global $conn;
    $query = "SELECT * FROM referrals WHERE user_id ='$id' LIMIT 1";
    return $query_run = mysqli_query($conn, $query);

}

function getTotalPlans() {
    global $conn;
    $query = "SELECT * FROM products";
    return $query_run = mysqli_query($conn, $query);
}

function getTotalInvestments() {
    global $conn;
    $query = "SELECT * FROM investment WHERE status=1";
    return $query_run = mysqli_query($conn, $query);
}

function getTotalDeposits() {
    global $conn;
    $query = "SELECT * FROM deposit WHERE status=0";
    return $query_run = mysqli_query($conn, $query);
}

function getTotalSupport() {
    global $conn;
    $query = "SELECT * FROM requests WHERE status=0";
    return $query_run = mysqli_query($conn, $query);
}

function getTotalWithdrawal() {
    global $conn;
    $query = "SELECT * FROM withdrawal WHERE status=0"; 
    return $query_run = mysqli_query($conn, $query);
}

function getTotalKYC() {
    global $conn;
    $query = "SELECT * FROM kyc WHERE status=0"; 
    return $query_run = mysqli_query($conn, $query);
}

function progressTrack() {
    global $conn;
    $query = "SELECT CONCAT(users.firstname,' ',users.lastname) AS name, users.id, email, plan_name, roi, status FROM users INNER JOIN investment 
    ON users.id = investment.user_id";
    return $query_run = mysqli_query($conn, $query);
}

function progressTrack1() {
    global $conn;
    $query = "SELECT CONCAT(users.firstname,' ',users.lastname) AS name, users.id, users.email, investment.id as iid, investment.plan_name, investment.roi, status, created_at FROM users INNER JOIN investment 
    ON users.id = investment.user_id";
    return $query_run = mysqli_query($conn, $query);
}

function getAllPopular() {
    global $conn;
    $query = "SELECT * FROM categories WHERE popular='1' ORDER BY id DESC LIMIT 3";
    return $query_run = mysqli_query($conn, $query);

}

function checkKYC($id) {
    global $conn;
    $query = "SELECT * FROM kyc WHERE user_id='$id' ORDER BY id DESC LIMIT 1";
    return $query_run = mysqli_query($conn, $query);

}

function getProduct($id) {
    global $conn;
    $query = "SELECT * FROM products WHERE id = '$id'";
    return $query_run = mysqli_query($conn, $query);
}

function getUsers($id) {
    global $conn;
    $query = "SELECT * FROM users WHERE id = '$id'";
    return $query_run = mysqli_query($conn, $query);
}

function getByID($table, $id) {
    global $conn;
    $query = "SELECT * FROM $table WHERE id = '$id'";
    return $query_run = mysqli_query($conn, $query);

}
function getCartItems() {
    global $conn;
    $user_id = $_SESSION['auth_user']['user_id'];
    $query = "SELECT c.id as cid, c.prod_id, c.prod_qty, p.id as pid, p.name, p.image, p.selling_price 
    FROM carts c, products p WHERE c.prod_id=p.id AND user_id='$user_id' ORDER BY c.id DESC";
    return $query_run = mysqli_query($conn, $query);
}

function getDeposit() {
    global $conn;
    $user_id = $_SESSION['sessionid'];

    $query = "SELECT * FROM deposit WHERE user_id='$user_id' AND status = 1 ORDER BY id DESC ";
    return $query_run = mysqli_query($conn, $query);
}

function getWithdrawal() {
    global $conn;
    $user_id = $_SESSION['sessionid'];

    $query = "SELECT * FROM withdrawal WHERE user_id='$user_id' AND status = 1 ORDER BY id DESC ";
    return $query_run = mysqli_query($conn, $query);
}

?>  