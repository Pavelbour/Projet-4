<?php

$bdd = new PDO('mysql:host=localhost;dbname=jfblog', 'root', '');
$reponse = $bdd->query('SELECT id, nom FROM chapitres');
?>
<aside class="col-lg-3">
    <!-- Le menu/ le panneau droit -->
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">Les derniers chapitres</h3>
        </div>
        <ul class="list-group">
            <?php
                while ( $donnes = $reponse->fetch())
                {
                    echo '<li class="list-group-item"><a href="chapitre.php?id=' .$donnes['id'] . '">' . $donnes['nom'] . '</a></li>';
                }
            ?>
        </ul>
    </div>
</aside>