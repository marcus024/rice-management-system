<?php
// Assuming you have a database connection
include 'database.php';

if (isset($_POST['image'])) {
    $img = $_POST['image'];
    $uploadFolder = "upload/";

    // Extract image data from base64 string
    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
    $image_base64 = base64_decode($image_parts[1]);

    // Generate a unique filename
    $fileName = uniqid() . '.png';
    $file = $uploadFolder . $fileName;

    // Save the image to the server
    file_put_contents($file, $image_base64);

    // Insert the image filename into the database
    $query = "INSERT INTO farmer (farmerPic) VALUES ('$fileName')";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo 'Image uploaded and inserted into the database successfully!';
        header("Location: loginFarm.php");  
    } else {
        echo 'Error inserting record: ' . mysqli_error($conn);
    }
} else {
    echo 'Invalid parameters!';
}
?>
