<?php 
session_start();
$_SESSION["cat"] = "index";
$_SESSION["sub-cat"] = "";
include("h1.php");
include("database.php");


$imageData = isset($_SESSION['daPic']) ? $_SESSION['daPic'] : ''; // Default to empty string

// Only encode and display if image data exists
if ($imageData) {
    $base64Image = base64_encode($imageData);
} else {
    $base64Image = ''; // Or handle the case when there's no image data
}
// Default SQL query to get total number of farmers
$sql_total = "SELECT COUNT(*) AS totalFarmer FROM farmer";
// Check if a barangayF is selected
if (isset($_GET['barangayF']) && !empty($_GET['barangayF'])) {
    $barangayF = $conn->real_escape_string($_GET['barangayF']);
    // SQL query to count farmers in selected barangayF
    $sql_total = "SELECT COUNT(*) AS totalFarmer FROM farmer WHERE barangayF = '$barangayF'";
}

// Run the query to get total farmer count
$query_total = mysqli_query($conn, $sql_total);

if ($query_total) {
    $result_total = mysqli_fetch_assoc($query_total);
    $totalFarmer = $result_total['totalFarmer'];
} else {
    echo 'Error executing the query: ' . mysqli_error($conn);
}


// Check if a barangayF is selected
if (isset($_GET['barangayF']) && !empty($_GET['barangayF'])) {
  $barangayF = $conn->real_escape_string($_GET['barangayF']);

  // SQL query to sum farm sizes in selected barangayF using email
  $sql_total_farm_size = "SELECT SUM(fd.farmSize) AS totalFarmSize 
                          FROM farmdetails fd
                          INNER JOIN farmer bt ON fd.currentUser = bt.emailF
                          WHERE bt.barangayF = '$barangayF'";
} else {
  // Default SQL query to get total farm size across all barangays
  $sql_total_farm_size = "SELECT SUM(farmSize) AS totalFarmSize FROM farmdetails";
}

// Run the query to get total farm size
$query_total_farm_size = mysqli_query($conn, $sql_total_farm_size);

if ($query_total_farm_size) {
  $result_total_farm_size = mysqli_fetch_assoc($query_total_farm_size);
  $totalFarmSize = isset($result_total_farm_size['totalFarmSize']) ? $result_total_farm_size['totalFarmSize'] : 0;
} else {
  echo 'Error executing the query: ' . mysqli_error($conn);
}


//Total Production New Query
if (isset($_GET['barangayF']) && !empty($_GET['barangayF'])) {
  $barangayF = $conn->real_escape_string($_GET['barangayF']);

  // SQL query to sum farm sizes in selected barangayF using email
  $sql_total_farm_size = "SELECT SUM(fd.totalProd) AS totalProduction 
                          FROM farmdetails fd
                          INNER JOIN farmer bt ON fd.currentUser = bt.emailF
                          WHERE bt.barangayF = '$barangayF'";
} else {
  // Default SQL query to get total farm size across all barangays
  $sql_total_farm_size = "SELECT SUM(totalProd) AS totalProduction FROM farmdetails";
}

// Run the query to get total farm size
$query_total_farm_size = mysqli_query($conn, $sql_total_farm_size);

if ($query_total_farm_size) {
  $result_total_farm_size = mysqli_fetch_assoc($query_total_farm_size);
  $totalProd = isset($result_total_farm_size['totalProduction']) ? $result_total_farm_size['totalProduction'] : 0;

} else {
  echo 'Error executing the query: ' . mysqli_error($conn);
}

//Total Production New Query Upland
if (isset($_GET['barangayF']) && !empty($_GET['barangayF'])) {
  $barangayF = $conn->real_escape_string($_GET['barangayF']);

  // SQL query to sum farm sizes in selected barangayF using email
  $sql_total_farm_size = "SELECT SUM(fd.totalProd) AS totalProduction 
                          FROM farmdetails fd
                          INNER JOIN farmer bt ON fd.currentUser = bt.emailF
                          WHERE bt.barangayF = '$barangayF' AND fd.riceFarm = 'Up Land'";
} else {
  // Default SQL query to get total farm size across all barangays
  $sql_total_farm_size = "SELECT SUM(totalProd) AS totalProduction FROM farmdetails WHERE riceFarm = 'Up Land'";
}

// Run the query to get total farm size
$query_total_farm_size = mysqli_query($conn, $sql_total_farm_size);

if ($query_total_farm_size) {
  $result_total_farm_size = mysqli_fetch_assoc($query_total_farm_size);
  $upland = isset($result_total_farm_size['totalProduction']) ? $result_total_farm_size['totalProduction'] : 0;

} else {
  echo 'Error executing the query: ' . mysqli_error($conn);
}


