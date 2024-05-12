<?php
$conn = mysqli_connect("localhost", "root", "", "rentbuddyproject_db");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $acno = $_POST["acno"];

    $stmt = $conn->prepare("SELECT * FROM land_lord_lady_details WHERE acno = ?");
    $stmt->bind_param("s", $acno);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "taken"; // Username already exists
    } else {
        echo "available"; // Username is available
    }

    $stmt->close();
}

$conn->close();
?>
