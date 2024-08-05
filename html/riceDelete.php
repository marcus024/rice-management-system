<?php
include 'database.php'; // Include your database connection file

if(isset($_POST['idPic'])) {
    $id = $_POST['idPic'];

    $query = "DELETE FROM ricePic WHERE idPic='$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run) {
        echo 'Record deleted successfully!';
        header('location:dashDA.php');
    } else {
        echo 'Error deleting record: ' . mysqli_error($conn);
    }
} else {
    echo 'Invalid parameters!';
}
?>
