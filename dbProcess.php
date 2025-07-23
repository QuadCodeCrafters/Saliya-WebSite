<?php
require 'vendor/autoload.php';
use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;
    require_once 'blobStorageCon.php'; //blob storage connection
    require_once 'sqlConnection.php'; //sql connection 
    $tsql= "SELECT * FROM orgInfo";
    $getResults = sqlsrv_query($conn, $tsql);

    if ($getResults === false) {
        die(print_r(sqlsrv_errors(), true)); // Handle query errors
    }
    while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
        if ($row === null) {
           // echo 'No more rows to fetch.';
            break;
        }
        $orgName = $row["orgName"];
        $address = $row["address"];
        $weekDayOpen = $row["weekDayOpen"];
        $weekEndOpen = $row["weekEndOpen"];
        $phone = $row["phone"];
        $mail = $row["mail"];
        $fax = $row["fax"];
        //echo "<script>alert({$orgName});</script>";
    }
    sqlsrv_free_stmt($getResults);
    
    //HEADERS
    $headersAll = array();
    $tsql2= "SELECT * FROM headers";
    $getResults2 = sqlsrv_query($conn, $tsql2);
    if ($getResults2 === false) {
        die(print_r(sqlsrv_errors(), true)); 
    }
    while ($row = sqlsrv_fetch_array($getResults2, SQLSRV_FETCH_ASSOC)) {
        if ($row === null) {
            break;
        }
        $content = $row["content"];
        array_push($headersAll,"{$content}");
    }
    sqlsrv_free_stmt($getResults2);

    //SQUARES DATA
    $SquareData = array();
    $tsql3= "SELECT * FROM descriptions";
    $getResults3 = sqlsrv_query($conn, $tsql3);
    if ($getResults3 === false) {
        die(print_r(sqlsrv_errors(), true)); 
    }
    while ($row = sqlsrv_fetch_array($getResults3, SQLSRV_FETCH_ASSOC)) {
        if ($row === null) {
            break;
        }
        $description = $row["content"];
        array_push($SquareData,"{$description}");
    }
    sqlsrv_free_stmt($getResults3);

    //STATUS TABLE DATA
    $tsql4= "SELECT * FROM status WHERE id = 1";
    $getResults4 = sqlsrv_query($conn, $tsql4);
    if ($getResults4 === false) {
        die(print_r(sqlsrv_errors(), true)); 
    }
    while ($row = sqlsrv_fetch_array($getResults4, SQLSRV_FETCH_ASSOC)) {
        if ($row === null) {
            break;
        }
        $content4 = $row["sta"];
    }
    sqlsrv_free_stmt($getResults4);

     //SERVICES DATA
     $all_services = array();
     $tsql5= "SELECT name FROM services";
     $getResults5 = sqlsrv_query($conn, $tsql5);
     if ($getResults5 === false) {
         die(print_r(sqlsrv_errors(), true)); 
     }
     while ($row = sqlsrv_fetch_array($getResults5, SQLSRV_FETCH_ASSOC)) {
         if ($row === null) {
             break;
         }
         $content5 = $row["name"];
         array_push($all_services,"{$content5}");
     }
     sqlsrv_free_stmt($getResults5);

     //Social links
     $links = array();
     $tsql6= "SELECT link FROM socialLinks";
     $getResults6 = sqlsrv_query($conn, $tsql6);
     if ($getResults6 === false) {
         die(print_r(sqlsrv_errors(), true)); 
     }
     while ($row = sqlsrv_fetch_array($getResults6, SQLSRV_FETCH_ASSOC)) {
         if ($row === null) {
             break;
         }
         $content6 = $row["link"];
         array_push($links,"{$content6}");
     }
     sqlsrv_free_stmt($getResults6);
?>