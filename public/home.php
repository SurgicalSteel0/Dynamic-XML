<?php

require_once '../start.php';

$view = new Smarty();

$view->assign('location', 'home');

$view->display(VIEWS_PATH . '/home.tpl');