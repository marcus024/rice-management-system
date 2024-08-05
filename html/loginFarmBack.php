<?php

session_start();
include("database.php");
// $conn = mysqli_connect('localhost','root','');

// mysqli_select_db($conn,'rice_management');

$emailF = $_POST['emailF'];
$passwordF = $_POST['passwordF'];

$s = "select * from farmer where emailF ='$emailF' && passwordF = '$passwordF' ";

$result = mysqli_query($conn,$s);
$row = mysqli_fetch_array( $result );
$num = mysqli_num_rows($result);

if($num == 1){
    $_SESSION['id'] = $row['id'];
    $_SESSION['emailF'] = $row['emailF'];
    $_SESSION['nameF'] = $row['nameF'];
    $_SESSION['farmerPic'] = $row['farmerPic'];
    $_SESSION['barangayF'] = $row['barangayF'];
    $_SESSION['contactF'] = $row['contactF'];
    $_SESSION['passwordF'] = $row['passwordF'];
    header('location:dashboard.php');
}else{
    header('location:index.php');
}

?>