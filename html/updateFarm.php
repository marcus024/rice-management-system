<?php
include 'database.php'; // Include your database connection file

if(isset($_POST['id']) && isset($_POST['newRiceType']) && isset($_POST['newFarmSize']) && isset($_POST['newRiceFarm']) &&  isset($_POST['newSeason']) && isset($_POST['newYear']) && isset($_POST['newTotalProd']) && isset($_POST['newProblem']) ) {
    $id = $_POST['id'];
    $newRiceType = $_POST['newRiceType'];
    $newFarmSize = $_POST['newFarmSize'];
    $newRiceFarm = $_POST['newRiceFarm'];
    $newTotalProd = $_POST['newTotalProd'];
    $newSeason = $_POST['newSeason'];
    $newYear = $_POST['newYear'];
    $newProblem = $_POST['newProblem'];

    $updateFields = array();
    
    // Check if each field has a value and add it to the updateFields array
    if ($newRiceType !== "") {
        $updateFields[] = "riceType='$newRiceType'";
    }

    if ($newFarmSize !== "") {
        $updateFields[] = "farmSize='$newFarmSize'";
    }
    if ($newRiceFarm !== "") {
        $updateFields[] = "RiceFarm='$newFarmSize'";
    }

    if ($newSeason !== "") {
            $updateFields[] = "season='$newSeason'";
        }

    if ($newTotalProd !== "") {
        $updateFields[] = "totalProd='$newTotalProd'";
    }

    if ($newYear !== "") {
        $updateFields[] = "yearW='$newYear'";
    }
    if ($newProblem !== "") {
        $updateFields[] = "problem='$newProblem'";
    }
   

    // Construct the UPDATE query only if there are fields to update
    if (!empty($updateFields)) {
        $updateFieldsString = implode(", ", $updateFields);
        $query = "UPDATE farmdetails SET $updateFieldsString WHERE id='$id'";
        $query_run = mysqli_query($conn, $query);

        if($query_run) {
            echo 'Record updated successfully!';
        } else {
            echo 'Error updating record: ' . mysqli_error($conn);
        }
    } else {
        echo 'No valid fields provided for update.';
    }
} else {
    echo 'Invalid parameters!';
}
?>
