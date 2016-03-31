<?php

use DynamicXML\Sessions\Session;
use DynamicXML\Utilities\FileUtil;
use DynamicXML\Utilities\DirectoryUtil;

require_once "../../start.php";

$session = new Session();

$csvFile = filter_input(INPUT_POST, 'csvFile');

$fileDeleted = FileUtil::deleteFile("../../app/processed/" . $csvFile);

if ($fileDeleted) {
    $message = array(
        "type" => "warning",
        "text" => "<strong>File Deleted</strong><br/>Your csv file has been successfully deleted."
    );
} else {
    $message = array(
        "type" => "danger",
        "text" => "<strong>Delete Failed</strong><br/>There was a problem trying to delete your csv file."
    );
}

$session->register("message", $message);
header("Location: ../../public/home.php");
