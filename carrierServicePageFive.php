<?php
require_once 'sqlConnection.php'; //sql connection 
$Brand = $_POST['Brand'];
$plateNum = $_POST['plateNum'];
$problem = $_POST['problem'] ?? '';

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$phone = $_POST['phone'];
$mail = $_POST['mail'];
$address2 = $_POST['address2'];
$nic = $_POST['nic'];
$longitude = $_POST['longitude'];
$latitude = $_POST['latitude'];
$today = date("Y-m-d");
$accidentLocation = "Registered online";
$approval = "FALSE";
$query = "INSERT INTO carrierServiceCustomers(firstName, 
    lastName, 
    NIC, 
    Date, 
    address, 
    phone, 
    mail, 
    brand, 
    vehiclePlateNumber, 
    problem, 
    type,
    latitude_cuslocation, 
    longitude_cuslocation,
    approvalStatus
) 
VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$params = [$fname,$lname,$nic,$today,$address2,$phone,$mail,$Brand,$plateNum,$problem,$accidentLocation,$latitude,$longitude,$approval];
/*
  $query = "INSERT INTO carrierServiceCustomers(firstName, 
    lastName, 
    NIC, 
    Date, 
    address, 
    phone, 
    mail, 
    brand, 
    vehiclePlateNumber, 
    problem, 
    accidentLocationAddress,
    latitude_cuslocation, 
    longitude_cuslocation,
    approvalStatus
) 
VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$params = [$fname,$lname,$nic,$today,$address2,$phone,$mail,$Brand,$plateNum,$problem,$accidentLocation,$latitude,$longitude,$approval];
 */
$queryStmt = sqlsrv_query($conn,$query,$params);
if($queryStmt == false){
    echo "<script>alert('Error related to the requesting the vehicle');
     window.location.href = 'carrierServicePage.php';</script>";
}else{
    //echo "Request sent successfully. Check your email box for a confirmation email.";
}
//$today = date("Y-m-d");
//echo "{$Brand}<br>{$plateNum}<br>{$problem}<br>{$fname}<br>{$lname}<br>{$phone}<br>{$mail}<br>{$address2}<br>{$nic}<br>lat - {$latitude}<br>longi - {$longitude}";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Sent</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #5bc0de, #337ab7);
            color: #fff;
        }
        .container {
            text-align: center;
            background-color: #fff;
            color: #333;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 400px;
            opacity: 0;
            animation: fadeIn 1.5s forwards;
        }
        .email-icon {
            margin: 0 auto 20px;
            width: 80px;
            height: 80px;
            opacity: 0;
            animation: fadeIn 1s forwards 0.5s;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 15px;
            color: #337ab7;
            opacity: 0;
            animation: fadeIn 1s forwards 1s;
        }
        p {
            font-size: 16px;
            line-height: 1.5;
            opacity: 0;
            animation: fadeIn 1s forwards 1.5s;
        }
        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #888;
            opacity: 0;
            animation: fadeIn 1s forwards 2s;
        }
        /* Fading animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .btn_center {
            color: white;
            margin: auto;
            width: 150px;
            line-height: 42px;
            border-color:transparent;
            font-size: 12px;
            letter-spacing: 2px;
            border-radius: 10px;
            font-weight: bold;
            text-transform: uppercase;
            background-color: #031d67;
            box-shadow: 0px 15px 18px -6px rgba(35, 22, 214, 0.65);
            transition: all 0.4s;
            opacity: 0;
            animation: fadeIn 1s forwards 2.5s;
        }
        .btn_center:hover {
            background-color: #051749;
            box-shadow: 0px 22px 19px -8px rgba(16, 8, 119, 0.65);
            transform: scale(1.02, 1.02);
        }
        .btn_center:active {
            background-color: #051749;
            box-shadow: 0px 12px 18px -4px rgba(7, 4, 51, 0.65);
            transform: scale(0.95, 0.95);
            transition: all 0.4s -0.125s;
        }
    </style>
</head>
<body>
    <div class="container">
        <img style="margin-bottom:4px;" src="https://cdn-icons-png.flaticon.com/512/561/561127.png" alt="Email Icon" class="email-icon">
        <h1 style="margin-top:0px;">Request Sent!</h1>
        <p>Your request has been sent to the auto care center. A confirmation email will be sent to your email address shortly.</p>
        <p>Your request will be validated during working hours.</p>
        <button onClick="pageNavigate()" class="btn_center">Home</button>
        <script>
            function pageNavigate() {
                window.location.href = 'index.php';
            }
        </script>
    </div>
</body>
</html>

