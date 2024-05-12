<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="editresidencedetails.css">
</head>
<body>
    <header>
        <div><img src="IMG_3553.JPG" alt="" id="navbarlogo"></div>
        <div class="navbaroptions" onclick="homepage()">Home</div>
        <div class="navbaroptions" onclick="accountpage()">Account</div>
        <div class="navbaroptions" onclick="contactuspage()">Contact Us</div>
        <div id="navbaroption" onclick="aboutpage()">About</div>
    </header>
    <main style="margin-top:2.5px">
        
        <div id="editresicontainer">
            <h1 id="editresimessage"><u>Enter new details as per your requirement: </u></h1>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" id="formpage1" enctype="multipart/form-data">
                <div class="form-row">
                    <label for="name" class="lab">Residense Name:</label>
                    <input type="text" name="name" class="ip" id="name">
                </div>
                <div class="form-row">
                    <label for="colony" class="lab">Colony:</label>
                    <input type="text" name="colony" class="ip" id="colony">
                </div>
                <div class="form-row">      
                    <label for="strvill" class="lab">Street / Village:</label>
                    <input type="text" name="strvill" class="ip" id="strvill">
                </div>
                <div class="form-row">
                    <label for="po" class="lab">P.O. :</label>
                    <input type="text" name="po" class="ip" id="po">
                </div>
                <div class="form-row">
                    <label for="ps" class="lab">P.S. :</label>
                    <input type="text" name="ps" class="ip" id="ps">
                </div>
                <div class="form-row">
                    <label for="disct" class="lab">District:</label>
                    <input type="text" name="disct" class="ip" id="disct">
                </div>
                <div class="form-row">
                    <label for="state" class="lab">State:</label>
                    <input type="text" name="state" class="ip" id="state">
                </div>
                <div class="form-row">
                    <label for="pin" class="lab">Pin-Code:</label>
                    <input type="text" name="pin" class="ip" id="pin">
                </div>
                <div class="form-row" id="imagepart">
                    <label for="image" class="lab">Upload Image:</label>
                    <input type="file" id="uploadBtn" class="ip" name="image" placeholder="Choose from Device" onchange="getImagePreview(event)">
                </div>
                
                <!-- <input  id="fileInput" style="display: none;"> -->
                <div id="previewContainer"></div>
                <input type="hidden" name="value" value="<?php echo htmlspecialchars($_GET['value'] ?? ''); ?>">
                <div id="btndiv">
                    <!-- <div id="submitbtn"> -->
                        <button type="submit" id="submitbtn">Change</button>
                    <!-- </div> -->
                    <!-- <div id="deletebtndiv"> -->
                        <!-- <button type="submit" id="deletebtn">Delete Details</button> -->
                    <!-- </div> -->
                </div>
            </form>
        </div>
    </main>
    <?php
    

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $conn = mysqli_connect("localhost","root","","rentbuddyproject_db");
    
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        // Get the user ID from the session or form data
        $rid = $_POST['value']; // assuming you store user ID in session
    
        // Initialize variables to store updated values
        $updatedname = $updatedcolony = $updatedstrvill = $updatedpo = $updatedps = $updateddisct = $updatedstate = $updatedpin = $new_img_name = "";
        $count = 0;
    
        // Check which fields are submitted for update
        if (!empty($_POST['name'])) {
            $updatedname = $_POST['name'];
            $count++;
        }
        if (!empty($_POST['colony'])) {
            $updatedcolony = $_POST['colony'];
            $count++;
        }
        if (!empty($_POST['strvill'])) {
            $updatedstrvill = $_POST['strvill'];
            $count++;
        }
        if (!empty($_POST['po'])) {
            $updatedpo = $_POST['po'];
            $count++;
        }
        if (!empty($_POST['ps'])) {
            $updatedps = $_POST['ps'];
            $count++;
        }
        if (!empty($_POST['disct'])) {
            $updateddisct = $_POST['disct'];
            $count++;
        }
        if (!empty($_POST['state'])) {
            $updatedstate = $_POST['state'];
            $count++;
        }
        if (!empty($_POST['pin'])) {
            $updatedpin = $_POST['pin'];
            $count++;
        }
        if (!empty($_FILES['image'])) {
            $img_name = $_FILES['image']['name'];
            $img_size = $_FILES['image']['size'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $error = $_FILES['image']['error'];
            if ($error === 0) {
                if ($img_size > 10240000) {
                    echo "<script>alert('Sorry, photo size is too large!');window.location.href ='editresidencedetails.php?value=" . urlencode($_POST['value']) . "';</script>";

                } else {
                    $img_ex = pathinfo($img_name,PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);
                    $allowed_exs = array("jpg","jpeg","png");
                    if (in_array($img_ex_lc,$allowed_exs)) {
                        $new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;
                        $img_upload_path = 'uploads/'.$new_img_name;
                        move_uploaded_file($tmp_name,$img_upload_path);
                        $count++;
                    }
                    else {
                        echo "<script>alert('Sorry, only .jpg, .jpeg, .png images are allowed.');window.location.href ='editresidencedetails.php?value=" . urlencode($_POST['value']) . "';</script>";
                    }
                }
            }
        }
        // Update the database record based on the user's input
        $sql = "UPDATE `residense_details` SET ";
        $sql .= !empty($updatedname) ? "`rname` = '$updatedname', " : "";
        $sql .= !empty($updatedcolony) ? "`colony` = '$updatedcolony', " : "";
        $sql .= !empty($updatedstrvill) ? "`strvill` = '$updatedstrvill', " : "";
        $sql .= !empty($updatedpo) ? "`po` = '$updatedpo', " : "";
        $sql .= !empty($updatedps) ? "`ps` = '$updatedps', " : "";
        $sql .= !empty($updateddisct) ? "`disct` = '$updateddisct', " : "";
        $sql .= !empty($updatedstate) ? "`state` = '$updatedstate', " : "";
        $sql .= !empty($updatedpin) ? "`pin` = '$updatedpin', " : "";
        $sql .= !empty($new_img_name) ? "`img` = '$new_img_name', " : "";
        $sql = rtrim($sql, ", "); // Remove the trailing comma if there are no updates
    
        if ($count > 0) {
            if (!empty($sql)) {
                $sql .= " WHERE rid = $rid";
    
                if (mysqli_query($conn, $sql)) {
                    echo "<script>alert('Record updated successfully');window.location.href ='landlordhomepage.html';</script>";
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
    ?>
    <script src="editresidencedetails.js"></script>
</body>
</html>