<?php
session_start();
$conn = mysqli_connect("localhost","root","","rentbuddyproject_db");
    
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$rname = $_POST['name'];
$colony = $_POST['colony'];
$strvill = $_POST['strvill'];
$po = $_POST['po'];
$ps = $_POST['ps'];
$disct = $_POST['disct'];
$state = $_POST['state'];
$pin = $_POST['pin'];
$un = $_SESSION['usn'];

$sql2 ="SELECT `fname`, `mname`, `lname`,`email`,`phno` FROM `land_lord_lady_details` WHERE username = '$un';";

$result2 = mysqli_query($conn,$sql2);
if ($result2) {
    $row2 = mysqli_fetch_assoc($result2);
    $fname = $row2['fname'];
    $mname = $row2['mname'];
    $lname = $row2['lname'];
    $email = $row2['email'];
    $phno = $row2['phno'];
}

$img_name = $_FILES['image']['name'];
$img_size = $_FILES['image']['size'];
$tmp_name = $_FILES['image']['tmp_name'];
$error = $_FILES['image']['error'];

if ($error === 0) {
    if ($img_size > 102400000) {
        echo "<script>alert('Sorry, photo size is too large!');window.location.href = 'landlordhomapage.html';</script>";
    } else {
        $img_ex = pathinfo($img_name,PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);
        $allowed_exs = array("jpg","jpeg","png");
        if (in_array($img_ex_lc,$allowed_exs)) {
            $new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;
            $img_upload_path = 'uploads/'.$new_img_name;
            move_uploaded_file($tmp_name,$img_upload_path);

            $sql = "INSERT INTO `residense_details` (`rname`, `colony`, `strvill`, `po`, `ps`, `disct`, `state`, `pin`, `img`, `un`, `createdat`, `fname`, `mname`, `lname`,`email`,`phno`) VALUES ('$rname', '$colony', '$strvill', '$po', '$ps', '$disct', '$state', '$pin', '$new_img_name', '$un', NOW(), '$fname', '$mname', '$lname','$email','$phno');";
            if(mysqli_query($conn,$sql)){
                echo "<script>alert('Details have been registered successfully.');window.location.href = 'landlordhomepage.html';</script>";
            }
            else {
                echo "<script>alert('Oops! Something went wrong. Please try again.');window.location.href = 'landlordhomepage.html';</script>";
            }

        }
        else {
            echo "<script>alert('Unknown error occured!');</script>";
            header("Location: landlordhomapage.html");
        }
    }
} else {
    echo "<script>alert('Unknown error occured!');</script>";
    header("Location: landlordhomapage.html");
}


?>