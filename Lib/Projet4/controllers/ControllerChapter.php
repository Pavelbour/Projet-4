<?php

    namespace Projet4\controllers;
    use Projet4\models\Chapter;
    use Projet4\models\Commentary;
    use Projet4\views\View;

    class ControllerChapter
    {

        private $chapter;
        private $commentary;

        public function __construct()
        {
            $this->chapter = new Chapter();
            $this->commentarys = new Commentary();
        }

        public function idValid($id)
        {
            $chapter = $this->chapter->getChapter($id);
            $result = $chapter->fetch();
            if($result == null){
                return false;
            }else{
                return true;
            }
        }

        public function displayChapter($id)
        {
            $chapters = $this->chapter->getLastChapters();
            $chapter = $this->chapter->getChapter($id);
            $commentarys = $this->commentarys->getCommentarys($id);
            $view = new view('chapter');
            $view->generate(array('chapters' => $chapters, 'chapter' => $chapter, 'commentarys' => $commentarys, 'idChapter' => $id));
        }

        public function addChapter($titre, $content)
        {
            return $this->chapter->addChapter($titre, $content);
        }

        public function writeModification($id, $titre, $content)
        {
            $this->chapter->modifyChapter($id, $titre, $content);
        }

        public function deleteChapter($id)
        {
            $commentarys = $this->commentarys->getCommentarys($id);
            foreach($commentarys as $comment)
            {
                $this->commentarys->deleteCommentary($comment['id']);
            }
            $this->chapter->deleteChapter($id);
        }

    }