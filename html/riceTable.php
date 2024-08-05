<?php
session_start();
$_SESSION["cat"] = "Report";
$_SESSION["sub-cat"] = "Rice2";
include("h.php");
include("database.php");
// $servername = 'localhost';
// $username = 'root';
// $password = '';
// $dbname = 'rice_management';
// $tableName = 'rice';
$currentUser = $_SESSION['emailF'] ;

// Create connection to MySQL database
// $conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
?>
  
  <div class="container-xxl  container-p-y">
        <h4 class="fw-bold py-3 mb-4">Rice Data Management</h4>
        <div class="row">
            <div class="col-xxl">
                <div class="card mb-9">
                <div class="card-header d-flex align-items-center justify-content-between">
                      </div>
                      <div style="padding: 20px;">
                        <h4>Rice Parameters Monthly Report</h4></div>
                    <div class="card-body">
                        <div class="table-wrapper-scroll-y my-custom-scrollbar">
                            <div class="table-responsive text-nowrap" style="overflow-y:auto;">
                              <table id="example" class="display nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Time</th>
                                        <th>Month</th>
                                        <th>Temperature</th>
                                        <th>Humidity</th>
                                        <th>Soil Moisture</th>
                                        <th>pH</th>
                                        <th>Light</th>
                                        <th>Nitrogen</th>
                                        <th>Phosphorus</th>
                                        <th>Potassium</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    $query = "SELECT * FROM rice ";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $student)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $student['dateInserted']; ?></td>
                                                <td><?= $student['monthD']; ?></td>
                                                <td><?= $student['temp']; ?></td>
                                                <td><?= $student['humD']; ?></td>
                                                <td><?= $student['soilM']; ?></td>
                                                <td><?= $student['phsensor']; ?></td>
                                                <td><?= $student['lsensor']; ?></td>
                                                <td><?= $student['nitrogen']; ?></td>
                                                <td><?= $student['phosphorus']; ?></td>
                                                <td><?= $student['potassium']; ?></td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <div></div>
                                                        <div class="col-md-8">   
                                                            <form action="reportDelete.php" method="post" onsubmit="return confirm('Are you sure you want to delete this record?');" style="display: inline;">
                                                            <input type="hidden" name="id" value="<?= $student['id']; ?>">
                                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                        </form>
                                                        </div>
                                                        
                                                    </div>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    else
                                    {
                                      echo "<h6> &nbsp; &nbsp; &nbsp; No Record Found &nbsp; &nbsp;</h6>";
                                    }
                                ?>      
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

                    function editRow(id) {
                        // Retrieve the existing values or provide input fields for the user to enter new values
                        var newRiceType = prompt('Enter new Rice Type:');
                        var newFarmSize = prompt('Enter new Farm Size:');
                        var newRiceFarm = prompt('Enter new Rice Farm:');
                        var newSeason = prompt('Enter new Season:');
                        var newYear = prompt('Enter new Year:');
                        var newTotalProd = prompt('Enter new Total Production:');
                        var newProblem = prompt('Enter new Problem:');

                        // Make an AJAX call to update.php
                        $.ajax({
                            type: 'POST',
                            url: 'updateFarm.php',
                            data: {
                                id: id,
                                newRiceType: newRiceType,
                                newFarmSize: newFarmSize,
                                newRiceFarm: newRiceFarm,
                                newSeason: newSeason,
                                newYear: newYear,
                                newTotalProd: newTotalProd,
                                newProblem: newProblem
                                
                                
                            },
                            success: function(response) {
                                alert(response); // Display the response from the server
                                // Optionally, you can update the UI to reflect the changes without reloading the page
                            },
                            error: function(error) {
                                console.error('Error updating record:', error);
                            }
                        });
                    }

                   // Function to make an asynchronous request to the PHP script
                   function fetchData() {
                                        $.ajax({
                                            url: 'insert_data.php', // Replace with the actual path to your PHP script
                                            type: 'GET',
                                            dataType: 'json',
                                            success: function(response) {
                                                console.log(response);
                                            },
                                            error: function(error) {
                                                console.error('Error:', error);
                                            }
                                        });
                                    }

                                    // Call fetchData every 5 seconds
                                    setInterval(fetchData, 5000);
                </script>
            <?php 
include("f.php")
?>