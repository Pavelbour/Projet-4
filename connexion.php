<?php
    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=jfblog', 'root', '');
    $requete = $bdd->prepare('SELECT id, pseudo, mot_de_passe FROM utilisateurs WHERE pseudo = ?');
    $requete->execute(array($_POST['pseudo']));
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
                    if ($donnes['mot_de_passe'] == $_POST['mot_de_passe']){
                        echo '<p>Vous êtes connecté(e) en tant que ' . $donnes['pseudo'] . '</p>';
                        $_SESSION['utilisateur_id'] = $donnes['id'];
                    } else{
                        echo '<p>Le mot de passe est incorrect ! Essayez encore une fois.</p>';
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