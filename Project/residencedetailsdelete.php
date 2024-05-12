<?php

$conn = mysqli_connect("localhost","root","","rentbuddyproject_db");
    
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

  if (isset($_GET['value'])) {
    $receivedValue = $_GET['value'];
    // echo "$receivedValue";
    $stmt = "DELETE FROM `residense_details` WHERE `residense_details`.`rid` = $receivedValue;";
    $result = mysqli_query($conn,$stmt);
    if ($result) {
        echo "<script>alert('Residence details have been deleted successfully.');window.location.href = 'landlordhomepage.html';</script>";
    }
    else {
        echo "<script>alert('Oops! Something went wrong.');window.location.href = 'landlordhomepage.html';</script>";
    }
  }
?>