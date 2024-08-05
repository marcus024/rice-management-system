<?php

session_start();
include("database.php");
// $conn = mysqli_connect('localhost','root','');

// mysqli_select_db($conn,'rice_management');

$emailP = $_POST['emailP'];
$passwordP = $_POST['passwordP'];

$s = "select * from dapersonnel where emailP ='$emailP' && passwordP = '$passwordP' ";

$result = mysqli_query($conn,$s);
$row = mysqli_fetch_array( $result );
$num = mysqli_num_rows($result);

if($num == 1){
    $_SESSION['id'] = $row['id'];
    $_SESSION['emailP'] = $row['emailP'];
    $_SESSION['nameP'] = $row['nameP'];
    $_SESSION['position'] = $row['position'];
    $_SESSION['daPic'] = $row['daPic'];
    $_SESSION['addressP'] = $row['addressP'];
    $_SESSION['contactP'] = $row['contactP'];
    
    $_SESSION['passwordP'] = $row['passwordP'];
    header('location:dashDA.php');
}else{
    header('location:index.php');
}

?>