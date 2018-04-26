<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link href="public/css/style.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <!-- En-tête du site -->
           <header class="col-lg-12"><h1>Le blog de Jean Forteroche</h1></header>
       </div>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <!-- Le menu principal -->
            <ul class="nav navbar-nav">
                <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?action=bio">Biographie</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?action=histoires">Histoires</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?action=contact">Contact</a></li>
            </ul>
        </nav>

        <div class="row mt-3">
            <aside class="col-lg-3 gauche d-none d-lg-block">
                <!-- La photo/le panneau gauche -->
                <img src="public/img/portrait.jpg" alt="Jean Forteroche">
            </aside>

            <article class="col-lg-6">
                <!-- Le contenu principal de la page -->
                <?= $contenu ?>
            </article>

            <aside class="col-lg-3 d-none d-lg-block">
                <!-- Le menu/ le panneau droit -->
                <div class="card">
                        <div class="card-header bg-primary">Les derniers chapitres</div>
                        <ul class="list-group list-group-flush">
                            <?php
                                while ( $donnes = $chapitres->fetch())
                                {
                                    echo '<li class="list-group-item"><a href="index.php?action=chapitre&amp;id=' .$donnes['id'] . '">' . $donnes['nom'] . '</a></li>';
                                }
                            ?>
                        </ul>
                </div>
            </aside>
        </div>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-bottom">
            <!-- Footer -->
            <ul class="nav navbar-nav">
            <?php
            if (isset ($_SESSION['id'])){
            echo'<li class="nav-item"><a class="nav-link" href="index.php?action=deconnexion">Se déconnecter</a></li>';
            if ($_SESSION['id'] == 1){
                echo'<li class="nav-item"><a class="nav-link" href="index.php?action=auteur">Espace Auteur</a></li>';
            }
            }else{
            echo'
                    <li class="nav-item"><a class="nav-link" href="#" data-toggle="modal" data-target="#connexion">Se connecter</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" data-toggle="modal" data-target="#inscription">S\'inscrire</a></li>';
            }
            ?>
            </ul>
        </nav>

        <div class="modal fade" id="chapitre" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Ajouter un chapitre</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="ajout.php">
                            <label for="nomc">Nom</label>
                            <input type="text" required id="nomc" name="nomc"  placeholder="Saisissez le nom du chapitre" class="form-control"/>
                            <label for="mot_de_passe">Le text de chapitre</label>
                            <input type="textarea" required id="contenu" name="contenu" class="form-control"/>
                            <input type="submit" value="Ajouter">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="connexion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Connexion</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="index.php?action=connexion">
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

        <div class="modal fade" id="inscription" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Inscription</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="index.php?action=inscription">
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
    <script src="public/js/tinyMCE.js"></script>
</body>
</html>