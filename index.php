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

// MS azure blob storage start
$containerName = "images";
$blobName1 = "about.jpg";
$blobName2 = "blackBoxlogo1.jpg";
$blobName3= "blackBoxlogo2.jpg";
$blobName4 = "blackBoxlogo3.jpg";
$blobName5 = "brandsBackground.jpg";
$blobName6 = "customer1.jpg";
$blobName7 = "customer2.jpg";
$blobName8 = "customer3.jpg";
$blobName9 = "customer4.jpg";
$blobName10 = "logo1.jpg";
$blobName11 = "logo2.jpg";
$blobName12 = "logo3.jpg";
$blobName13 = "logo4.jpg";
$blobName14 = "logo5.jpg";
$blobName15 = "logo6.jpg";
$blobName16 = "news1.jpg";
$blobName17 = "news2.jpg";
$blobName18 = "news3.jpg";
$blobName19 = "news4.jpg";
$blobName20 = "news5.jpg";
$blobName21 = "service-1.jpg";
$blobName22 = "service-2.jpg";
$blobName23 = "service-3.jpg";
$blobName24 = "service-4.jpg";
$blobName25 = "squareLogo1.jpg";
$blobName26 = "squareLogo2.jpg";
$blobName27 = "squareLogo3.jpg";
$blobName28 = "mainBackground1.jpg";
$blobName29 = "mainBackground2.jpg";
try {
$blobClient = BlobRestProxy::createBlobService($connectionString);
    $blobUrl1 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName}/{$blobName1}?" . time();
    $blobUrl2 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName}/{$blobName2}?" . time();
    $blobUrl3 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName}/{$blobName3}?" . time();
    $blobUrl4 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName}/{$blobName4}?" . time();
    $blobUrl5 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName}/{$blobName5}?" . time();
    $blobUrl6 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName}/{$blobName6}?" . time();
    $blobUrl7 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName}/{$blobName7}?" . time();
    $blobUrl8 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName}/{$blobName8}?" . time();
    $blobUrl9 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName}/{$blobName9}?" . time();
    $blobUrl10 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName}/{$blobName10}?" . time();
    $blobUrl11 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName}/{$blobName11}?" . time();
    $blobUrl12 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName}/{$blobName12}?" . time();
    $blobUrl13 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName}/{$blobName13}?" . time();
    $blobUrl14 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName}/{$blobName14}?" . time();
    $blobUrl15 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName}/{$blobName15}?" . time();
    $blobUrl16 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName}/{$blobName16}?" . time();
    $blobUrl17 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName}/{$blobName17}?" . time();
    $blobUrl18 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName}/{$blobName18}?" . time();
    $blobUrl19 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName}/{$blobName19}?" . time();
    $blobUrl20 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName}/{$blobName20}?" . time();
    $blobUrl21 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName}/{$blobName21}?" . time();
    $blobUrl22 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName}/{$blobName22}?" . time();
    $blobUrl23 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName}/{$blobName23}?" . time();
    $blobUrl24 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName}/{$blobName24}?" . time();
    $url25 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName}/{$blobName25}?" . time();
    $blobUrl26 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName}/{$blobName26}?" . time();
    $blobUrl27 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName}/{$blobName27}?" . time();
    $blobUrl28 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName}/{$blobName28}?" . time();

    $blobUrl28 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName}/{$blobName28}?" . time();

    $blobUrl29 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName}/{$blobName29}?" . time();
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

    <!-- main Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

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
                <a onclick="scrollToSection()" class="nav-item nav-link" style="cursor: pointer;">Services</a>
                <script> 
                function scrollToSection() { document.getElementById('section').scrollIntoView({ behavior: 'smooth' }); }
                </script>
                <script> 
                    function scrollToSection3() { document.getElementById('section3').scrollIntoView({ behavior: 'smooth' }); }
                </script>
                <a href="carrierServicePage.php" class="nav-item nav-link">Carrier service</a>
                <a href="shop.php" class="nav-item nav-link">Shop</a>
                <a href="contact.php" class="nav-item nav-link">Contact</a>
                <a onclick="scrollToSection3()" class="nav-item nav-link" style="cursor: pointer;">About</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" style="height: 500px;">
                    <img class="w-100" src="<?php echo htmlspecialchars($blobUrl28); ?>" alt="Image">
                    <div class="carousel-caption d-flex align-items-center">
                        <div class="container">
                            <div class="row align-items-center justify-content-center justify-content-lg-start">
                                <div class="col-10 col-lg-7 text-center text-lg-start">
                                    <h6 class="text-white text-uppercase mb-3 animated slideInDown" id="SmallMain2"></h6>
                                    <h1 class="display-3 text-white mb-4 pb-3 animated slideInDown" id="LargeMain1"></h1>
                                    <a onClick="scrollToSection()" class="btn btn-primary py-3 px-5 animated slideInDown" style="background-color: #00258a; border-color: #00258a;">Learn More<i class="fa fa-arrow-right ms-3"></i></a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" style="height: 500px;">
                    <img class="w-100" src="<?php echo htmlspecialchars($blobUrl29); ?>" alt="Image">
                    <div class="carousel-caption d-flex align-items-center">
                        <div class="container">
                            <div class="row align-items-center justify-content-center justify-content-lg-start">
                                <div class="col-10 col-lg-7 text-center text-lg-start">
                                    <h6 class="text-white text-uppercase mb-3 animated slideInDown" id="SmallMain1"></h6>
                                    <h1 class="display-3 text-white mb-4 pb-3 animated slideInDown" id="LargeMain2"></h1>
                                    <a onClick="scrollToSection()" class="btn btn-primary py-3 px-5 animated slideInDown" style="background-color: #00258a; border-color: #00258a;">Learn More<i class="fa fa-arrow-right ms-3"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Service Start -->
    <div class="container-xxl py-3">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
