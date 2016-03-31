<?php

use DynamicXML\Sessions\Session;
use DynamicXML\Utilities\DirectoryUtil;
use DynamicXML\Files\ZIPFile;
use DynamicXML\Files\CSVFile;

require_once '../start.php';

$session = new Session();
$view = new Smarty();

$message = $session->get("message");
if (isset($message)) {
    $view->assign("message", $message);
    $session->destroy("message");
}

$zipFiles = array();
$zips = DirectoryUtil::getAllFilesInDirectory("../app/uploads");
foreach ($zips as $zip) {
    $zipFile = new ZIPFile("../app/uploads/" . $zip);
    array_push($zipFiles, $zipFile);
}

$csvFiles = array();
$csvs = DirectoryUtil::getAllFilesInDirectory("../app/processed");
foreach ($csvs as $csv) {
    $csvFile = new CSVFile("../app/processed/" . $csv);
    array_push($csvFiles, $csvFile);
}

$view->assign('location', 'home');
$view->assign('zipFiles', $zipFiles);
$view->assign('csvFiles', $csvFiles);

$view->display(VIEWS_PATH . '/home.tpl');
