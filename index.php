<?php
    session_start();
    require 'controlleurs/routeur.php';
    $routeur = new routeur();
    $routeur->routeurRequete();