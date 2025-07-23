<?php
require 'vendor/autoload.php';
use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;
//obtain the data start
$itemID = $_POST['allreviewbtn'];
//echo "<script>alert('{$itemID}');</script>";
//obtain the data end
//Imports start
require_once 'blobStorageCon.php'; //blob storage connection
require_once 'sqlConnection.php'; //sql connection 
require_once 'dbProcess.php';
//Imports end

$containerName = "images";
$blobName28 = "mainBackground1.jpg";
try {
$blobClient = BlobRestProxy::createBlobService($connectionString);
    $blobUrl28 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName}/{$blobName28}?" . time();
} catch (ServiceException $e) {
    error_log("Blob error: " . $e->getMessage());
    die("Could not retrieve blob.");
}
// MS azure blob end (bottom image)
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
        .review-card {
  border: 1px solid #ddd;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  height:448px;
}

.review-card .card-body {
  padding: 20px;
}

.card-title {
  font-size: 1.2rem;
  font-weight: bold;
}

.card-text {
  margin-bottom: 1rem;
  font-size: 0.95rem;
  color: #555;
}

.text-warning {
  font-size: 1rem;
}
/*CUSTOMER REVIEW END*/
/*Review all start*/
.rating-summary {
    border: 1px solid #ddd;
    border-radius: 8px;
    width: 200px;
    background-color: #f9f9f9;
}

.stars {
    color: #ffc107;
    font-size: 1.5rem;
}

.rating-breakdown {
    width: 300px;
}

.progress {
    height: 10px;
    background-color: #e9ecef;
}

.progress-bar {
    background-color: #ffc107;
}

.text-success {
    color: #28a745 !important;
}
/*Review all end*/
/*Write a review start*/

/*Write a review end*/
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
    <?php
        $query = "SELECT rating FROM cusReview WHERE shopItemID = {$itemID}";
        $getResults = sqlsrv_query($conn, $query);
        if ($getResults === false) {
            error_log(print_r(sqlsrv_errors(), true));
            die("Query failed.");
        }
        ?>
        <?php 
        $totalAmount = array(0,0,0,0,0);
        $ratingAmount = array(0,0,0,0,0);
        while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
            $rating = $row['rating'];
            if($rating == 5){
                $ratingAmount[0]++;
                $totalAmount[0]+=5;
            }
            else if($rating == 4){
                $ratingAmount[1]++;
                $totalAmount[1]+=4;
            }
            else if($rating == 3){
                $ratingAmount[2]++;
                $totalAmount[2]+=3;
            }
            else if($rating == 2){
                $ratingAmount[3]++;
                $totalAmount[3]+=2;
            }
            else if($rating == 1){
                $ratingAmount[4]++;
                $totalAmount[4]+=1;
            }
            else{
                echo "<script>alert('Error occured');</script>";
            }
        }
        $tot = 0;
        $pointTot = 0;
        foreach($ratingAmount as $f){
            $tot += $f;
        }
        foreach($totalAmount as $b){
            $pointTot += $b;
        }
        
        ?>
    <div class="container mt-5 d-flex flex-wrap justify-content-center">
        <!-- Rating Summary -->
        <div class="rating-summary p-4 text-center me-5">
            <h1 class="display-4"><?php if($tot != 0){echo round($pointTot/$tot,1);}?></h1>
            <div class="stars">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-half"></i>
            </div>
            <p class="text-success">All from verified purchases</p>
        </div>

        <!-- Rating Breakdown -->
        <div class="rating-breakdown">
            <div class="d-flex align-items-center mb-2">
                <span class="stars me-2">★★★★★</span>
                <div class="progress flex-grow-1">
                    <div class="progress-bar" style="width: <?php if($tot != 0){echo ($ratingAmount[0] / $tot) * 100;} ?>%;"></div>
                </div>
                <span class="ms-2"><?php echo $ratingAmount[0];?></span>
            </div>
            <div class="d-flex align-items-center mb-2">
                <span class="stars me-2">★★★★☆</span>
                <div class="progress flex-grow-1">
                <div class="progress-bar" style="width: <?php if($tot != 0){echo ($ratingAmount[1] / $tot) * 100;} ?>%;"></div>
                </div>
                <span class="ms-2"><?php echo $ratingAmount[1];?></span>
            </div>
            <div class="d-flex align-items-center mb-2">
                <span class="stars me-2">★★★☆☆</span>
                <div class="progress flex-grow-1">
                    <div class="progress-bar" style="width: <?php if($tot != 0){echo ($ratingAmount[2] / $tot) * 100;}?>%;"></div>
                </div>
                <span class="ms-2"><?php echo $ratingAmount[2];?></span>
            </div>
            <div class="d-flex align-items-center mb-2">
                <span class="stars me-2">★★☆☆☆</span>
                <div class="progress flex-grow-1">
                    <div class="progress-bar" style="width: <?php if($tot != 0){echo ($ratingAmount[3] / $tot) * 100;}?>%;"></div>
                </div>
                <span class="ms-2"><?php echo $ratingAmount[3];?></span>
            </div>
            <div class="d-flex align-items-center mb-2">
                <span class="stars me-2">★☆☆☆☆</span>
                <div class="progress flex-grow-1">
                    <div class="progress-bar" style="width: <?php if($tot != 0){echo ($ratingAmount[4] / $tot) * 100;}?>%;"></div>
                </div>
                <span class="ms-2"><?php echo $ratingAmount[4];?></span>
            </div>
        </div>
    </div>

    <!--All reviews start-->
     <?php
        $query = "SELECT * FROM cusReview WHERE shopItemID = {$itemID}";
        $getResults = sqlsrv_query($conn, $query);
        if ($getResults === false) {
            error_log(print_r(sqlsrv_errors(), true));
            die("Query failed.");
        }
      ?>
    <div class="container my-5">
    <h2 class="mb-4">Customer Reviews</h2>
    <div class="row">
        <?php 
        while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
            $name = $row['cusName'];
            $review = $row['review'];
            $date = $row['date'];
            $rating = $row['rating'];
        ?>

        <div class="col-md-4 mb-4">
            <div class="card review-card">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div>
                            <h5 class="card-title mb-0"><?php echo $name; ?></h5>
                            <div class="text-warning">
                                <?php echo $rating; ?> ★
                            </div>
                        </div>
                    </div>
                    <p class="card-text"><?php echo $review; ?></p>
                    <small class="text-muted">Reviewed on: <?php echo $date; ?></small>
                </div>
            </div>
        </div>

        <?php } ?>
    </div>
