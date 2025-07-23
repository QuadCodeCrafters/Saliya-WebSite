<?php
require 'vendor/autoload.php';
use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;
require_once 'blobStorageCon.php'; //blob storage connection
require_once 'sqlConnection.php'; //sql connection 
require_once 'dbProcess.php';

    $containerName = "images";
    $blob = "contactUSbackimage.jpg";
    $blob2 = "mainBackground1.jpg";
    try {
        $blobClient = BlobRestProxy::createBlobService($connectionString);
        $linkImg = "http://127.0.0.1:10000/devstoreaccount1/{$containerName}/{$blob}?" . time();
        $linkImg2 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName}/{$blob2}?" . time();
    } catch (ServiceException $e) {
        error_log("Blob error: " . $e->getMessage());
        die("Could not retrieve blob.");
    }
    //MS azure end 
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    if ($conn === false) {
        die(print_r(sqlsrv_errors(), true)); // Better error handling
    }

    $tsql= "SELECT content FROM descriptions WHERE id = 56";
    $getResults = sqlsrv_query($conn, $tsql);

    //echo ("Reading data from table" . PHP_EOL);
    if ($getResults === false) {
        die(print_r(sqlsrv_errors(), true)); // Handle query errors
    }
    while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
        if ($row === null) {
           // echo 'No more rows to fetch.';
            break;
        }
        $statement = $row['content'];
    }
    sqlsrv_free_stmt($getResults);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Contact</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@600;700&family=Ubuntu:wght@400;500&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
         .open-modal {
      color: #007bff;
      text-decoration: none;
      cursor: pointer;
    }
    .open-modal:hover {
      text-decoration: underline;
    }
    /* Modal background */
    .modal {
      display: none; /* Hidden by default */
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      justify-content: center;
      align-items: center;
      z-index: 1000;
    }
    /* Modal content */
    .modal-content {
      background-color: white;
      padding: 20px;
      border-radius: 8px;
      width: 90%;
      max-width: 400px;
      text-align: center;
      position: relative;
    }
    /* Close button */
    .close-btn {
      position: absolute;
      top: 10px;
      right: 10px;
      font-size: 18px;
      color: #333;
      cursor: pointer;
    }
    .close-btn:hover {
      color: #666;
    }
    /*map div part*/
    #map {
            height: 320px;
            width: 100%;
        } 
    </style>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <div class="container-fluid bg-light p-0" id="section2">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-map-marker-alt text-primary me-2"></small>
                    <small id="address"></small><!--ADDRESS-->
                </div>
                <div class="h-100 d-inline-flex align-items-center py-3">
                    <small class="far fa-clock text-primary me-2"></small>
                    <small id="workHours"></small><!--WORK TIME-->
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-phone-alt text-primary me-2"></small>
                    <small id="contact"></small><!--CONTACT-->
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <a class="btn btn-sm-square bg-white text-primary me-1" href="<?php echo "{$links[0]}";?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-1" href="<?php echo "{$links[1]}";?>" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-1" href="<?php echo "{$links[2]}";?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-0" href="<?php echo "{$links[3]}";?>" target="_blank"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar Start -->
     <!--Font IBM-->
     <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
    <h2 style="color:#040686;" style="font-family:'Times New Roman', Times, serif;" id="orgName"></h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="index.php" class="nav-item nav-link">Home</a>
            <a href="index.php" class="nav-item nav-link" style="cursor: pointer;">Services</a>
            <script> 
            function scrollToSection() { document.getElementById('section').scrollIntoView({ behavior: 'smooth' }); }
            </script>
            <script> 
                function scrollToSection3() { document.getElementById('section3').scrollIntoView({ behavior: 'smooth' }); }
            </script>
            <a href="carrierServicePage.php" class="nav-item nav-link">Carrier service</a>
            <a href="shop.php" class="nav-item nav-link">Shop</a>
            <a href="contact.php" class="nav-item nav-link">Contact</a>
            <a href="about.php" class="nav-item nav-link" style="cursor: pointer;">About</a>
        </div>
    </div>
</nav>
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url(<?php echo htmlspecialchars($linkImg);?>);">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Contact Us</h1>
                <label style="color: white; font-size: 20px;">Have Questions? Contact Us</label>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container mt-5">
        <div class="row">
            <!-- Contact Information Section -->
            <div class="col-md-5">
                <div class="contact-info-card">
                    <div class="mb-3">
                        <h6><i class="bi bi-geo-alt" style="color: #0003a5;"></i> Location:</h6>
                        <p><?php echo "{$address}";?></p><br>
                        <p>Open hours</p>
                        <p>Week Days <?php echo "{$weekDayOpen}";?></p>
                        <p>Week End <?php echo "{$weekEndOpen}";?></p>
                    </div>
                    <div class="mb-3">
                        <h6><i class="bi bi-envelope" style="color: #0003a5;"></i> Email:</h6>
                        <p><?php echo "{$mail}";?></p>
                    </div>
                    <div class="mb-3">
                        <h6><i class="bi bi-telephone" style="color: #0003a5;"></i> Call:</h6>
                        <p><?php echo "{$phone}";?></p><br>
                        <p>Phone support hours</p>
                        <p>Week Days <?php echo "{$weekDayOpen}";?></p>
                        <p>Week End <?php echo "{$weekEndOpen}";?></p>
                    </div>
                    <div class="mb-0">
                        <h6><i class="bi bi-telephone" style="color: #0003a5;"></i> Fax</h6>
                        <p><?php echo "{$fax}";?></p>
                    </div>
                </div>
            </div>
    
            <!-- Contact Form Section -->
            <div class="col-md-7">
                <div class="contact-form-card">
                    <form action="sendMail.php" method="post">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6" style="padding-left: 12px;" class="reduction">
                                    <input type="text" class="form-control" placeholder="Your Name" name="name" required>
                                </div>
                                <div class="col-md-6" style="padding-left: 0px;">
                                    <input type="email" class="form-control" placeholder="Your Email" name="email" required>
                                </div>
                            </div>
                        </div>
                        <input type="text" class="form-control" placeholder="Subject" name="subject" required>
                        <input type="number" class="form-control" placeholder="ZIP code" name="zipcode" required>
                        <textarea oninput="currentCount()" class="form-control" rows="4" placeholder="Message" name="message" id="message" maxlength="3000" required></textarea>
                        <label style="padding-bottom:10px; padding-left:4px;">3000/</label><label name="charAmountNum" id="charAmountNum">0</label>
                        <script>
                            function currentCount(){
                                var valueInput = document.getElementById('message').value;
                                var wordCount = valueInput.length;
                                document.getElementById('charAmountNum').innerText = wordCount;
                            }
                        </script>
