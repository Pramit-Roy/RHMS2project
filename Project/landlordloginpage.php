<?php
    session_start();
    $conn = mysqli_connect("localhost","root","","rentbuddyproject_db");
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $un = $_POST["username"];
    $pass = $_POST["password"];
    $_SESSION['usn'] = $un;

    $stmt = "SELECT * FROM `land_lord_lady_details` WHERE username = '$un';";

    $result = mysqli_query($conn,$stmt);
    
    if($result){
        $row = mysqli_fetch_assoc($result);
        
            if ($row) {
                $storedPassword = $row["password"];
        
                if ($pass == $storedPassword) {
                    header("Location: landlordhomepage.html");
                    exit();
                } else {
                    echo "<script>alert('Incorrect Password. Please try again.');window.location.href = 'landlordloginpage.html';</script>";
                }
            } else {
                echo "<script>alert('Username not found. Please check your username.');window.location.href = 'landlordloginpage.html';</script>";
            }
    }
    else {
        echo "Error: " . mysqli_error($conn);
    }

?>