<!--<div class="card" style="background: #ffffff;"> removed animation--->
                    <div class="" style="background: #ffffff; padding: 20px; height: 350px;">
                        <div class="card-details" style="text-align: center;">
                            <div style="height: 70px; width: 312.400px; display: flex; justify-content: center;">
                                <img src="<?php echo htmlspecialchars($url25); ?>" height="80px" width="80px"><!--QUALITY SERVICING--->
                            </div><br>
                            <p class="text-title" id="Square1"></p>
                            <p class="text-body" id="SquareData1"></p>
                        </div>
                        <button class="card-button">More info</button>
                    </div>
                    
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="" style="background: #f2f2f2; padding: 15px; height: 350px;">
                        <div class="card-details" style="text-align: center;">
                            <div style="height: 70px; width: 312.400px; display: flex; justify-content: center;">
                                <img src="<?php echo htmlspecialchars($blobUrl26); ?>" height="80px" width="80px"><!---EXPERT WORKERS--->
                            </div><br>
                            <p class="text-title" id="Square2"></p>
                            <p class="text-body" id="SquareData2"></p>
                        </div>
                        <button class="card-button">More info</button>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="" style="background: #ffffff; padding: 20px; height: 350px;">
                        <div class="card-details" style="text-align: center;">
                            <div style="height: 70px; width: 312.400px; display: flex; justify-content: center;">
                                <img src="<?php echo htmlspecialchars($blobUrl27); ?>" height="80px" width="80px"><!---MODERN EQUIPMENT--->
                            </div><br>
                            <p class="text-title" id="Square3"></p>
                            <p class="text-body" id="SquareData3"></p>
                        </div>
                        <button class="card-button">More info</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- About Start -->
    <div class="container-xxl py-5" id="section3">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 pt-4" style="min-height: 400px;">
                    <div class="position-relative h-100 wow fadeIn" data-wow-delay="0.1s">
                        <img class="position-absolute img-fluid w-100 h-100" src="<?php echo htmlspecialchars($blobUrl1); ?>" style="object-fit: cover;" alt=""><!--ABOUT IMAGE--->
                        <div class="position-absolute top-0 end-0 mt-n4 me-n4 py-4 px-5" style="background: rgba(0, 0, 0, .08);">
                            <h1 class="display-4 text-white mb-0">15 <span class="fs-4">Years</span></h1>
                            <h4 class="text-white">Experience</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h6 class="text-uppercase" style="color: #040686;" id="about1"></h6><!--ABOUT US HEADER-->
                    <h1 class="mb-4" id="about2"></h1>
                    <p class="mb-4" id="aboutUSdes"></p>
                    <div class="row g-4 mb-3 pb-3">
                        <?php //selection of the list1
                        if($content4 == 1){
                            echo '
                            <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                            <div class="d-flex">
                                <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1" style="width: 45px; height: 45px;">
                                    <span class="fw-bold text-secondary">01</span>
                                </div>
                                <div class="ps-3">
                                    <h6 id="aboutP1H1"></h6><!--professional & expert-->
                                    <span id="AboutP1C1"></span><!--content-->
                                </div>
                            </div>
                        </div>
                        <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                            <div class="d-flex">
                                <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1" style="width: 45px; height: 45px;">
                                    <span class="fw-bold text-secondary">02</span>
                                </div>
                                <div class="ps-3">
                                    <h6 id="AboutP2H2"></h6><!--Quality Servicing Center-->
                                    <span id="AboutP2C2"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                            <div class="d-flex">
                                <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1" style="width: 45px; height: 45px;">
                                    <span class="fw-bold text-secondary">03</span>
                                </div>
                                <div class="ps-3">
                                    <h6 id="AboutP3H3"></h6><!--Awards Winning Workers-->
                                    <span id="AboutP3C3"></span>
                                </div>
                            </div>
                        </div>
                            ';
                        } 
                        ?>
                    </div>
                    <a href="about.php" class="btn btn-primary py-3 px-5" style="background-color: #00258a;border-color: #00258a;">Read More<i class="fa fa-arrow-right ms-3"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
    <div class="container-fluid bg-dark my-2 py-5" style="background: linear-gradient(rgba(170, 170, 170, 0.7), rgba(0, 0, 0, .7)), url(<?php echo htmlspecialchars($blobUrl28);?>);
     background-position: center center;
  background-repeat: no-repeat;
  background-size: cover;">
        <div class="container" style="margin-bottom: 0px;">
            <div class="row g-4 justify-content-center"> <!-- Justify-content-center for horizontal centering -->
                <div class="col-12 col-md-4 d-flex justify-content-center text-center wow fadeIn" data-wow-delay="0.1s"> <!-- d-flex justify-content-center added here -->
                    <div class="outer">
                        <div class="dot"></div>
                        <div class="card2">
                            <div class="ray"></div>
                            <div style="height: 50px; width: 50px;">
                                <img src="<?php echo htmlspecialchars($blobUrl2); ?>" height="60px" width="60px">
                            </div>
                            <div class="text" id="BBox1num1"></div><!--150-->
                            <div id="BBox1title1"></div><!--expert technitians--><div class="line topl"></div>
                            <div class="line leftl"></div>
                            <div class="line bottoml"></div>
                            <div class="line rightl"></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 d-flex justify-content-center text-center wow fadeIn" data-wow-delay="0.3s">
                    <div class="outer">
                        <div class="dot"></div>
                        <div class="card2">
                            <div class="ray"></div>
                            <div style="height: 50px; width: 50px;">
                                <img src="<?php echo htmlspecialchars($blobUrl3); ?>" height="60px" width="60px">
                            </div>
                            <div class="text" id="BBox2num2"></div><!--500-->
                            <div id="BBox2title2">Satisfied Clients</div><!--Satisfied clients-->
                            <div class="line topl"></div>
                            <div class="line leftl"></div>
                            <div class="line bottoml"></div>
                            <div class="line rightl"></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 d-flex justify-content-center text-center wow fadeIn" data-wow-delay="0.5s">
                    <div class="outer">
                        <div class="dot"></div>
                        <div class="card2">
                            <div class="ray"></div>
                            <div style="height: 50px; width: 50px;">
                                <img src="<?php echo htmlspecialchars($blobUrl4); ?>" height="60px" width="60px">
                            </div>
                            <div class="text" id="BBox3num3"></div><!--680-->
                            <div id="BBox3title3"></div><!--Completed projects-->
                            <div class="line topl"></div>
                            <div class="line leftl"></div>
                            <div class="line bottoml"></div>
                            <div class="line rightl"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    <!-- Fact End -->
        
    
    <!-- Service Start -->
    <div class="container-xxl service py-4">
        <div class="container" id="section">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s" >
                <h6 class="text-uppercase" id="services1"></h6>
                <h1 class="mb-4" id="services2"></h1>
            </div>
            <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-lg-4">
                    <div class="nav w-100 nav-pills me-4">
                        <button type="button" class="playstore-button" class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4 " data-bs-target="#tab-pane-1" data-bs-toggle="pill">
                            <i class="fa fa-tools fa-2x me-3"></i>
                          <span class="texts">
                            <span style="font-size: 20px;"><?php echo "{$all_services[0]}";?></span>
                          </span>
                        </button><br>
                        <button type="button" class="playstore-button" class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4" data-bs-target="#tab-pane-2" data-bs-toggle="pill">
                            <i class="fa fa-spray-can fa-2x me-3"></i>
                            <span class="texts">
                                <span style="font-size: 20px;"><?php echo "{$all_services[1]}";?></span>
                              </span>
                          </button><br>
                          <button type="button" class="playstore-button" class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4" data-bs-target="#tab-pane-3" data-bs-toggle="pill">
                            <i class="fa fa-car fa-2x me-3"></i>

                            <span class="texts">
                                <span style="font-size: 20px;"><?php echo "{$all_services[2]}";?></span>
                              </span>
                          </button><br>
                          <button type="button" class="playstore-button" class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4" data-bs-target="#tab-pane-4" data-bs-toggle="pill">
                            <i class="fa fa-cogs fa-2x me-3"></i>
                            <span class="texts">
                                <span style="font-size: 20px;"><?php echo "{$all_services[3]}";?></span>
                              </span>
                          </button><br>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="tab-content w-100">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute img-fluid w-100 h-100" src="<?php echo htmlspecialchars($blobUrl21); ?>"
                                            style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="mb-3" id="services3"></h3><!--service 1-->
                                    <p class="mb-4" id="service1Des"></p>
                                    <p><i class="fa fa-check text-success me-3" id="service1P1"></i></p><!--Quality Servicing--->
                                    <p><i class="fa fa-check text-success me-3" id="service1P2"></i></p><!--Expert Workers-->
                                    <p><i class="fa fa-check text-success me-3" id="service1P3"></i></p><!--Modern Equipment--->
                                    <a href="service1.php" class="btn btn-primary py-3 px-5 mt-3" data-toggle="modal" data-target="#largeModal" style="background-color: #00258a; border-color: #00258a;">Read More<i class="fa fa-arrow-right ms-3"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="tab-pane-2">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute img-fluid w-100 h-100" src="<?php echo htmlspecialchars($blobUrl22); ?>"
                                            style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="mb-3" id="services4"></h3><!--Service 2--->
                                    <p class="mb-4" id="service2Des"></p>
                                    <p><i class="fa fa-check text-success me-3" id="service2P1"></i></p><!--Quality Servicing-->
                                    <p><i class="fa fa-check text-success me-3" id="service2P2"></i></p><!--Expert Workers--->
                                    <p><i class="fa fa-check text-success me-3" id="service2P3"></i></p><!--Modern Equipment--->
                                    <a href="service2.php" class="btn btn-primary py-3 px-5 mt-3" style="background-color: #00258a; border-color: #00258a;">Read More<i class="fa fa-arrow-right ms-3"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-3">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute img-fluid w-100 h-100" src="<?php echo htmlspecialchars($blobUrl23); ?>"
                                            style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="mb-3" id="services5"></h3><!--Service 3-->
                                    <p class="mb-4" id="service3Des"></p>
                                    <p><i class="fa fa-check text-success me-3" id="service3P1"></i></p><!--Quality Servicing-->
                                    <p><i class="fa fa-check text-success me-3" id="service3P2"></i></p><!--Expert Workers-->
                                    <p><i class="fa fa-check text-success me-3" id="service3P3"></i></p><!--Modern Equipment--->
                                    <a href="service3.php" class="btn btn-primary py-3 px-5 mt-3" style="background-color: #00258a; border-color: #00258a;">Read More<i class="fa fa-arrow-right ms-3"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-4">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute img-fluid w-100 h-100" src="<?php echo htmlspecialchars($blobUrl24); ?>"
                                            style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="mb-3" id="services6"></h3><!--Service 4-->
                                    <p class="mb-4" id="service4Des"></p>
                                    <p><i class="fa fa-check text-success me-3" id="service4P1"></i></p><!--Quality Servicing-->
                                    <p><i class="fa fa-check text-success me-3" id="service4P2"></i></p><!--Expert Workers-->
                                    <p><i class="fa fa-check text-success me-3" id="service4P3"></i></p><!--Modern Equipment-->
                                    <a href="service4.php" class="btn btn-primary py-3 px-5 mt-3" style="background-color: #00258a; border-color: #00258a;">Read More<i class="fa fa-arrow-right ms-3"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- logoes Start -->
    <div class="container-fluid bg-secondary my-0 wow fadeInUp" style=" background: linear-gradient(rgba(0, 0, 0, .7), rgba(0, 0, 0, .7)), url(<?php echo htmlspecialchars($blobUrl5); ?>) center center no-repeat;
  background-size: cover;"  data-wow-delay="0.1s">
        <div class="container" style="margin-bottom: 20px;">
            <div class="row gx-5">
                <!-- Left Text Section -->
                <div class="col-lg-6 py-5 d-flex flex-column justify-content-start align-items-center text-center">
                    <div>
                        <h1 class="text-white mb-4" id="brands1"></h1><!--Brands and organizations around us-->
                        <p class="text-white mb-0" id="brandsDes"></p>
                    </div>
                </div>
    
                <!-- LOGOES -->
                <div class="col-lg-6 col-md-12 col-sm-12 py-5">
                    <div class="row g-3">
                        <div class="col-4">
                            <div class="bg-light w-100 h-100 d-flex justify-content-center align-items-center">
                                <img src="<?php echo htmlspecialchars($blobUrl10); ?>" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-4" style="background-color: white;">
                            <div class="bg-light w-100 h-100 d-flex justify-content-center align-items-center">
                                <img src="<?php echo htmlspecialchars($blobUrl11); ?>"
                                class="img-fluid" style="margin-top: 0px;">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="bg-light w-100 h-100 d-flex justify-content-center align-items-center">
                                <img src="<?php echo htmlspecialchars($blobUrl12); ?>" class="img-fluid">
                           </div>
                        </div>
                        <div class="col-4">
                            <div class="bg-light w-100 h-100 d-flex justify-content-center align-items-center">
                                <img src="<?php echo htmlspecialchars($blobUrl13); ?>" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-4" style="background-color: white;">
                            <div class="bg-light w-100 h-100 d-flex justify-content-center align-items-center">
                                <img src="<?php echo htmlspecialchars($blobUrl14); ?>" class="img-fluid" >
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="bg-light w-100 h-100 d-flex justify-content-center align-items-center">
                                <img src="<?php echo htmlspecialchars($blobUrl15); ?>" class="img-fluid">
                           </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>


    <!-- Testimonial Start -->
    <div class="container-xxl py-0 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container" style="margin-bottom: 44px;">
            <div class="text-center" style="margin-bottom: 2px;">
                <h6 class="mb-2" id="customer1"></h6>
                <h1 class="mb-4" id="customer2"></h1>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative">
                <div class="testimonial-item text-center">
                    <img class="bg-light rounded-circle p-2 mx-auto mb-3" src="<?php echo htmlspecialchars($blobUrl6); ?>" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">
                        <?php echo "{$SquareData[33]}" ?>
                    </h5><!--Client Name-->
                    <p>
                    <?php echo "{$SquareData[34]}" ?>
                    </p><!--Profession-->
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0" id="c1Des">
                    <?php echo "{$SquareData[41]}" ?>
                    </p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="bg-light rounded-circle p-2 mx-auto mb-3" src="<?php echo htmlspecialchars($blobUrl7); ?>" style="width: 80px; height: 80px;">
                    <h5 class="mb-0" id="c2">
                    <?php echo "{$SquareData[35]}" ?>
                    </h5><!--Client Name-->
                    <p id="p2">
                    <?php echo "{$SquareData[36]}" ?>
                    </p><!--Profession-->
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0" id="c2Des">
                    <?php echo "{$SquareData[42]}" ?>
                    </p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="bg-light rounded-circle p-2 mx-auto mb-3" src="<?php echo htmlspecialchars($blobUrl8); ?>" style="width: 80px; height: 80px;">
                    <h5 class="mb-0" id="c3">
                    <?php echo "{$SquareData[37]}" ?>
                    </h5><!--Client Name-->
                    <p id="p3">
                    <?php echo "{$SquareData[38]}" ?>
                    </p><!--Profession-->
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0" id="c3Des">
                    <?php echo "{$SquareData[43]}" ?>
                    </p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="bg-light rounded-circle p-2 mx-auto mb-3" src="<?php echo htmlspecialchars($blobUrl9); ?>" style="width: 80px; height: 80px;">
                    <h5 class="mb-0" id="c4">
                    <?php echo "{$SquareData[39]}" ?>
                    </h5><!--Client Name-->
                    <p id="c4">
                    <?php echo "{$SquareData[40]}" ?>
                    </p><!--Profession-->
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0" id="c4Des">
                    <?php echo "{$SquareData[44]}" ?>
                    </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
    <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
