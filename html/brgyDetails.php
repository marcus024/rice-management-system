<?php
session_start();
$_SESSION["cat"] = "Barangay";
include("h1.php");
include("database.php");
?> 
  <!-- Content wrapper -->
  <div class="content-wrapper">
            <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Barangay Farm Information</h4>
            <div class="row">
                <!-- Basic -->
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body demo-vertical-spacing demo-only-element">
                            <div>
                                <?php
                                    $query = "SELECT f.barangayF, COUNT(f.emailF) AS numberOfFarmers, SUM(fd.farmSize) AS totalFarmSize FROM farmer f LEFT JOIN farmdetails fd ON f.emailF = fd.currentUser GROUP BY f.barangayF";
                                    $result = mysqli_query($conn, $query);

                                    if ($result) {
                                        ?>
                                        <table id=example1 class="display nowrap" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Barangay</th>
                                                    <th>Number of Farmers</th>
                                                    <th>Total Farm Size (Ha)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $row['barangayF']; ?></td>
                                                        <td><?php echo $row['numberOfFarmers']; ?></td>
                                                        <td><?php echo $row['totalFarmSize']; ?></td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <?php
                                    } else {
                                        echo "Error in query: " . mysqli_error($conn);
                                    }
                                    // mysqli_close($conn);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <?php include ("f.php")?>