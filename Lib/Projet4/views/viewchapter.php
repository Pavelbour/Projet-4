<?php
    // Display a chapter
    $data = $chapter->fetch();
    echo '<h2>' . $data['titre'] . '</h2>';
    echo  htmlspecialchars_decode($data['content']);
    if(isset($_SESSION['id']) && $_SESSION['id'] == 1){
?>
<a class="btn btn-primary btn-sm" href="index.php?action=modify-chapter&amp;id=<?= $idChapter ?>">Modifier le chapitre</a>
<a class="btn btn-danger btn-sm" href="index.php?action=delete-chapter&amp;id=<?= $idChapter ?>">Effacer le chapitre</a>
<?php
    }
?>
<!-- The form of the commentary -->
<form class="form-inline mt-3" method="post" action="index.php?action=add-commentary&amp;id=<?= $idChapter ?>">
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

<ul class="list-group list-group-fluch mt-3 mb-5">
    <?php
        // The list of the commentarys
        while ( $data = $commentarys->fetch()){
            echo '<li class="list-group-item">';
            echo '<h5>' .$data['pseudo'] . '</h5>';
            echo '<p>' .htmlspecialchars_decode($data['content']) . '</p>';
            echo '<a href="index.php?action=report&amp;id=' .$data['id'] . '" class="btn btn-danger btn-sm float-right">Signaler</a>';
            echo '<p>' .$data['added'] . '</p>';
            echo '</li>';
        }
    ?>
</ul>