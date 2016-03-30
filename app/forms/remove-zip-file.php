<?php

use DynamicXML\Sessions\Session;
use DynamicXML\Utilities\FileUtil;

require_once "../../start.php";

$session = new Session();

$zipFile = filter_input(INPUT_POST, 'zipFile');

if (FileUtil::deleteFile("../../app/uploads/" . $zipFile)) {
    $message = array(
        "type" => "warning",
        "text" => "<strong>File Deleted</strong><br/>Your zip file has been successfully deleted."
    );
} else {
    $message = array(
        "type" => "danger",
        "text" => "<strong>Delete Failed</strong><br/>Your zip file could not be deleted."
    );
}

$session->register("message", $message);
header("Location: ../../public/home.php");
