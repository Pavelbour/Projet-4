<?php

    namespace Projet4\models;

    class Commentary extends Model
    {

        public function getCommentary($id)
        {
            return $this->execute('SELECT content FROM commentaires WHERE id = :id', array('id' => $id));
        }

        public function getCommentarys($id)
        {
            return $this->execute('SELECT commentaires.id, commentaires.user_id, commentaires.content, commentaires.added, utilisateurs.pseudo FROM commentaires INNER JOIN utilisateurs ON commentaires.user_id = utilisateurs.id WHERE chapter_id = ?', array($id));
        }

        public function getCommentarysNotReported()
        {
            return $this->execute('SELECT commentaires.id, commentaires.user_id, commentaires.content, commentaires.added, utilisateurs.pseudo FROM commentaires INNER JOIN utilisateurs ON commentaires.user_id = utilisateurs.id WHERE commentaires.reported = false');
        }

        public function getCommentarysReported()
        {
            return $this->execute('SELECT commentaires.id, commentaires.user_id, commentaires.content, commentaires.added, utilisateurs.pseudo FROM commentaires INNER JOIN utilisateurs ON commentaires.user_id = utilisateurs.id WHERE commentaires.reported = true');
        }

        public function addCommentary($user, $chapter, $content)
        {
            $this->execute('INSERT INTO commentaires(user_id, chapter_id, content) VALUES(:user_id, :chapter_id, :content)', array('user_id' => $user, 'chapter_id' => $chapter, 'content' => $content));
        }

        public function reportCommentary($id)
        {
            $this->execute('UPDATE commentaires SET reported = true WHERE id = :id', array('id' => $id));
        }

        public function approveCommentary($id)
        {
            $this->execute('UPDATE commentaires SET reported = false WHERE id = :id', array('id' => $id));
        }

        public function modifyCommentary($id, $content)
        {
            $this->execute('UPDATE commentaires SET content = :content WHERE id = :id', array('id' =>$id, 'content' => $content));
        }

        public function deleteCommentary($id)
        {
            $this->execute('DELETE FROM commentaires WHERE id = :id', array('id' => $id));
        }
    }