//Total Production New Query Lowland
if (isset($_GET['barangayF']) && !empty($_GET['barangayF'])) {
  $barangayF = $conn->real_escape_string($_GET['barangayF']);

  // SQL query to sum farm sizes in selected barangayF using email
  $sql_total_farm_size = "SELECT SUM(fd.totalProd) AS totalProduction 
                          FROM farmdetails fd
                          INNER JOIN farmer bt ON fd.currentUser = bt.emailF
                          WHERE bt.barangayF = '$barangayF' AND fd.riceFarm = 'Low Land'";
} else {
  // Default SQL query to get total farm size across all barangays
  $sql_total_farm_size = "SELECT SUM(totalProd) AS totalProduction FROM farmdetails WHERE riceFarm = 'Low Land'";
}

// Run the query to get total farm size
$query_total_farm_size = mysqli_query($conn, $sql_total_farm_size);

if ($query_total_farm_size) {
  $result_total_farm_size = mysqli_fetch_assoc($query_total_farm_size);
  $lowland = isset($result_total_farm_size['totalProduction']) ? $result_total_farm_size['totalProduction'] : 0;

} else {
  echo 'Error executing the query: ' . mysqli_error($conn);
}


//Rice Type New Query
if (isset($_GET['barangayF']) && !empty($_GET['barangayF'])) {
  $barangayF = $conn->real_escape_string($_GET['barangayF']);

  // SQL query to sum farm sizes in selected barangayF using email
  $sql_total_farm_size = "SELECT COUNT(DISTINCT fd.riceType) AS riceTypes 
                          FROM farmdetails fd
                          INNER JOIN farmer bt ON fd.currentUser = bt.emailF
                          WHERE bt.barangayF = '$barangayF'";
} else {
  // Default SQL query to get total farm size across all barangays
  $sql_total_farm_size = "SELECT COUNT(DISTINCT riceType) AS riceTypes FROM farmdetails";
}

// Run the query to get total farm size
$query_total_farm_size = mysqli_query($conn, $sql_total_farm_size);

if ($query_total_farm_size) {
  $result_total_farm_size = mysqli_fetch_assoc($query_total_farm_size);
  $uniqueRiceTypes = isset($result_total_farm_size['riceTypes']) ? $result_total_farm_size['riceTypes'] : 0;

} else {
  echo 'Error executing the query: ' . mysqli_error($conn);
}




//Farmer Selection



//Filter Farmer
if (isset($_GET['nameF']) && !empty($_GET['nameF'])) {
  $nameF = $conn->real_escape_string($_GET['nameF']);
  // SQL query to count farmers in selected barangayF
  $sql_total = "SELECT COUNT(*) AS totalFarmer FROM farmer WHERE nameF = '$nameF'";
}

// Run the query to get total farmer count
$query_total = mysqli_query($conn, $sql_total);

if ($query_total) {
  $result_total = mysqli_fetch_assoc($query_total);
  $totalFarmer = $result_total['totalFarmer'];
} else {
  echo 'Error executing the query: ' . mysqli_error($conn);
}

// Filter Farn Size
if (isset($_GET['nameF']) && !empty($_GET['nameF'])) {
  $nameF = $conn->real_escape_string($_GET['nameF']);

  // SQL query to sum farm sizes in selected barangayF using email
  $sql_total_farm_size = "SELECT SUM(fd.farmSize) AS totalFarmSize 
                          FROM farmdetails fd
                          INNER JOIN farmer bt ON fd.currentUser = bt.emailF
                          WHERE bt.nameF = '$nameF'";
} else {
  // Default SQL query to get total farm size across all barangays
  $sql_total_farm_size = "SELECT SUM(farmSize) AS totalFarmSize FROM farmdetails";
}

// Run the query to get total farm size
$query_total_farm_size = mysqli_query($conn, $sql_total_farm_size);

if ($query_total_farm_size) {
  $result_total_farm_size = mysqli_fetch_assoc($query_total_farm_size);
  $totalFarmSize = isset($result_total_farm_size['totalFarmSize']) ? $result_total_farm_size['totalFarmSize'] : 0;
} else {
  echo 'Error executing the query: ' . mysqli_error($conn);
}


