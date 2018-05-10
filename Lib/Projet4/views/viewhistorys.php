<ul class="list-group list-group-flush">
    <?php
        while ( $data = $list->fetch())
        {
            echo '<li class="list-group-item">                    
                <a href="index.php?action=chapter&amp;id=' .$data['id'] . '"><h5>' .$data['titre'] . '</h5></a>
            </li>';
        }
    ?>
</ul>