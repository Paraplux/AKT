<?php 

if (isset($_POST)) {
    $errors = array();

    if (empty($_POST['blog_title'])) {
        $errors['blog_title'] = "Le champ titre est vide";
    }

    if (empty($_POST['blog_corpus'])) {
        $errors['blog_corpus'] = "Le champ corps de texte est vide";
    }

    if (empty($_POST['blog_date'])) {
        $errors['blog_date'] = "Le champs date est vide";
    }

    if (empty($errors)) {
        include '../components/db.php';
        $req = $pdo->prepare("INSERT INTO akt_blog SET blog_title = ?, blog_corpus = ?, blog_date = ?");
        $req->execute([$_POST['blog_title'], $_POST['blog_corpus'], $_POST['blog_date']]);
        $req->closeCursor();
        header('Location: ../views/admin.php');
        exit();
    }
}