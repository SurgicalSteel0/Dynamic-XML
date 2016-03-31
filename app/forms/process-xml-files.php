<?php

ini_set('xdebug.var_display_max_depth', 5);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 1024);

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

if (count($xmlFilesToParse) === 0) {
    $message = array(
        "type" => "warning",
        "text" => "<strong>No Files</strong><br/>You do not have any XML files to process."
    );

    $session->register("message", $message);
    header("Location: ../../public/home.php");
    die();
}

/*
 * Second, lets form "csv rows" that contain the data we want.
 * 
 * We want to remove any commas in the data so it doesn't mess up when we right
 * it to the csv file.
 *
 * If the quantity is divisible by 20 and is greater than 20, we want to break
 * that row up into multiple rows.
 */
$csvRows = array();
foreach ($xmlFilesToParse as $xmlFileToParse) {

    if (count($xmlFileToParse->content->artInfo) === 3) {

        $namePieces = explode(' ', $xmlFileToParse->content->artInfo[0]->artInf_Text);
        $sortBy = array_pop($namePieces);
        $name = str_replace(",", "", $xmlFileToParse->content->artInfo[0]->artInf_Text);
        $street = str_replace(",", "", $xmlFileToParse->content->artInfo[1]->artInf_Text);
        $state = str_replace(",", "", $xmlFileToParse->content->artInfo[2]->artInf_Text);
        $quantity = (int) $xmlFileToParse->content->Header->hea_Quantity;

        if (($quantity % 20) === 0) {
            $timesToRepeat = $quantity / 20;

            for ($i = 0; $i < $timesToRepeat; $i++) {
                $csvRow = array(
                    "orderNumber" => (string) $xmlFileToParse->content->Header->hea_Jobno,
                    "quantity" => 20,
                    "actualQuantity" => $quantity,
                    "sortBy" => (string) $sortBy,
                    "name" => (string) $name,
                    "street" => (string) $street,
                    "state" => (string) $state
                );

                array_push($csvRows, $csvRow);
            }
        } else {
            $csvRow = array(
                "orderNumber" => (string) $xmlFileToParse->content->Header->hea_Jobno,
                "quantity" => (int) $xmlFileToParse->content->Header->hea_Quantity,
                "actualQuantity" => $quantity,
                "sortBy" => (string) $sortBy,
                "name" => (string) $name,
                "street" => (string) $street,
                "state" => (string) $state
            );

            array_push($csvRows, $csvRow);
        }
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

/*
 * Forth, we need to sort the contents of each csv file by the last name or by
 * the "sortBy" column above. Basically what we are doing here is grabing the
 * csv file content, sorting it, clearing the csv file and then reassigning
 * the sorted data back to it.
 */
foreach ($csvFiles as $csvFile) {
    $csvFileContents = $csvFile->getCSVRows();
    array_sort_by_column($csvFileContents, 'sortBy');
    $csvFile->clearCSVRows();
    $csvFile->setCSVRows($csvFileContents);
    $csvFile->convertCSVRowsToList();
    $csvFile->save();
}

// var_dump($csvFiles);

$message = array(
    "type" => "success",
    "text" => "<strong>Files Processed</strong><br/>Your files have been processed successfully."
);

$session->register("message", $message);
header("Location: ../../public/home.php");
die();

/**
 * Sorts a multi-dimensional array by a column.
 * http://stackoverflow.com/questions/2699086/sort-multi-dimensional-array-by-value
 *
 * @param array $arr
 * @param string $col
 * @param type $dir
 */
function array_sort_by_column(&$arr, $col, $dir = SORT_ASC) {
    $sort_col = array();
    foreach ($arr as $key => $row) {
        $sort_col[$key] = $row[$col];
    }

    array_multisort($sort_col, $dir, $arr);
}
