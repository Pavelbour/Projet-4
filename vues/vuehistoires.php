<ul class="list-group list-group-flush">
    <?php
        while ( $donnes = $liste->fetch())
        {
            echo '<li class="list-group-item">                    
                <a href="index.php?action=chapitre&amp;id=' .$donnes['id'] . '"><h5>' .$donnes['nom'] . '</h5></a>
            </li>';
        }
    ?>
</ul>