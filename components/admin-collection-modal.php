            
            <div id="hide-collection-modal"><i class="fas fa-times"></i></div>
            <h2 class="admin-subtitle-style">Gestion de la collection</h2>
            <p>Vous pouvez choisir une image favorite en cliquant sur l'étoile, elle sera utilisée pour illustrer la catégorie.</p>
            <p>Vous pouvez également supprimer une photo de votre collection en cliquant sur la corbeille.</p>
            <?php 
            include '../components/db.php';
            $req = $pdo->prepare("SELECT * FROM akt_collection WHERE is_thumb = 'true'");
            $req->execute();
            $cats = $req->fetchAll();
            if ($cats == null) {
                echo "Vous n'avez pas de photos dans votre collection ! Ajoutez en !";
            }
            foreach ($cats as $cat) :
            ?>
        <div><?= $cat['cat']; ?></div>
        <div class="collection-modal-cat-mozaic">
            <?php 
            $reqBis = $pdo->prepare("SELECT * FROM akt_collection WHERE cat_format = :cat_format");
            $reqBis->execute(array(
                ':cat_format' => $cat['cat_format'],
            ));
            $catsBis = $reqBis->fetchAll();
            foreach ($catsBis as $catBis) :
                if ($catBis['is_thumb'] == 'true') {
                $border = 'true';
            } else {
                $border = 'false';
            }
            ?>
            <div class="collection-modal-cat-thumb">
                <img class="is-thumb-selected-<?= $border; ?>" src="<?= $catBis['tiny_link']; ?>" alt="">
                <form id="collection-modal-cat-fav">
                    <input name="fav-value-id" type="hidden" value="<?= $catBis['id'] ?>">
                    <input name="fav-value-cat" type="hidden" value="<?= $catBis['cat_format'] ?>">
                    <button class="btn-unstyle"><i class="fas fa-star"></i></button>
                </form>
                <form class="collection-modal-cat-trash">
                    <input name="trash-value-id" type="hidden" value="<?= $catBis['id'] ?>">  
                    <input name="trash-value-cat" type="hidden" value="<?= $catBis['cat_format'] ?>"> 
                    <button class="btn-unstyle"><i class="fas fa-trash-alt"></i></button>
                </form>
            </div>
            <?php endforeach; 
            $reqBis->closeCursor();
            ?>            
        </div>
        <?php endforeach; 
        $req->closeCursor(); 
        ?>