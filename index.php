<?php
   require 'conn.php';
   $upload_dir = 'uploads/';
   
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="theme-color" content="#f4f5f7" />
      <title>NCA SURVEY</title>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
      <!-- Tel -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
      <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
      <!-- Icons -->
      <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
      <link rel="stylesheet" href="assets/vendor/@fortawesome/css/all.min.css" type="text/css">
      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" type="text/css"/>
      <!-- Argon CSS -->
      <link rel="stylesheet" href="assets/css/argon.css" type="text/css">
      <link rel="stylesheet" href="assets/css/aos.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
   </head>
   <body>
      <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
         <div class="container text-center">
            <a class="navbar-brand mx-auto" href="">
              <img src="assets/img/nca_2.png" width="325">
            </a>
         </div>
      </nav>
      <div class="container mt-5">
         <div class="row justify-content-center">
            <div class="col-md-12">
               <h1 class="text-muted text-center"><em>EXPRESSION OF INTEREST FOR THE REGISTRATION OF RESOURCE PERSON</em></h1>
               <hr style="border-top:1px dotted #ccc;"/>
               <div class="card">
                  <div class="card-header bg-warning text-white">
                     Thank you for your interest to Register as a Resource Persons. Please complete this application form to get registered.
                  </div>
                  <div class="card-body col-md-12 mx-auto">
                     <form method="POST" action="save.php" enctype="multipart/form-data">
                        <div id="carouselExampleIndicators" class="carousel slide" data-interval="false">
                           <div class="carousel-inner">
                              <div class="carousel-item active">
                                 <?php include 'inc/1.php'?>
                              </div>
                              <div class="carousel-item">
                                 <?php include 'inc/2.php'?>
                              </div>
                              <div class="carousel-item">
                                 <?php include 'inc/3.php'?>
                              </div>
                              <div class="carousel-item">
                                 <?php include 'inc/4.php'?>
                              </div>
                              <div class="carousel-item">
                                 <?php include 'inc/5.php'?>
                              </div>
                              <div class="carousel-item">
                                 <?php include 'inc/6.php'?>
                              </div>
                              <div class="carousel-item">
                                 <?php include 'inc/7-8-9.php'?>
                              </div>
                              <div class="carousel-item">
                                 <?php include 'inc/10-11.php'?>
                              </div>
                              <div class="carousel-item">
                                 <?php include 'inc/12.php'?>
                              </div>
                              <div class="carousel-item">
                                 <?php include 'inc/13.php'?>
                              </div>
                              <div class="carousel-item">
                                 <?php include 'inc/14-15-16.php'?>
                              </div>
                              <div class="carousel-item">
                                 <?php include 'inc/17-18-19.php'?>
                              </div>
                              <div class="carousel-item">
                                 <?php include 'inc/20.php'?>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                          <a href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="btn btn-primary waves" aria-hidden="true">Previous</span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="btn btn-primary waves" aria-hidden="true">Next
                            <span class="sr-only">Next</span>
                          </a>
                        </div>
                     </form>
                  </div>
               </div>
               <div class="mt-7">
               </div>
            </div>
         </div>
      </div>
      <!-- <script src="assets/js/bootstrap.min.js" charset="utf-8"></script> -->
      <script>
         const phoneInputField = document.querySelector("#phone");
         const phoneInput = window.intlTelInput(phoneInputField, {
            initialCountry: "ke",
            preferredCountries: ["ke", "tz", "ug"],
            utilsScript:
              "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
         });
         
         const info = document.querySelector(".alert-info");
         
         function process(event) {
          event.preventDefault();
         
          const phoneNumber = phoneInput.getNumber();
         
          info.style.display = "";
          info.innerHTML = `Phone number in E.164 format: <strong>${phoneNumber}</strong>`;
         }
         
         function getIp(callback) {
          fetch('https://ipinfo.io/json?token=<your token>', { headers: { 'Accept': 'application/json' }})
            .then((resp) => resp.json())
            .catch(() => {
              return {
                country: 'ke',
              };
            })
            .then((resp) => callback(resp.country));
         }
      </script>
      <script src="https://code.jquery.com/jquery-3.3.1.min.js" charset="utf-8"></script>
      <!-- Scripts -->
      <script src="assets/vendor/jquery/jquery.min.js"></script>
      <script src="assets/vendor/bootstrap/bootstrap.bundle.min.js"></script>
      <script src="assets/vendor/bootstrap-notify/bootstrap-notify.min.js"></script>
      <script src="assets/vendor/js-cookie/js.cookie.js"></script>
      <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
      <script src="assets/vendor/jquery-scroll-lock/jquery-scrollLock.min.js"></script>
      <!-- Argon JS -->
      <script src="assets/js/argon.min.js"></script>
      <script src="assets/js/argon.js"></script>
      <!-- Argon JS -->
      <script src="assets/js/argon.js"></script>
      <script src="assets/js/aos.js"></script>
   </body>
</html>