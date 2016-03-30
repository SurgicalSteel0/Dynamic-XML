<?php

use DynamicXML\Sessions\Session;
use DynamicXML\Utilities\DirectoryUtil;
use DynamicXML\Files\XMLFile;
use DynamicXML\Excel\CSVFile;

require_once "../../start.php";

$session = new Session();

/*
 * First, lets grab all of the xml files we need to parse from the "extracted"
 * directory and all of its sub-directories.
 */
$xmlFilesToParse = array();
$xmlDirectories = DirectoryUtil::getAllDirectoriesInDirectory("../../app/extracted");
foreach ($xmlDirectories as $xmlDirectory) {
    $xmlFiles = DirectoryUtil::getAllFilesInDirectory("../../app/extracted/" . $xmlDirectory);
    foreach ($xmlFiles as $xmlFile) {
        array_push($xmlFilesToParse, new XMLFile("../../app/extracted/" . $xmlDirectory . "/" . $xmlFile));
    }
}

/*
 * Second, lets form "csv rows" that contain the data we want.
 */
$csvRows = array();
foreach ($xmlFilesToParse as $xmlFileToParse) {

    if (count($xmlFileToParse->content->artInfo) === 3) {
        $csvRow = array(
            "orderNumber" => (string) $xmlFileToParse->content->Header->hea_Jobno,
            "quantity" => (int) $xmlFileToParse->content->Header->hea_Quantity,
            "name" => (string) $xmlFileToParse->content->artInfo[0]->artInf_Text,
            "street" => (string) $xmlFileToParse->content->artInfo[1]->artInf_Text,
            "state" => (string) $xmlFileToParse->content->artInfo[2]->artInf_Text
        );

        array_push($csvRows, $csvRow);
    }
}

/*
 * Third, let's group our rows by the order number and create a CSV file object
 * for each group. 
 */
$csvFiles = array(new CSVFile());
foreach ($csvRows as $csvRow) {
    $csvFileFound = false;
    foreach ($csvFiles as $csvFile) {
        if ($csvFile->getOrderNumber() == $csvRow["orderNumber"]) {
            $csvFile->addCSVRow($csvRow);
            $csvFileFound = true;
        }
    }
    if (!$csvFileFound) {
        $newCsvFile = new CSVFile();
        $newCsvFile->setOrderNumber($csvRow["orderNumber"]);
        $newCsvFile->addCSVRow($csvRow);

        array_push($csvFiles, $newCsvFile);
    }
}
array_shift($csvFiles); // We need to remove our blank CSVFile object we started with

foreach ($csvFiles as $csvFile) {
    var_dump($csvFile->);
}

//if ($uploadUtil->successful) {
//
//    $message = array(
//        "type" => "success",
//        "text" => "<strong>File Uploaded</strong><br/>Your zip file has been successfully uploaded."
//    );
//} else {
//    $message = array(
//        "type" => "danger",
//        "text" => "<strong>Upload Failed</strong><br/>" . $uploadUtil->errors[0]
//    );
//}
//
//$session->register("message", $message);
//header("Location: ../../public/home.php");
