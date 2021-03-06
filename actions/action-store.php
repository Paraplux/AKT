<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once('../components/class.upload.php');

if (isset($_POST)) {

    if (empty($_POST['admin_store_name'])) {
        $_SESSION['flash']['fail']['admin_store_name'] = "You din't choose any name for the article";
    }

    if (empty($_POST['admin_store_prix'])) {
        $_SESSION['flash']['fail']['admin_store_prix'] = "You didn't choose any price";
    }

    if (empty($_POST['admin_store_description'])){
        $_SESSION['flash']['fail']['admin_store_description'] = "The description field is empty";
    }

    if (empty($_POST['admin_store_color'])) {
        $_SESSION['flash']['fail']['admin_store_color'] = "The color field is empty";
    }

    if (empty($_POST['admin_store_cat'])){
        $_SESSION['flash']['fail']['admin_store_cat'] = "You didn't choose any category";
    }

    if (!isset($_FILES['admin_store_upload_1'])){
        $_SESSION['flash']['fail']['admin_store_upload_1'] = "You didn't choose any thumb";
    }    

    if (empty($_SESSION['flash'])) {

        /*upload*/
        
        $thumb2link = '';
        $thumb3link = '';
        $thumb1 = new Upload($_FILES['admin_store_upload_1']);
        if ($thumb1->uploaded) {
            $thumb1sha1 = 'store_' . sha1(base64_encode(openssl_random_pseudo_bytes(30)));
            $thumb1->file_new_name_body = $thumb1sha1;
            $thumb1->image_resize = true;
            $thumb1->image_x = 400;
            $thumb1->image_y = 300;
            $thumb1->image_convert = 'jpg';
            $thumb1->image_ratio_crop = true;
            $thumb1->Process('../images/store');
            $thumb1link = '../images/store/' . $thumb1sha1 . '.jpg';
        }

        $thumb2 = new Upload($_FILES['admin_store_upload_2']);
        if ($thumb2->uploaded) {
            $thumb2sha1 = 'store_' . sha1(base64_encode(openssl_random_pseudo_bytes(30)));
            $thumb2->file_new_name_body = $thumb2sha1;
            $thumb2->image_resize = true;
            $thumb2->image_x = 400;
            $thumb2->image_y = 300;
            $thumb2->image_convert = 'jpg';
            $thumb2->image_ratio_crop = true;
            $thumb2->Process('../images/store');
            $thumb2link = '../images/store/' . $thumb2sha1 . '.jpg';
        }

        $thumb3 = new Upload($_FILES['admin_store_upload_3']);
        if ($thumb3->uploaded) {
            $thumb3sha1 = 'store_' . sha1(base64_encode(openssl_random_pseudo_bytes(30)));
            $thumb3->file_new_name_body = $thumb3sha1;
            $thumb3->image_resize = true;
            $thumb3->image_x = 400;
            $thumb3->image_y = 300;
            $thumb3->image_convert = 'jpg';
            $thumb3->image_ratio_crop = true;
            $thumb3->Process('../images/store');
            $thumb3link = '../images/store/' . $thumb3sha1 . '.jpg';
        }


        include '../components/functions.php';
        $nameCapitalize = capitalize($_POST['admin_store_name']);
        $ref = 'AKTJ_' . $nameCapitalize;
        $catExplode = explode('|', $_POST['admin_store_cat']);
        $cat = $catExplode[0];
        $cat_format = $catExplode[1];
        $cat_id = $catExplode[2];
        $color_format = minimize($_POST['admin_store_color']);


        include '../components/db.php';

        $req = $pdo->prepare("INSERT INTO akt_store 
                            SET `name` = :admin_store_name,
                             prix = :admin_store_prix, 
                             item_description = :admin_store_description, 
                             color = :admin_store_color, 
                             color_format = :color_format, 
                             cat = :admin_store_cat, 
                             thumb_1 = :admin_store_upload_1, 
                             thumb_2 = :admin_store_upload_2, 
                             thumb_3 = :admin_store_upload_3, 
                             qty = :qty, ref = :ref, 
                             at_format = :cat_format, 
                             cat_id = :cat_id, 
                             variation = 'false'");
        $req->execute(array(
                            ':admin_store_name' => $_POST['admin_store_name'],
                            ':admin_store_prix' => $_POST['admin_store_prix'],
                            ':admin_store_description' => $_POST['admin_store_description'],
                            ':admin_store_color' => $_POST['admin_store_color'],
                            ':color_format' => $color_format,
                            ':admin_store_cat' => $cat,
                            ':admin_store_upload_1' => $thumb1link,
                            ':admin_store_upload_2' => $thumb2link,
                            ':admin_store_upload_3' => $thumb3link,
                            ':qty' => $_POST['admin_store_stock'],
                            ':ref' => $ref,
                            ':cat_format' => $cat_format,
                            ':cat_id' => $cat_id,
                        ));
        $req->closeCursor();
        $_SESSION['flash']['success']['admin_store'] = "The article has been added";
        header('Location: ../admin58624/admin42685');
        exit();
    } else {
        $_SESSION['flash']['fail']['admin_store_variation'] = "Error, try again!";
        header('Location: ../admin58624/admin42685');
        exit();
    }
}