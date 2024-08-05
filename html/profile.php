<?php
session_start();
$_SESSION["cat"] = "Profile";
$_SESSION["sub-cat"] = "";
include("h.php");
?>    


<script>
  function validateForm() {
    // Name validation (allowing letters, spaces, and apostrophes)
    var nameRegex = /^[a-zA-Z\s']+$/;
    var nameField = document.getElementById('name');
    if (!nameRegex.test(nameField.value)) {
      alert('Invalid Name');
      return false;
    }

    // Email validation
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var emailField = document.getElementById('email');
    if (!emailRegex.test(emailField.value)) {
      alert('Invalid Email');
      return false;
    }

    // Password validation (at least 6 characters)
    var passwordField = document.getElementById('password');
    if (passwordField.value.length < 6) {
      alert('Password must be at least 6 characters long');
      return false;
    }

    // Barangay validation (allowing letters, spaces, and numbers)
    var barangayRegex = /^[a-zA-Z0-9\s]+$/;
    var barangayField = document.getElementById('barangay');
    if (!barangayRegex.test(barangayField.value)) {
      alert('Invalid Barangay');
      return false;
    }

    // Contact Number validation (allowing numbers and optional hyphen)
    var contactRegex = /^\d+(-\d+)?$/;
    var contactField = document.getElementById('contact');
    if (!contactRegex.test(contactField.value)) {
      alert('Invalid Contact Number');
      return false;
    }

    // Rice Type validation (allowing letters, spaces, and numbers)
    var riceTypeRegex = /^[a-zA-Z0-9\s]+$/;
    var riceTypeField = document.getElementById('riceType');
    if (!riceTypeRegex.test(riceTypeField.value)) {
      alert('Invalid Rice Type');
      return false;
    }

    // Farm Size validation (numeric and positive)
    var farmSizeField = document.getElementById('farmSize');
    if (isNaN(farmSizeField.value) || farmSizeField.value <= 0) {
      alert('Invalid Farm Size');
      return false;
    }

    // Total Production validation (numeric and positive)
    var totalProdField = document.getElementById('totalProd');
    if (isNaN(totalProdField.value) || totalProdField.value <= 0) {
      alert('Invalid Total Production');
      return false;
    }

    // If all validations pass, submit the form
    return true;
  }
</script>

    <!-- Content wrapper -->
    <div class="content-wrapper">
            <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Profile /</span> Farmer's Profile</h4>
            <div class="row">
                <!-- Basic -->
                <div class="col-md-12">
                    <div class="card mb-4">
                        <h5 class="card-header">Farmer's Details</h5>
                        <div class="card-body demo-vertical-spacing demo-only-element">
                            <div></div>
                            <div class="row mb-3"></div>
                                <div class="col- mb-4 text-center">
          
                                <div class="row mb-3"></div>
                                <div class="col- mb-4 text-center">
                                    <div class="rounded-circle overflow-hidden mx-auto d-block" style="width: 300px; height: 300px; border: 5px solid bluegrey;">
                                        <img
                                            src="data:image/jpeg;base64,<?= base64_encode($_SESSION['farmerPic']); ?>"
                                            alt="View Badge User"
                                            class="w-100 h-100 object-fit-cover"
                                        />
                                    </div>
                                </div>
                                </div>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11">Name</span>
                                <input
                                type="textarea"
                                class="form-control"
                                placeholder="<?php echo  $_SESSION['nameF'] ?>"
                                aria-label="Username"
                                aria-describedby="basic-addon11"
                                id = "name"
                                />
                            </div>
                            <div></div>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11">Email</span>
                                <input
                                type="textarea"
                                class="form-control"
                                placeholder="<?php echo  $_SESSION['emailF'] ?>"
                                aria-label="Username"
                                aria-describedby="basic-addon11"
                                />
                            </div>
                            <div></div>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11">Password</span>
                                <input
                                type="textarea"
                                class="form-control"
                                placeholder="<?php echo  $_SESSION['passwordF'] ?>"
                                aria-label="Username"
                                aria-describedby="basic-addon11"
                                />
                            </div>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11">Barangay</span>
                                <input
                                type="textarea"
                                class="form-control"
                                placeholder="<?php echo  $_SESSION['barangayF'] ?>"
                                aria-label="Username"
                                aria-describedby="basic-addon11"
                                />
                            </div>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11">Contact Number</span>
                                <input
                                type="textarea"
                                class="form-control"
                                placeholder="<?php echo  $_SESSION['contactF'] ?>"
                                aria-label="Username"
                                aria-describedby="basic-addon11"
                                />
                            </div>
                            <div class="demo-inline-spacing">
                            <a href="farmout.php" class="btn btn-danger">Logout</a>
                            </div>
                            <div></div>
                        </div>
                    </div>
                </div>

                <!-- Merged -->
            
        </div>
    </div>
</div>