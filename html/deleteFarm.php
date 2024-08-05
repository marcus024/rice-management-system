<?php
include 'database.php'; // Include your database connection file

if(isset($_POST['id'])) {
    $id = $_POST['id'];

    $query = "DELETE FROM farmdetails WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run) {
        echo 'Record deleted successfully!';
        header('location:riceTable.php');
    } else {
        echo 'Error deleting record: ' . mysqli_error($conn);
    }
} else {
    echo 'Invalid parameters!';
}
?>
