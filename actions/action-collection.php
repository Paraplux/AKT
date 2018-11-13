<?php 

require_once('../components/class.upload.php');

$tiny = new Upload($_FILES['admin_collection_upload']); 
if ($tiny->uploaded) {
   // resized to 50px wide()
   $tinysha1 = 'tiny_' . sha1(base64_encode(openssl_random_pseudo_bytes(30)));
   $tiny->file_new_name_body = $tinysha1;
   $tiny->image_resize = true;
   $tiny->image_x = 50;
   $tiny->image_convert = 'jpg';
   $tiny->image_ratio_y = true;
   $tiny->Process('../images/test');
   $tinylink = '../images/test/' . $tinysha1 . '.jpg';
   if ($tiny->processed) {
     echo 'REUSSI !';
   } else {
     echo 'error : ' . $tiny->error;
   } 
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
    $small->Process('../images/test');
    $smalllink = '../images/test/' . $smallsha1 . '.jpg';
    if ($small->processed) {
        echo 'REUSSI !';
    } else {
        echo 'error : ' . $small->error;
    }
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
    $med->Process('../images/test');
    $medlink = '../images/test/'. $medsha1 . '.jpg';
    if ($med->processed) {
        echo 'REUSSI !';
    } else {
        echo 'error : ' . $med->error;
    }
}
$big = new Upload($_FILES['admin_collection_upload']);
if ($big->uploaded) {
   // resized to 1920px wide
    $bigsha1 = 'big_' . sha1(base64_encode(openssl_random_pseudo_bytes(30)));
    $big->file_new_name_body = $bigsha1;
    $big->image_resize = true;
    $big->image_x = 1920;
    $big->image_convert = 'jpg';
    $big->image_ratio_y = true;
    $big->Process('../images/test');
    $biglink = '../images/test/' . $bigsha1 . '.jpg';
    if ($big->processed) {
        echo 'REUSSI !';
        $tiny->Clean();
        $small->Clean();
        $med->Clean();
        $big->Clean();
    } else {
        echo 'error : ' . $big->error;
    }
} 

if(isset($_POST)) {
    $errors = array();
    if(empty($_POST['admin_collection_cat'])) {
        $errors['admin_collection_cat'] = 'Il faut entrer une catégorie';
    }
    
    if(empty($errors)) {
        include '../components/db.php';
        $req = $pdo->prepare('INSERT INTO akt_collection SET tiny_link = :tiny_link, small_link = :small_link, med_link = :med_link, big_link = :big_link, cat = :cat');
        $cat = $_POST['admin_collection_cat'];
        $req->execute(array(
            ':tiny_link' => $tinylink,
            ':small_link' => $smalllink,
            ':med_link' => $medlink,
            ':big_link' => $biglink,
            ':cat' => $cat,
        ));
        $req->closeCursor();
        header('Location: ../views/admin.php');
        exit();
    }
}