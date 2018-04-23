<?php

    require_once 'modeles/chapitre.php';
    require_once 'vues/vue.php';

    class ControlleurContact {

        private $chapitres;

        public function __construct(){
            $this->chapitres = new Chapitre();
        }

        public function contact(){
            $chapitres = $this->chapitres->recupererChapitres();
            $vue = new vue('contact');
            $vue->generer(array('chapitres' => $chapitres));
        }

    }