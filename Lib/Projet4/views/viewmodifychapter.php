<?php
    $data = $chapter->fetch();
?>

<div id="modifier">
    <form action="index.php?action=write-modification&amp;id=<?= $_GET['id'] ?>" method="post">
        <input type="text" id="titre" name="titre" value="<?= $data['titre'] ?>" />
        <textarea id="content-chapter" name="content-chapter"><?= $data['content'] ?></textarea>
        <input type="submit" value="Modifier" />
    </form>   
</div>