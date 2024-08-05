<?php
$api_key = "BRNED90E9EMNBEBT";
$channel_id = "2272330";
$url = "https://api.thingspeak.com/channels/{$channel_id}/feeds.json?api_key={$api_key}&results=10";

$data = file_get_contents($url);
$feed = json_decode($data, true);

// Example: Get the last temperature and humidity values
$last_entry = end($feed['feeds']);
$temp = $last_entry['field1'];
$hum = $last_entry['field2'];
include("database.php");
// // Database connection parameters
// $servername = "localhost";
// $username = "";
// $password = "";
// $database = "rice_management";

// // Create a database connection
// $conn = new mysqli($servername, $username, $password, $database);

// // Check the database connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// SQL query to insert data into the "rice" table
$sql = "INSERT INTO rice (temp, humD) VALUES ('$temp', '$hum')";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
