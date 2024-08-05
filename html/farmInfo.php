<?php
session_start();
$_SESSION["cat"] = "Farmers";
include("h1.php");
include("database.php");
?> 
  <!-- Content wrapper -->
  <div class="content-wrapper">
            <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Farmers Information</h4>
            <div class="row">
                <!-- Basic -->
                <div class="col-md-12">
                    <div class="card-body">
                        <div class="table-wrapper-scroll-y my-custom-scrollbar">
                            <div class="table-responsive text-nowrap" style="overflow-y:auto;">
                                <table id="example" class="display nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact Number</th>
                                        <th>Barangay</th>
                                        <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $query = "SELECT * FROM farmer ";
                                            $query_run = mysqli_query($conn, $query);

                                            if(mysqli_num_rows($query_run) > 0)
                                            {
                                            foreach($query_run as $student)
                                            {
                                            ?>
                                            <tr>
                                            <td><?= $student['nameF']; ?></td>
                                            <td><?= $student['emailF']; ?></td>
                                            <td><?= $student['contactF']; ?></td>
                                            <td><?= $student['barangayF']; ?></td>
                                            <td>
                                            <a class="btn btn-success" href="viewFarmer.php?id=<?php echo $student['id']; ?>">View</a>&nbsp;
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
    <?php include ("f.php")?>