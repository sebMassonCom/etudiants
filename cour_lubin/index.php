<?php
$page = filter_input(INPUT_GET, 'page');
if(file_exists('controllers/'.$page.'.class.php')){
    require_once 'controllers/'.$page.'.class.php';
    new $page;
} elseif(!empty($page) && !file_exists('controllers/'.$page.'.class.php')) {
    require_once 'controllers/404.class.php';
    new P404;
} else{
    require_once 'controllers/Accueil.class.php';
    new Accueil;
}