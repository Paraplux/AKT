<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_POST)) {


    include '../components/db.php';
    include '../components/functions.php';
    $req = $pdo->prepare('SELECT * FROM akt_store WHERE id = :id');
    $req->execute(array(
        ':id' => $_POST['admin_store_clone']
    ));
    $clone = $req->fetch();
    $req->closeCursor();
    $color_format = minimize($_POST['admin_store_variation']);
    $req = $pdo->prepare('INSERT INTO akt_store SET
        ref = :ref,
        name = :name,
        prix = :prix,
        item_description = :item_description,
        thumb_1 = :thumb_1,
        thumb_2 = :thumb_2,
        thumb_3 = :thumb_3,
        qty = :qty,
        color = :color,
        color_format = :color_format,
        cat = :cat,
        cat_format = :cat_format,
        cat_id = :cat_id,
        variation =:variation
    ');
    $req->execute(array(
        ':ref' => $clone['ref'],
        ':name' => $clone['name'],
        ':prix' => $clone['prix'],
        ':item_description' => $clone['item_description'],
        ':thumb_1' => $clone['thumb_1'],
        ':thumb_2' => $clone['thumb_2'],
        ':thumb_3' => $clone['thumb_3'],
        ':qty' => $_POST['admin_store_variation_stock'],
        ':color' => $_POST['admin_store_variation'],
        ':color_format' => $color_format,
        ':cat' => $clone['cat'],
        ':cat_format' => $clone['cat_format'],
        ':cat_id' => $clone['cat_id'],
        ':variation' => "true",
    ));
    $req->closeCursor();
    $_SESSION['flash']['success']['admin_store_variation'] = "L'article a bien été dupliqué";
    header('Location: ../views/admin');
    exit();

} else {
    $_SESSION['flash']['fail']['admin_store_variation'] = "Erreur veuillez réessayer";
    header('Location: ../views/admin');
    exit();
}