//Total Production New Query
if (isset($_GET['nameF']) && !empty($_GET['nameF'])) {
  $nameF = $conn->real_escape_string($_GET['nameF']);

  // SQL query to sum farm sizes in selected nameF using email
  $sql_total_farm_size = "SELECT SUM(fd.totalProd) AS totalProduction 
                          FROM farmdetails fd
                          INNER JOIN farmer bt ON fd.currentUser = bt.emailF
                          WHERE bt.nameF = '$nameF'";
} else {
  // Default SQL query to get total farm size across all names
  $sql_total_farm_size = "SELECT SUM(totalProd) AS totalProduction FROM farmdetails";
}

// Run the query to get total farm size
$query_total_farm_size = mysqli_query($conn, $sql_total_farm_size);

if ($query_total_farm_size) {
  $result_total_farm_size = mysqli_fetch_assoc($query_total_farm_size);
  $totalProd = isset($result_total_farm_size['totalProduction']) ? $result_total_farm_size['totalProduction'] : 0;

} else {
  echo 'Error executing the query: ' . mysqli_error($conn);
}

//Total Production New Query Upland
if (isset($_GET['nameF']) && !empty($_GET['nameF'])) {
  $nameF = $conn->real_escape_string($_GET['nameF']);

  // SQL query to sum farm sizes in selected nameF using email
  $sql_total_farm_size = "SELECT SUM(fd.totalProd) AS totalProduction 
                          FROM farmdetails fd
                          INNER JOIN farmer bt ON fd.currentUser = bt.emailF
                          WHERE bt.nameF = '$nameF' AND fd.riceFarm = 'Up Land'";
} else {
  // Default SQL query to get total farm size across all names
  $sql_total_farm_size = "SELECT SUM(totalProd) AS totalProduction FROM farmdetails WHERE riceFarm = 'Up Land'";
}

// Run the query to get total farm size
$query_total_farm_size = mysqli_query($conn, $sql_total_farm_size);

if ($query_total_farm_size) {
  $result_total_farm_size = mysqli_fetch_assoc($query_total_farm_size);
  $upland = isset($result_total_farm_size['totalProduction']) ? $result_total_farm_size['totalProduction'] : 0;

} else {
  echo 'Error executing the query: ' . mysqli_error($conn);
}


//Total Production New Query Lowland
if (isset($_GET['nameF']) && !empty($_GET['nameF'])) {
  $nameF = $conn->real_escape_string($_GET['nameF']);

  // SQL query to sum farm sizes in selected nameF using email
  $sql_total_farm_size = "SELECT SUM(fd.totalProd) AS totalProduction 
                          FROM farmdetails fd
                          INNER JOIN farmer bt ON fd.currentUser = bt.emailF
                          WHERE bt.nameF = '$nameF' AND fd.riceFarm = 'Low Land'";
} else {
  // Default SQL query to get total farm size across all names
  $sql_total_farm_size = "SELECT SUM(totalProd) AS totalProduction FROM farmdetails WHERE riceFarm = 'Low Land'";
}

// Run the query to get total farm size
$query_total_farm_size = mysqli_query($conn, $sql_total_farm_size);

if ($query_total_farm_size) {
  $result_total_farm_size = mysqli_fetch_assoc($query_total_farm_size);
  $lowland = isset($result_total_farm_size['totalProduction']) ? $result_total_farm_size['totalProduction'] : 0;

} else {
  echo 'Error executing the query: ' . mysqli_error($conn);
}


//Rice Type New Query
if (isset($_GET['nameF']) && !empty($_GET['nameF'])) {
  $nameF = $conn->real_escape_string($_GET['nameF']);

  // SQL query to sum farm sizes in selected nameF using email
  $sql_total_farm_size = "SELECT COUNT(DISTINCT fd.riceType) AS riceTypes 
                          FROM farmdetails fd
                          INNER JOIN farmer bt ON fd.currentUser = bt.emailF
                          WHERE bt.nameF = '$nameF'";
} else {
  // Default SQL query to get total farm size across all names
  $sql_total_farm_size = "SELECT COUNT(DISTINCT riceType) AS riceTypes FROM farmdetails";
}

// Run the query to get total farm size
$query_total_farm_size = mysqli_query($conn, $sql_total_farm_size);

