<?php
session_start();

if(isset($_POST["submit"])){
include("database.php");
    // $con = mysqli_connect('localhost','root','');

    // mysqli_select_db($con,'rice_management');

    $nameP= $_POST['nameP'];
    $position= $_POST['position'];
    $emailP = $_POST['emailP'];
    $passwordP = $_POST['passwordP'];
    $addressP = $_POST['addressP'];
    $contactP = $_POST['contactP'];

    $s = "select * from dapersonnel where emailP = '$emailP' ";
    $result = mysqli_query($conn,$s);
    $num = mysqli_num_rows($result);

    if($num == 1 ){  
        $em =  'Username Already Taken';
        $_SESSION['emailVal'] = $em;
        header('location:regDa.php?error= Username Already Taken') ;
    } else{
        // Insert data with File
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
         
            // Insert image content into database 
            $reg= " insert into dapersonnel (nameP, emailP,position,passwordP,addressP,contactP,daPic) values ('$nameP','$emailP','$position','$passwordP','$addressP','$contactP','$photo')";
            
            // echo $reg;
            if(mysqli_query($conn,$reg)){ 
                $status = 'success';
                $statusMsg = "File uploaded successfully."; 
                header("Location: index.php");  
                echo $statusMsg;
                
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
                echo $statusMsg;
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    } 
    
        echo $statusMsg;
    
      
    }
}
?>