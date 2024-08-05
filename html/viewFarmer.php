<?php 
session_start();
include('h1.php');
include('viewFarmerBack.php');

?>
            <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Rice Monitoring/</span>Farmer Details</h4>
              <div class="row">
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                    </div>
                    <div class="card-body">
                      
                    <div class="row mb-3">
                   <div class="row mb-3"></div>
                    <div class="col- mb-4 text-center">
                        <div class="rounded-circle overflow-hidden mx-auto d-block" style="width: 300px; height: 300px; border: 5px solid bluegrey;">
                            <img
                                src="data:image/jpeg;base64,<?= base64_encode($row['farmerPic']); ?>"
                                alt="View Badge User"
                                class="w-100 h-100 object-fit-cover"
                            />
                        </div>
                    </div>
                    <div >

                    </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-company">Farmer Name</label>
                        <div class="col-sm-10">
                          <input
                            type="text"
                            class="form-control"
                            id="basic-default-company"
                            placeholder="<?php echo $row["nameF"]; ?>"
                          />
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-company">Email</label>
                        <div class="col-sm-10">
                          <input
                            type="text"
                            class="form-control"
                            id="basic-default-company"
                            placeholder="<?php echo $row["emailF"]; ?>"
                          />
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-company">Contact Number</label>
                        <div class="col-sm-10">
                          <input
                            type="text"
                            class="form-control"
                            id="basic-default-company"
                            placeholder="<?php echo $row["contactF"]; ?>"
                          />
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-company">Barangay</label>
                        <div class="col-sm-10">
                          <input
                            type="text"
                            class="form-control"
                            id="basic-default-company"
                            placeholder="<?php echo $row["barangayF"]; ?>"
                          />
                        </div>
                      </div>
                     

                    <div style="padding: 20px;">
                    <h4><?php echo $row["nameF"]; ?>'s Farm Details</h4></div>
                    <div class="card-body">
                        <div class="table-wrapper-scroll-y my-custom-scrollbar">
                            <div class="table-responsive text-nowrap" style="overflow-y:auto;">
                            <table id="example2" class="display nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Rice Type</th>
                                        <th>Farm Size</th>
                                        <th>Total Production</th>
                                        <th>Status</th>
                                        <th>Problem</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    
                                    $query = "SELECT * FROM farmdetails where currentUser = '$emailF'";
                                    $query_run = mysqli_query($conn, $query);
                                    
                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $student)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $student['riceType']; ?></td>
                                                <td><?= $student['farmSize']; ?></td>
                                                <td><?= $student['riceFarm']; ?></td>
                                                <td><?= $student['totalProd']; ?></td>
                                                <td><?= $student['statusR']; ?></td>
                                                <td><?= $student['problem']; ?></td>
                                                
                                            </tr>
                                    <?php
                                        }
                                    }
                                  
                                ?>      
                              </tbody>     
                            </table>
                          </div>
                        </div>
                    </div>
                <div class="row justify-content-start">
                <div class="col-sm-10">
                    <a type="submit" href="dashDA.php" class="btn btn-primary">Back</a>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
<?php 
include('f.php');
?>