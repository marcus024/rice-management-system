<?php
session_start();

if(isset($_POST["submit"])){
include("database.php");
    // $con = mysqli_connect('localhost','root','');

    // mysqli_select_db($con,'rice_management');
        // Insert data with File
//   $month = date('m');
$date = date('l, jS F Y');
  if  (!empty($_FILES["photo"]["name"])) { 
        // Get file info 
        
        $fileName = basename($_FILES["photo"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['photo']['tmp_name']; 
            $photo = addslashes(file_get_contents($image)); 
         
            // Insert image content into database 
            $reg= "INSERT INTO ricepic (imageRice,monthP) VALUES ('$photo','$date')";
            
            $result = mysqli_query($conn,$reg);
            if($result){ 
                $status = 'success';
                $statusMsg = "File upload successfully."; 
                header("Location:dashboard.php");  
            }else{ 
                header("Location:dashboard.php"); 
                $statusMsg = "File upload failed, please try again" .mysqli_error($conn); 
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    } 
 
// Display status message 
        echo $statusMsg; 
        // Insert data with File
        mysqli_close($conn);
    
}

?>