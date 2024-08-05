
<div class="table-wrapper-scroll-y my-custom-scrollbar">
            <div class="table-responsive text-nowrap" style="overflow-y:auto;">
                <table class="table datatable" id="data-table-body">
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
                    <tbody class="table-border-bottom-0" id="data-table-body">
                     <!-- Content PHP -->
                  
                      <!-- Content PHP -->
                    </tbody>
                </table>
            </div>
        </div>
        <script>
            // Function to update the table with new data
            function updateTable() {
                $.ajax({
                    url: 'update_table.php', // Create a PHP file for updating data from ThingSpeak
                    method: 'POST',
                    success: function (data) {
                        $('#data-table-body').html(data);
                    }
                });
            }

            // Call the updateTable function every 5 seconds (you can adjust the interval)
            setInterval(updateTable,  86400000);
        </script>