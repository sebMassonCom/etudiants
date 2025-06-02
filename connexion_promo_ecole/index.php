<?php
$page = filter_input(INPUT_GET, 'page');
if(file_exists('controller/'.$page.'.class.php')){
    require_once 'controller/'.$page.'.class.php';
    new $page;
} elseif(!empty($page) && !file_exists('controller/'.$page.'.class.php')) {
    require_once 'controller/404.class.php';
    new P404;
} else{
    require_once 'controller/Accueil.class.php';
    new Accueil;
}
?>
<a href="index.php?page=Controlle_Admin">Espace admin</a> 
<a href="index.php?page=Controlle_Utilisateur">Espace utilisateur</a> 