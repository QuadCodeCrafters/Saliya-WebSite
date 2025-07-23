<?php
require_once 'sqlConnection.php'; 
require 'vendor/autoload.php';
use \Mailjet\Resources;
if(isset($_POST['terms'])){
    $tsql = "SELECT mail FROM orgInfo";
$getResults = sqlsrv_query($conn, $tsql);
if ($getResults === false) {
    die(print_r(sqlsrv_errors(), true));
}
$to = null;
while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
    $to = $row["mail"]; 
}
sqlsrv_free_stmt($getResults);
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$zipcode = $_POST['zipcode'];
$message = $_POST['message'];

$apiKey = 'KEY_IS_HIDDEN';
$apiSecret = 'KEY_IS_HIDDEN';

$mj = new \Mailjet\Client($apiKey, $apiSecret, true, ['version' => 'v3.1']);
$body = [
    'Messages' => [
        [
            'From' => [
                'Email' => $email,
                'Name' => $name
            ],
            'To' => [
                [
                    'Email' => $to,
                    'Name' => 'Recipient Name'
                ]
            ],
            'Subject' => $subject,
            'TextPart' => $message,
            'HTMLPart' => '<body style="font-family: Arial, sans-serif; line-height: 1.6; margin: 20px;">

    <h1 style="color: #040686; text-align: center; font-size: 2.5em; border-bottom: 2px solid #ccc; padding-bottom: 10px;">Customer Feedback</h1>

    <h3 style="color: #333; margin: 20px 0; padding: 10px; background-color: #f9f9f9; border-left: 5px solid #040686;">
        '.$message.'
    </h3>

    <h5 style="color: #555; font-style: italic; margin-top: 10px;">
        Location (ZIP code): <span style="color: #000;">'.$zipcode.'</span>
    </h5>

</body>',
        ]
    ]
];

$response = $mj->post(Resources::$Email, ['body' => $body]);

if ($response->success()) {
    //echo "Email sent successfully!";
    header('location:contact.php');
} else {
    echo "Error: " . $response->getStatus() . " - " . $response->getReasonPhrase();
}

}else{
    echo "<script>
    alert('Please agree to our privacy statement');
    window.location.href = 'contact.php';
    </script>";
}
?>
