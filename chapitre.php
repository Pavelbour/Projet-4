<?php
    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=jfblog', 'root', '');
    $requete = $bdd->prepare('SELECT * FROM chapitres WHERE id = ?');
    $requete->execute(array($_GET['id']));
    $_SESSION['chapitre_id'] = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="bootstrap/bootstrap-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <?php
            include ("entete.php");
            //En-tête du site
        ?>

        <?php
            include ("menu.php");
            //Le menu principal
        ?>

        <div class="row">
            <?php
                include ("photo.php");
                //Le panneau gauche
            ?>

            <article class="col-lg-6">
                <!-- Le contenu principal de la page -->
                <?php
                    $donnes = $requete->fetch();
                    echo '<h2>' . $donnes['nom'] . '</h2>';
                    echo '<p>' . $donnes['contenu'] . '</p>';
                ?>
                <!-- Les commentaires -->
                <form method="post" action="commentaire.php">
                    <label for="commentaire">Commentaires</label>
                    <input type="text" id="commentaire" name="commentaire" placeholder="Vous devez être connecté(e) pour laisser un commentaire" class="form-control"
                    <?php
                        if(!isset($_SESSION['utilisateur_id'])){
                            echo 'readonly';
                        }
                    ?>
                    />
                    </form>
                    <?php
                        $requete_commentaire = $bdd->prepare('SELECT commentaires.utilisateur_id, commentaires.contenu, utilisateurs.pseudo
                        FROM commentaires, utilisateurs
                        WHERE (chapitre_id = ? AND commentaires.utilisateur_id = utilisateurs.id)');
                        $requete_commentaire->execute(array($_GET['id']));
                        while ( $donnes = $requete_commentaire->fetch())
                        {
                            echo '<h5>' .$donnes['pseudo'] . '</h5>';
                            echo '<p>' .$donnes['contenu'] . '</p>';
                        }
                    ?>
                
            </article>

            <?php
                include ("chapitres.php");
                //Le menu droit
            ?>
        </div>

        <?php
            include ("footer.php");
            //Le footer
        ?>
    </div>
</body>
</html>