if ($query_total_farm_size) {
  $result_total_farm_size = mysqli_fetch_assoc($query_total_farm_size);
  $uniqueRiceTypes = isset($result_total_farm_size['riceTypes']) ? $result_total_farm_size['riceTypes'] : 0;

} else {
  echo 'Error executing the query: ' . mysqli_error($conn);
}

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
                                
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                    <div class="col-lg-12 mb-4 order-0">
                        <div class="card">
                            <div class="col-sm-12 text-center text-sm-left">
                                <div class="card-body center pb-0 px-0 px-md-6">
                                <div class="row mb-3"></div>
                                <div class="col- mb-4 text-center">
                                    <div class="rounded-circle overflow-hidden mx-auto d-block" style="width: 300px; height: 300px; border: 5px solid bluegrey;">
                                    <?php if ($base64Image): ?>
                                        <img 
                                            src="data:image/jpeg;base64,<?= $base64Image; ?>" 
                                            alt="View Badge User" 
                                            class="w-100 h-100 object-fit-cover" 
                                        />
                                    <?php else: ?>
                                        <p>No image available.</p>
                                    <?php endif; ?>
                                    </div>
                                </div>
                                    <p class="mb-4">
                                        Current User : 
                                        <h3><?php echo  $_SESSION['nameP'] ?></h3>
                                        
                                    </p>
                                  <div>
                                    
                                  </div>
                                  <div>

                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Selections -->
                <div class="col-12 col-lg-12 order-3 order-md-3 order-lg-2 mb-2">
                  <div class="row">
                    <div class="col-lg-6 col-md-1 col-6 mb-2">
                        <div class="card">
                            <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11">Barangay</span>
                                <form method="GET" action="">
                                    <select class="form-select" aria-label="Select Rice Season" name="barangayF" onchange="this.form.submit()" required>
                                        <option value="">Select</option>
                                        <?php
                                        // SQL query to fetch distinct barangays
                                        $sql = "SELECT DISTINCT barangayF FROM farmer";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            // Output data of each row
                                            while ($row = $result->fetch_assoc()) {
                                                $selected = isset($_GET['barangayF']) && $_GET['barangayF'] == $row["barangayF"] ? 'selected' : '';
                                                echo '<option value="' . $row["barangayF"] . '" ' . $selected . '>' . $row["barangayF"] . '</option>';
                                            }
                                        } else {
                                            echo '<option value="">No Barangays found</option>';
                                        }
                                        ?>
                                    </select>
                                </form>
                            </div>
                            </div>
                            <!-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-1 col-6 mb-2">
                        <div class="card">
                            <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                              <div class="input-group">
                                <span class="input-group-text" id="basic-addon11">Farmer</span>
                                <form method="GET" action="">
                                    <select class="form-select" aria-label="Select Farmer" name="nameF" onchange="this.form.submit()" required>
                                        <option value="">Select</option>
                                        <?php
                                        // SQL query to fetch distinct barangays
                                        $sql = "SELECT DISTINCT nameF FROM farmer";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            // Output data of each row
                                            while ($row = $result->fetch_assoc()) {
                                                $selected = isset($_GET['nameF']) && $_GET['nameF'] == $row["nameF"] ? 'selected' : '';
                                                echo '<option value="' . $row["nameF"] . '" ' . $selected . '>' . $row["nameF"] . '</option>';
                                            }
                                        } else {
                                            echo '<option value="">No Farmers found</option>';
                                        }
                                        ?>
                                    </select>
                                </form>
                              </div> 
                            </div>
                            <!-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small> -->
                            </div>
                        </div>
                    </div>
                    
                  </div>
                </div>  
                <!-- Selections -->
                <!-- Agricultural Parameters -->
              <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                <!-- Parameter 1 -->
                <div class="row">
                  <!-- Selections -->
                  <!-- Selections -->
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
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                </div>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Total Farmers</span>
                            <h3 class="card-title mb-2"><?php echo $totalFarmer; ?></h3>
                            <!-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small> -->
                            </div>
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
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                              </div>
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">Total Farm Size</span>
                          <h3 class="card-title mb-2"><?php echo $totalFarmSize ?> Hectares</h3>
                          <!-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small> -->
                        </div>
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
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                              </div>
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">Lowland Production</span>
                          <h3 class="card-title mb-2"><?php echo $lowland ?> sacks</h3>
                          <!-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small> -->
                        </div>
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
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                              </div>
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">Upland Production</span>
                          <h3 class="card-title mb-2"><?php echo $upland, " sacks"; ?></h3>
                          <!-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small> -->
                        </div>
                      </div>
                    </div>
            <!--/ Agricultural Parameters -->
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
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                              </div>
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">Total Production</span>
                          <h3 class="card-title mb-2"><?php echo $totalProd ?> sacks</h3>
                          <!-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small> -->
                        </div>
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
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                              </div>
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">Total Rice Types</span>
                          <h3 class="card-title mb-2"><?php echo $uniqueRiceTypes; ?></h3>
                          <!-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small> -->
                        </div>
                      </div>
                    </div>
            <!--/ Agricultural Parameters -->
        </div>
            <?php include ("f.php")?>