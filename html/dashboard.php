<?php 
session_start();
$_SESSION["cat"] = "index";
$_SESSION["sub-cat"] = "";
include("h.php");
include("database.php");

$date = date('l, jS F Y');
$query = "SELECT imageRice FROM ricepic WHERE monthP = '$date' ";
$query_run = mysqli_query($conn, $query);

?>
            <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h2 class="card-title align-center text-primary">Rice Monitoring System</h2>
                                <p class="mb-4">
                                    Heat index for today is <span class="fw-bold" id="heat"></span>. Keep safe and stay hydrated!
                                </p>
                                <script>
                                    // Function to update the Heat Index every second
                                    function updateHeat() {
                                        // Make an AJAX request to fetch the latest temperature from the server
                                        var xhr = new XMLHttpRequest();
                                        xhr.onreadystatechange = function() {
                                            if (xhr.readyState === 4 && xhr.status === 200) {
                                                // Update the temperature element with the new data
                                                document.getElementById('heat').innerHTML = xhr.responseText;
                                            
                                            }
                                        };
                                        xhr.open('GET', 'get_heat.php', true);
                                        xhr.send();
                                    }

                                    // Function to update the temperature every second
                                    function updateTemperature() {
                                        // Make an AJAX request to fetch the latest temperature from the server
                                        var xhr = new XMLHttpRequest();
                                        xhr.onreadystatechange = function() {
                                            if (xhr.readyState === 4 && xhr.status === 200) {
                                                // Update the temperature element with the new data
                                                document.getElementById('temperature').innerHTML = xhr.responseText;

                                            }
                                        };
                                        xhr.open('GET', 'get_temp.php', true);
                                        xhr.send();
                                    }
                                    // Function to update the humidity every second
                                    function updateHumidity() {
                                        // Make an AJAX request to fetch the latest temperature from the server
                                        var xhr = new XMLHttpRequest();
                                        xhr.onreadystatechange = function() {
                                            if (xhr.readyState === 4 && xhr.status === 200) {
                                                // Update the temperature element with the new data
                                                document.getElementById('humidity').innerHTML = xhr.responseText; 
                                            }
                                        };
                                        xhr.open('GET', 'get_hum.php', true);
                                        xhr.send();
                                    }
                                    // Function to update the Soil Moisture every second
                                    function updateSoil_Moisture() {
                                        // Make an AJAX request to fetch the latest temperature from the server
                                        var xhr = new XMLHttpRequest();
                                        xhr.onreadystatechange = function() {
                                            if (xhr.readyState === 4 && xhr.status === 200) {
                                                // Update the temperature element with the new data
                                                document.getElementById('soil_moisture').innerHTML = xhr.responseText;
                                            }
                                        };
                                        xhr.open('GET', 'get_soil.php', true);
                                        xhr.send();
                                    }
                                    // Function to update the pH every second
                                    function updatepH() {
                                        // Make an AJAX request to fetch the latest temperature from the server
                                        var xhr = new XMLHttpRequest();
                                        xhr.onreadystatechange = function() {
                                            if (xhr.readyState === 4 && xhr.status === 200) {
                                                // Update the temperature element with the new data
                                                document.getElementById('pH').innerHTML = xhr.responseText;
                                            }
                                        };
                                        xhr.open('GET', 'get_ph.php', true);
                                        xhr.send();
                                    }
                                    // Function to update the light every second
                                    function updateLight() {
                                        // Make an AJAX request to fetch the latest temperature from the server
                                        var xhr = new XMLHttpRequest();
                                        xhr.onreadystatechange = function() {
                                            if (xhr.readyState === 4 && xhr.status === 200) {
                                                // Update the temperature element with the new data
                                                document.getElementById('light').innerHTML = xhr.responseText;
                                            }
                                        };
                                        xhr.open('GET', 'get_light.php', true);
                                        xhr.send();
                                    }
                                    //Nitrogen
                                    function updateNitrogen() {
                                        // Make an AJAX request to fetch the latest temperature from the server
                                        var xhr = new XMLHttpRequest();
                                        xhr.onreadystatechange = function() {
                                            if (xhr.readyState === 4 && xhr.status === 200) {
                                                // Update the temperature element with the new data
                                                document.getElementById('nitrogen').innerHTML = xhr.responseText;
                                            }
                                        };
                                        xhr.open('GET', 'get_nit.php', true);
                                        xhr.send();
                                    }
                                    //Phosphorus
                                    function updatePhosphorus() {
                                        // Make an AJAX request to fetch the latest temperature from the server
                                        var xhr = new XMLHttpRequest();
                                        xhr.onreadystatechange = function() {
                                            if (xhr.readyState === 4 && xhr.status === 200) {
                                                // Update the temperature element with the new data
                                                document.getElementById('phosphorus').innerHTML = xhr.responseText;
                                            }
                                        };
                                        xhr.open('GET', 'get_phos.php', true);
                                        xhr.send();
                                    }
                                    //Potassium
                                    function updatePotassium() {
                                        // Make an AJAX request to fetch the latest temperature from the server
                                        var xhr = new XMLHttpRequest();
                                        xhr.onreadystatechange = function() {
                                            if (xhr.readyState === 4 && xhr.status === 200) {
                                                // Update the temperature element with the new data
                                                document.getElementById('potassium').innerHTML = xhr.responseText;
                                            }
                                        };
                                        xhr.open('GET', 'get_pot.php', true);
                                        xhr.send();
                                    }
                                    
                                        // Function to insert all data into the MySQL rice database
                                    // Function to insert all data into the MySQL rice database
                                        function insertAllData() {
                                            // Collect all parameter values
                                            var temperatureValue = encodeURIComponent(document.getElementById('temperature').innerHTML);
                                            var humidityValue = encodeURIComponent(document.getElementById('humidity').innerHTML);
                                            var soil_moistureValue = encodeURIComponent(document.getElementById('soil_moisture').innerHTML);
                                            var pHValue = encodeURIComponent(document.getElementById('pH').innerHTML);
                                            var lightValue = encodeURIComponent(document.getElementById('light').innerHTML);
                                            var phosphorusValue = encodeURIComponent(document.getElementById('phosphorus').innerHTML);
                                            var nitrogenValue = encodeURIComponent(document.getElementById('nitrogen').innerHTML);
                                            var potassiumValue = encodeURIComponent(document.getElementById('potassium').innerHTML);

                                            // Make an AJAX request to send all parameter values to the server for insertion
                                            var xhr = new XMLHttpRequest();
                                            xhr.open('GET', 'insert_data.php?&temperature=' + temperatureValue + '&humidity=' + humidityValue +  '&soil_moisture=' + soil_moistureValue + '&pH=' + pHValue + '&light=' + lightValue + '&nitrogen=' + nitrogenValue +'&phosphorus=' + phosphorusValue + '&potassium=' + potassiumValue, true);

                                            // Define an event handler for when the AJAX request completes
                                            // xhr.onreadystatechange = function () {
                                            //     if (xhr.readyState === 4) { // Check if the request has completed
                                            //         if (xhr.status === 200) { // Check if the response status is OK
                                            //             // Data was successfully inserted
                                            //             alert("Data inserted successfully");
                                            //         } else {
                                            //             // There was an error inserting data
                                            //             alert("Error inserting data: " + xhr.statusText);
                                            //         }
                                            //     }
                                            // };

                                            xhr.send();
                                        }
                                    
                                        // Update the Heat every second (1000 milliseconds)
                                        setInterval(updateHeat, 1000);
                                        // Update the temperature every second (1000 milliseconds)
                                        setInterval(updateTemperature, 1000);
                                        // Update the temperature every second (1000 milliseconds)
                                        setInterval(updateHumidity, 1000);
                                        // Update the temperature every second (1000 milliseconds)
                                        setInterval(updateSoil_Moisture, 1000);
                                        // Update the pH every second (1000 milliseconds)
                                        setInterval(updatepH, 1000);
                                        // Update the light every second (1000 milliseconds)
                                        setInterval(updateLight, 1000);
                                        // Update the light every second (1000 milliseconds)
                                        setInterval(updateNitrogen, 1000);
                                        // Update the light every second (1000 milliseconds)
                                        setInterval(updatePhosphorus, 1000);
                                        // Update the light every second (1000 milliseconds)
                                        setInterval(updatePotassium, 1000);
                                        //Schedule data insertion every 1 minute (in milliseconds)
                                        setInterval(insertAllData, 5000);// 1 day 
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                    <div class="col-lg-12 mb-4 order-0">
                        <div class="card">
                            <div class="col-sm-12 text-center text-sm-left">
                                <div class="card-body center pb-0 px-0 px-md-6">
                                    <?php
                                        if($query_run)
                                        {
                                            if(mysqli_num_rows($query_run)>0)
                                                $row = mysqli_fetch_assoc($query_run);
                                            ?>
                                            <img
                                            src="data:image/jpeg;base64,<?= base64_encode($row['imageRice']); ?>"
                                            height="300"
                                            alt="View Badge User"
                                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                            data-app-light-img="illustrations/man-with-laptop-light.png"
                                        />
                                        <?php
                                            echo '<p class="mb-4">
                                            This is the image of Rice today as of ' . $date . '<br>
                                        </p>';
                                        }
                                        else
                                        {
                                        echo "<h6> &nbsp; &nbsp; &nbsp; Please update the rice image today &nbsp; &nbsp;</h6>";
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                  
            <!-- Agricultural Parameters -->
            <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                <!-- Parameter 1 -->
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                <img
                                    src="../assets/img/icons/unicons/chart-success.png"
                                    alt="chart success"
                                    class="rounded"
                                />
                                </div>
                                <div class="dropdown">
                                <button
                                    class="btn p-0"
                                    type="button"
                                    id="cardOpt3"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                </div>
                            </div>

                            <span class="fw-semibold d-block mb-1 text-success">Temperature</span>
                            <h3 class="card-title mb-2" id="temperature"></h3>
                            <small>Temperature (degree Celsuis) is a 
                            measure of the degree of hotness or coldness of an object or environment. 
                            It quantifies the average kinetic energy of particles in a substance.</small>
                            </div>
                            <div class="container mt-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <!-- Embedded iframe from Thingspeak -->
                                        <iframe
                                            width="450"
                                            height="260"
                                            style="border: 1px solid #cccccc;"
                                            src="https://thingspeak.com/channels/2272330/charts/1?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&type=line&update=15"
                                            class="embed-responsive embed-responsive-16by9"
                                        ></iframe>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                <img
                                    src="../assets/img/icons/unicons/wallet-info.png"
                                    alt="Credit Card"
                                    class="rounded"
                                />
                                </div>
                                <div class="dropdown">
                                <button
                                    class="btn p-0"
                                    type="button"
                                    id="cardOpt6"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1 text-success">Humidity</span>
                            <h3 class="card-title text-nowrap mb-1" id="humidity"></h3>
                            <small>Humidity is a measure of the amount of water 
                                vapor present in the air. It indicates the level of moisture or dampness in the atmosphere.</small>
                            </div>
                            <div class="container mt-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <!-- Embedded iframe from Thingspeak -->
                                        <iframe width="450" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/2272330/charts/2?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&type=line&update=15"></iframe>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3"></div>
                        </div>
                    </div>
                </div>
                <!-- Parameter 2 -->
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                <img
                                    src="../assets/img/icons/unicons/chart-success.png"
                                    alt="chart success"
                                    class="rounded"
                                />
                                </div>
                                <div class="dropdown">
                                <button
                                    class="btn p-0"
                                    type="button"
                                    id="cardOpt3"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1 text-success">pH</span>
                            <h3 class="card-title mb-2" id="pH"></h3>
                            <small>pH is a measure of the acidity or alkalinity of a 
                                solution. It quantifies the concentration of hydrogen ions (H+) in a liquid. 
                                acidic (pH < 7), neutral (pH = 7), or alkaline (pH > 7).</small>
                            </div>
                            <div class="container mt-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <!-- Embedded iframe from Thingspeak -->
                                        <iframe width="450" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/2272330/charts/3?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&type=line&update=15"></iframe>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                <img
                                    src="../assets/img/icons/unicons/wallet-info.png"
                                    alt="Credit Card"
                                    class="rounded"
                                />
                                </div>
                                <div class="dropdown">
                                <button
                                    class="btn p-0"
                                    type="button"
                                    id="cardOpt6"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1 text-success">Soil Moisture</span>
                            <h3 class="card-title text-nowrap mb-1" id="soil_moisture"></h3>
                            <small>Soil moisture % refers to the amount of water 
                                content present in the soil. It indicates the wetness or dryness of the soil and 
                                is crucial for plant growth and agriculture.</small>
                            </div>
                            <div class="container mt-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <!-- Embedded iframe from Thingspeak -->
                                        <iframe width="450" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/2272330/charts/4?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&type=line&update=15"></iframe>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3"></div>
                        </div>
                    </div>
                </div>    
                <!-- Parameter 3 -->
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                <img
                                    src="../assets/img/icons/unicons/chart-success.png"
                                    alt="chart success"
                                    class="rounded"
                                />
                                </div>
                                <div class="dropdown">
                                <button
                                    class="btn p-0"
                                    type="button"
                                    id="cardOpt3"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1 text-success">Light</span>
                            <h3 class="card-title mb-2" id="light"></h3>
                            <small >Light (Lux) measurement can refer to either illuminance (the amount of light that falls on a surface) or luminance (the brightness of a light-emitting surface).</small>
                            </div>
                            <div class="container mt-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <!-- Embedded iframe from Thingspeak -->
                                        <iframe width="450" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/2272330/charts/5?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&type=line&update=15"></iframe>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                <img
                                    src="../assets/img/icons/unicons/chart-success.png"
                                    alt="chart success"
                                    class="rounded"
                                />
                                </div>
                                <div class="dropdown">
                                <button
                                    class="btn p-0"
                                    type="button"
                                    id="cardOpt3"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1 text-success">Nitrogen</span>
                            <h3 class="card-title mb-2" id="nitrogen"></h3>
                            <small >Nitrogen is a naturally occurring element that is essential for growth and reproduction in both plants and animals.</small>
                            </div>
                            <div class="container mt-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <!-- Embedded iframe from Thingspeak -->
                                        <iframe width="450" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/2272330/charts/6?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&type=line&update=15"></iframe>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-5"></div>
                        </div>
                    </div>
                </div>   
                  <!-- NPK -->
                <div class="row">
                    
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                <img
                                    src="../assets/img/icons/unicons/chart-success.png"
                                    alt="chart success"
                                    class="rounded"
                                />
                                </div>
                                <div class="dropdown">
                                <button
                                    class="btn p-0"
                                    type="button"
                                    id="cardOpt3"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1 text-success">Phosphorus</span>
                            <h3 class="card-title mb-2" id="phosphorus"></h3>
                            <small >Phosphorus is a mineral that naturally occurs in many foods and is also available as a supplement. It plays multiple roles in the body.</small>
                            </div>
                            <div class="container mt-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <!-- Embedded iframe from Thingspeak -->
                                        <iframe width="450" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/2272330/charts/7?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&type=line&update=15"></iframe>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                <img
                                    src="../assets/img/icons/unicons/chart-success.png"
                                    alt="chart success"
                                    class="rounded"
                                />
                                </div>
                                <div class="dropdown">
                                <button
                                    class="btn p-0"
                                    type="button"
                                    id="cardOpt3"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1 text-success">Potassium</span>
                            <h3 class="card-title mb-2" id="potassium"></h3>
                            <small >Potassium (K) is an essential element for plant growth it is important to food crops.</small>
                            </div>
                            <div class="container mt-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <!-- Embedded iframe from Thingspeak -->
                                        <iframe width="450" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/2272330/charts/8?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&type=line&update=15"></iframe>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                <img
                                    src="../assets/img/icons/unicons/wallet-info.png"
                                    alt="Credit Card"
                                    class="rounded"
                                />
                                </div>
                            </div>
                            <form id="formAuthentication" class="mb-3" action="image_in.php" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                <label class="form-label">Insert the current image of the rice today</label>
                                <input
                                    required
                                    type="file"
                                    class="form-control"
                                    id="username"
                                    name="photo"
                                    placeholder="Add profile picture"
                                    autofocus
                                />
                                </div>
                                <button type ="submit" name="submit" class="btn btn-success">Save</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            
            <!--/ Agricultural Parameters -->
        </div>
        
    </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with ❤️ by
                  <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">BS INFOTECH GROUP 4</a>
                </div>
                <div>
                  <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                  <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

                  <a
                    href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                    target="_blank"
                    class="footer-link me-4"
                    >Documentation</a
                  >

                  <a
                    href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                    target="_blank"
                    class="footer-link me-4"
                    >Support</a
                  >
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>

     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
