<?php

    class vue{

        private $fichier;

        public function __construct($action){
            $this->fichier = 'vues/vue' . $action . '.php';
        }

        public function generer($donnes){
            $contenu = $this->genererFichier($this->fichier, $donnes);
            $vue = $this->genererFichier('vues/gabarit.php', array('chapitres' => $donnes['chapitres'], 'contenu' => $contenu));
            echo $vue;
        }

        private function genererFichier($fichier, $donnes){
            if(file_exists($fichier)){
                extract($donnes);                
                ob_start();
                require $fichier;
                return ob_get_clean();
            }
            
        }
    }