<div class="checkbox-wrapper-46" style="margin-left: 3px;">
  <input type="checkbox" id="cbx-46" class="inp-cbx" name="terms"/>
  <label for="cbx-46" class="cbx">
    <span>
      <svg viewBox="0 0 12 10" height="10px" width="12px">
        <polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span>
        <span>I agree the terms and conditions. See the <a class="open-modal" onclick="openModal()">Privacy policy</a> for the information.</span>
        
<!--PRIVACY POILICY BLOCK-->
<div id="privacyModal" class="modal">
    <div class="modal-content">
      <h2>Privacy Policy</h2>
      <p><?php echo "{$statement}";?></p>
      <!-- Additional content here -->
    </div>
  </div>
<!--END-->

  <script>
    // Function to open the modal
    function openModal() {
      document.getElementById("privacyModal").style.display = "flex";
    }

    // Function to close the modal
    function closeModal() {
      document.getElementById("privacyModal").style.display = "none";
    }

    // Close modal if clicking outside the modal content
    window.onclick = function(event) {
      const modal = document.getElementById("privacyModal");
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  </script>

  </label>
</div>
                        <button type="submit" class="btn btn-send-message mt-3">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAc4y4jfQXmmUUHFFGHsF1Rda9OIq6BmUA"></script>
    <script>
        function initMap() {
            var location = { lat: 7.471245, lng: 80.3943655 }; // Times Square coordinates
            var map = new google.maps.Map(document.getElementById("map"), {
                zoom: 15,
                center: location
            });

            var marker = new google.maps.Marker({
                position: location,
                map: map,
                title: "Auto care center location"
            });
        }
        window.onload = initMap;
    </script>
    <div class="map-container">
    <div id="map">
    </div>
        <!-- Embedded Google Map -->
<!--        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3023.696813625894!2d-74.01002118459362!3d40.71305187933186!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a3163b6b1c7%3A0x2f0c8f1b5c1e6752!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1604037593022!5m2!1sen!2sus" width="100%" height="320" style="border:0;" loading="lazy"></iframe>
   -->
     </div>
    <!-- Contact End -->
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-0 wow fadeIn" style=" background: linear-gradient(rgba(0, 0, 0, .9), rgba(0, 0, 0, .9)), url(<?php echo htmlspecialchars($linkImg2);?>) center center no-repeat;
  background-size: cover;" data-wow-delay="0.1s">
        <div class="container py-5" style="margin-top: 0px;">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Address</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i><?php echo "{$address}";?></p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i><?php echo "{$phone}";?></p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i><?php echo "{$mail}";?></p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href="<?php echo "{$links[1]}";?>" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href="<?php echo "{$links[0]}";?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href="<?php echo "{$links[3]}";?>" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-outline-light btn-social" href="<?php echo "{$links[2]}";?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Opening Hours</h4>
                    <h6 class="text-light">Working Days</h6>
                    <p class="mb-4"><?php echo "{$weekDayOpen}";?></p>
                    <h6 class="text-light">Weekend Days</h6>
                    <p class="mb-0"><?php echo "{$weekEndOpen}";?></p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Services</h4>
                    <label class="btn btn-link"><?php echo "{$all_services[0]}";?></label>
                    <label class="btn btn-link" ><?php echo "{$all_services[1]}";?></label>
                    <label class="btn btn-link" ><?php echo "{$all_services[2]}";?></label>
                    <label class="btn btn-link" ><?php echo "{$all_services[3]}";?></label>
                </div>
                <div class="col-lg-3 col-md-6">
                   <h4 class="text-light mb-4">About Us</h4>
                    <p><?php echo "{$SquareData[3]}";?></p>
                    <a href="about.php" class="btn btn-primary py-3 px-5" style="background-color: #00258a;border-color: #00258a;">Click Here<i class="fa fa-arrow-right ms-3"></i></a>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                       
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#"><?php echo "{$orgName}";?>.lk</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="index.php">Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <script> 
        function scrollToSection2() { document.getElementById('section2').scrollIntoView({ behavior: 'smooth' }); }
        </script>
    <button type="button" onclick="scrollToSection2()" class="btn btn-lg btn-primary btn-lg-square back-to-top" style="background-color:#00258a; border-color:#00258a;"><i class="bi bi-arrow-up"></i></button>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
<?php
echo '<script>
$(function(){
$("#address").text("' . $address . '");
$("#workHours").text("' . $weekDayOpen . '");
$("#contact").text("' . $phone . '");
$("#orgName").text("' . $orgName . '");
});
</script>';
//echo "<script>document.getElementById('address').innerText='{$address}';</script>";
?>