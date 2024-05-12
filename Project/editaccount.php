<?php
session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $conn = mysqli_connect("localhost","root","","rentbuddyproject_db");
    
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        // Get the user ID from the session or form data
        $un = $_SESSION['usn']; // assuming you store user ID in session
        $un2 = $_SESSION['usn'];
    
        // Initialize variables to store updated values
        $updatedfname = $updatedmname = $updatedlname = $updatedemail = $updatedphno = $updatedacno = $updatedusername = $updatedpassword = $updatedcpassword = "";
        $count = 0;
    
        // Check which fields are submitted for update
        if (!empty($_POST['fname'])) {
            $updatedfname = $_POST['fname'];
            $count++;
        }
        if (!empty($_POST['mname'])) {
            $updatedmname = $_POST['mname'];
            $count++;
        }
        if (!empty($_POST['lname'])) {
            $updatedlname = $_POST['lname'];
            $count++;
        }
        if (!empty($_POST['email'])) {
            $updatedemail = $_POST['email'];
            $count++;
        }
        if (!empty($_POST['phno'])) {
            $updatedphno = $_POST['phno'];
            $count++;
        }
        if (!empty($_POST['acno'])) {
            $updatedacno = $_POST['acno'];
            $count++;
        }
        if (!empty($_POST['username'])) {
            $updatedusername = $_POST['username'];
            $count++;
        }
        if (!empty($_POST['password'])) {
            $updatedpassword = $_POST['password'];
            $count++;
        }
        if (!empty($_POST['cpassword'])) {
            $updatedcpassword = $_POST['cpassword'];
            $count++;
        }

        if ($updatedpassword !== $updatedcpassword) {
            echo "<script>alert('Didn't update. Password and Confirm Password must be same.');window.location.href ='editaccount.php';</script>";
        } else {
        // Update the database record based on the user's input
        $sql = "UPDATE `land_lord_lady_details` SET ";
        $sql .= !empty($updatedfname) ? "`fname` = '$updatedfname', " : "";
        $sql .= !empty($updatedmname) ? "`mname` = '$updatedmname', " : "";
        $sql .= !empty($updatedlname) ? "`lname` = '$updatedlname', " : "";
        $sql .= !empty($updatedemail) ? "`email` = '$updatedemail', " : "";
        $sql .= !empty($updatedphno) ? "`phno` = '$updatedphno', " : "";
        $sql .= !empty($updatedacno) ? "`acno` = '$updatedacno', " : "";
        $sql .= !empty($updatedusername) ? "`username` = '$updatedusername', " : "";
        $sql .= !empty($updatedpassword) ? "`password` = '$updatedpassword', " : "";
        $sql = rtrim($sql, ", "); // Remove the trailing comma if there are no updates

        $sql3 = "UPDATE `residense_details` SET fname = '$updatedfname' WHERE `un` = '$un2';";
        
        $sql4 = "UPDATE `residense_details` SET mname = '$updatedmname' WHERE `un` = '$un2';";
        
        $sql5 = "UPDATE `residense_details` SET lname = '$updatedlname' WHERE `un` = '$un2';";
        
        $sql6 = "UPDATE `residense_details` SET email = '$updatedemail' WHERE `un` = '$un2';";
        
        $sql7 = "UPDATE `residense_details` SET phno = '$updatedphno' WHERE `un` = '$un2';";
        
        if ($count > 0) {
            if (!empty($sql)) {
                $sql .= " WHERE username = '$un';";
                
                if (mysqli_query($conn, $sql)) {
                    echo "<script>alert('Details updated successfully');window.location.href ='landlordhomepage.html';</script>";
                    if (!empty($_POST['username'])) {
                    $sql2 = "UPDATE `residense_details` SET un = '$updatedusername' WHERE `un` = '$un2';";
                    mysqli_query($conn, $sql2);
                    $_SESSION['usn'] = $updatedusername;
                    $un2 = $updatedusername;
                    if(!empty($_POST['fname'])){
                        $sql3 = "UPDATE `residense_details` SET fname = '$updatedfname' WHERE `un` = '$un2';";
                      mysqli_query($conn,$sql3); 
                    }
                    if(!empty($_POST['mname'])){
                        $sql4 = "UPDATE `residense_details` SET mname = '$updatedmname' WHERE `un` = '$un2';";
                      mysqli_query($conn,$sql4); 
                    }
                    if(!empty($_POST['lname'])){
                        $sql5 = "UPDATE `residense_details` SET lname = '$updatedlname' WHERE `un` = '$un2';";
                      mysqli_query($conn,$sql5); 
                    }
                    if(!empty($_POST['email'])){
                        $sql6 = "UPDATE `residense_details` SET email = '$updatedemail' WHERE `un` = '$un2';";
                      mysqli_query($conn,$sql6); 
                    }
                    if(!empty($_POST['phno'])){
                        $sql7 = "UPDATE `residense_details` SET phno = '$updatedphno' WHERE `un` = '$un2';";
                      mysqli_query($conn,$sql7); 
                    }
                }
                else{
                    if(!empty($_POST['fname'])){
                      mysqli_query($conn,$sql3); 
                    }
                    if(!empty($_POST['mname'])){
                      mysqli_query($conn,$sql4); 
                    }
                    if(!empty($_POST['lname'])){
                      mysqli_query($conn,$sql5); 
                    }
                    if(!empty($_POST['email'])){
                      mysqli_query($conn,$sql6); 
                    }
                    if(!empty($_POST['phno'])){
                      mysqli_query($conn,$sql7); 
                    }
                }

                } else {
                    echo "Error updating record: " . mysqli_error($conn);
                }
            }
            else {
                echo "<script>alert('No fields to update');window.location.href = 'landlordhomepage.html';</script>";
            }
        } else {
            echo "<script>alert('No fields to update');window.location.href = 'landlordhomepage.html';</script>";
        }
    }
    }
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Update</title>
    <link rel="stylesheet" href="editaccount.css">
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
        <div id="signupheadingmessage">
            <b><u>Enter new details as per your requirement: </u></b>
        </div>
        <div id="outer_container">
            <div id="container">
                <form id="formpage" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                    <label for="fname" style="margin-top: 25px;">First Name:</label>
                    <input type="text" name="fname">
                    <label for="mname">Middle Name:</label>
                    <input type="text" name="mname">
                    <label for="lname">Last Name:</label>
                    <input type="text" name="lname">
                    <label for="email">E-mail:</label>
                    <input type="email" name="email">
                    <label for="phno">Mobile No.:</label>
                    <input type="text" name="phno">
                    <label for="acno">Aadhar Card No.:</label>
                    <input type="text" name="acno" id="acno" onblur="checkacnoAvailability()">
                    <span id="acnoError" style="color: red;"></span>
                    <label for="username">Choose a Username:</label>
                    <input type="text" name="username" onblur="checkUsernameAvailability()" id="username">
                    <span id="usernameError" style="color: red;"></span>
                    <label for="password">Password:</label>
                    <input type="text" name="password" id="password">
                    <label for="cpassword" >Confirm Password:</label>
                    <input type="text" name="cpassword" id="cpassword">
                    <span id="passwordError" style="color: red;"></span>
                    <button type="submit" id="signupbtn" onclick="return validatePassword()">Submit</button>
                </form>
                <!-- <div id="---or---">
                    <hr>or<hr>
                </div>
                <div id="loginmessage">
                    Already have an Account? <a href="landlordloginpage.html"><span style="margin-left: 10px;">Log-in</span></a>
                </div> -->
            </div>
        </div>
    </main>
    
    <script src="editaccount.js"></script>
</body>
</html>