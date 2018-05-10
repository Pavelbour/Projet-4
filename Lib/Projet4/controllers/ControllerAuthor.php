<?php

    namespace Projet4\controllers;
    use Projet4\models\Chapter;
    use Projet4\models\Commentary;
    use Projet4\views\View;

    class ControllerAuthor
    {

        private $chapters;
        private $commentarys;

        public function __construct()
        {
            $this->chapters = new Chapter();
            $this->commentarys = new Commentary();
        }

        public function displayAuthorSpace()
        {
            $chapters = $this->chapters->getLastChapters();
            $list = $this->chapters->getChapters();
            $commentarys = $this->commentarys->getCommentarysReported();
            $commentarysNotReported = $this->commentarys->getCommentarysNotReported();
            $view = new View('author');
            $view->generate(array('chapters' => $chapters, 'list' => $list, 'commentarys' => $commentarys, 'commentarysNotReported' => $commentarysNotReported));
        }

        public function modifyChapter($id)
        {
            $chapters = $this->chapters->getLastChapters();
            $chapter = $this->chapters->getChapter($id);
            $view = new View('modifyChapter');
            $view->generate(array('chapters' => $chapters, 'chapter' => $chapter));
        }

        public function modifyCommentary($id)
        {
            $commentary = $this->commentarys->getCommentary($id);
            $chapters = $this->chapters->getLastChapters();
            $view = new View('modifyCommentary');
            $view->generate(array('commentary' => $commentary, 'chapters' => $chapters));
        }
    }