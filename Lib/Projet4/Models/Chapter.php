<?php

    namespace Projet4\models;

    class Chapter extends Model
    {

        public function getChapters()
        {
            return $this->execute('SELECT id, titre FROM chapitres');
        }

        public function getChapter($id)
        {
            return $this->execute('SELECT id, titre, content FROM chapitres WHERE id = ?', array($id));
        }

        public function getLastChapters()
        {
            return $this->execute('SELECT id, titre FROM chapitres ORDER BY added DESC LIMIT 5');
        }

        public function addChapter($titre, $content)
        {
            $this->execute('INSERT INTO chapitres(titre, content) VALUES (:titre, :content)', array('titre' => $titre, 'content' => $content));
            $id = $this->execute('SELECT id FROM chapitres WHERE titre = ?', array($titre));
            $resultat = $id->fetch();
            return $resultat['id'];
        }

        public function modifyChapter($id, $titre, $content)
        {
            $this->execute('UPDATE chapitres SET titre = :titre, content = :content WHERE id = :id', array('id' =>$id, 'titre' => $titre, 'content' => $content));
        }

        public function deleteChapter($id)
        {
            $this->execute('DELETE FROM chapitres WHERE id = :id', array('id' => $id));
            //todo supprimer les commentaires
            //Recuperer tous les commentaires avec le bon id
            //Supprimer tous les commentaires, boucle foreach
            
        }
    }