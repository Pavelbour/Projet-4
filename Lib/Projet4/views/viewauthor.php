<ul class="nav nav-tabs">
    <!-- Les onglettes -->
    <li class="nav-item"><a class="nav-link active" href="#add" data-toggle="tab">Ajouter chapitre</a></li>
    <li class="nav-item"><a class="nav-link" href="#modify" data-toggle="tab">Modifier chapitre</a></li>
    <li class="nav-item"><a class="nav-link" href="#moderation" data-toggle="tab">Moderer les commentaires</a></li>
</ul>

<div class="tab-content">
    <div class="tab-pane show active" id="add">
        <!-- L'onglette Ajouter chapitre -->
        <form action="index.php?action=add-chapter" method="post">
            <input type="text" id="titre" name="titre" />
            <textarea id="content-chapter" name="content-chapter"></textarea>
            <input type="submit" value="Ajouter le chapitre" />
        </form>
    </div>
    <div class="tab-pane" id="modify">
        <!-- L'onglette Modifier chapitre -->
        <ul class="list-group list-group-flush">
            <?php
                while ( $data = $list->fetch())
                {
                    echo '<li class="list-group-item">
                        <h5>' .$data['titre'] . '</h5>
                        <a href="index.php?action=modify-chapter&amp;id=' .$data['id'] . '">Modifier</a>
                        <a href="index.php?action=delete-chapter&amp;id=' .$data['id'] . '">Effacer</a>
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
            while ( $data = $commentarys->fetch()){
                echo '<li class="list-group-item">';
                echo '<h5>' .$data['pseudo'] . '</h5>';
                echo '<p>' .htmlspecialchars_decode($data['content']) . '</p>';
                echo '<p>' .$data['added'] . '</p>';
                echo '<a href="index.php?action=modify-commentary&amp;id=' .$data['id'] . '">Modifier</a>';
                echo '<a href="index.php?action=approve&amp;id=' .$data['id'] . '">Approuver</a>';
                echo '<a href="index.php?action=delete&amp;id=' .$data['id'] . '">Effacer</a>';
                echo '</li>';
            }
        ?>
    </ul>
    <h3>Les commentaires pas signalés</h3>
    <ul class="list-group list-group-flush mb-5">
        <?php
            // La liste de toutes les commentaires
            while ( $data = $commentarysNotReported->fetch()){
                echo '<li class="list-group-item">';
                echo '<h5>' .$data['pseudo'] . '</h5>';
                echo '<p>' .htmlspecialchars_decode($data['content']) . '</p>';
                echo '<p>' .$data['added'] . '</p>';
                echo '<a href="index.php?action=modify-commentary&amp;id=' .$data['id'] . '">Modifier</a>';
                echo '<a href="index.php?action=delete&amp;id=' .$data['id'] . '">Effacer</a>';
                echo '</li>';
            }
        ?>
    </ul>
    </div>
</div>