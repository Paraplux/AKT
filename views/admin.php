<?php  include '../components/header.php'; ?>

<link rel="stylesheet" href="../css/admin.css">
<script src="//cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script>


<?php include '../components/navbar.php'; ?>



<fieldset class="admin-container">
    <legend>Page d'aministration</legend>
    <div class="admin-defil">
        <h3>Changer le texte défilant de la page d'accueil : </h3>
        <form action="../actions/action-defil.php" method="POST" >
            <input name="home_defil" type="text" placeholder="Tapez le texte ici..."><br><br>
            <button type="submit">Submit</button>
        </form>
    </div>

    <hr>
    
    <div class="admin-blog">
        <h3>Gérer les articles précédents</h3>
        <p>Lister ici les articles en php avec un bouton de suppression (voire de modification)</p>
        <hr>
        <form action="../actions/action-blog.php" method="POST">
            <label for="blog_title"><h4>Titre :</h4></label>
            <input name="blog_title" type="text">
            <label for="blog_corpus"><h4>Corps de l'article :</h4></label>
            <textarea name="blog_corpus" type="text" cols=70 rows=10></textarea>
            <label for="blog_date"><h4>Date de publication :</h4></label>
            <input type="date" name="blog_date"><br><br>
            <button type="submit">Publier l'article</button>
        </form>
            
    </div>

    <hr>

    <div class="admin-collection">
        <h3>Gérer la galerie</h3>
        <p>Lister ici les différentes photos de la collection par catégories</p>
        <h4>Ajouter des photos (voir ajouter catégorie)</h4>
        <form action="../actions/action-collection.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="admin_collection_upload"><br><br>
            <input type="text" name="admin_collection_cat" placeholder="Choisir une catégorie"><br><br>
            <button type="submit">Ajouter une photo</button>
        </form>
        <p>Lister les photos ajoutées + champ pour leur donner une catégorie</p>
    </div>
    
    <hr>
    
    <div class="admin-store">
        <h3>Gérer les stocks de marchandises</h3>
        <p>Lister les articles en vente avec leur prix (modifiable)</p>
        <h4>Ajouter un article (photos + prix)</h4>
    </div>
    
    <hr>
    
    <div class="admin-press">
        <h3>Gérer les critiques presse</h3>
        <p>Lister ici les critiques</p>
        <h4>Ajouter une critique : </h4>
        <h4>Titre : </h4>
        <input name="admin-press-title" type="text">
        <h4>Critque : </h4>
        <textarea name="admin-press-content" type="text" cols=70 rows=10></textarea>
        <h4>Lien : </h4>
        <input name="admin-press-link" type="text">
    </div>
</fieldset>

<script>
    CKEDITOR.replace( 'blog_corpus' );
    config.stylesSet = [
    { name: 'Main Title', element: 'h1.main-blog-title' },
];
</script>

<?php include '../components/footer.php'; ?>