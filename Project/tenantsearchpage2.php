<?php

$conn = mysqli_connect("localhost","root","","rentbuddyproject_db");
    
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$formData = [
    'rname' => $_POST['name'],
    'colony' => $_POST['colony'],
    'strvill' => $_POST['strvill'],
    'po' => $_POST['po'],
    'ps' => $_POST['ps'],
    'disct' => $_POST['disct'],
    'state' => $_POST['state'],
    'pin' => $_POST['pin']
];

$whereConditions = [];

foreach ($formData as $key => $value) {
    if (!empty($value)) {
        $whereConditions[] = "$key = '$value'";
    }
}

$sql1 = "SELECT * FROM `residense_details`";
$sql2 = "SELECT * FROM `residense_details`";

if (!empty($whereConditions)) {
    $sql1 .= " WHERE " . implode(" AND ", $whereConditions);
    $sql2 .= " WHERE " . implode(" OR ", $whereConditions);
}

$result1 = mysqli_query($conn, $sql1);
$result2 = mysqli_query($conn, $sql2);
$rows = [];

if (mysqli_num_rows($result1) > 0) {
    while ($row = mysqli_fetch_assoc($result1)) {
        $rows[] = $row;
    }
    $json_data = json_encode($rows);
    // echo "<script>window.location.href = 'tenantsearchresult.html';</script>";
    // header('Content-Type: application/json');
    echo $json_data;
}
else {
    echo "Residence not found on exact location.";
    if (mysqli_num_rows($result2) > 0) {
        while ($row = mysqli_fetch_assoc($result2)) {
            $rows[] = $row;
        }
        $json_data = json_encode($rows);
        // echo "<script>window.location.href = 'tenantsearchresult.html';</script>";
        // header('Content-Type: application/json');
        echo $json_data; 
    }
}

?>

<script>
  // Parse the received JSON data and store it in a global variable

  window.location.href = 'tenantsearchresult.html';
</script>
