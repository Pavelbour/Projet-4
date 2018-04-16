<?php

    require_once 'controlleurs/controlleurAccueil.php';
    require_once 'controlleurs/controlleurChapitre.php';
    require_once 'controlleurs/controlleurUtilisateur.php';
    require_once 'controlleurs/controlleurCommentaire.php';
    require_once 'controlleurs/controlleurAuteur.php';
    require_once 'vues/vue.php';

    class routeur{
        
        private $ctrlAccuil;
        private $ctrlChapitre;
        private $ctrlUtilisateur;
        private $ctrlCommentaire;
        private $ctrlAuteur;

        public function __construct(){
            $this->ctrlAccueil = new controlleurAccueil();
            $this->ctrlChapitre = new controlleurChapitre();
            $this->ctrlUtilisateur = new controlleurUtilisateur();
            $this->ctrlCommentaire = new controlleurCommentaire();
            $this->ctrlAuteur = new controlleurAuteur();
        }

        public function routeurRequete (){
            try{
                if(isset($_GET['action'])){
                    switch($_GET['action']){
                        case 'chapitre':
                            if(isset($_GET['id'])){
                                $id = intval($_GET['id']);
                                if ($id != 0){
                                    $this->ctrlChapitre->afficherChapitre($id);
                                }else{
                                    throw new Exception("Identifiant de billet non valide");
                                }
                            }else{
                                throw new Exception("id n'est pas défini");
                            }
                        break;
        
                        case 'inscription':
                            $this->ctrlUtilisateur->inscription ($_POST['ipseudo'], $_POST['e_mail'], $_POST['imot_de_passe'], $_POST['rmot_de_passe']);
                            $this->ctrlAccueil->accueil();
                        break;
        
                        case 'connexion':
                            $this->ctrlUtilisateur->connexion ($_POST['pseudo'], $_POST['mot_de_passe']);
                            $this->ctrlAccueil->accueil();
                        break;
        
                        case 'deconnexion':
                            session_destroy();
                            $this->ctrlAccueil->accueil();
                        break;

                        case 'ajouter_commentaire':
                        if(isset($_GET['id'])){
                            $id = intval($_GET['id']);
                            if($id != 0){
                                $this->ctrlCommentaire->ecrire_commentaire($_SESSION['id'], $id, $_POST['commentaire']);
                                $this->ctrlChapitre->afficherChapitre($id);
                            }else{
                                throw new Exception("Identifiant de billet non valide");
                            }
                        }else{
                            throw new Exception("id n'est pas défini");
                        }
                        break;

                        case 'auteur':
                            $this->ctrlAuteur->afficherEspaceAuteur();
                        break;

                        case 'ajouter_chapitre':
                            if((isset($_POST['titre'])) && (isset($_POST['contenu_chapitre']))){
                                $this->ctrlChapitre->ajouterChapitre($_POST['titre'], $_POST['contenu_chapitre']);
                                $this->ctrlAuteur->afficherEspaceAuteur();
                            }else{
                                throw new Exception("Les paramètres sont invalides");
                            }
                        break;

                        case 'modifier_chapitre':
                            if(isset($_GET['id'])){
                                $this->ctrlAuteur->modifierChapitre($_GET['id']);
                            }else{
                                throw new Exeption("id n'est pas défini");
                            }
                        break;

                        case 'enregistrer_modification':
                            if((isset($_POST['titre'])) && (isset($_POST['contenu_chapitre']))){
                                $this->ctrlChapitre->enregistrerModification($_GET['id'], $_POST['titre'], $_POST['contenu_chapitre']);
                                $this->ctrlAuteur->afficherEspaceAuteur();
                            }else{
                                throw new Exception("Les paramètres sont invalides");
                            }
                        break;

                        case 'effacer_chapitre':
                        if(isset($_GET['id'])){
                            $this->ctrlChapitre->effacerChapitre($_GET['id']);
                            $this->ctrlAuteur->afficherEspaceAuteur();
                        }else{
                            throw new Exeption("id n'est pas défini");
                        }
                        break;

                        case 'signaler':
                        if(isset($_GET['id'])){
                            $this->ctrlCommentaire->signalerCommentaire($_GET['id']);
                            $this->ctrlAccueil->accueil();
                        }else{
                            throw new Exeption("id n'est pas défini");
                        }
                        break;

                        case 'approuver':
                        if(isset($_GET['id'])){
                            $this->ctrlCommentaire->approuverCommentaire($_GET['id']);
                            $this->ctrlAuteur->afficherEspaceAuteur();
                        }else{
                            throw new Exeption("id n'est pas défini");
                        }
                        break;

                        case 'effacer':
                        if(isset($_GET['id'])){
                            $this->ctrlCommentaire->effacerCommentaire($_GET['id']);
                            $this->ctrlAuteur->afficherEspaceAuteur();
                        }else{
                            throw new Exeption("id n'est pas défini");
                        }
                        break;

                        case 'modifier_commentaire':
                        if(isset($_GET['id'])){
                            $this->ctrlAuteur->modifierCommentaire($_GET['id']);
                        }else{
                            throw new Exeption("id n'est pas défini");
                        }        
                        break;

                        case 'enregistrer_commentaire':
                        if(isset($_GET['id'])){
                            $this->ctrlCommentaire->modifierCommentaire($_GET['id'], $_POST['contenu_chapitre']);
                            $this->ctrlAuteur->afficherEspaceAuteur();
                        }else{
                            throw new Exeption("id n'est pas défini");
                        }                            
                        break;

                        default:
                            throw new Exception("Action pas valide");
                    }
        
                }else{
                    $this->ctrlAccueil->accueil();
                }
            }

            catch (Exception $e) {
                $this->erreur($e->getMessage());
            }
        }

        private function erreur($msgErreur){
            $vue = new vue('erreur');
            $vue->generer(array('msgErreur' => $msgErreur));
        }
    }