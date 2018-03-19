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
        <div class="row">
            <!-- En-tête du site -->
            <header class="col-lg-12"><h1>Le blog de Jean Forteroche</h1></header>
        </div>

        <nav class="navbar navbar-inverse">
            <!-- Le menu principal -->
            <ul class="nav navbar-nav">
                <li><a href="#">Accueil</a></li>
                <li><a href="#">Biographie</a></li>
                <li><a href="#">Histoires</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>

        <div class="row">
            <aside class="col-lg-3 gauche">
                <!-- La photo/le panneau gauche -->
                <img src="img/portrait.jpg" alt="Jean Forteroche">
            </aside>

            <article class="col-lg-6">
                <!-- Le contenu principal de la page -->
                <h2>Bonjour !</h2>
                <div>
                    Vous êtes sur le blog d'ecrivain Jean Forteroche. Ici, vous trouvez tous mes oevres derniers, actualités et beaucoup plus. N'hesites pas à me laisser des commenters. Vous pouvez me contacter par le formulaire de contact. Bonne lecture !
                </div>
            </article>

            <aside class="col-lg-3">
                <!-- Le menu/ le panneau droit -->
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Les derniers chapitres</h3>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="#">Chapitre 1</a></li>
                        <li class="list-group-item"><a href="#">Chapitre 2</a></li>
                        <li class="list-group-item"><a href="#">Chapitre 3</a></li>
                        <li class="list-group-item"><a href="#">Chapitre 4</a></li>
                        <li class="list-group-item"><a href="#">Chapitre 5</a></li>
                    </ul>
                </div>
            </aside>
        </div>

        <nav class="navbar navbar-inverse navbar-fixed-bottom">
            <!-- Footer -->
            <ul class="nav navbar-nav">
                <li><a href="#">Se connecter</a></li>
            </ul>
        </nav>
    </div>
</body>
</html>