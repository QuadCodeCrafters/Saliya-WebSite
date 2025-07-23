<?php
require 'vendor/autoload.php';
use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;
// Include necessary files
require_once 'blobStorageCon.php'; //blob storage connection
require_once 'sqlConnection.php'; //sql connection 
require_once 'dbProcess.php';
$containerName = "images";
$blobName28 = "mainBackground1.jpg";
try {
$blobClient = BlobRestProxy::createBlobService($connectionString);
$blobUrl28 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName}/{$blobName28}?" . time();
} catch (ServiceException $e) {
    error_log("Blob error: " . $e->getMessage());
    die("Could not retrieve blob.");
}
//Azure images selector 2
$containerName2 = "shopimages";
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
        .border-box {
      position: relative;
      overflow: hidden; /* Ensures content stays within the container */
    }

    .border-box .background-image {
      background-size: cover;
      background-position: center;
      width: 100%;
      height: 100%;
    }

    .content-overlay {
      position: absolute;
      bottom: 20px;
      left: 50%;
      transform: translateX(-50%);
      text-align: center;
      color: white;
      z-index: 1;
    }

    .content-overlay h4 {
      margin-bottom: 10px;
      font-size: 1.5rem;
    }

    .content-overlay button {
      padding: 10px 20px;
      background-color: rgba(255, 255, 255, 0.8);
      color: black;
      border: none;
      font-size: 1rem;
      font-weight: bold;
    }

    .content-overlay button:hover {
      background-color: rgba(255, 255, 255, 1);
    }

    .border-box::after {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.4); /* Adds a semi-transparent overlay for better text visibility */
      z-index: 0;
    }

    .banner {
      position: relative;
      height: 400px;
      color: white;
      overflow: hidden;
    }

    /* Video Styling */
    .banner video {
      position: absolute;
      top: 50%;
      left: 50%;
      min-width: 100%;
      min-height: 100%;
      width: auto;
      height: auto;
      transform: translate(-50%, -50%);
      z-index: 1;
      object-fit: cover;
    }

    /* Overlay Text Styling */
    .overlay-text {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
      z-index: 2;
    }

    .overlay-text h2 {
      font-size: 2rem;
      font-weight: bold;
    }

    .overlay-text button {
      padding: 10px 20px;
      background-color: white;
      color: black;
      border: none;
      font-size: 1rem;
      font-weight: bold;
    }

    .overlay-text button:hover {
      background-color: #ddd;
    }
    /*CARDS START*/
    .section-title {
      font-size: 1.5rem;
      font-weight: bold;
      margin-bottom: 20px;
    }

    .game-card {
      background-color: #333; /* Dark card background */
      border-radius: 10px;
      overflow: hidden;
      text-align: center;
      position: relative;
      height:380px;
    }

    .game-card img {
      width: 100%;
      height: auto;
    }

    .game-card .game-info {
      padding: 10px;
    }

    .game-card h5 {
      font-size: 1rem;
      margin: 10px 0;
    }

    .game-card .rating {
      color: #ffc107; /* Star color */
    }

    .game-card .badge {
      position: absolute;
      bottom: 10px;
      right: 10px;
      background-color: rgba(0, 0, 0, 0.8);
      color: white;
      font-weight: bold;
      padding: 5px 10px;
      border-radius: 5px;
    }
    .white-header{
        color:white;
    }
    /*CARDS END*/
    /**test card start */
    
    /**test card end */
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
    <!--MAIN BANNER START-->
    <div class="container-fluid">
    <!-- Top Section with Video Background, Label, and Button -->
    <div class="row">
      <div class="col-md-12 col-sm-12 border-box banner">
        <!-- Video Background -->
        <video autoplay muted loop playsinline>
          <source src="video1.mp4" type="video/mp4">
          <!-- Fallback message for browsers that don't support video -->
          Your browser does not support the video tag.
        </video>
        
        <!--Overlay Text-->
        <div class="overlay-text">
          <h2 style="color:white;">Shop Now</h2>
          <button onClick="redirectToPage4()">Browse all our products</button>
        </div>
            <script>
        function redirectToPage4() {
            window.location.href = 'allProductBrowse.php';
        }
         </script>
      </div>
    </div>
    
    <div class="container">
    <div class="container my-4">
        <div class="section-title">Low Pricing <a href="topRatedAllItems.php" class="text-success">›</a></div>
        <div id="gameCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                    <?php
