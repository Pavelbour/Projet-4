<?php
    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=jfblog', 'root', '');
    $reponse = $bdd->query('SELECT nom, id FROM chapitres');
?>

<!DOCTYPE html>
<html lang="en">
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
                    while ( $donnes = $reponse->fetch())
                    {
                        echo '<p><a href="chapitre.php?id=' . $donnes['id'] . '">' . $donnes['nom'] . '</a></p>';
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