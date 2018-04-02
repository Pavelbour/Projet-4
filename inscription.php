<?php
    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=jfblog', 'root', '');
    $requete = $bdd->prepare('INSERT INTO utilisateurs(pseudo, email, mot_de_passe) VALUES(:pseudo, :email, :mot_de_passe)');
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
                if($_POST['imot_de_passe'] == $_POST['rmot_de_passe']){
                    $requete->execute(array(
                        'pseudo' => $_POST['ipseudo'],
                        'email' => $_POST['e_mail'],
                        'mot_de_passe' => $_POST['imot_de_passe']
                    ));
                    echo '<p>Maintenant vous êtes inscrit(e). Votre pseudo est ' . $_POST['ipseudo'] .'</p>';
                }else{
                    echo '<p>Les donnes ont été saisis incorrectement. Essayez encore une fois.</p>';
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