<!-- Owl Carousel CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

<!-- Owl Carousel JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function(){
          $(".owl-carousel").owlCarousel({
            items: 1,        // Display one item at a time
            loop: true,      // Loop through items
            autoplay: true,  // Auto-play
            autoplayTimeout: 5000, // 5 seconds per slide
            nav: true        // Navigation arrows
          });
        });
      </script>
      <!-- Main News Slider Start -->
      <div class="container-fluid" style="margin-bottom: 0px;">
        <div class="news-header">
            <h2 class="news-heading" id="News1"></h2>
        </div>
    </div>
    
    <div class="container-fluid" style="margin-bottom: 0px;">
    <div class="row">
        <div class="col-lg-7 px-0">
            <div class="owl-carousel owl-theme">
                <div class="position-relative overflow-hidden" style="height: 500px;">
                    <img class="img-fluid h-100" src="<?php echo htmlspecialchars($blobUrl20); ?>" style="object-fit: cover;"><!-- MAIN BLOCK -->
                    <div class="overlay">
                        <div class="mb-2">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href=""><?php echo "{$SquareData[46]}" ?></a>
                        </div>
                        <a class="h2 m-0 text-white text-uppercase font-weight-bold" href=""><?php echo "{$SquareData[45]}" ?></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5 px-0">
            <div class="row mx-0">
                <div class="col-md-6" style="padding-left: 5px;">
                    <div class="position-relative overflow-hidden" style="height: 250px;">
                        <img class="img-fluid w-100 h-100" src="<?php echo htmlspecialchars($blobUrl16); ?>" style="object-fit: cover;"><!-- NEW PRODUCTS ARRIVED -->
                        <div class="overlay">
                            <div class="mb-2">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href=""><?php echo "{$SquareData[48]}" ?></a>
                            </div>
                            <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href=""><?php echo "{$SquareData[47]}" ?></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" style="padding-left: 5px;">
                    <div class="position-relative overflow-hidden" style="height: 250px;">
                        <img class="img-fluid w-100 h-100" src="<?php echo htmlspecialchars($blobUrl18); ?>" style="object-fit: cover;"><!-- NEW PACKAGES HERE -->
                        <div class="overlay">
                            <div class="mb-2">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href=""><?php echo "{$SquareData[50]}" ?></a>
                            </div>
                            <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href=""><?php echo "{$SquareData[49]}" ?></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" style="padding-left: 5px;">
                    <div class="position-relative overflow-hidden" style="height: 250px;">
                        <img class="img-fluid w-100 h-100" src="<?php echo htmlspecialchars($blobUrl17); ?>" style="object-fit: cover;"><!-- 15 YEAR ANNIVERSARY -->
                        <div class="overlay">
                            <div class="mb-2">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href=""><?php echo "{$SquareData[52]}" ?></a>
                            </div>
                            <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href=""><?php echo "{$SquareData[51]}" ?></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" style="padding-left: 5px;">
                    <div class="position-relative overflow-hidden" style="height: 250px;">
                        <img class="img-fluid w-100 h-100" src="<?php echo htmlspecialchars($blobUrl19); ?>" style="object-fit: cover;"><!-- PLATINUM AWARD -->
                        <div class="overlay">
                            <div class="mb-2">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href=""><?php echo "{$SquareData[54]}" ?></a>
                            </div>
                            <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href=""><?php echo "{$SquareData[53]}" ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
