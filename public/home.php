<?php

use DynamicXML\Sessions\Session;
use DynamicXML\Utilities\DirectoryUtil;
use DynamicXML\Files\ZIPFile;

require_once '../start.php';

$session = new Session();
$view = new Smarty();

$message = $session->get("message");
if (isset($message)) {
    $view->assign("message", $message);
    $session->destroy("message");
}

$zipFiles = array();
$files = DirectoryUtil::getAllFilesInDirectory("../app/uploads");
foreach ($files as $file) {
    $zipFile = new ZIPFile("../app/uploads/" . $file);
    array_push($zipFiles, $zipFile);
}

$view->assign('location', 'home');
$view->assign('zipFiles', $zipFiles);

$view->display(VIEWS_PATH . '/home.tpl');
