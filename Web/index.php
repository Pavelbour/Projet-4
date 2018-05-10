<?php
    session_start();
    require '../Lib/projet4/controllers/Autoloader.php';


    $loader = new Autoloader;
    $loader->register();

    $router = new \Projet4\controllers\Router();
    $router->routerRequest();