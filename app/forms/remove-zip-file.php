<?php

use DynamicXML\Sessions\Session;
use DynamicXML\Utilities\FileUtil;
use DynamicXML\Utilities\DirectoryUtil;

require_once "../../start.php";

$session = new Session();

$zipFile = filter_input(INPUT_POST, 'zipFile');

$fileDeleted = FileUtil::deleteFile("../../app/uploads/" . $zipFile);
$directoryDeleted = DirectoryUtil::deleteDirectory("../../app/extracted/" . FileUtil::getBaseName($zipFile));

if ($fileDeleted && $directoryDeleted) {
    $message = array(
        "type" => "warning",
        "text" => "<strong>File Deleted</strong><br/>Your zip file has been successfully deleted."
    );
} else {
    $message = array(
        "type" => "danger",
        "text" => "<strong>Delete Failed</strong><br/>There was a problem trying to delete your zip file."
    );
}

$session->register("message", $message);
header("Location: ../../public/home.php");
