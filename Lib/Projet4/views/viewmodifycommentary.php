<?php
    $data = $commentary->fetch();
?>

<div id="modifier">
    <form action="index.php?action=write-commentary&amp;id=<?= $_GET['id'] ?>" method="post">
        <textarea id="content-chapter" name="content-chapter"><?= $data['content'] ?></textarea>
        <input type="submit" value="Modifier" />
    </form>   
</div>