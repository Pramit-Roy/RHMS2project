<?php
    $conn = mysqli_connect("localhost","root","","rentbuddyproject_db");
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $fn = $_POST["fname"]; 
    $mn = $_POST["mname"]; 
    $ln = $_POST["lname"];
    $email = $_POST["email"];
    $phno = $_POST["phno"];
    $acno = $_POST["acno"];
    $un = $_POST["username"];
    $pass = $_POST["password"];
    $result2 = $result3 = "";

    $stmt2 = "SELECT * FROM `land_lord_lady_details` WHERE `username` = '$un';";
    $result2 = mysqli_query($conn,$stmt2);

    if ($result2 && (mysqli_num_rows($result2) > 0)) {
        echo "<script>alert('This Username is taken. Please try somthing else.'); window.location.href = 'landlordsignuppage.html';</script>";
    }

    $stmt3 = "SELECT * FROM `land_lord_lady_details` WHERE `acno` = '$acno';";
    $result3 = mysqli_query($conn,$stmt3);

    if ($result3 && (mysqli_num_rows($result3) > 0)) {
        echo "<script>alert('This Aadhar Card holder already exist in rentbuddy.'); window.location.href = 'landlordsignuppage.html';</script>";
    }
    
    $stmt = "INSERT INTO `land_lord_lady_details` (`fname`, `mname`, `lname`, `email`, `phno`, `acno`, `username`, `password`) VALUES ('$fn', '$mn', '$ln', '$email', '$phno', '$acno', '$un', '$pass');";
    
    $result = mysqli_query($conn,$stmt);
    
    if($result){
        echo "<script>alert('You have signed-up with rentbuddy. Now log-in with your account.'); window.location.href = 'landlordloginpage.html';</script>";
    }
    else {
        echo "Error: " . mysqli_error($conn);
    }
?>