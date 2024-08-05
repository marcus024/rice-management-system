<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Rice Management System</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  
    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register Card -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <h3>Register</h3>
              </div>
              <p class="text-center">
                <span>Registering as Farmer</span>
                <a href="regDa.php">
                  <span>Sign in as DA personnel instead</span>
                </a>
              </p>
              <!-- /Logo -->
            <form id="formAuthentication" class="mb-1" action="regFarmBack.php" method="POST" enctype="multipart/form-data">
                <div class="mb-2">
                  <label for="username" class="form-label">Name</label>
                  <input
                  required
                    type="text"
                    class="form-control"
                    id="username"
                    name="nameF"
                    placeholder="Enter your name"
                    autofocus
                  />
                </div>
                <div class="mb-2">
                  <label for="email" class="form-label">Email</label>
                  <input requied type="text" class="form-control" id="email" name="emailF" placeholder="Enter your email" />
                </div>
                <div class="mb-2 form-password-toggle">
                  <label class="form-label" for="password">Password</label>
                  <div class="input-group input-group-merge">
                    <input
                    required
                      type="password"
                      id="password"
                      class="form-control"
                      name="passwordF"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <!-- <div class="mb-2">
                  <label for="barangay" class="form-label">Barangays in Catbalogan Only (Optional)</label>
                  <select
                      placeholder = "Example: Buluan (Optional)"
                      class="form-control"
                      id="barangay"
                      name="barangayF"
                      autofocus
                  >
                      <option value="" disabled selected>Select your barangay</option>
                      <option value="Albalate">Albalate</option>
                      <option value="Bagongon">Bagongon</option>
                      <option value="Bangon">Bangon</option>
                      <option value="Barangay 8">Barangay 8</option>
                      <option value="Barangay 9">Barangay 9</option>
                      <option value="Basiao">Basiao</option>
                      <option value="Brgy. 5">Brgy. 5</option>
                      <option value="Buluan">Buluan</option>
                      <option value="Bunuanan">Bunuanan</option>
                      <option value="Cabugawan">Cabugawan</option>
                      <option value="Cagudalo">Cagudalo</option>
                      <option value="Cagusipan">Cagusipan</option>
                      <option value="Cagutian">Cagutian</option>
                      <option value="Cagutsan">Cagutsan</option>
                      <option value="Canhawan">Canhawan</option>
                      <option value="Canhawan Goti">Canhawan Goti</option>
                      <option value="Canlapwas">Canlapwas</option>
                      <option value="Cawayan">Cawayan</option>
                      <option value="Cinco">Cinco</option>
                      <option value="Darahuway Daco">Darahuway Daco</option>
                      <option value="Darahuway Gote">Darahuway Gote</option>
                      <option value="Darahuway Goti">Darahuway Goti</option>
                      <option value="Estaka">Estaka</option>
                      <option value="Guindaponan">Guindaponan</option>
                      <option value="Guindapunan">Guindapunan</option>
                      <option value="Guinsorongan">Guinsorongan</option>
                      <option value="Ibol">Ibol</option>
                      <option value="Iguid">Iguid</option>
                      <option value="Lagundi">Lagundi</option>
                      <option value="Libas">Libas</option>
                      <option value="Lobo">Lobo</option>
                      <option value="Manguihay">Manguihay</option>
                      <option value="Maulong">Maulong</option>
                      <option value="Mercedes">Mercedes</option>
                      <option value="Mercedez">Mercedez</option>
                      <option value="Mombon">Mombon</option>
                      <option value="Munoz">Munoz</option>
                      <option value="New Mahayag">New Mahayag</option>
                      <option value="Old Mahayag">Old Mahayag</option>
                      <option value="Old Mahayagt">Old Mahayagt</option>
                      <option value="Palanyogon">Palanyogon</option>
                      <option value="Pandan">Pandan</option>
                      <option value="Pangdan">Pangdan</option>
                      <option value="Payao">Payao</option>
                      <option value="Poblacion 1">Poblacion 1</option>
                      <option value="Poblacion 10">Poblacion 10</option>
                      <option value="Poblacion 11">Poblacion 11</option>
                      <option value="Poblacion 12">Poblacion 12</option>
                      <option value="Poblacion 13">Poblacion 13</option>
                      <option value="Poblacion 2">Poblacion 2</option>
                      <option value="Poblacion 3">Poblacion 3</option>
                      <option value="Poblacion 4">Poblacion 4</option>
                      <option value="Poblacion 5">Poblacion 5</option>
                      <option value="Poblacion 6">Poblacion 6</option>
                      <option value="Poblacion 7">Poblacion 7</option>
                      <option value="Poblacion 8">Poblacion 8</option>
                      <option value="Poblacion 9">Poblacion 9</option>
                      <option value="Pupua">Pupua</option>
                      <option value="Rama">Rama</option>
                      <option value="San Andres">San Andres</option>
                      <option value="San Roque">San Roque</option>
                      <option value="San Vicente">San Vicente</option>
                      <option value="Silanga">Silanga</option>
                      <option value="Socorro">Socorro</option>
                      <option value="Totoringon">Totoringon</option>
                  </select>
              </div> -->

                <div class="mb-2">
                  <label for="username" class="form-label">Barangay</label>
                  <input
                    type="text"
                    class="form-control"
                    name="barangayF"
                    placeholder="Example : San Roque,Daram or Canlapwas,Catbalogan"
                    autofocus
                  />
                </div>
                <div class="mb-2">
                  <label for="username" class="form-label">Contact Number</label>
                  <input
                  required
                    type="text"
                    class="form-control"
                    id="username"
                    name="contactF"
                    placeholder="Example : 09286740278"
                    autofocus
                  />
                </div>
                <label for="username" class="form-label">Season</label>
                <div class="input-group">
                                <span class="input-group-text" id="basic-addon11">Choose brgy</span>
                                <select
                                    class="form-select"
                                    aria-label="Select Rice Season"
                                    name="barangayF"
                                    required
                                >
                                <option value="">Select Barangay</option>
                                <option value="Albalate">Albalate</option>
                                <option value="Bagongon">Bagongon</option>
                                <option value="Bangon">Bangon</option>
                                <option value="Basiao">Basiao</option>
                                <option value="Buluan">Buluan</option>
                                <option value="Bunuanan">Bunuanan</option>
                                <option value="Cabugawan">Cabugawan</option>
                                <option value="Cagudalo">Cagudalo</option>
                                <option value="Cagusipan">Cagusipan</option>
                                <option value="Cagutian">Cagutian</option>
                                <option value="Cagutsan">Cagutsan</option>
                                <option value="Canhawan Guti">Canhawan Guti</option>
                                <option value="Canlapwas (Poblacion 15)">Canlapwas (Poblacion 15)</option>
                                <option value="Cawayan">Cawayan</option>
                                <option value="Cinco">Cinco</option>
                                <option value="Darahuway Daco">Darahuway Daco</option>
                                <option value="Darahuway Guti">Darahuway Guti</option>
                                <option value="Estaka">Estaka</option>
                                <option value="Guindapunan">Guindapunan</option>
                                <option value="Guinsorongan">Guinsorongan</option>
                                <option value="Ibol">Ibol</option>
                                <option value="Iguid">Iguid</option>
                                <option value="Lagundi">Lagundi</option>
                                <option value="Libas">Libas</option>
                                <option value="Lobo">Lobo</option>
                                <option value="Manguehay">Manguehay</option>
                                <option value="Maulong (Oraa)">Maulong (Oraa)</option>
                                <option value="Mercedes">Mercedes</option>
                                <option value="Mombon">Mombon</option>
                                <option value="New Mahayag (Anayan)">New Mahayag (Anayan)</option>
                                <option value="Old Mahayag">Old Mahayag</option>
                                <option value="Palanyogon">Palanyogon</option>
                                <option value="Pangdan">Pangdan</option>
                                <option value="Payao">Payao</option>
                                <option value="Poblacion 1 (Barangay 1)">Poblacion 1 (Barangay 1)</option>
                                <option value="Poblacion 2 (Barangay 2)">Poblacion 2 (Barangay 2)</option>
                                <option value="Poblacion 3 (Barangay 3)">Poblacion 3 (Barangay 3)</option>
                                <option value="Poblacion 4 (Barangay 4)">Poblacion 4 (Barangay 4)</option>
                                <option value="Poblacion 5 (Barangay 5)">Poblacion 5 (Barangay 5)</option>
                                <option value="Poblacion 6 (Barangay 6)">Poblacion 6 (Barangay 6)</option>
                                <option value="Poblacion 7 (Barangay 7)">Poblacion 7 (Barangay 7)</option>
                                <option value="Poblacion 8 (Barangay 8)">Poblacion 8 (Barangay 8)</option>
                                <option value="Poblacion 9 (Barangay 9)">Poblacion 9 (Barangay 9)</option>
                                <option value="Poblacion 10 (Barangay 10 : Monsanto Street)">Poblacion 10 (Barangay 10 : Monsanto Street)</option>
                                <option value="Poblacion 11 (Barangay 11)">Poblacion 11 (Barangay 11)</option>
                                <option value="Poblacion 12 (Barangay 12)">Poblacion 12 (Barangay 12)</option>
                                <option value="Poblacion 13 (Barangay 13)">Poblacion 13 (Barangay 13)</option>
                                <option value="Muñoz (Poblacion 14)">Muñoz (Poblacion 14)</option>
                                <option value="Pupua">Pupua</option>
                                <option value="Rama">Rama</option>
                                <option value="San Andres">San Andres</option>
                                <option value="San Pablo">San Pablo</option>
                                <option value="San Roque">San Roque</option>
                                <option value="San Vicente">San Vicente</option>
                                <option value="Silanga (Papaya)">Silanga (Papaya)</option>
                                <option value="Socorro">Socorro</option>
                                <option value="Totoringon">Totoringon</option>
                                </select>
                            </div>
                <div class="mb-2">
                  <label for="username" class="form-label">Photo</label>
                  <input
                  required
                    type="file"
                    class="form-control"
                    id="username"
                    name="photo"
                    placeholder="Select profile picture"
                    autofocus
                  />
                </div>
                <!-- <div class="mb-2">
                  <label for="cameraInput" class="form-label">Capture Photo</label>
                  <div class="row">
                      <div class="col-md-6">
                          <div id="my_camera"></div>
                          <br/>
                          <input type=button class="btn btn-primary d-grid w-70" value="Capture" onClick="take_snapshot()">
                          <input type="hidden" name="image" class="image-tag">
                      </div>
                      <div class="col-md-6">
                          <div id="results">Your image will be shown here.</div>
                      </div>
                  </div>
              </div> -->
                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                    <label class="form-check-label" for="terms-conditions">
                      I agree to
                      <a href="javascript:void(0);">privacy policy & terms</a>
                    </label>
                  </div>
                </div>
                <div class="mb-3"></div>
                <button value="Upload" type="submit" name="submit" class="btn btn-primary d-grid w-100">Sign up as Farmer</button>
            </form>
              <p class="text-center">
                <span>Already have an account?</span>
                <a href="loginFarm.php">
                  <span>Sign in instead</span>
                </a>
              </p>
            </div>
          </div>
          <!-- Register Card -->
        </div>
      </div>
    </div>

    <!-- / Content -->
<!-- 
    <script>

Webcam.set({
        width: 100,
        height: 100,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
  
    Webcam.attach( '#my_camera' );
  
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }    

    document.getElementById('cameraInput').addEventListener('change', function (e) {
        const fileInput = e.target;
        const files = fileInput.files;

        if (files.length > 0) {
            const video = document.createElement('video');
            video.setAttribute('autoplay', true);

            const canvas = document.createElement('canvas');
            const context = canvas.getContext('2d');

            navigator.mediaDevices.getUserMedia({ video: true })
                .then(function (stream) {
                    video.srcObject = stream;
                    document.body.appendChild(video);

                    video.addEventListener('loadedmetadata', function () {
                        canvas.width = video.videoWidth;
                        canvas.height = video.videoHeight;

                        context.drawImage(video, 0, 0, canvas.width, canvas.height);

                        // Convert canvas content to data URL and assign it to the file input
                        const dataUrl = canvas.toDataURL('image/jpeg');
                        fileInput.value = dataUrl;

                        // Stop the video stream
                        stream.getTracks().forEach(track => track.stop());
                        video.remove();
                    });
                })
                .catch(function (error) {
                    console.error('Error accessing camera:', error);
                });
        }
    });
</script> -->
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
