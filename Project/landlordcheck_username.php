<?php
$conn = mysqli_connect("localhost", "root", "", "rentbuddyproject_db");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];

    $stmt = $conn->prepare("SELECT * FROM land_lord_lady_details WHERE username = ?");
    $stmt->bind_param("s", $username);
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
