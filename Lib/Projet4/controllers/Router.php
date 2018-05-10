<?php

    namespace Projet4\controllers;

    class Router
    {
        
        private $ctrlHome;
        private $ctrlBio;
        private $ctrlHistorys;
        private $ctrlContact;
        private $ctrlChapter;
        private $ctrlUser;
        private $ctrlCommentary;
        private $ctrlAuthor;
        private $ctrlError;

        public function __construct()
        {
            $this->ctrlHome = new ControllerHome();
            $this->ctrlBio = new ControllerBio();
            $this->ctrlHistorys = new ControllerHistorys();
            $this->ctrlContact = new ControllerContact();
            $this->ctrlChapter = new ControllerChapter();
            $this->ctrlUser = new ControllerUser();
            $this->ctrlCommentary = new ControllerCommentary();
            $this->ctrlAuthor = new ControllerAuthor();
            $this->ctrlError = new ControllerError();
        }

        public function routerRequest()
        {
            try{
                if(isset($_GET['action'])){
                    switch($_GET['action']){
                        case 'chapter':
                            if(isset($_GET['id'])){
                                $id = intval($_GET['id']);
                                if ($this->ctrlChapter->idValid($id)){
                                    // Display a chapter
                                    $this->ctrlChapter->displayChapter($id);
                                }else{
                                    throw new \Exception("Identifiant de billet non valide");
                                }
                            }else{
                                throw new \Exception("id n'est pas défini");
                            }
                            break;

                        case 'bio':
                            // Display the page static Biographie
                            $this->ctrlBio->bio();
                            break;

                        case 'historys':
                            // Display the liste of the Chapters
                            $this->ctrlHistorys->historys();
                            break;

                        case 'contact':
                            // Display the page contacte
                            $this->ctrlContact->contact();
                            break;
        
                        case 'sign-up':
                            // Add a new user
                            $this->ctrlUser->signUp(htmlspecialchars($_POST['ipseudo']), htmlspecialchars($_POST['e_mail']), htmlspecialchars($_POST['imot_de_passe']), htmlspecialchars($_POST['rmot_de_passe']));
                            $this->ctrlHome->home();
                            break;
        
                        case 'sign-in':
                            // Identification of visitor
                            $this->ctrlUser->signIn(htmlspecialchars($_POST['pseudo']), htmlspecialchars($_POST['mot_de_passe']));
                            $this->ctrlHome->home();
                            break;
        
                        case 'sign-out':
                            // Sign out of the visitor
                            $this->ctrlUser->signOut();
                            $this->ctrlHome->home();
                            break;

                        case 'add-commentary':
                            // Add a new commentary
                            if(isset($_GET['id'])){
                                $id = intval($_GET['id']);
                                if($id != 0){
                                    $this->ctrlCommentary->addCommentary($_SESSION['id'], $id, htmlspecialchars($_POST['commentaire']));
                                    $this->ctrlChapter->displayChapter($id);
                                }else{
                                    throw new \Exception("Identifiant de billet non valide");
                                }
                                    }else{
                                        throw new \Exception("id n'est pas défini");
                                    }
                                break;

                        case 'author':
                            // Affiche l'espace auteur
                            $this->ctrlAuthor->displayAuthorSpace();
                            break;

                        case 'add-chapter':
                            // Add a new chapter
                            if((isset($_POST['titre'])) && (isset($_POST['content-chapter']))){
                                $id = $this->ctrlChapter->addChapter(htmlspecialchars($_POST['titre']), htmlspecialchars($_POST['content-chapter']));
                                $this->ctrlChapter->displayChapter($id);
                            }else{
                                throw new \Exception("Les paramètres sont invalides");
                            }
                            break;

                        case 'modify-chapter':
                            // Display the interface of the modification of chapter
                            if(isset($_GET['id'])){
                                $this->ctrlAuthor->modifyChapter(htmlspecialchars($_GET['id']));
                            }else{
                                throw new \Exeption("id n'est pas défini");
                            }
                            break;

                        case 'write-modification':
                            // Write a chapter modified
                            if((isset($_POST['titre'])) && (isset($_POST['content-chapter']))){
                                $this->ctrlChapter->writeModification(htmlspecialchars($_GET['id']), htmlspecialchars($_POST['titre']), htmlspecialchars($_POST['content-chapter']));
                                $this->ctrlChapter->displayChapter(htmlspecialchars($_GET['id']));
                            }else{
                                throw new \Exception("Les paramètres sont invalides");
                            }
                            break;

                        case 'delete-chapter':
                            // Delete a chapter
                            if(isset($_GET['id'])){
                                $this->ctrlChapter->deleteChapter(htmlspecialchars($_GET['id']));
                                $this->ctrlAuthor->displayAuthorSpace();
                            }else{
                                throw new \Exeption("id n'est pas défini");
                            }
                            break;

                        case 'report':
                        if(isset($_GET['id'])){
                            // Report a commentary
                            $this->ctrlCommentary->reportCommentary(htmlspecialchars($_GET['id']));
                            $this->ctrlHome->home();
                        }else{
                            throw new \Exeption("id n'est pas défini");
                        }
                            break;

                        case 'approve':
                            // Approve a commentary reported
                        if(isset($_GET['id'])){
                            $this->ctrlCommentary->approveCommentary(htmlspecialchars($_GET['id']));
                            $this->ctrlAuthor->displayAuthorSpace();
                        }else{
                            throw new \Exeption("id n'est pas défini");
                        }
                            break;

                        case 'delete':
                            // Delete a commentary
                        if(isset($_GET['id'])){
                            $this->ctrlCommentary->deleteCommentary(htmlspecialchars($_GET['id']));
                            $this->ctrlAuthor->displayAuthorSpace();
                        }else{
                            throw new \Exeption("id n'est pas défini");
                        }
                            break;

                        case 'modify-commentary':
                            // Display the interface of the modification of commentary
                        if(isset($_GET['id'])){
                            $this->ctrlAuthor->modifyCommentary(htmlspecialchars($_GET['id']));
                        }else{
                            throw new \Exeption("id n'est pas défini");
                        }        
                            break;

                        case 'write-commentary':
                            // Write a commentary modified
                        if(isset($_GET['id'])){
                            $this->ctrlCommentary->modifyCommentary(htmlspecialchars($_GET['id']), htmlspecialchars($_POST['content-chapter']));
                            $this->ctrlAuthor->displayAuthorSpace();
                        }else{
                            throw new \Exeption("id n'est pas défini");
                        }                            
                            break;

                        default:
                            throw new \Exception("Action pas valide");
                    }
        
                }else{
                    $this->ctrlHome->home();
                }
            }

            catch (\Exception $e) {
                // Display a error message
                $this->ctrlError->error($e->getMessage());
            }
        }
    }