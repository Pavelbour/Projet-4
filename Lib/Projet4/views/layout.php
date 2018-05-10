<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <!-- The header of the site -->
           <header class="col-lg-12"><h1>Le blog de Jean Forteroche</h1></header>
       </div>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <!-- The main menu -->
            <ul class="nav navbar-nav">
                <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?action=bio">Biographie</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?action=historys">Histoires</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?action=contact">Contact</a></li>
            </ul>
        </nav>

        <div class="row mt-3">
            <aside class="col-lg-3 gauche d-none d-lg-block">
                <!-- The left photo -->
                <img src="img/portrait.jpg" alt="Jean Forteroche">
            </aside>

            <article class="col-lg-6">
                <!-- The content of the page -->
                <?= $content ?>
            </article>

            <aside class="col-lg-3 d-none d-lg-block">
                <!-- The list of the last chapters -->
                <div class="card">
                        <div class="card-header bg-primary">Les derniers chapitres</div>
                        <ul class="list-group list-group-flush">
                            <?php
                                while ( $data = $chapters->fetch())
                                {
                                    echo '<li class="list-group-item"><a href="index.php?action=chapter&amp;id=' .$data['id'] . '">' . $data['titre'] . '</a></li>';
                                }
                            ?>
                        </ul>
                </div>
            </aside>
        </div>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-bottom">
            <!-- The footer -->
            <ul class="nav navbar-nav">
            <?php
            if (isset ($_SESSION['id'])){
            echo'<li class="nav-item"><a class="nav-link" href="index.php?action=sign-out">Se déconnecter</a></li>';
            if ($_SESSION['id'] == 1){
                echo'<li class="nav-item"><a class="nav-link" href="index.php?action=author">Espace Auteur</a></li>';
            }
            }else{
            echo'
                    <li class="nav-item"><a class="nav-link" href="#" data-toggle="modal" data-target="#sign-in">Se connecter</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" data-toggle="modal" data-target="#sign-up">S\'inscrire</a></li>';
            }
            ?>
            </ul>
        </nav>

        <div class="modal fade" id="sign-in" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Connexion</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="index.php?action=sign-in">
                            <label for="pseudo">Pseudo</label>
                            <input type="text" required id="pseudo" name="pseudo"  placeholder="Saisissez votre pseudo" class="form-control"/>
                            <label for="mot_de_passe">Mot de passe</label>
                            <input type="password" required id="mot_de_passe" name="mot_de_passe"  placeholder="Saisissez votre mot de passe" class="form-control"/>
                            <input type="submit" value="Se connecter">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="sign-up" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Inscription</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="index.php?action=sign-up">
                            <label for="ipseudo">Pseudo</label>
                            <input type="text" required id="ipseudo" name="ipseudo"  placeholder="Saisissez votre pseudo" class="form-control"/>
                            <label for="e_mail">E-mail</label>
                            <input type="email" required id="e_mail" name="e_mail"  placeholder="Saisissez votre e-mail" class="form-control"/>
                            <label for="imot_de_passe">Mot de passe</label>
                            <input type="password" required id="imot_de_passe" name="imot_de_passe"  placeholder="Saisissez votre mot de passe" class="form-control"/>
                            <label for="rmot_de_passe">Confirmez votre mot de passe</label>
                            <input type="password" required id="rmot_de_passe" name="rmot_de_passe"  placeholder="Saisissez encore une fois votre mot de passe" class="form-control"/>
                            <input type="submit" value="S'inscrire">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
    <script src="js/tinyMCE.js"></script>
</body>
</html>