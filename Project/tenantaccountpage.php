<?php
    session_start();
    $conn = mysqli_connect("localhost","root","","rentbuddyproject_db");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $un = $_SESSION['tusn'];
    // $un = '@pramit';
    $stmt = "SELECT * FROM `tenant_details` WHERE `username` = '$un';";
    $result = mysqli_query($conn,$stmt);
        
    if (mysqli_num_rows($result)>0) {
        $row = mysqli_fetch_assoc($result); 
    }
    else {
        echo "Oops! Something went wrong.";
    }
    // echo "<pre>";
    echo json_encode($row);
    // echo "</pre>";
    mysqli_close($conn);
?>