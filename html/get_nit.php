<?php
$api_key = "BRNED90E9EMNBEBT";
$channel_id = "2272330";
$url = "https://api.thingspeak.com/channels/{$channel_id}/feeds.json?api_key={$api_key}&results=10"; // Adjust the number of results as needed


// Set up error reporting to catch warnings
error_reporting(E_ALL);

// Use the "@" symbol to suppress warnings and handle them manually
$data = @file_get_contents($url);

// Check if data is successfully fetched
if ($data !== false) {
    $feed = json_decode($data, true);

    $last_entry = end($feed['feeds']);
    $nitrogen = $last_entry['field6'];
    // Simulate fetching the latest temperature reading (replace with your actual data source)

    // Return the nitrogen reading as a response
    echo $nitrogen;
} else {
    // Display alternative message if there is an issue with data retrieval
    echo '<p style="font-size: 18px;">Failed to fetch data. Please check your internet connection.</p>';
}


?>
