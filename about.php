<?php
require 'vendor/autoload.php';
use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;
require_once 'blobStorageCon.php'; //blob storage connection
require_once 'sqlConnection.php'; //sql connection 
require_once 'dbProcess.php';
    $containerName = "images";
    $blob = "aboutOrg.jpg";
    $blob2 = "mainBackground1.jpg";
    $blob3 = "saliyaLogo.jpg";

    $blob4 = "vehicle1.jpg";
    $blob5 = "vehicle2.jpg";
    $blob6 = "vehicle3.jpg";
    $blob7 = "vehicle4.jpg";
    $blob8 = "vehicle5.jpg";
    $blob9 = "vehicle6.jpg";
    $blob10 = "vision.jpg";
    $blob11 = "mission.jpg";
    try {
        $blobClient = BlobRestProxy::createBlobService($connectionString);
        $linkImg = "http://127.0.0.1:10000/devstoreaccount1/{$containerName}/{$blob}?" . time();
        $linkImg2 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName}/{$blob2}?" . time();
        $linkImg3 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName}/{$blob3}?" . time();

        $linkImg4 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName}/{$blob4}?" . time();
        $linkImg5 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName}/{$blob5}?" . time();
        $linkImg6 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName}/{$blob6}?" . time();
        $linkImg7 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName}/{$blob7}?" . time();
        $linkImg8 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName}/{$blob8}?" . time();
        $linkImg9 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName}/{$blob9}?" . time();

        $linkImg10 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName}/{$blob10}?" . time();
        $linkImg11 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName}/{$blob11}?" . time();
    } catch (ServiceException $e) {
        error_log("Blob error: " . $e->getMessage());
        die("Could not retrieve blob.");
    }
// Query the descriptions table and fetch content
$aboutData = array();
$query = "SELECT content FROM aboutPage";
$getResults = sqlsrv_query($conn, $query);
if ($getResults === false) {
    error_log(print_r(sqlsrv_errors(), true));
    die("Query failed.");
}
// Append each description to the SquareData array
while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
  $section = $row['content'];
  array_push($aboutData,"{$section}");
}
// Free statement and close connection
sqlsrv_free_stmt($getResults);
sqlsrv_close($conn);
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
    .history-section {
        position: relative;
        padding: 20px 15px;
        color: #333;
    }
    .history-section::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.9); /* White overlay with 80% opacity */
        z-index: 1;
    }
    .history-section .row {
        position: relative;
        z-index: 2; /* Place content above overlay */
    }
    .history-section h2 {
        font-size: 2rem;
        color: #040686;
        font-weight: bold;
    }
    h2{
        font-size: 2rem;
        color: #040686;
        font-weight: bold;
    }
    .history-section hr {
        width: 120px;
        border: 1px solid #001d3d;
        margin-left: 0;
        margin-bottom: 20px;
        margin: 0 auto 20px auto; /* Centers the hr and adds bottom margin */
    }
    hr{
        width: 120px;
        border: 1px solid #001d3d;
        margin-left: 0;
        position:relative;
        bottom:6px;
    }
    .history-section p {
        font-size: 1rem;
        color: #666;
        line-height: 1.6;
        margin-right: 8px;
    }
    .history-section p strong {
        font-weight: bold;
        color: #333;
    }
    .history-logo img {
        max-width: 100%;
        height: 330px;
        padding: 20px;
        text-align: center;
    }

    /* TEST SITE*/
    .image-container {
            position: relative;
            overflow: hidden;
            border-radius: 0px;
        }
        .image-container img {
            transition: transform 0.5s ease, opacity 0.5s ease;
            width: 100%;
            height: 100%;
        }
        .image-container:hover img {
            transform: scale(1.1);
            opacity: 0.8;
        }
        .image-caption {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.5);
            color: #fff;
            padding: 10px;
            text-align: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .image-container:hover .image-caption {
            opacity: 1;
        }

        /* Fade in animation for images */
        .fade-in {
            animation: fadeIn 1s ease-in-out forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        } 
/*ambition*/ 
.card {
  width: 550px;
  height: 220px;
  background-color: rgb(255, 255, 255);
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 20px 30px;
  gap: 0px;
  position: relative;
  overflow: hidden;
  box-shadow: 2px 2px 20px rgba(0, 0, 0, 0.062);
}

#cookieSvg {
  width: 50px;
}

#cookieSvg g path {
  fill: rgb(97, 81, 81);
}

