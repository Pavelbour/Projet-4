<?php
    $donnes = $commentaire->fetch();
?>

<div id="modifier">
    <form action="index.php?action=enregistrer-commentaire&amp;id=<?= $_GET['id'] ?>" method="post">
        <textarea id="contenu_chapitre" name="contenu_chapitre"><?= $donnes['contenu'] ?></textarea>
        <input type="submit" value="Modifier" />
    </form>   
</div>