<?php
    $donnes = $chapitre->fetch();
?>

<div id="modifier">
    <form action="index.php?action=enregistrer_modification&amp;id=<?= $_GET['id'] ?>" method="post">
        <input type="text" id="titre" name="titre" value="<?= $donnes['nom'] ?>" />
        <textarea id="contenu_chapitre" name="contenu_chapitre"><?= $donnes['contenu'] ?></textarea>
        <input type="submit" value="Modifier" />
    </form>   
</div>