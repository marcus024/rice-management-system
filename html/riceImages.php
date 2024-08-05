<?php
session_start();
$_SESSION["cat"] = "Rice";
include("h1.php");
include("database.php");
?> 
  <!-- Content wrapper -->
  <div class="content-wrapper">
            <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Daily Rice Images</h4>
            <div class="row">
                <!-- Basic -->
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body demo-vertical-spacing demo-only-element">
                            <!-- Content wrapper -->
                            <div class="card-body">
                                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                <div class="table-responsive text-nowrap" style="overflow-y:auto;">
                                    <table id="example1" class="display nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Rice Image</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            $query = "SELECT * FROM ricePic ";
                                            $query_run = mysqli_query($conn, $query);

                                            if(mysqli_num_rows($query_run) > 0)
                                            {
                                                foreach($query_run as $student)
                                                {
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?php
                                                            // Assuming $student['imageRice'] contains the blob data
                                                            $imageData = $student['imageRice'];
                                                            
                                                            // Convert the blob data to base64
                                                            $base64Image = base64_encode($imageData);
                                                            
                                                            // Display the image using the data URI scheme
                                                            echo '<img src="data:image/jpeg;base64,' . $base64Image . '" alt="Rice Image">';
                                                            ?>
                                                        </td>
                                                        <td><?= $student['monthP']; ?></td>
                                                        <td>
                                                            <div class="btn-group" role="group">
                                                                <div></div>
                                                                <div class="col-md-8">   
                                                                    <form action="riceDelete.php" method="post" onsubmit="return confirm('Are you sure you want to delete this record?');" style="display: inline;">
                                                                    <input type="hidden" name="idPic" value="<?= $student['idPic']; ?>">
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
        </div>
    </div>
    <?php include ("f.php")?>