$ratingQuery = "SELECT TOP 8 * FROM shopItems ORDER BY price";
$ratingResults = sqlsrv_query($conn, $ratingQuery);
if ($ratingResults === false) {
    error_log(print_r(sqlsrv_errors(), true));
    die("Query failed.");
}

while ($row = sqlsrv_fetch_array($ratingResults, SQLSRV_FETCH_ASSOC)) {
    $ratingitemRow = array(
        "id" => $row['shopItemID'] ?? "",
        "ItemName" => $row['itemName'] ?? "",
        "Price" => "Rs." . ($row['price'] ?? "0.00"),
        "imgName" => $row['imgName'] ?? "",
    );

    $ratingquery = "SELECT rating FROM cusReview WHERE shopItemID = {$ratingitemRow["id"]}";
    $getResults = sqlsrv_query($conn, $ratingquery);
    if ($getResults === false) {
        error_log(print_r(sqlsrv_errors(), true));
        die("Query failed.");
    }
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
    try{
        if($pointTot == 0){
            $avg = 0;
        }else{
            $avg = $tot/$pointTot;
            $avg = round($avg,1);
        }
      
    }catch(Exception $ee){
        die("Error occured");
    }


    // Generate Blob URL
    try {
        $ratingClient = BlobRestProxy::createBlobService($connectionString);
        $ratingImg = "http://127.0.0.1:10000/devstoreaccount1/{$containerName2}/{$ratingitemRow["imgName"]}?" . time();
    } catch (ServiceException $e) {
        error_log("Blob error: " . $e->getMessage());
        die("Could not retrieve blob.");
    }
    
    // Render HTML
    echo "
    <div class=\"col-md-3 col-sm-6 mb-4\">
        <div class=\"game-card\" style=\"border: 1px solid #ddd; border-radius: 8px; padding: 15px; text-align: center; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);\">
            <div style=\"width: 100%; height: 200px; overflow: hidden; display: flex; align-items: center; justify-content: center; background-color: #f9f9f9; margin-bottom: 10px;\">
                <img src=\"{$ratingImg}\" style=\"width: auto; height: 100%; object-fit: contain;\" alt=\"{$ratingitemRow['ItemName']}\">
            </div>
            <div class=\"game-info\" style=\"margin-bottom: 10px;\">
                <h5 style=\"font-size: 1rem; font-weight: bold; color: #333;\">
                    <a href='productPage.php?itemID={$ratingitemRow["id"]}&value={$ratingImg}' style='color: white; text-decoration: none;'>{$ratingitemRow['ItemName']}</a>
                </h5>
                <div style=\"color: #ffc107; font-weight: bold;\">{$avg} ★</div>
            </div>
            <div class=\"badge\" style=\"background-color: #ffd814; color: #0f1111; font-weight:normal; padding: 5px 10px; border-radius: 5px; font-size: 1rem; display: inline-block;\">{$ratingitemRow["Price"]}</div>
        </div>
    </div>";
}
?>

                        
                    </div>
                </div>
            </div>
            <!-- Carousel Controls -->
        </div>
    </div>
