<?php

session_start();

$conn = mysqli_connect("localhost","root","","rentbuddyproject_db");
    
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$un = $_SESSION['usn'];

$stmt1 = "DELETE FROM `land_lord_lady_details` WHERE `land_lord_lady_details`.`username` = '$un';";
$stmt2 = "DELETE FROM `residense_details` WHERE `residense_details`.`un` = '$un';";

$result1 = mysqli_query($conn,$stmt1);
$result2 = mysqli_query($conn,$stmt2);

if ($result1) {
    echo "<script>alert('You have successfully deleted your account. Thank you for your trust and support. Wishing you all the best on your journey ahead!');window.location.href = 'homepage.html';</script>";
} else {
    echo "<script>alert('Oops! Something went wrong. Please try again.');window.location.href = 'Account.php';</script>";
}


?>