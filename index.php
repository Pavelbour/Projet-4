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
                <h2>Bonjour !</h2>
                <div>
                    Vous êtes sur le blog d'ecrivain Jean Forteroche. Ici, vous trouvez tous mes oevres derniers, actualités et beaucoup plus. N'hesites pas à me laisser des commenters. Vous pouvez me contacter par le formulaire de contact. Bonne lecture !
                </div>
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