<?php
$conn = mysqli_connect("localhost","root","","rentbuddyproject_db");
    
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM `residense_details` ORDER BY createdat DESC LIMIT 5";
$result = mysqli_query($conn,$sql);
$rows = [];

while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}

$json_data = json_encode($rows);
echo $json_data;

mysqli_close($conn);
?>
