<?php
//DATA OBTAINING
$itemID = $_GET['itemID'];
$url = $_GET['value'];
require_once 'blobStorageCon.php'; //blob storage connection
require 'vendor/autoload.php';
use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;
require_once 'sqlConnection.php'; //sql connection 
require_once 'dbProcess.php';
$containerName = "images";
$containerName2 = "shopsmallimages";
$blobName28 = "mainBackground1.jpg";
try {
$blobClient = BlobRestProxy::createBlobService($connectionString);
    $blobUrl28 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName}/{$blobName28}?" . time();
} catch (ServiceException $e) {
    error_log("Blob error: " . $e->getMessage());
    die("Could not retrieve blob.");
}
$smallImages = array();
$smallImageQuery = "SELECT name FROM smallProductImg WHERE shopItemID = $itemID";
$stmt = sqlsrv_query($conn,$smallImageQuery);
if($stmt == false){
    echo "Error of the query";
}else{
    while($row2 = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){
        array_push($smallImages,$row2['name']);
    }
}
try {
    $smallImage1 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName2}/{$smallImages[0]}?" . time();
    $smallImage2 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName2}/{$smallImages[1]}?" . time();
    $smallImage3 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName2}/{$smallImages[2]}?" . time();
    $smallImage4 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName2}/{$smallImages[3]}?" . time();
} catch (ServiceException $th) {
    
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
        .main-image img {
  max-width: 100%;
  height: auto;
}

.thumb-images img {
  cursor: pointer;
  width: 80px;
  height: 80px;
}

.breadcrumb {
  background: none;
  padding: 0;
}

h1 {
  font-size: 1.8rem;
}

h3 {
  font-size: 1.5rem;
}

ul {
  padding-left: 20px;
}

/*CUSTOMER REVIEW START*/
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
table {
            text-align: left;
        }
/*DELIVARY INFORMATION START*/
.delivery-info-card {
            background: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .delivery-info-header {
            font-size: 1.5rem;
            font-weight: 600;
        }
        .icon {
            font-size: 1.2rem;
            color: #0d6efd;
            margin-right: 10px;
        }
        .list-group-item {
            font-size: 1rem;
            border: none;
        }

        .review-form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #6c757d;
        }
        /*image small container*/
        .image-container img {
    object-fit: contain; /* Ensures the image fits without stretching */
    width: 100%; /* Adjust to container's width */
    height: 100%; /* Adjust to container's height */
  }
  /**thumbnail */
  .image-container{
    width: 100px; /* Set the desired container width */
    height: 100px; /* Set the desired container height */
    overflow: hidden; /* Ensure no overflow */
    display: flex;
    justify-content: center;
    align-items: center;
  }/**😊😊😊😊😊😊😊😊😊😊 */
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
    <!--PRODUCT START-->
    <div class="container my-5">
    <div class="row">
      <!-- Product Images Section --> <!--❄️❄️❄️❄️❄️❄️❄️❄️❄️❄️❄️❄️❄️❄️❄️❄️❄️-->
      <div class="col-md-6">
        <div class="main-image text-center mb-4" style=" width: 546px; height: 500px; overflow: hidden; display: flex; justify-content: center; align-items: center;">
          <img style=" object-fit: contain; width: 100%; height: 100%; " src="<?php echo "{$url}"?>" alt="Product" id="mainImage" style="height:500px; width:490px;" class="img-fluid">
        </div>
        <div class="thumb-images d-flex justify-content-center gap-3">
        <div class="image-container"><img src="<?php echo "{$smallImage1}"?>" id="small1" alt="Thumbnail 1" class="img-thumbnail"></div>
        <div class="image-container"><img src="<?php echo "{$smallImage2}"?>" id="small2" alt="Thumbnail 2" class="img-thumbnail"></div>
        <div class="image-container"><img src="<?php echo "{$smallImage3}"?>" id="small3" alt="Thumbnail 3" class="img-thumbnail"></div>
        <div class="image-container"><img src="<?php echo "{$smallImage4}"?>" id="small4" alt="Thumbnail 4" class="img-thumbnail"></div>
        </div>
        <div style="margin-left:50px; margin-top:2px;"><div class="image-container"><img src="<?php echo "{$url}"?>" id="small5" alt="Thumbnail 5" class="img-thumbnail"></div></div>
      </div>
      <script>
        let arrayList = ["small1","small2","small3","small4","small5"];
        for(let i = 0;i<5;i++){
            document.getElementById(arrayList[i]).addEventListener('click',function(){
            let source = document.getElementById(arrayList[i]).src;
            document.getElementById('mainImage').src = source;
           });
        }
      </script>
      <!-- Product Details Section -->
      <div class="col-md-6">
                    <?php
                    $query = "SELECT * FROM shopItems WHERE shopItemID = {$itemID}";
                    $getResults = sqlsrv_query($conn, $query);
                    if ($getResults === false) {
                        error_log(print_r(sqlsrv_errors(), true));
                        die("Query failed.");
                    }
                    $itemRow = array("id"=>"","ItemName"=>"","Price"=>"","imgName"=>"","longName"=>"","des1"=>"","des2"=>"",
                "brandIconName"=>"","address"=>"","type"=>"","productLink"=>"");
                
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
                        $itemRow["productLink"] = $row['productLink'];
                    }
                     ?>
        <h1><?php echo $itemRow["longName"]?></h1>
        <h3 class="text-success"><?php echo $itemRow["Price"]?></h3>
        <br>
        <h5>Description</h5>
        <p style="text-align:justify;"><?php echo $itemRow["des1"]?></p><br>
        <p style="text-align:justify;"><?php echo $itemRow["des2"]?></p>
        <div class="d-flex align-items-center">
          <div class="me-3" style="display:flex;">
                <!--<input type="number" value="1" class="form-control w-50">-->
            <a style="margin-left:10px;" class="btn btn-dark" href="<?php echo $itemRow["productLink"]?>" target="_blank">Buy Now On Amazon</a>
          </div>
        </div>
        <hr>
        <p class="mt-3">Category: <a href="#" style="color:blue;"><?php echo $itemRow["type"]?></a></p>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                <h5 style="margin-bottom:0px;">Manuals</h5>
            <form action="pdfOpen.php" method="post" enctype="multipart/form-data">
            <input hidden type="text" name="itemIDholder" value="<?php echo "{$itemID}";?>">    
            <button name="fileSendButton" id="fileSendButton" pointer="hand" style="color:blue; padding-left:0px; padding-bottom:10px; background-color:transparent; border-color:transparent; width:400px; text-align:left;">Technical Data Sheet - Download</button>
            </form>
        
        <h5 style="margin-right:5px;">Brand</h5>
        <div style="display:flex;">
        <img src="data:image/jpeg;base64,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" style="height:25px; width:80px;">
        <label style="margin-left:6px;"><?php echo $itemRow["address"]?></label>
        </div>
                </div>
                <div class="col-md-6">
                 <div style="display:flex;">
                    <div>
                    
                    </div>
                 </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
    <!--PRODUCT END-->
      <!--Table start-->
      <div class="container my-5">
        <h2 class="text-center mb-4">Specification Table</h2>
        <table class="table table-bordered">
            <tbody>
                    <?php
                    $query = "SELECT * FROM specifications WHERE shopItemID = {$itemID}";
                    $getResults = sqlsrv_query($conn, $query);
                    if ($getResults === false) {
                        error_log(print_r(sqlsrv_errors(), true));
                        die("Query failed.");
                    }
                    $specificationRow = array("name"=>"","description"=>"");
                    $count = 0;
                    while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
                        $specificationRow["name"] = $row['name'];
                        $specificationRow["description"] = $row['description']; 
                        if($count == 0){

                        //}
                    //}
                     ?>
                <tr>
                    <th scope="row"><?php echo $specificationRow["name"]?></th>
                    <td><?php echo $specificationRow["description"]?></td>
                
                <?php $count = 1?>
                <?php } else{?>
                  <th scope="row"><?php echo $specificationRow["name"]?></th>
                  <td><?php echo $specificationRow["description"]?></td>
                  </tr>
                  <?php $count = 0?>
                  <?php }?>
                <?php }?>
            </tbody>
        </table>
    </div>
      <!--TABLE END-->
      <!--DELIVARY INFO START-->
                    <?php
                    $query = "SELECT * FROM delivaryInfo WHERE shopItemID = {$itemID}";
                    $getResults = sqlsrv_query($conn, $query);
                    if ($getResults === false) {
                        error_log(print_r(sqlsrv_errors(), true));
                        die("Query failed.");
                    }
                     ?>
      <div class="container my-5">
        <div class="delivery-info-card p-4">
            <h2 class=" text-center mb-4">Delivery Information</h2>
            <ul class="list-group list-group-flush">
                    <?php
                     $itemRow3 = array("name"=>"","des"=>"");
                     $count2 = 0;
                     while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
                         $itemRow3["name"] = $row['name'];
                         $itemRow3["des"] = $row['des'];
                         $count2++;
                     //}
                     ?> 
                     <li class="list-group-item d-flex align-items-center" style="background-color:#f8f9fa;">
                    <strong><?php echo $itemRow3["name"]?> </strong>
                    <span class="ms-2"><?php echo $itemRow3["des"]?></span>
                </li>
                <?php }?> 
                <?php
                if($count2<2){

                //}
                ?> 
                <h5 style="text-align:center;">No Delivary Information</h5>
                <?php }?>   
            </ul>
        </div>
    </div>
      <!--DELIVARY INFO END--->
    <!--CUSTOMER REVIEWS-->
                   <?php
                    $query = "SELECT TOP 3 * FROM cusReview WHERE shopItemID = {$itemID}";
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
        <form action="allReviews.php" method="post"><button style="border-color:transparent;" name="allreviewbtn" value="<?php echo $itemID; ?>" style="text-align:center; color:blue; cursor:pointer;">
    All reviews and write a review
        </button></form>
    </div>
</div>
    <!--Customer info end-->
      <!--★★★★★-->
   <!--ADDITIONAL INFO START-->
                    <?php
                    $query = "SELECT * FROM additional WHERE shopItemID = {$itemID}";
                    $getResults = sqlsrv_query($conn, $query);
                    if ($getResults === false) {
                        error_log(print_r(sqlsrv_errors(), true));
                        die("Query failed.");
                    }
                    $addInfo = "";
                    while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
                      $addInfo = $row['addInfo'];
                    }
                     ?>
  <div class="container my-5">
        <div class="delivery-info-card p-4">
            <h2 class=" text-center mb-4">Additional Information</h2>
            <ul class="list-group list-group-flush">
                <p style="background-color:#f8f9fa;"><?php echo $addInfo?></p>
            </ul>
        </div>
    </div>
  <!--ADDITIONAL INFO END-->
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
sqlsrv_free_stmt($getResults);
sqlsrv_close($conn);
?>