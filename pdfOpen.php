<?php
$itemIDholder = $_POST['itemIDholder'];
require 'vendor/autoload.php';
use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;
require_once 'blobStorageCon.php'; // Blob storage connection
require_once 'sqlConnection.php'; // SQL connection
require_once 'dbProcess.php';

$manualQuery = "SELECT * FROM manualNames WHERE shopItemID = $itemIDholder";
$stmt2 = sqlsrv_query($conn, $manualQuery);

if ($stmt2 === false) {
    echo "Error in the manual query";
    exit;
}

$manualName = '';
while ($row3 = sqlsrv_fetch_array($stmt2, SQLSRV_FETCH_ASSOC)) {
    $manualName = $row3['name'];
}

if (empty($manualName)) {
    echo "Manual not found.";
    exit;
}

$containerName3 = "productmanuals"; //name of the conteiner
$filePDF = "http://127.0.0.1:10000/devstoreaccount1/{$containerName3}/{$manualName}"; //this is the location of the stored PDF file (using a URL)
//but we can access the the file without downloading it (access it from the server using a URL)
try {
    // Fetch the file content using an HTTP client
    $fileContent = file_get_contents($filePDF);// this function "file_get_contents()" retrives retrieves the file's raw binary content into a variable
    //The data is stored as a PHP string because PHP treats binary data as a string of bytes.
    //Raw binary data is the unprocessed sequence of bytes representing a file or data.
    //It's how data is stored, transferred, and processed by computers.
    //While binary data isn't directly human-readable, programs and applications interpret it based on the file's format (e.g., PDF, image, video).

    if ($fileContent === false) {
        throw new Exception("Failed to fetch the file.");
    }

    // Set headers for downloading the file/ the instructions sent to the browser to  treat the response (" echo $fileContent;") as a downloadable PDF file.
    header("Content-Type: application/pdf"); 
    //This header informs the browser that the content being sent is a PDF file. The MIME type application/pdf tells the browser to expect a PDF document.
    header("Content-Disposition: attachment; filename=\"$manualName\"");
    //This header instructs the browser to treat the file as an attachment. This means the browser will prompt the user to download the file instead of displaying it inline.
    //The filename parameter suggests a default name for the downloaded file, which is stored in the variable $manualName.
    header("Content-Length: " . strlen($fileContent));
    //This header specifies the size of the content being sent, in bytes.
    //The strlen($fileContent) function calculates the length of the content stored in the variable $fileContent.
    //Knowing the size of the file helps the browser display the progress of the download and verify that the complete file has been received.

    // Outputs the content of the PDF file stored in the $fileContent variable directly to the browser.
    //Without this line, the file’s content would not be sent to the browser, and the download would not occur.
    echo $fileContent;
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
