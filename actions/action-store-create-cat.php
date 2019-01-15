<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once('../components/class.upload.php');
include '../components/functions.php';
$cat_format = minimize($_POST['admin_cat_store_name']);

if (isset($_POST)) {

    if (empty($_POST['admin_cat_store_name'])) {
        $_SESSION['flash']['fail']['admin_cat_store_name'] = "You didn't type any category name";
    }

    if (!isset($_FILES['admin_cat_store_upload'])) {
        $_SESSION['flash']['fail']['admin_cat_store_upload'] = "You didn't choose any thumb";
    }

    if (empty($_POST['admin_cat_store_description'])) {
        $_SESSION['flash']['fail']['admin_cat_store_description'] = "You didn't type any category description !";
    }

    if (empty($_SESSION['flash'])) {

        $cat = new Upload($_FILES['admin_cat_store_upload']);
        if ($cat->uploaded) {
            $catsha1 = 'cat_' . sha1(base64_encode(openssl_random_pseudo_bytes(30)));
            $cat->file_new_name_body = $catsha1;
            $cat->image_resize = true;
            $cat->image_x = 500;
            $cat->image_convert = 'jpg';
            $cat->image_ratio_y = true;
            $cat->Process('../images/cat');
            $catlink = '../images/cat/' . $catsha1 . '.jpg';
        }

        include '../components/db.php';
        $req = $pdo->prepare("INSERT INTO akt_store_cat SET name = :name, content = :content, thumb = :thumb, name_format = :name_format");
        $req->execute(array(
            ':name' => $_POST['admin_cat_store_name'],
            ':thumb' => $catlink,
            ':content' => $_POST['admin_cat_store_description'],
            ':name_format' => $cat_format
        ));
        $req->closeCursor();
        $_SESSION['flash']['success']['admin_store_cat'] = "The category has been created";
        header('Location: ../admin58624/admin42685');
        exit();
    } else {
        header('Location: ../admin58624/admin42685');
    }
}