<?php

use DynamicXML\Sessions\Session;
use DynamicXML\Utilities\DirectoryUtil;

require_once "../../start.php";

$session = new Session();

DirectoryUtil::removeAllFilesInDirectoryExceptFor(array(), "../../app/processed");

$message = array(
    "type" => "warning",
    "text" => "<strong>Files Deleted</strong><br/>All csv files have been successfully deleted."
);

$session->register("message", $message);
header("Location: ../../public/home.php");
