<?php
    session_start();
    $conn = mysqli_connect("localhost","root","","rentbuddyproject_db");
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $un = $_POST["username"];
    $pass = $_POST["password"];
    $_SESSION['tusn'] = $un;

    $stmt = "SELECT * FROM `tenant_details` WHERE username = '$un';";

    $result = mysqli_query($conn,$stmt);
    
    $result = mysqli_query($conn, $stmt);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $storedPassword = $row["password"];

        if ($pass == $storedPassword) {
            header("Location: tenanthomepage.html");
            exit();
        } else {
            echo "<script>alert('Incorrect Password. Please try again.');window.location.href='tenantloginpage.html';</script>";
        }
    } else {
        echo "<script>alert('Username not found. Please check your username.');window.location.href='tenantloginpage.html';</script>";
    }
} else {
    echo "Error: " . mysqli_error($conn);
}


?>