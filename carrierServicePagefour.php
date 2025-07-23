<?php
$Brand = $_POST['Brand'];
$plateNum = $_POST['plateNum'];
$problem = $_POST['problem'] ?? '';

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$phone = $_POST['phone'];
$mail = $_POST['mail'];
$address2 = $_POST['address2'];
$nic = $_POST['nic'];
//$today = date("Y-m-d");
//echo "<script>alert('{$Brand}');</script>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Location Map</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #map {
            height: 450px;
            width: 100%;
            border: 2px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .spinner {
            display: none;
            margin: 20px auto;
            border: 4px solid #f3f3f3;
            border-top: 4px solid #0078d7;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .error {
            color: #e63946;
        }
       /**confirm btn */
       /**confirm button */
.animated-button {
  position: relative;
  display: flex;
  align-items: center;
  gap: 4px;
  padding: 16px 36px;
  border: 4px solid;
  border-color: transparent;
  font-size: 16px;
  background-color: inherit;
  border-radius: 100px;
  font-weight: 600;
  color: #008000;
  box-shadow: 0 0 0 2px #008000;
  cursor: pointer;
  overflow: hidden;
  transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
}

.animated-button svg {
  position: absolute;
  width: 24px;
  fill: #008000;
  z-index: 9;
  transition: all 0.8s cubic-bezier(0.23, 1, 0.32, 1);
}

.animated-button .arr-1 {
  right: 16px;
}

.animated-button .arr-2 {
  left: -25%;
}

.animated-button .circle {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 20px;
  height: 20px;
  background-color: #008000;
  border-radius: 50%;
  opacity: 0;
  transition: all 0.8s cubic-bezier(0.23, 1, 0.32, 1);
}

.animated-button .text {
  position: relative;
  z-index: 1;
  transform: translateX(-12px);
  transition: all 0.8s cubic-bezier(0.23, 1, 0.32, 1);
}

.animated-button:hover {
  box-shadow: 0 0 0 12px transparent;
  color: white;
  border-radius: 12px;
}

.animated-button:hover .arr-1 {
  right: -25%;
}

.animated-button:hover .arr-2 {
  left: 16px;
}

.animated-button:hover .text {
  transform: translateX(12px);
}

.animated-button:hover svg {
  fill: #212121;
}

.animated-button:active {
  scale: 0.95;
  box-shadow: 0 0 0 4px #008000;
}

.animated-button:hover .circle {
  width: 220px;
  height: 220px;
  opacity: 1;
}

    </style>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAc4y4jfQXmmUUHFFGHsF1Rda9OIq6BmUA&callback=initMap" async defer></script>
    <script>
       let marker;
        function initMap() {
            const spinner = document.querySelector('.spinner');
            const errorMsg = document.querySelector('.error');
            spinner.style.display = 'block';

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    const lat = position.coords.latitude;
                    const lng = position.coords.longitude;
                    document.getElementById('latitude').value = lat;
                    document.getElementById('longitude').value = lng;
                    const userLocation = { lat: lat, lng: lng };

                    const map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 14,
                        center: userLocation
                    });

                    marker = new google.maps.Marker({
                        position: userLocation,
                        map: map,
                        title: 'You are here'
                    });

                    spinner.style.display = 'none';
                    map.addListener("click", (e) => {
                      placeMarker(e.latLng);
                    });
                  }, function() {
                    showFallbackMap('Could not retrieve location. Showing fallback.');
                });
            } else {
                showFallbackMap('Geolocation is not supported by your browser.');
            }

            function showFallbackMap(message) {
                errorMsg.textContent = message;
                const fallbackLocation = { lat: 0.000000, lng: -0.000000 };
                const map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 14,
                    center: fallbackLocation
                });

                new google.maps.Marker({
                    position: fallbackLocation,
                    map: map,
                    title: 'Fallback location'
                });

                spinner.style.display = 'none';
                console.log(message);
            }
            function placeMarker(location) {
               if (marker) {
                 marker.setPosition(location);
                } else {
                 marker = new google.maps.Marker({
                 position: location,
                 map: map,
                });
               }
               document.getElementById('latitude').value = location.lat();
               document.getElementById('longitude').value = location.lng();
              // Optional: Log the clicked location (latitude and longitude)
               console.log("Clicked Location:", location.lat(), location.lng());
              }
        }
    </script>
</head>
<body onload="initMap()">
    <header class="bg-primary text-white text-center py-3 shadow" style="background-color: rgb(0, 37, 138);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <h1 class="mb-0">Confirm your location</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 py-2">
                <h4 class="mb-0">With Google Maps</h4>
                </div>
            </div>
        </div>
    </header>
    <main class="container my-4">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <p class="mb-4">Please allow access to retrive the location. If location access is denied, a fallback location will be displayed.</p>
                <div class="spinner"></div>
                <div id="map">loading...</div>
                <div class="error mt-3">
                              <form action="carrierServicePageFive.php" method="post">
                                 <input hidden type="text" name="fname" value="<?php echo "{$fname}";?>">
                                 <input hidden type="text" name="lname" value="<?php echo "{$lname}";?>">
                                 <input hidden type="text" name="phone" value="<?php echo "{$phone}";?>">
                                 <input hidden type="text" name="mail" value="<?php echo "{$mail}";?>">
                                 <input hidden type="text" name="address2" value="<?php echo "{$address2}";?>">
                                 <input hidden type="text" name="nic" value="<?php echo "{$nic}";?>">
                                 
                                 <input hidden type="text" name="Brand" value="<?php echo "{$Brand}";?>">
                                 <input hidden type="text" name="plateNum" value="<?php echo "{$plateNum}";?>">
                                 <input hidden type="text" name="problem" value="<?php echo "{$problem}";?>"> 
                                 
                                 <input hidden type="text" name="latitude" id="latitude" value="">
                                 <input hidden type="text" name="longitude" id="longitude" value=""> 
                                   <button class="animated-button">
                                         <svg viewBox="0 0 24 24" class="arr-2" xmlns="http://www.w3.org/2000/svg">
                                              <path d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"
                                              ></path>
                                         </svg>
                                        <span class="text">Next</span>
                                        <span class="circle"></span>
                                        <svg viewBox="0 0 24 24" class="arr-1" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                          d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"
                                        ></path>
                                        </svg>
                                   </button>
                             </form>
                </div>
            </div>
        </div>
    </main>
    <footer class="bg-primary text-white text-center py-3">
        &copy; 2024 SaliyaAutoCare.lk | All Rights Reserved with
        <img src="gmaps.png" height="100px" width="150px" style="background-color:white;">
    </footer>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelector('form').addEventListener('submit', function(e) {
            const lat = document.getElementById('latitude').value;
            const lng = document.getElementById('longitude').value;
            
            if (!lat || !lng) {
                e.preventDefault();
                alert('Please wait for location to be retrieved');
                return false;
            }
        });
    </script>
</body>
</html>

