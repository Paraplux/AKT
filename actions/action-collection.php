<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once('../components/class.upload.php');
include '../components/functions.php';



if(isset($_POST)) {

    if(empty($_POST['admin_collection_cat'])) {
        $_SESSION['flash']['fail']['admin_collection_cat'] = "You didn't choose any category";
    }

    if(!isset($_FILES['admin_collection_upload'])) {
        $_SESSION['flash']['fail']['admin_collection_upload'] = "You didn't select any photo!";
    }
    
    if(empty($_SESSION['flash'])) {
        $_POST['admin_collection_cat'] = 'Our Works';
        $tiny = new Upload($_FILES['admin_collection_upload']);
        if ($tiny->uploaded) {
   // resized to 75px wide()
            $tinysha1 = 'tiny_' . sha1(base64_encode(openssl_random_pseudo_bytes(30)));
            $tiny->file_new_name_body = $tinysha1;
            $tiny->image_resize = true;
            $tiny->image_x = 75;
            $tiny->image_y = 75;
            $tiny->image_convert = 'jpg';
            $square->image_ratio_crop = true;
            $tiny->Process('../images/collection/tiny');
            $tinylink = '../images/collection/tiny/' . $tinysha1 . '.jpg';
        }

        $small = new Upload($_FILES['admin_collection_upload']);
        if ($small->uploaded) {
   // resized to 400px wide()
            $smallsha1 = 'small_' . sha1(base64_encode(openssl_random_pseudo_bytes(30)));
            $small->file_new_name_body = $smallsha1;
            $small->image_resize = true;
            $small->image_x = 400;
            $small->image_convert = 'jpg';
            $small->image_ratio_y = true;
            $small->Process('../images/collection/small');
            $smalllink = '../images/collection/small/' . $smallsha1 . '.jpg';
        }

        $med = new Upload($_FILES['admin_collection_upload']);
        if ($med->uploaded) {
   // resized to 1000px wide
            $medsha1 = 'med_' . sha1(base64_encode(openssl_random_pseudo_bytes(30)));
            $med->file_new_name_body = $medsha1;
            $med->image_resize = true;
            $med->image_x = 1000;
            $med->image_convert = 'jpg';
            $med->image_ratio_y = true;
            $med->Process('../images/collection/med');
            $medlink = '../images/collection/med/' . $medsha1 . '.jpg';
        }
        $square = new Upload($_FILES['admin_collection_upload']);
        if ($square->uploaded) {
   // resized to 1920px wide
            $squaresha1 = 'square_' . sha1(base64_encode(openssl_random_pseudo_bytes(30)));
            $square->file_new_name_body = $squaresha1;
            $square->image_resize = true;
            $square->image_x = 500;
            $square->image_y = 500;
            $square->image_convert = 'jpg';
            $square->image_ratio_crop = true;
            $square->Process('../images/collection/square');
            $squarelink = '../images/collection/square/' . $squaresha1 . '.jpg';
            if ($square->processed) {
                $tiny->Clean();
                $small->Clean();
                $med->Clean();
                $square->Clean();
            }
        } 


        include '../components/db.php';

        $cat = $_POST['admin_collection_cat'];
        $cat_format = cleanString($_POST['admin_collection_cat']);

        $req = $pdo->prepare('UPDATE akt_collection SET is_thumb = "false" WHERE cat_format = :cat_format');
        $req->execute(array(
            ':cat_format' => $cat_format,
        ));
        $req->closeCursor();

        $req = $pdo->prepare('INSERT INTO akt_collection SET tiny_link = :tiny_link, small_link = :small_link, med_link = :med_link, square_link = :square_link, cat = :cat, cat_format = :cat_format, is_thumb = :is_thumb');
        $req->execute(array(
            ':tiny_link' => $tinylink,
            ':small_link' => $smalllink,
            ':med_link' => $medlink,
            ':square_link' => $squarelink,
            ':cat' => $cat,
            ':cat_format' => $cat_format,
            ':is_thumb' => 'true',
        ));
        $req->closeCursor();
        $_SESSION['flash']['success']['admin_collection'] = "Photo added!";
        header('Location: ../admin58624/admin42685#anchor-collection');
        exit();
    } else {
        header('Location: ../admin58624/admin42685#anchor-collection');
        exit();
    }
}