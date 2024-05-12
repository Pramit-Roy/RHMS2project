
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="tenantsearchpagephp.css">
</head>

<body>
    <header>
        <div><img src="IMG_3553.JPG" alt="" id="navbarlogo"></div>
        <div class="navbaroptions" onclick="homepage()">Home</div>
        <div class="navbaroptions" onclick="accountpage()">Account</div>
        <div class="navbaroptions" onclick="contactuspage()">Contact Us</div>
        <div id="navbaroption" onclick="aboutpage()">About</div>
    </header>
    <main>
        <div id="maincontainer">
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
$count = 0;

foreach ($formData as $key => $value) {
    if (!empty($value)) {
        $whereConditions[] = "$key = '$value'";
        $count++;
    }
}

if ($count == 0) {
    echo "<script>alert('No search criteria found');window.location.href = 'tenantsearchpage.html';</script>";
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
        // echo var_dump($row);
    }
    $maincontainerheight = count($rows)* 200;
    echo "<div style='margin-top:30px;text-align: left;'><h1>Searched Results are:</h1></div>";
}
else {
    if (mysqli_num_rows($result2) > 0) {
        echo "<h1 style='padding-top:50px;'>No residences found matching your specific criteria.</h1>";
        while ($row = mysqli_fetch_assoc($result2)) {
            $rows[] = $row;
        }
    }
    else {
        echo "<h1 style='padding-top:50px;'>No residences found matching your general criteria.</h1>";
    }
}


foreach ($rows as $row) {
    // Generate HTML output using $row data

    echo "<div style='width: 72vw;height: 350px;background-color: aliceblue;border-radius: 20px;box-shadow: 0px 0px 7.5px rgba(0, 0, 0, 0.5);display: flex; font-family: Monserrat;'>";



    echo "<div style='width: 24vw;height: 100%;background-color: yellow;border-bottom-left-radius: 20px;border-top-left-radius: 20px;'>";
    echo "<img src='uploads/{$row['img']}' style='width: 100%;height: 100%;border-bottom-left-radius: 20px;border-top-left-radius: 20px;'>";
    echo "</div>";



    echo "<div>";

    echo "<div style='width: 48vw;height: 60%;background-color: #6da5d6;border-top-right-radius: 20px;'>";
    echo "<h2 style='padding-left: 10px;padding-top: 10px;margin-bottom: 10px;'><i><u>Residence details</u></i></h2>";
    echo "<span style='padding-left: 10px;font-size: larger;margin-bottom: 10px;'><b>Residence Name -</b> ${row['rname']}, <b>Colony -</b> ${row['colony']}</span><br><br><span style='padding-left: 10px;font-size: larger;'><b>Street/Village -</b> ${row['strvill']}, <b>Post Office -</b> ${row['po']}</span><br><br><span style='padding-left: 10px;font-size: larger;'><b>Police Station -</b> ${row['ps']}, <b>District -</b> ${row['disct']}</span><br><br><span style='padding-left: 10px;font-size: larger;'><b>State -</b>${row['state']} - ${row['pin']}</span>";
    echo "</div>";

    echo "<div style='width: 48vw;height: 40%;background-color: #bbdefb;border-bottom-right-radius: 20px;'>";
    echo "<h2 style='padding-left: 10px;padding-top: 10px;margin-bottom: 10px;'><i><u>Owners details</u></i></h2>";
    echo "<span style='padding-left: 10px;font-size: 24px;'>${row['fname']} ${row['mname']} ${row['lname']}</span><br>";
    echo "<br><span style='padding-left: 10px;font-size: larger;'><b>E-mail: </b>${row['email']}</span><br><span style='padding-left: 10px;font-size: larger;'><b>Contact No: </b>${row['phno']}</span>";
    echo "</div>";

    echo "</div>";


    echo "</div>";
}
echo "<a href='tenantsearchpage.html'><button style='cursor: pointer;
box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.25);
text-align: center;width: 7vw;
height: 5vh;
font-size: larger;
background-color: #118ab2;
color: white;border: 2px solid black;
border-radius: 10px;'>&#8592; Back</button></a>";
?>
        </div>
    </main>
<script>
function searchpage() {
    window.location.href = "tenantsearchpage.html";
}

function homepage() {
    window.location.href = "tenanthomepage.html";
}

function accountpage() {
    window.location.href = "tenantaccountpage.html";
}

function aboutpage() {
    window.location.href = "tenantabout.html";
}

function contactuspage() {
    window.location.href = "tenantcontactus.html";
}
</script>
</body>
</html>

