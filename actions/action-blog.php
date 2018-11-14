<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once('../components/class.upload.php');

if (isset($_POST)) {

    if (empty($_POST['blog_title'])) {
        $_SESSION['flash']['fail']['blog_title'] = "Vous n'avez pas choisi de titre";
    }

    if (!isset($_FILES['blog_thumb'])) {
        $_SESSION['flash']['fail']['blog_thumb'] = "Vous n'avez pas ajouté d'image d'illustration";
    }

    if (empty($_POST['blog_corpus'])) {
        $_SESSION['flash']['fail']['blog_corpus'] = "Vous n'avez pas entré de texte";
    }

    if (empty($_POST['blog_date'])) {
        $_SESSION['flash']['fail']['blog_date'] = "Vous n'avez pas défini de date";
    }

    if (empty($_SESSION['flash'])) {
        $blog = new Upload($_FILES['blog_thumb']);
        if ($blog->uploaded) {
            $blogsha1 = 'blog_' . sha1(base64_encode(openssl_random_pseudo_bytes(30)));
            $blog->file_new_name_body = $blogsha1;
            $blog->image_resize = true;
            $blog->image_x = 500;
            $blog->image_convert = 'jpg';
            $blog->image_ratio_y = true;
            $blog->Process('../images/blog');
            $bloglink = '../images/blog/' . $blogsha1 . '.jpg';
        }
        include '../components/db.php';
        $req = $pdo->prepare("INSERT INTO akt_blog SET blog_title = :blog_title, blog_thumb = :blog_thumb, blog_corpus = :blog_corpus, blog_date = :blog_date");
        $req->execute(array(
            ':blog_title' => $_POST['blog_title'],
            ':blog_thumb' => $bloglink,
            ':blog_corpus' => $_POST['blog_corpus'],
            ':blog_date' => $_POST['blog_date'],
        ));
        $req->closeCursor();
        $_SESSION['flash']['success']['admin_blog'] = "L'article a bien été créé";
        header('Location: ../views/admin.php');
        exit();
    } else {
        header('Location: ../views/admin.php');
    }
}