<?php
session_start();
$_SESSION["cat"] = "Report";
$_SESSION["sub-cat"] = "Rice1";
include("h.php");
?>
<div class="container-xxl  container-p-y">
              <h4 class="fw-bold py-3 mb-4">Rice Data Management</h4>
              <div class="row">
                <div class="col-xxl">
                  <div class="card mb-9">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      </div>
                      <div class="card-body">
                        <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                    <div class="table-responsive text-nowrap" style="overflow-y:auto;">
                                        <table class="table dataTa" >
                                            <thead class="table-light">
                                              <tr>
                                                <th>Time</th>
                                                <th>Temperature (°C)</th>
                                                <th>Humidity (%)</th>
                                                <th>Soil Moisture (%)</th>
                                                <th>pH</th>
                                                <th>Light Sensor</th>
                                                <th>Actions</th>
                                              </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0" id="tdata">
                                            <!-- Content PHP -->
                                         <?php include "update_table.php";?>
                                              <!-- Content PHP -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
            <script>
            // Function to update the table with new data
            function updateTable() {
                $.ajax({
                    url: 'update_table.php', // Create a PHP file for updating data from ThingSpeak
                    method: 'POST',
                    success: function (data) {
                        $('#tdata').html(data);
                    }
                });
            }

            // Call the updateTable function every 5 seconds (you can adjust the interval)
            setInterval(updateTable,  86400000);
        </script>
    
            <?php 
include("f.php")
?>