.cookieHeading {
  font-size: 1.2em;
  font-weight: 800;
  color: rgb(26, 26, 26);
}

.cookieDescription {
  text-align: center;
  font-size: 16px;
  font-weight: 100;
  color: rgb(99, 99, 99);
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
                <h1 class="display-3 text-white mb-3 animated slideInDown">About Us</h1>
                <label style="color: white; font-size: 20px;"></label>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container-fluid history-section" style="background-image: url(<?php echo htmlspecialchars($linkImg);?>); background-size: cover; background-position: center;">
    <div class="row align-items-center">
        <div class="col-md-4 col-sm-12 history-logo text-center text-md-left" style="margin-left:10px;">
            <img src="<?php echo htmlspecialchars($linkImg3);?>" alt="Logo">
        </div>
        <div class="col-md-7 col-sm-12 text-center text-md-left">
            <h2>About the organization</h2>
            <hr>
            <p>
                <?php echo "{$aboutData[0]}";?> <!--Main Paragraph--->
            </p>
            <p>
                <strong><?php echo "{$aboutData[1]}";?></strong><!--Special point--->
            </p>
        </div>
    </div>
</div>
<h2 style="margin-left:20px; margin-top:20px; text-align:center;">Take a look inside</h2>
<hr style="width:100px; margin: 0 auto; text-align:center;">


<div class="container py-1">
        <div class="row">
            <!-- Image 1 -->
            <div class="col-md-4 mb-4">
                <div class="image-container fade-in">
                    <img src="<?php echo htmlspecialchars($linkImg4);?>" alt="Image 1">
                    <div class="image-caption"><?php echo "{$aboutData[2]}";?></div>
                </div>
            </div>
            <!-- Image 2 -->
            <div class="col-md-4 mb-4">
                <div class="image-container fade-in">
                    <img src="<?php echo htmlspecialchars($linkImg5);?>" alt="Image 2">
                    <div class="image-caption"><?php echo "{$aboutData[3]}";?></div>
                </div>
            </div>
            <!-- Image 3 -->
            <div class="col-md-4 mb-4">
                <div class="image-container fade-in">
                    <img src="<?php echo htmlspecialchars($linkImg6);?>" alt="Image 3">
                    <div class="image-caption"><?php echo "{$aboutData[4]}";?></div>
                </div>
            </div>
            <!-- Image 4 -->
            <div class="col-md-4 mb-4">
                <div class="image-container fade-in">
                    <img src="<?php echo htmlspecialchars($linkImg7);?>" alt="Image 4">
                    <div class="image-caption"><?php echo "{$aboutData[5]}";?></div>
                </div>
            </div>
            <!-- Image 5 -->
            <div class="col-md-4 mb-4">
                <div class="image-container fade-in">
                    <img src="<?php echo htmlspecialchars($linkImg8);?>" alt="Image 5">
                    <div class="image-caption"><?php echo "{$aboutData[6]}";?></div>
                </div>
            </div>
            <!-- Image 6 -->
            <div class="col-md-4 mb-4">
                <div class="image-container fade-in">
                    <img src="<?php echo htmlspecialchars($linkImg9);?>" alt="Image 6">
                    <div class="image-caption"><?php echo "{$aboutData[7]}";?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="map-container">
      <div class="container py-2">
        <div class="row">
          <div class="col-md-6 col-sm-12">
<div class="card">
  <img src="<?php echo htmlspecialchars($linkImg10);?>" height="30px" width="30px">
  <p class="cookieHeading"><?php echo "{$aboutData[8]}";?></p><!--our vision--->
  <p class="cookieDescription"><?php echo "{$aboutData[9]}";?></p><!--Description--->

</div>
          </div>
          <div class="col-md-6 col-sm-12">
<div class="card">
<img src="<?php echo htmlspecialchars($linkImg11);?>" height="30px" width="30px">
  <p class="cookieHeading"><?php echo "{$aboutData[10]}";?></p><!---Our mission-->
  <p class="cookieDescription"><?php echo "{$aboutData[11]}";?></p><!--Description--->

</div>
          </div>
        </div>
      </div>
    </div>
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
                    <h4 class="text-light mb-4">Contact Us</h4>
                    <a href="contact.php" class="btn btn-primary py-3 px-5" style="background-color: #00258a;border-color: #00258a;">Click Here<i class="fa fa-arrow-right ms-3"></i></a>
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