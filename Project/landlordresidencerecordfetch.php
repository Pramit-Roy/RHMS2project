<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "rentbuddyproject_db");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$un = $_SESSION['usn'];

$sql = "SELECT * FROM residense_details WHERE un ='$un';";
$result = mysqli_query($conn, $sql);
$records = [];

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {  // Corrected function call
        $records[] = $row;
    }
}

echo json_encode($records);

mysqli_close($conn);  // Close the database connection
?>
