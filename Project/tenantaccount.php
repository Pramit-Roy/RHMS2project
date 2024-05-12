<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <link rel="stylesheet" href="Account.css">
<body>
    <header>
        <div><img src="IMG_3553.JPG" alt="" id="navbarlogo"></div>
        <div class="navbaroptions" onclick="homepage()">Home</div>
        <div class="navbaroptions">Account</div>
        <div class="navbaroptions" onclick="contactuspage()">Contact Us</div>
        <div id="navbaroption" onclick="aboutpage()">About</div>
    </header>
    <main>
        <h1 id="heading"><u>Your account details:</u></h1>
        <?php
        session_start();
        $un = $_SESSION['tusn'];
        $conn = mysqli_connect("localhost","root","","rentbuddyproject_db");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $stmt = "SELECT * FROM `tenant_details` WHERE `username` = '$un';";
        $result = mysqli_query($conn,$stmt);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            echo "<table border='1' style='margin-left:3vw;margin-top:2vh;width: 50vw;border-spacing:5px;'>";

            echo "<tr>
            <th style='background-color: aliceblue';>First Name
            <td>".$row['fname']."
            </tr>";

            echo "<tr>
            <th style='background-color: aliceblue';>Middle Name
            <td>".$row['mname']."
            </tr>";

            echo "<tr>
            <th style='background-color: aliceblue';>Last Name
            <td>".$row['sname']."
            </tr>";

            echo "<tr>
            <th style='background-color: aliceblue';>E-mail
            <td>".$row['email']."
            </tr>";

            echo "<tr>
            <th style='background-color: aliceblue';>Contact No.
            <td>".$row['mono']."
            </tr>";

            echo "<tr>
            <th style='background-color: aliceblue';>Aadhar Card No.
            <td>".$row['acno']."
            </tr>";

            echo "<tr>
            <th style='background-color: aliceblue';>Username
            <td>".$row['username']."
            </tr>";

            echo "<tr>
            <th style='background-color: aliceblue;'>Edit</th>
            <td><a href='tenanteditaccount.php'>edit details</a> or <a href='tenantdeleteaccount.php' onclick='return confirmDelete()'>delete account</a></td>
            </tr>";


            // echo "<tr>
            // <th style='background-color: aliceblue';>Log-Out
            // <td><a href='tenantloginpage.html' onclick='return confirmLogout()'>log-out</a>
            // </tr>";

            echo "</table><br>";

            echo "<a href='tenantloginpage.html' onclick='return confirmLogout()'><button style='cursor: pointer;
            width: 5vw;
            height: 5vh;font-size: larger;
            background-color: #118ab2;
            color: white;
            border: 2px solid black;
            border-radius: 10px;box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.25);margin-left: 6.5vh'>Log-out</button></a>";
        }
        else {
            echo "<script>alert('Oops! Something went wrong.');history.go(-1);</script>";
        }
        
        
        ?>
    </main>
    <script>
        function homepage() {
            window.location.href = "tenanthomepage.html";
        }
        function contactuspage() {
            window.location.href = "tenantcontactus.html";
        }

        function aboutpage() {      
            window.location.href = "tenantabout.html";
        }

        function confirmDelete() {
            return confirm('Are you sure you want to delete this account?');
        }

        function confirmLogout() {
            return confirm('Do you want to log-out from rentBuddy?');
        }

    </script>
</body>
</html>