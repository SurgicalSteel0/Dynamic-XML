<?php

use DynamicXML\Sessions\Session;
use DynamicXML\Utilities\FileUtil;
use DynamicXML\Utilities\DirectoryUtil;

require_once "../../start.php";

$session = new Session();

$extractedDirectories = DirectoryUtil::getAllDirectoriesInDirectory("../../app/extracted");
foreach ($extractedDirectories as $extractedDirectory) {
    DirectoryUtil::deleteDirectory("../../app/extracted/" . $extractedDirectory);
}

DirectoryUtil::removeAllFilesInDirectoryExceptFor(array(), "../../app/uploads");

$message = array(
    "type" => "warning",
    "text" => "<strong>Files Deleted</strong><br/>All zip files have been successfully deleted."
);

$session->register("message", $message);
header("Location: ../../public/home.php");
