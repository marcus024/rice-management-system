<?php
session_start();

if (isset($_POST["submit"])) {
    include("database.php");
    // $con = mysqli_connect('localhost', 'root', '');
    // mysqli_select_db($con, 'rice_management');

    $nameF = $_POST['nameF'];
    $emailF = $_POST['emailF'];
    $passwordF = $_POST['passwordF'];
    $barangayF = $_POST['barangayF'];
    $contactF = $_POST['contactF'];

    $s = "SELECT * FROM farmer WHERE emailF = '$emailF'";
    $result = mysqli_query($conn, $s);
    $num = mysqli_num_rows($result);

    if ($num == 1) {
        $em =  'Username Already Taken';
        $_SESSION['emailVal'] = $em;
        header('location:regFarm.php?error=Username Already Taken');
    } else {
        $status = $statusMsg = '';
        $status = 'error';

        if  (!empty($_FILES["photo"]["name"])) { 
            // Get file info 
            
            $fileName = basename($_FILES["photo"]["name"]); 
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
            // Allow certain file formats 
            $allowTypes = array('jpg','png','jpeg','gif'); 
            if(in_array($fileType, $allowTypes)){ 
                $image = $_FILES['photo']['tmp_name']; 
                $photo = addslashes(file_get_contents($image)); 
             
                $reg = "INSERT INTO farmer (nameF,emailF,passwordF,barangayF,contactF,farmerPic) VALUES ('$nameF','$emailF','$passwordF','$barangayF','$contactF','$photo')";

                if (mysqli_query($conn, $reg)) {
                    $status = 'success';
                    $statusMsg = "File uploaded and data inserted successfully.";
                    header("Location: loginFarm.php");
                } else {
                    $statusMsg = "Database insert failed. Please try again.";
                } 
            }else{ 
                $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
            } 
        }else{ 
            $statusMsg = 'Please select an image file to upload.'; 
        } 

        // Display status message
        echo $statusMsg;
    }
}
?>


