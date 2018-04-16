<?php
    $donnes = $chapitre->fetch();
    echo '<h2>' . $donnes['nom'] . '</h2>';
    echo '<p>' . $donnes['contenu'] . '</p>';
?>
<form method="post" action="index.php?action=ajouter_commentaire&amp;id=<?= $_GET['id'] ?>">
    <label for="commentaire">Commentaires</label>
    <input type="text" id="commentaire" name="commentaire" placeholder="Vous devez être connecté(e) pour laisser un commentaire" class="form-control"
    <?php
        if(!isset($_SESSION['id'])){
            echo 'readonly';
        }
    ?>
    />
</form>
<?php
    while ( $donnes = $commentaires->fetch()){
        echo '<h5>' .$donnes['pseudo'] . '</h5>';
        echo '<p>' .$donnes['contenu'] . '</p>';
        echo '<a href="index.php?action=signaler&amp;id=' .$donnes['id'] . '" class="btn btn-danger">Signaler</a>';
    }
?>