$("#services1").text("'.$headersAll[9].'");
$("#services2").text("'.$headersAll[10].'");
$("#services3").text("'.$headersAll[11].'");
$("#services4").text("'.$headersAll[12].'");
$("#services5").text("'.$headersAll[13].'");
$("#services6").text("'.$headersAll[14].'");
$("#brands1").text("'.$headersAll[15].'");
$("#customer1").text("'.$headersAll[16].'");
$("#customer2").text("'.$headersAll[17].'");
$("#News1").text("'.$headersAll[18].'");

$("#SquareData1").text("'.$SquareData[0].'");
$("#SquareData2").text("'.$SquareData[1].'");
$("#SquareData3").text("'.$SquareData[2].'");
$("#aboutUSdes").text("'.$SquareData[3].'");
$("#aboutP1H1").text("'.$SquareData[4].'");
$("#AboutP1C1").text("'.$SquareData[5].'");
$("#AboutP2H2").text("'.$SquareData[6].'");
$("#AboutP2C2").text("'.$SquareData[7].'");
$("#AboutP3H3").text("'.$SquareData[8].'");
$("#AboutP3C3").text("'.$SquareData[9].'");
$("#BBox1num1").text("'.$SquareData[10].'");
$("#BBox1title1").text("'.$SquareData[11].'");
$("#BBox2num2").text("'.$SquareData[12].'");
$("#BBox2title2").text("'.$SquareData[13].'");
$("#BBox3num3").text("'.$SquareData[14].'");
$("#BBox3title3").text("'.$SquareData[15].'");
$("#service1Des").text("'.$SquareData[16].'");
$("#service1P1").text("'.$SquareData[17].'");
$("#service1P2").text("'.$SquareData[18].'");
$("#service1P3").text("'.$SquareData[19].'");
$("#service2Des").text("'.$SquareData[20].'");
$("#service2P1").text("'.$SquareData[21].'");
$("#service2P2").text("'.$SquareData[22].'");
$("#service2P3").text("'.$SquareData[23].'");
$("#service3Des").text("'.$SquareData[24].'");
$("#service3P1").text("'.$SquareData[25].'");
$("#service3P2").text("'.$SquareData[26].'");
$("#service3P3").text("'.$SquareData[27].'");
$("#service4Des").text("'.$SquareData[28].'");
$("#service4P1").text("'.$SquareData[29].'");
$("#service4P2").text("'.$SquareData[30].'");
$("#service4P3").text("'.$SquareData[31].'");
$("#brandsDes").text("'.$SquareData[32].'");
});
</script>';
?>