<?php
// Fetch data from ThingSpeak using PHP and populate the table
                $thingSpeakUrl = 'https://api.thingspeak.com/channels/2272330/feeds.json?api_key=BRNED90E9EMNBEBT&results=10'; // Replace with the actual ThingSpeak API URL

                $json = file_get_contents($thingSpeakUrl);
                $data = json_decode($json, true);

                if ($data) {
                    foreach ($data['feeds'] as $feed) {
                        $timestamp = strtotime($feed['created_at']); // Convert the created_at to a timestamp
                        $formattedTime = date('Y-m-d H:i:s', $timestamp);
                        echo '<tr>';
                        echo '<td>' . $formattedTime . '</td>'; 
                        echo '<td>' . $feed['field1'] . '</td>';
                        echo '<td>' . $feed['field2'] . '</td>';
                        echo '<td>' . $feed['field4'] . '</td>';
                        echo '<td>' . $feed['field3'] . '</td>';
                        echo '<td>' . $feed['field5'] . '</td>';
                        
                        echo '<td>
                                <a class="btn btn-success">Export</a>
                                <a class="btn btn-danger">Print</a>
                            </td>';
                        echo '</tr>';
                    }
                }
                ?>