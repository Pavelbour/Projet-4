<nav class="navbar navbar-inverse navbar-fixed-bottom">
    <!-- Footer -->
    <ul class="nav navbar-nav">
    <?php
    if (isset ($_SESSION['utilisateur_id'])){
      echo'<li><a href="deconnexion.php">Se déconnecter</a></li>';
      if ($_SESSION['utilisateur_id'] ==2){
        echo'<li><a href="#" data-toggle="modal" data-target="#chapitre">Ajouter un chapitre</a></li>';
      }
    }else{
      echo'
            <li><a href="#" data-toggle="modal" data-target="#connexion">Se connecter</a></li>
            <li><a href="#" data-toggle="modal" data-target="#inscription">S\'inscrire</a></li>';
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
        <form method="post" action="connexion.php">
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
        <form method="post" action="inscription.php">
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

<script src="js/jquery-3.3.1.min.js"></script>
<script src="bootstrap/bootstrap-dist/js/bootstrap.min.js"></script>