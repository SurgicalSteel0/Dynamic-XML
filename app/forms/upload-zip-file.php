<?php

use DynamicXML\Sessions\Session;
use DynamicXML\Utilities\UploadUtil;
use DynamicXML\Utilities\FileUtil;
use DynamicXML\Utilities\DirectoryUtil;

require_once "../../start.php";

$session = new Session();

$uploadUtil = new UploadUtil();
$uploadUtil->setAllowedTypes("zip");
$uploadUtil->setDirectory("../uploads");
$uploadUtil->setMaxFileSize("3000000"); // 3 MB
$uploadUtil->upload($_FILES["zip-file"]);

if ($uploadUtil->successful) {

    DirectoryUtil::createDirectory("../extracted/" . FileUtil::getBaseName($uploadUtil->uploadedFile));
    FileUtil::extractZipFile($uploadUtil->uploadedFile, "../extracted/" . FileUtil::getBaseName($uploadUtil->uploadedFile));

    $message = array(
        "type" => "success",
        "text" => "<strong>File Uploaded</strong><br/>Your zip file has been successfully uploaded."
    );
} else {
    $message = array(
        "type" => "danger",
        "text" => "<strong>Upload Failed</strong><br/>" . $uploadUtil->errors[0]
    );
}

$session->register("message", $message);
header("Location: ../../public/home.php");