</div>
    <!--All reviews end-->

    <div class="container" style="background-color:#f8f9fa;">
        <div class="review-form">
            <h3 class="mb-4 text-center" style="padding-top:16px;">Leave a Review</h3>
            <form action="reviewDataSend2.php" method="post">
                <!-- Name Input -->
                <div class="mb-3">
                    <label for="name" class="form-label">Your Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Your name" required>
                </div>
                
                <!-- Email Input -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                </div>
                
                <!-- Rating Input -->
                <div class="mb-3">
                    <label class="form-label">Rating</label>
                    <select class="form-select" name="rating" required>
                        <option value="">Select a rating</option>
                        <option value="5">5 - Excellent</option>
                        <option value="4">4 - Good</option>
                        <option value="3">3 - Average</option>
                        <option value="2">2 - Poor</option>
                        <option value="1">1 - Terrible</option>
                    </select>
                </div>

                <!-- Review Textarea -->
                <div class="mb-4">
                    <label for="review" class="form-label">Your Review</label>
                    <label style="padding-bottom:10px; padding-left:4px;">400/</label><label name="charAmountNum" id="charAmountNum">0</label>
                    <textarea oninput="currentCount()" maxlength="400" name="review" class="form-control" id="review" rows="5" placeholder="Share your experience..." required></textarea>
                </div>
                <input type="hidden" name="allreviewbtn" value="<?php echo "{$itemID}"?>" id="allreviewbtn">
                <!-- Submit Button -->
                <button type="submit" name="submitBtn" id="submitBtn" value="<?php echo "{$itemID}"?>" class="btn btn-primary w-100" style="background-color:#0b2154; border-color:#0b2154;">Submit Review</button>
                <script>
                function currentCount(){
                    var valueInput = document.getElementById('review').value;
                    var wordCount = valueInput.length;
                    document.getElementById('charAmountNum').innerText = wordCount;
                }
                </script>
            </form>
        </div>
    </div><br>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Owl Carousel CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

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