<?php
include('config.php');
session_start();

if(!isset($_SESSION["email"])){
    header('Location: login.php');
    exit();
}

$sess_email = $_SESSION["email"];
$sql = "SELECT user_id, firstname, lastname, email, profile_path FROM users WHERE email = '$sess_email'";
$result = $con->query($sql);

if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $userid = $row["user_id"];
        $firstname = $row["firstname"];
        $lastname = $row["lastname"];
        $username = $firstname . " " . $lastname;
        $useremail = $row["email"];
        $userprofile = "uploads/" . $row["profile_path"];
    }
} else {
    // Fallback default values
    $userid = "GHX1Y2";
    $username = "John Doe";
    $useremail = "mailid@domain.com";
    $userprofile = "uploads/default_profile.png";
}
?>
