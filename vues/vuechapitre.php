<?php
    // Affichage d'un chapitre
    $donnes = $chapitre->fetch();
    echo '<h2>' . $donnes['nom'] . '</h2>';
    echo  htmlspecialchars_decode($donnes['contenu']);
    if(isset($_SESSION['id']) && $_SESSION['id'] == 1){
?>
<a class="btn btn-primary btn-sm" href="index.php?action=modifier-chapitre&amp;id=<?= $idChapitre ?>">Modifier le chapitre</a>
<a class="btn btn-danger btn-sm" href="index.php?action=effacer-chapitre&amp;id=<?= $idChapitre ?>">Effacer le chapitre</a>
<?php
    }
?>
<!-- La forme de commentaire -->
<form class="form-inline mt-3" method="post" action="index.php?action=ajouter-commentaire&amp;id=<?= $idChapitre ?>">
    <div class="input-group col-lg-12">
        <label for="commentaire" class="sr-only">Commentaires</label>
        <input type="text" id="commentaire" name="commentaire" placeholder="Vous devez être connecté(e) pour laisser un commentaire" class="form-control form-control-sm"
        <?php
            if(!isset($_SESSION['id'])){
                echo 'readonly';
            }
        ?>
        />
        <div class="input-group-append">
            <button type="submit" class="btn btn-primary btn-sm">Publier</button>
        </div>
    </div>
</form>

<ul class="list-group list-group-fluch mt-3">
    <?php
        // La liste des commentaires
        while ( $donnes = $commentaires->fetch()){
            echo '<li class="list-group-item">';
            echo '<h5>' .$donnes['pseudo'] . '</h5>';
            echo '<p>' .htmlspecialchars_decode($donnes['contenu']) . '</p>';
            echo '<a href="index.php?action=signaler&amp;id=' .$donnes['id'] . '" class="btn btn-danger btn-sm float-right">Signaler</a>';
            echo '<p>' .$donnes['ajoute'] . '</p>';
            echo '</li>';
        }
    ?>
</ul>