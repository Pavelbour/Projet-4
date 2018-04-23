<?php

    require_once 'controlleurs/controlleurAccueil.php';
    require_once 'controlleurs/controlleurBio.php';
    require_once 'controlleurs/controlleurHistoires.php';
    require_once 'controlleurs/controlleurContact.php';
    require_once 'controlleurs/controlleurChapitre.php';
    require_once 'controlleurs/controlleurUtilisateur.php';
    require_once 'controlleurs/controlleurCommentaire.php';
    require_once 'controlleurs/controlleurAuteur.php';
    require_once 'controlleurs/controlleurErreur.php';
    require_once 'vues/vue.php';

    class Routeur{
        
        private $ctrlAccuil;
        private $ctrlBio;
        private $ctrlHistoires;
        private $ctrlContact;
        private $ctrlChapitre;
        private $ctrlUtilisateur;
        private $ctrlCommentaire;
        private $ctrlAuteur;
        private $ctrlErreur;

        public function __construct(){
            $this->ctrlAccueil = new ControlleurAccueil();
            $this->ctrlBio = new ControlleurBio();
            $this->ctrlHistoires = new ControlleurHistoires();
            $this->ctrlContact = new ControlleurContact();
            $this->ctrlChapitre = new ControlleurChapitre();
            $this->ctrlUtilisateur = new ControlleurUtilisateur();
            $this->ctrlCommentaire = new ControlleurCommentaire();
            $this->ctrlAuteur = new ControlleurAuteur();
            $this->ctrlErreur = new ControlleurErreur();
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

                        case 'bio':
                            $this->ctrlBio->bio();
                        break;

                        case 'histoires':
                            $this->ctrlHistoires->histoires();
                        break;

                        case 'contact':
                            $this->ctrlContact->contact();
                        break;
        
                        case 'inscription':
                            $this->ctrlUtilisateur->inscription (htmlspecialchars($_POST['ipseudo']), htmlspecialchars($_POST['e_mail']), htmlspecialchars($_POST['imot_de_passe']), htmlspecialchars($_POST['rmot_de_passe']));
                            $this->ctrlAccueil->accueil();
                        break;
        
                        case 'connexion':
                            $this->ctrlUtilisateur->connexion (htmlspecialchars($_POST['pseudo']), htmlspecialchars($_POST['mot_de_passe']));
                            $this->ctrlAccueil->accueil();
                        break;
        
                        case 'deconnexion':
                            session_destroy();
                            $this->ctrlAccueil->accueil();
                        break;

                        case 'ajouter-commentaire':
                        if(isset($_GET['id'])){
                            $id = intval($_GET['id']);
                            if($id != 0){
                                $this->ctrlCommentaire->ecrire_commentaire($_SESSION['id'], $id, htmlspecialchars($_POST['commentaire']));
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

                        case 'ajouter-chapitre':
                            if((isset($_POST['titre'])) && (isset($_POST['contenu_chapitre']))){
                                $id = $this->ctrlChapitre->ajouterChapitre(htmlspecialchars($_POST['titre']), $_POST['contenu_chapitre']);
                                $this->ctrlChapitre->afficherChapitre($id);
                            }else{
                                throw new Exception("Les paramètres sont invalides");
                            }
                        break;

                        case 'modifier-chapitre':
                            if(isset($_GET['id'])){
                                $this->ctrlAuteur->modifierChapitre(htmlspecialchars($_GET['id']));
                            }else{
                                throw new Exeption("id n'est pas défini");
                            }
                            break;

                        case 'enregistrer-modification':
                            if((isset($_POST['titre'])) && (isset($_POST['contenu_chapitre']))){
                                $this->ctrlChapitre->enregistrerModification(htmlspecialchars($_GET['id']), htmlspecialchars($_POST['titre']), $_POST['contenu_chapitre']);
                                $this->ctrlChapitre->afficherChapitre(htmlspecialchars($_GET['id']));
                            }else{
                                throw new Exception("Les paramètres sont invalides");
                            }
                            break;

                        case 'effacer-chapitre':
                            if(isset($_GET['id'])){
                                $this->ctrlChapitre->effacerChapitre(htmlspecialchars($_GET['id']));
                                $this->ctrlAuteur->afficherEspaceAuteur();
                            }else{
                                throw new Exeption("id n'est pas défini");
                            }
                            break;

                        case 'signaler':
                        if(isset($_GET['id'])){
                            $this->ctrlCommentaire->signalerCommentaire(htmlspecialchars($_GET['id']));
                            $this->ctrlAccueil->accueil();
                        }else{
                            throw new Exeption("id n'est pas défini");
                        }
                        break;

                        case 'approuver':
                        if(isset($_GET['id'])){
                            $this->ctrlCommentaire->approuverCommentaire(htmlspecialchars($_GET['id']));
                            $this->ctrlAuteur->afficherEspaceAuteur();
                        }else{
                            throw new Exeption("id n'est pas défini");
                        }
                        break;

                        case 'effacer':
                        if(isset($_GET['id'])){
                            $this->ctrlCommentaire->effacerCommentaire(htmlspecialchars($_GET['id']));
                            $this->ctrlAuteur->afficherEspaceAuteur();
                        }else{
                            throw new Exeption("id n'est pas défini");
                        }
                        break;

                        case 'modifier-commentaire':
                        if(isset($_GET['id'])){
                            $this->ctrlAuteur->modifierCommentaire(htmlspecialchars($_GET['id']));
                        }else{
                            throw new Exeption("id n'est pas défini");
                        }        
                        break;

                        case 'enregistrer-commentaire':
                        if(isset($_GET['id'])){
                            $this->ctrlCommentaire->modifierCommentaire(htmlspecialchars($_GET['id']), $_POST['contenu_chapitre']);
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
                $this->ctrlErreur->erreur($e->getMessage());
            }
        }
    }