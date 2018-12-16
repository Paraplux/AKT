<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once('../components/class.upload.php');
include '../components/functions.php';



if (isset($_POST)) {

    if (empty($_POST['admin_cat_store_name'])) {
        $_SESSION['flash']['fail']['admin_cat_store'] = "You didn't type any category";
    }

    if (!isset($_POST['admin_cat_store_description'])) {
        $_SESSION['flash']['fail']['admin_cat_store'] = "Description field is empty!";
    }

    if (!isset($_FILES['admin_cat_store_upload'])) {
        $_SESSION['flash']['fail']['admin_cat_store'] = "You didn't select any thumb!";
    }

    if (empty($_SESSION['flash'])) {

        $thumb = new Upload($_FILES['admin_cat_store_upload']);
        if ($thumb->uploaded) {
   // resized to 400px wide()
            $thumbsha1 = 'thumb_' . sha1(base64_encode(openssl_random_pseudo_bytes(30)));
            $thumb->file_new_name_body = $thumbsha1;
            $thumb->image_resize = true;
            $thumb->image_x = 400;
            $thumb->image_convert = 'jpg';
            $thumb->image_ratio_y = true;

            $thumb->Process('../images/store/cat');
            $thumblink = '../images/store/cat/' . $thumbsha1 . '.jpg';
        }


        include '../components/db.php';

        $cat = $_POST['admin_cat_store_name'];
        $cat_format = cleanString($_POST['admin_cat_store_name']);


        $req = $pdo->prepare('INSERT INTO akt_store_cat SET name = :name, name_format = :name_format, content = :content, thumb = :thumb');
        $req->execute(array(
            ':name' => $cat,
            ':name_format' => $cat_format,
            ':content' => $_POST['admin_cat_store_description'],
            ':thumb' => $thumblink,
        ));
        $req->closeCursor();
        $_SESSION['flash']['success']['admin_cat_store'] = "Category created!";
        header('Location: ../admin58624/admin42685#anchor-store');
        exit();
    } else {
        header('Location: ../admin58624/admin42685#anchor-store');
        exit();
    }
}