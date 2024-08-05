<?php
session_start();

if(isset($_POST["submit"])){
    
//     $con = mysqli_connect('localhost','root','');
//     mysqli_select_db($con,'rice_management');
//     if (!$con) {
//     die("Connection failed: " . mysqli_connect_error());
// }
include("database.php");

    $riceFarm = $_POST['riceFarm'];
    $farmSize = $_POST['farmSize'];
    $season = $_POST['season'];
    $totalProd = $_POST['totalProd'];
    $yearW = $_POST['yearW'];
    $problem = $_POST['problem'];
    $initialProd = "Initial Production";
    $decrease = "Decreased";
    $increase = "Increase";
    $riceType = $_POST['riceType'];
    $userEmail = $_SESSION['emailF'];

    $s = "SELECT totalProd FROM farmdetails ORDER BY id DESC LIMIT 1";

    $result = mysqli_query($conn, $s);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $lastStatus = $row['totalProd'];
        if($lastStatus > $totalProd){
                $reg = "INSERT INTO farmdetails (riceFarm, yearW,riceType, farmSize, season, totalProd, problem,statusR,currentUser) VALUES ('$riceFarm','$yearW','$riceType','$farmSize','$season','$totalProd','$problem','$decrease','$userEmail')";
                echo $reg, "increase";
                if(mysqli_query($conn, $reg)){ 
                    $status = 'success';
                    $statusMsg = "File uploaded successfully."; 
                    echo $statusMsg;
                    header("Location: farmSurvey.php");  
                } else { 
                    $statusMsg = "Database insert failed. Please try again. 1"; 
                    echo $statusMsg;
                } 
        }else{
            $reg = "INSERT INTO farmdetails (riceFarm, yearW,riceType, farmSize, season, totalProd, problem,statusR,currentUser) VALUES ('$riceFarm','$yearW','$riceType','$farmSize','$season','$totalProd','$problem','$increase','$userEmail')";
            // echo $reg, "decrease";
                if(mysqli_query($conn, $reg)){ 
                    $status = 'success';
                    $statusMsg = "File uploaded successfully."; 
                    echo $statusMsg;
                    header("Location: farmSurvey.php");  
                } else { 
                    $statusMsg = "Database insert failed. Please try again.2"; 
                    echo $statusMsg;
                } 
                echo "SQL Query: $reg<br>";
        }

        // Use $lastStatus as needed
    } else {
        $reg = "INSERT INTO farmdetails (riceFarm, yearW,riceType, farmSize, season, totalProd, problem,statusR,currentUser) VALUES ('$riceFarm','$yearW','$riceType','$farmSize','$season','$totalProd','$problem','$initialProd','$userEmail')";
        // echo $reg, "initial";
                if(mysqli_query($conn, $reg)){ 
                    $status = 'success';
                    $statusMsg = "File uploaded successfully."; 
                    echo $statusMsg;
                    header("Location: farmdSurvey.php");  
                } else { 
                    $statusMsg = "Database insert failed. Please try again.3"; 
                    echo $statusMsg;
                } 
        // Handle query error
    }

}
?>
