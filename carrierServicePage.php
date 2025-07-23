<?php
require 'vendor/autoload.php';
use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;
// Include necessary files
include_once 'blobStorageCon.php'; //blob storage connection
include_once 'sqlConnection.php'; //sql connection 
require_once 'dbProcess.php'; 
// Query the descriptions table and fetch content
$SquareData = [];
$query = "SELECT content FROM descriptions";
$getResults = sqlsrv_query($conn, $query);
if ($getResults === false) {
    error_log(print_r(sqlsrv_errors(), true));
    die("Query failed.");
}

// Append each description to the SquareData array
while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
    $SquareData[] = $row['content'];
}

// Free statement and close connection
sqlsrv_free_stmt($getResults);
sqlsrv_close($conn);
$containerName = "images";
$blobName28 = "mainBackground1.jpg";
try {
$blobClient = BlobRestProxy::createBlobService($connectionString);
    $blobUrl28 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName}/{$blobName28}?" . time();
} catch (ServiceException $e) {
    error_log("Blob error: " . $e->getMessage());
    die("Could not retrieve blob.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Saliya auto care</title>
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
.hero-section {
    background: url('carrierImage.jpg') no-repeat center center/cover;
    height: 100vh;
    position: relative;
    color: white; /* Ensures text color contrasts with the dark overlay */
}

.hero-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.67); /* Black overlay with 50% opacity */
    z-index: 1; /* Places overlay behind content */
}

.hero-section .container {
    position: relative;
    z-index: 2; /* Ensures content appears above the overlay */
}
/**hover animation */
.nexbtnHover{
    padding: 10px 20px; background-color: rgba(255, 255, 255, 0.8); color: black;
    border: none; font-size: 1rem; font-weight: bold;
}
.nexbtnHover:hover{
    background-color: rgba(255, 255, 255, 1);
}
    </style>
</head>
<body>
    <!-- Topbar Start -->
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
    <!-- Topbar End -->
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
     <!--Font IBM-->
     <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 style="color:#040686;" style="font-family:'Times New Roman', Times, serif;" id="orgName"></h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="index.php" class="nav-item nav-link">Home</a>
                <a href="index.php" class="nav-item nav-link" style="cursor: pointer;">Services</a>
                <a href="carrierServicePage.php" class="nav-item nav-link">Carrier service</a>
                <a href="shop.php" class="nav-item nav-link">Shop</a>
                <a href="contact.php" class="nav-item nav-link">Contact</a>
                <a href="about.php" class="nav-item nav-link" style="cursor: pointer;">About</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->
    <section class="hero-section d-flex align-items-center">
        <div class="container text-center text-white">
            <h1 class="display-1 fw-bold text-uppercase" style="color:white;">your emmergency</h1>
            <h2 class="display-2 text-uppercase" style="color:white; font-weight:lighter;">is our problem</h2>
            <p class="lead mt-3">
            At Saliya Auto Care, we are dedicated to providing reliable and efficient carrier services tailored to meet your unique needs. 
            Whether you're shipping locally or internationally, our team of experienced professionals ensures your packages are handled with the utmost care and delivered on time.
            Join the Saliya Auto Care family today and experience the difference in carrier services.
            </p><br>
            <form action="carrierServicePageTwo.php" method="post"><button class="nexbtnHover">Next</button><br><br><label>Available from 8.00 AM to 6.30 PM on weekdays</label></form>
        </div>
    </section>
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-0 wow fadeIn" style=" background: linear-gradient(rgba(0, 0, 0, .9), rgba(0, 0, 0, .9)), url(<?php echo htmlspecialchars($blobUrl28);?>) center center no-repeat;
  background-size: cover;" data-wow-delay="0.1s"><!--BACGROUND IMAGE OF FOOTER-->
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
$("#SmallMain1").text("'.$headersAll[0].'");
$("#SmallMain2").text("'.$headersAll[1].'");
$("#LargeMain1").text("'.$headersAll[2].'");
$("#LargeMain2").text("'.$headersAll[3].'");
$("#Square1").text("'.$headersAll[4].'");
$("#Square2").text("'.$headersAll[5].'");
$("#Square3").text("'.$headersAll[6].'");

$("#about1").text("'.$headersAll[7].'");
$("#about2").text("'.$headersAll[8].'");
});
</script>';
?>