</div>


    <!-- Three Equal Columns Section -->
    <div class="row">
      <!-- First box in bottom row -->
      <div class="col-md-4 col-sm-12 border-box" style="height:500px; padding:0px;">
        <div class="background-image" style="background-image: url('catImg1.jpg');"></div>
        <div class="content-overlay">
          <h4 style="color:white;">Interior</h4>
          <button onClick="redirectToPage1()">Shop Now</button>
        </div>
      </div>

      <!-- Second box in bottom row -->
      <div class="col-md-4 col-sm-12 border-box" style="height:500px; padding:0px;">
        <div class="background-image" style="background-image: url('catImg2.jpg');"></div>
        <div class="content-overlay">
          <h4 style="color:white;">Exterior</h4>
          <button onClick="redirectToPage2()">Shop Now</button>
        </div>
      </div>

      <!-- Third box in bottom row -->
      <div class="col-md-4 col-sm-12 border-box" style="height:500px; padding:0px;">
        <div class="background-image" style="background-image: url('catImg3.jpg');"></div>
        <div class="content-overlay">
          <h4 style="color:white;">Maintenance</h4>
          <button onClick="redirectToPage3()">Shop Now</button>
        </div>
      </div>
    </div>
    </div>
  </div>
  <script>
        function redirectToPage1() {
            window.location.href = 'productTypeAll.php';
        }
        function redirectToPage2() {
            window.location.href = 'productTypeAll2.php';
        }
        function redirectToPage3() {
            window.location.href = 'productTypeAll3.php';
        }
         </script>
  <!--CARD SET 1-->
  <div class="container my-4">
        <div class="section-title">
             Interior
            <a href="productTypeAll.php" class="text-success">›</a>
        </div>
        <div id="gameCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                    <?php
                    $query = "SELECT TOP 8 * FROM shopItems WHERE type = 'Interior';";
                    $getResults = sqlsrv_query($conn, $query);
                    if ($getResults === false) {
                        error_log(print_r(sqlsrv_errors(), true));
                        die("Query failed.");
                    }
                    $itemRow = array("id"=>"","ItemName"=>"","Price"=>"","imgName"=>"","longName"=>"","des1"=>"","des2"=>"",
                "brandIconName"=>"","address"=>"","type"=>"");
                    while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
                        $itemRow["id"] = $row['shopItemID'];
                        $itemRow["ItemName"] = $row['itemName'];
                        $itemRow["Price"] = "Rs." . $row['price'];
                        $itemRow["imgName"] = $row['imgName'];
                        $itemRow["longName"] = $row['longName'];
                        $itemRow["des1"] = $row['des1'];
                        $itemRow["des2"] = $row['des2'];
                        $itemRow["brandIconName"] = $row['brandIconName'];
                        $itemRow["address"] = $row['address'];
                        $itemRow["type"] = $row['type'];



                        $ratingquery2 = "SELECT rating FROM cusReview WHERE shopItemID = {$itemRow["id"]}";
                        $getResults2 = sqlsrv_query($conn, $ratingquery2);
                        if ($getResults2 === false) {
                            error_log(print_r(sqlsrv_errors(), true));
                            die("Query failed.");
                        }
                        $totalAmount2 = array(0,0,0,0,0);
                        $ratingAmount2 = array(0,0,0,0,0);
                        while ($row = sqlsrv_fetch_array($getResults2, SQLSRV_FETCH_ASSOC)) {
                            $rating21 = $row['rating'];
                            if($rating21 == 5){
                                $ratingAmount2[0]++;
                                $totalAmount2[0]+=5;
                            }
                            else if($rating21 == 4){
                                $ratingAmount2[1]++;
                                $totalAmount2[1]+=4;
                            }
                            else if($rating21 == 3){
                                $ratingAmount2[2]++;
                                $totalAmount2[2]+=3;
                            }
                            else if($rating21 == 2){
                                $ratingAmount2[3]++;
                                $totalAmount2[3]+=2;
                            }
                            else if($rating21 == 1){
                                $ratingAmount2[4]++;
                                $totalAmount2[4]+=1;
                            }
                            else{
                                echo "<script>alert('Error occured');</script>";
                            }
                        }
                        $tot = 0;
                        $pointTot = 0;
                        foreach($ratingAmount2 as $f2){
                            $tot += $f2;
                        }
                        foreach($totalAmount2 as $b2){
                            $pointTot += $b2;
                        }
                        try{
                            if($pointTot == 0){
                                $avg2 = 0;
                            }else{
                                $avg2 = $tot/$pointTot;
                                $avg2 = round($avg2,1);
                            }
                          
                        }catch(Exception $ee){
                           
                        }
                    



                        try {
                            $blobClient2 = BlobRestProxy::createBlobService($connectionString);
                                $blobUrlIMG= "http://127.0.0.1:10000/devstoreaccount1/{$containerName2}/{$itemRow["imgName"]}?" . time();
                            } catch (ServiceException $e) {
                                error_log("Blob error: " . $e->getMessage());
                                die("Could not retrieve blob.");
                            }
                            echo "
                            <!-- Card -->
                            <div class=\"col-md-3 col-sm-6 mb-4\">
                                <div class=\"game-card\" style=\"border: 1px solid #ddd; border-radius: 8px; padding: 15px; text-align: center; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);\">
                                    <!-- Image -->
                                    <div style=\"width: 100%; height: 200px; overflow: hidden; display: flex; align-items: center; justify-content: center; background-color: #f9f9f9; margin-bottom: 10px;\">
                                        <img src=\"{$blobUrlIMG}\" style=\"width: auto; height: 100%; object-fit: contain;\" alt=\"Candy Crush Saga\">
                                    </div>
                                    <!-- Game Info -->
                                    <div class=\"game-info\" style=\"margin-bottom: 10px;\">
                                        <h5 class=\"white-header\" style=\"font-size: 1rem; font-weight: bold; color: #333;\">
                                            <a href='productPage.php?itemID={$itemRow["id"]}&value={$blobUrlIMG}' style='color: white; text-decoration: none;'>{$itemRow['ItemName']}</a>
                                        </h5>
                                        <div class=\"rating\" style=\"color: #ffc107; font-weight: bold;\">{$avg2} ★</div>
                                    </div>
                                    <!-- Price Badge -->
                                     <div class=\"badge\" style=\"background-color: #ffd814; color: #0f1111; font-weight:normal; padding: 5px 10px; border-radius: 5px; font-size: 1rem; display: inline-block;\">{$itemRow["Price"]}</div>
                                </div>
                            </div>
                            ";  
                    }
                     ?>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!--CARD SET 2-->
    <div class="container my-4">
        <div class="section-title">
             Exterior
            <a href="productTypeAll2.php" class="text-success">›</a>
        </div>
        <div id="gameCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                    <?php
                    $query = "SELECT TOP 8 * FROM shopItems WHERE type = 'Exterior';";
                    $getResults = sqlsrv_query($conn, $query);
                    if ($getResults === false) {
                        error_log(print_r(sqlsrv_errors(), true));
                        die("Query failed.");
                    }
                    $itemRow = array("id"=>"","ItemName"=>"","Price"=>"","imgName"=>"","longName"=>"","des1"=>"","des2"=>"",
                "brandIconName"=>"","address"=>"","type"=>"");
                    while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
                        $itemRow["id"] = $row['shopItemID'];
                        $itemRow["ItemName"] = $row['itemName'];
                        $itemRow["Price"] = "Rs." . $row['price'];
                        $itemRow["imgName"] = $row['imgName'];
                        $itemRow["longName"] = $row['longName'];
                        $itemRow["des1"] = $row['des1'];
                        $itemRow["des2"] = $row['des2'];
                        $itemRow["brandIconName"] = $row['brandIconName'];
                        $itemRow["address"] = $row['address'];
                        $itemRow["type"] = $row['type'];


                        $ratingquery3 = "SELECT rating FROM cusReview WHERE shopItemID = {$itemRow["id"]}";
                        $getResults3 = sqlsrv_query($conn, $ratingquery3);
                        if ($getResults3 === false) {
                            error_log(print_r(sqlsrv_errors(), true));
                            die("Query failed.");
                        }
                        $totalAmount3 = array(0,0,0,0,0);
                        $ratingAmount3 = array(0,0,0,0,0);
                        while ($row = sqlsrv_fetch_array($getResults3, SQLSRV_FETCH_ASSOC)) {
                            $rating31 = $row['rating'];
                            if($rating31 == 5){
                                $ratingAmount3[0]++;
                                $totalAmount3[0]+=5;
                            }
                            else if($rating31 == 4){
                                $ratingAmount3[1]++;
                                $totalAmount3[1]+=4;
                            }
                            else if($rating31 == 3){
                                $ratingAmount3[2]++;
                                $totalAmount3[2]+=3;
                            }
                            else if($rating31 == 2){
                                $ratingAmount3[3]++;
                                $totalAmount3[3]+=2;
                            }
                            else if($rating31 == 1){
                                $ratingAmount3[4]++;
                                $totalAmount3[4]+=1;
                            }
                            else{
                                echo "<script>alert('Error occured');</script>";
                            }
                        }
                        $tot = 0;
                        $pointTot = 0;
                        foreach($ratingAmount3 as $f3){
                            $tot += $f3;
                        }
                        foreach($totalAmount3 as $b3){
                            $pointTot += $b3;
                        }
                        try{
                            if($pointTot == 0){
                                $avg3 = 0;
                            }else{
                                $avg3 = $tot/$pointTot;
                                $avg3 = round($avg3,1);
                            }
                          
                        }catch(Exception $ee){
                           
                        }
                    





                        try {
                            $blobClient2 = BlobRestProxy::createBlobService($connectionString);
                                $blobUrlIMG= "http://127.0.0.1:10000/devstoreaccount1/{$containerName2}/{$itemRow["imgName"]}?" . time();
                            } catch (ServiceException $e) {
                                error_log("Blob error: " . $e->getMessage());
                                die("Could not retrieve blob.");
                            }
                            echo "
                            <!-- Card -->
                            <div class=\"col-md-3 col-sm-6 mb-4\">
                                <div class=\"game-card\" style=\"border: 1px solid #ddd; border-radius: 8px; padding: 15px; text-align: center; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);\">
                                    <!-- Image -->
                                    <div style=\"width: 100%; height: 200px; overflow: hidden; display: flex; align-items: center; justify-content: center; background-color: #f9f9f9; margin-bottom: 10px;\">
                                        <img src=\"{$blobUrlIMG}\" style=\"width: auto; height: 100%; object-fit: contain;\" alt=\"Candy Crush Saga\">
                                    </div>
                                    <!-- Game Info -->
                                    <div class=\"game-info\" style=\"margin-bottom: 10px;\">
                                        <h5 class=\"white-header\" style=\"font-size: 1rem; font-weight: bold; color: #333;\">
                                            <a href='productPage.php?itemID={$itemRow["id"]}&value={$blobUrlIMG}' style='color: white; text-decoration: none;'>{$itemRow['ItemName']}</a>
                                        </h5>
                                        <div class=\"rating\" style=\"color: #ffc107; font-weight: bold;\">{$avg3} ★</div>
                                    </div>
                                    <!-- Price Badge -->
                                   <div class=\"badge\" style=\"background-color: #ffd814; color: #0f1111; font-weight:normal; padding: 5px 10px; border-radius: 5px; font-size: 1rem; display: inline-block;\">{$itemRow["Price"]}</div>
                                </div>
                            </div>
                            ";   
                    }
                     ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--CARD SET 3-->
    <div class="container my-4">
        <!-- Section Title -->
        <div class="section-title">
             Maintenance
            <a href="productTypeAll3.php" class="text-success">›</a>
        </div>

        <!-- Carousel Wrapper 😂😂😂😂😂😂-->
        <div id="gameCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                    <?php
                    $query = "SELECT TOP 8 * FROM shopItems WHERE type = 'Maintenance';";
                    $getResults = sqlsrv_query($conn, $query);
                    if ($getResults === false) {
                        error_log(print_r(sqlsrv_errors(), true));
                        die("Query failed.");
                    }
                    $itemRow = array("id"=>"","ItemName"=>"","Price"=>"","imgName"=>"","longName"=>"","des1"=>"","des2"=>"",
                "brandIconName"=>"","address"=>"","type"=>"");
                    while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
                        $itemRow["id"] = $row['shopItemID'];
                        $itemRow["ItemName"] = $row['itemName'];
                        $itemRow["Price"] = "Rs." . $row['price'];
                        $itemRow["imgName"] = $row['imgName'];
                        $itemRow["longName"] = $row['longName'];
                        $itemRow["des1"] = $row['des1'];
                        $itemRow["des2"] = $row['des2'];
                        $itemRow["brandIconName"] = $row['brandIconName'];
                        $itemRow["address"] = $row['address'];
                        $itemRow["type"] = $row['type'];




                        $ratingquery4 = "SELECT rating FROM cusReview WHERE shopItemID = {$itemRow["id"]}";
                        $getResults4 = sqlsrv_query($conn, $ratingquery4);
                        if ($getResults4 === false) {
                            error_log(print_r(sqlsrv_errors(), true));
                            die("Query failed.");
                        }
                        $totalAmount4 = array(0,0,0,0,0);
                        $ratingAmount4 = array(0,0,0,0,0);
                        while ($row = sqlsrv_fetch_array($getResults4, SQLSRV_FETCH_ASSOC)) {
                            $rating41 = $row['rating'];
                            if($rating41 == 5){
                                $ratingAmount4[0]++;
                                $totalAmount4[0]+=5;
                            }
                            else if($rating41 == 4){
                                $ratingAmount4[1]++;
                                $totalAmount4[1]+=4;
                            }
                            else if($rating41 == 3){
                                $ratingAmount4[2]++;
                                $totalAmount4[2]+=3;
                            }
                            else if($rating41 == 2){
                                $ratingAmount4[3]++;
                                $totalAmount4[3]+=2;
                            }
                            else if($rating41 == 1){
                                $ratingAmount4[4]++;
                                $totalAmount4[4]+=1;
                            }
                            else{
                                echo "<script>alert('Error occured');</script>";
                            }
                        }
                        $tot = 0;
                        $pointTot = 0;
                        foreach($ratingAmount4 as $f4){
                            $tot += $f4;
                        }
                        foreach($totalAmount4 as $b4){
                            $pointTot += $b4;
                        }
                        try{
                            if($pointTot == 0){
                                $avg4 = 0;
                            }else{
                                $avg4 = $tot/$pointTot;
                                $avg4 = round($avg4,1);
                            }
                          
                        }catch(Exception $ee){
                           
                        }





                        try {
                            $blobClient2 = BlobRestProxy::createBlobService($connectionString);
                                $blobUrlIMG= "http://127.0.0.1:10000/devstoreaccount1/{$containerName2}/{$itemRow["imgName"]}?" . time();
                            } catch (ServiceException $e) {
                                error_log("Blob error: " . $e->getMessage());
                                die("Could not retrieve blob.");
                            }
                        //object-fit: contain; TEST
                        echo "
                        <!-- Card -->
                        <div class=\"col-md-3 col-sm-6 mb-4\">
                            <div class=\"game-card\" style=\"border: 1px solid #ddd; border-radius: 8px; padding: 15px; text-align: center; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);\">
                                <!-- Image -->
                                <div style=\"width: 100%; height: 200px; overflow: hidden; display: flex; align-items: center; justify-content: center; background-color: #f9f9f9; margin-bottom: 10px;\">
                                    <img src=\"{$blobUrlIMG}\" style=\"width: auto; height: 100%; object-fit: contain;\" alt=\"Candy Crush Saga\">
                                </div>
                                <!-- Game Info -->
                                <div class=\"game-info\" style=\"margin-bottom: 10px;\">
                                    <h5 class=\"white-header\" style=\"font-size: 1rem; font-weight: bold; color: #333;\">
                                        <a href='productPage.php?itemID={$itemRow["id"]}&value={$blobUrlIMG}' style='color: white; text-decoration: none;'>{$itemRow['ItemName']}</a>
                                    </h5>
                                    <div class=\"rating\" style=\"color: #ffc107; font-weight: bold;\">{$avg4} ★</div>
                                </div>
                                <!-- Price Badge -->
                                <div class=\"badge\" style=\"background-color: #ffd814; color: #0f1111; font-weight:normal; padding: 5px 10px; border-radius: 5px; font-size: 1rem; display: inline-block;\">{$itemRow["Price"]}</div>
                            </div>
                        </div>
                        ";  
                    }
                     ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
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

                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                       
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
sqlsrv_free_stmt($getResults);
sqlsrv_close($conn);
?>