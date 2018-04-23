<ul class="nav nav-tabs">
    <!-- Les onglettes -->
    <li class="nav-item"><a class="nav-link active" href="#ajouter" data-toggle="tab">Ajouter chapitre</a></li>
    <li class="nav-item"><a class="nav-link" href="#modifier" data-toggle="tab">Modifier chapitre</a></li>
    <li class="nav-item"><a class="nav-link" href="#moderation" data-toggle="tab">Moderer les commentaires</a></li>
</ul>

<div class="tab-content">
    <div class="tab-pane show active" id="ajouter">
        <!-- L'onglette Ajouter chapitre -->
        <form action="index.php?action=ajouter-chapitre" method="post">
            <input type="text" id="titre" name="titre" />
            <textarea id="contenu_chapitre" name="contenu_chapitre"></textarea>
            <input type="submit" value="Ajouter le chapitre" />
        </form>
    </div>
    <div class="tab-pane" id="modifier">
        <!-- L'onglette Modifier chapitre -->
        <ul class="list-group list-group-flush">
            <?php
                while ( $donnes = $chapitres->fetch())
                {
                    echo '<li class="list-group-item">
                        <h5>' .$donnes['nom'] . '</h5>
                        <a href="index.php?action=modifier-chapitre&amp;id=' .$donnes['id'] . '">Modifier</a>
                        <a href="index.php?action=effacer-chapitre&amp;id=' .$donnes['id'] . '">Effacer</a>
                    </li>';
                }
            ?>
        </ul>
    </div>
    <div class="tab-pane" id="moderation">
    <!-- L'onglette de la moderation des commentaires -->
    <h3>Les commentaires signalés</h3>
    <ul class="list-group list-group-flush mb-5">
        <?php
            // La liste des commentaires signalées
            while ( $donnes = $commentaires->fetch()){
                echo '<li class="list-group-item">';
                echo '<h5>' .$donnes['pseudo'] . '</h5>';
                echo '<p>' .$donnes['contenu'] . '</p>';
                echo '<p>' .$donnes['ajoute'] . '</p>';
                echo '<a href="index.php?action=modifier-commentaire&amp;id=' .$donnes['id'] . '">Modifier</a>';
                echo '<a href="index.php?action=approuver&amp;id=' .$donnes['id'] . '">Approuver</a>';
                echo '<a href="index.php?action=effacer&amp;id=' .$donnes['id'] . '">Effacer</a>';
                echo '</li>';
            }
        ?>
    </ul>
    <h3>Les commentaires pas signalés</h3>
    <ul class="list-group list-group-flush mb-5">
        <?php
            // La liste de toutes les commentaires
            while ( $donnes = $commentairesPasSignales->fetch()){
                echo '<li class="list-group-item">';
                echo '<h5>' .$donnes['pseudo'] . '</h5>';
                echo '<p>' .$donnes['contenu'] . '</p>';
                echo '<p>' .$donnes['ajoute'] . '</p>';
                echo '<a href="index.php?action=modifier-commentaire&amp;id=' .$donnes['id'] . '">Modifier</a>';
                echo '<a href="index.php?action=effacer&amp;id=' .$donnes['id'] . '">Effacer</a>';
                echo '</li>';
            }
        ?>
    </ul>
    </div>
</div>