<?php
    session_start();
    require 'controlleurs/routeur.php';
    $routeur = new Routeur();
    $routeur->routeurRequete();