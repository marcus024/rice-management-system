<?php

// ThingSpeak channel details
$channelId = "2272330";
$apiKey = "BRNED90E9EMNBEBT";
include("database.php");
// SQL database details
// $servername = 'localhost';
// $username = 'root';
// $password = '';
// $dbname = 'rice_management';
$tableName = 'rice';

// // Create connection to MySQL database
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check the connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// Function to fetch data from ThingSpeak
function fetchThingSpeakData($channelId, $apiKey) {
    $url = "https://api.thingspeak.com/channels/{$channelId}/feeds.json?api_key={$apiKey}&results=10";
    $json = file_get_contents($url);
    $data = json_decode($json, true);
    return $data['feeds'][0];
}

// Function to insert data into MySQL database
function insertIntoMySQL($conn, $tableName, $data) {
    $field1 = $data['field1'];
    $field2 = $data['field2'];
    $field4 = $data['field4'];
    $field5 = $data['field5'];
    $field3 = $data['field3'];
    $field6 = $data['field6'];
    $field7 = $data['field7'];
    $field8 = $data['field8'];

    $month = date('m');
    
    $checkQuery = "SELECT * FROM rice WHERE monthD = '$month' AND ricePic IS NOT NULL";
    $result = mysqli_query($conn, $checkQuery);

    if ($month == '01') {
        $month = 'January';
        $sql = "INSERT INTO {$tableName} (temp, humD, soilM, lsensor, phsensor,monthD,phosphorus,nitrogen,potassium) VALUES ('$field1', '$field2', '$field4', '$field5', '$field3','$month','$field7','$field6','$field8')";

        if ($conn->query($sql) === TRUE) {
            return json_encode(["status" => "success", "message" => "Record inserted successfully"]);
        } else {
            return json_encode(["status" => "error", "message" => $conn->error]);
        }
    } if ($month == '2') {
        $month = 'February';
        $sql = "INSERT INTO {$tableName} (temp, humD, soilM, lsensor, phsensor,monthD,phosphorus,nitrogen,potassium) VALUES ('$field1', '$field2', '$field4', '$field5', '$field3','$month','$field7','$field6','$field8')";

        if ($conn->query($sql) === TRUE) {
            return json_encode(["status" => "success", "message" => "Record inserted successfully"]);
        } else {
            return json_encode(["status" => "error", "message" => $conn->error]);
        }
    } if ($month == '3') {
        $month = 'March';
        $sql = "INSERT INTO {$tableName} (temp, humD, soilM, lsensor, phsensor,monthD,phosphorus,nitrogen,potassium) VALUES ('$field1', '$field2', '$field4', '$field5', '$field3','$month','$field7','$field6','$field8')";

        if ($conn->query($sql) === TRUE) {
            return json_encode(["status" => "success", "message" => "Record inserted successfully"]);
        } else {
            return json_encode(["status" => "error", "message" => $conn->error]);
        }
    } if ($month == '4') {
        $month = 'April';
        $sql = "INSERT INTO {$tableName} (temp, humD, soilM, lsensor, phsensor,monthD,phosphorus,nitrogen,potassium) VALUES ('$field1', '$field2', '$field4', '$field5', '$field3','$month','$field7','$field6','$field8')";

        if ($conn->query($sql) === TRUE) {
            return json_encode(["status" => "success", "message" => "Record inserted successfully"]);
        } else {
            return json_encode(["status" => "error", "message" => $conn->error]);
        }
    } if ($month == '5') {
        $month = 'May';
        $sql = "INSERT INTO {$tableName} (temp, humD, soilM, lsensor, phsensor,monthD,phosphorus,nitrogen,potassium) VALUES ('$field1', '$field2', '$field4', '$field5', '$field3','$month','$field7','$field6','$field8')";

        if ($conn->query($sql) === TRUE) {
            return json_encode(["status" => "success", "message" => "Record inserted successfully"]);
        } else {
            return json_encode(["status" => "error", "message" => $conn->error]);
        }
    } if ($month == '6') {
        $month = 'June';
        $sql = "INSERT INTO {$tableName} (temp, humD, soilM, lsensor, phsensor,monthD,phosphorus,nitrogen,potassium) VALUES ('$field1', '$field2', '$field4', '$field5', '$field3','$month','$field7','$field6','$field8')";

        if ($conn->query($sql) === TRUE) {
            return json_encode(["status" => "success", "message" => "Record inserted successfully"]);
        } else {
            return json_encode(["status" => "error", "message" => $conn->error]);
        }
    } if ($month == '7') {
        $month = 'July';
        $sql = "INSERT INTO {$tableName} (temp, humD, soilM, lsensor, phsensor,monthD,phosphorus,nitrogen,potassium) VALUES ('$field1', '$field2', '$field4', '$field5', '$field3','$month','$field7','$field6','$field8')";

        if ($conn->query($sql) === TRUE) {
            return json_encode(["status" => "success", "message" => "Record inserted successfully"]);
        } else {
            return json_encode(["status" => "error", "message" => $conn->error]);
        }
    } if ($month == '8') {
        $month = 'August';
        $sql = "INSERT INTO {$tableName} (temp, humD, soilM, lsensor, phsensor,monthD,phosphorus,nitrogen,potassium) VALUES ('$field1', '$field2', '$field4', '$field5', '$field3','$month','$field7','$field6','$field8')";

        if ($conn->query($sql) === TRUE) {
            return json_encode(["status" => "success", "message" => "Record inserted successfully"]);
        } else {
            return json_encode(["status" => "error", "message" => $conn->error]);
        }
    } if ($month == '9') {
        $month = 'September';
        $sql = "INSERT INTO {$tableName} (temp, humD, soilM, lsensor, phsensor,monthD,phosphorus,nitrogen,potassium) VALUES ('$field1', '$field2', '$field4', '$field5', '$field3','$month','$field7','$field6','$field8')";

        if ($conn->query($sql) === TRUE) {
            return json_encode(["status" => "success", "message" => "Record inserted successfully"]);
        } else {
            return json_encode(["status" => "error", "message" => $conn->error]);
        }
    } if ($month == '10') {
        $month = 'October';
        $sql = "INSERT INTO {$tableName} (temp, humD, soilM, lsensor, phsensor,monthD,phosphorus,nitrogen,potassium) VALUES ('$field1', '$field2', '$field4', '$field5', '$field3','$month','$field7','$field6','$field8')";

        if ($conn->query($sql) === TRUE) {
            return json_encode(["status" => "success", "message" => "Record inserted successfully"]);
        } else {
            return json_encode(["status" => "error", "message" => $conn->error]);
        }
    } if ($month == '11') {
        $month = 'November';
        $sql = "INSERT INTO {$tableName} (temp, humD, soilM, lsensor, phsensor,monthD,phosphorus,nitrogen,potassium) VALUES ('$field1', '$field2', '$field4', '$field5', '$field3','$month','$field7','$field6','$field8')";

        if ($conn->query($sql) === TRUE) {
            return json_encode(["status" => "success", "message" => "Record inserted successfully"]);
        } else {
            return json_encode(["status" => "error", "message" => $conn->error]);
        }
    } if ($month == '12') {
        $month = 'December';
        $sql = "INSERT INTO {$tableName} (temp, humD, soilM, lsensor, phsensor,monthD,phosphorus,nitrogen,potassium) VALUES ('$field1', '$field2', '$field4', '$field5', '$field3','$month','$field7','$field6','$field8')";

        if ($conn->query($sql) === TRUE) {
            return json_encode(["status" => "success", "message" => "Record inserted successfully"]);
        } else {
            return json_encode(["status" => "error", "message" => $conn->error]);
        }
    }
    
    else {
        return json_encode(["status" => "error", "message" => "Data not inserted. Month not allowed."]);
    }

}

// Main script
$thingSpeakData = fetchThingSpeakData($channelId, $apiKey);
$response = insertIntoMySQL($conn, $tableName, $thingSpeakData);


$conn->close();

echo $response;
?>
