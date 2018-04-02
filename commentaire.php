<?php
    session_start();
    if(isset($_SESSION['utilisateur_id'])){
        $bdd = new PDO('mysql:host=localhost;dbname=jfblog', 'root', '');
        $requete = $bdd->prepare('INSERT INTO commentaires(utilisateur_id, chapitre_id, contenu) VALUES(:utilisateur_id, :chapitre_id, :contenu)');
        $requete->execute(array(
            'utilisateur_id' => $_SESSION['utilisateur_id'],
            'chapitre_id' => $_SESSION['chapitre_id'],
            'contenu' => $_POST['commentaire']
        ));
    }
    header('Location: chapitre.php?id=' . $_SESSION['chapitre_id']);
?>