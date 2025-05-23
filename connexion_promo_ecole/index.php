<?php
include 'assets/inc/header.php';
$page = filter_input(INPUT_GET, 'page');
if(file_exists('controllers/'.$page.'.class.php')){
    require_once 'controllers/'.$page.'.class.php';
    // var_dump($page); exit;
    new $page;
} else {
    require_once 'controllers/404.php';
    new P404;
}