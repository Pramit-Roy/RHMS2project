<?php

session_start();

$conn = mysqli_connect("localhost","root","","rentbuddyproject_db");
    
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$un = $_SESSION['tusn'];

$stmt = "DELETE FROM `tenant_details` WHERE `username` = '$un';";

$result = mysqli_query($conn,$stmt);

if ($result) {
    echo "<script>alert('You have successfully deleted your account. Thank you for your trust and support. Wishing you all the best on your journey ahead!');window.location.href = 'homepage.html';</script>";
} else {
    echo "<script>alert('Oops! Something went wrong. Please try again.');window.location.href = 'tenantaccount.php';</script>";
}


?>