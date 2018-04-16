<?php

    abstract class modele{

        private $bdd;

        protected function executer($sql, $params = null){
            if ($params == null){
                $resultat = $this->accesbdd()->query($sql);
            }else{
                $resultat = $this->accesbdd()->prepare($sql);
                $resultat->execute($params);
            }
            return $resultat;
        }

        private function accesbdd(){
            if ($this->bdd == null){
                $this->bdd = new PDO('mysql:host=localhost;dbname=jfblog', 'root', '');
            }
            return $this->bdd;
        }
    }