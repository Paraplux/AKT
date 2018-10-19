<?php  include '../components/header.php'; ?>

<link rel="stylesheet" href="../css/admin.css">
<script src="//cdn.ckeditor.com/4.10.1/full/ckeditor.js"></script>

</head>

<body>

<?php include '../components/navbar.php'; ?>

<fieldset class="admin-container">
    <legend>Page d'aministration</legend>
    <div class="admin-defil">
        <h3>Changer le texte défilant de la page d'accueil : </h3>
        <input name="admin-defil" type="text" placeholder="Tapez le texte ici...">
    </div>

    <hr>
    
    <div class="admin-blog">
        <h3>Gérer les articles précédents</h3>
        <p>Lister ici les articles en php avec un bouton de suppression (voire de modification)</p>
        <h3>Ajouter un article au blog : </h3>
        <h4>Titre :</h4>
        <input name="admin-blog-title" type="text">
        <h4>Corps de l'article</h4>
        <textarea name="admin-blog-content" type="text" cols=70 rows=10></textarea>
            
    </div>

    <hr>

    <div class="admin-collection">
        <h3>Gérer la galerie</h3>
        <p>Lister ici les différentes photos de la collection par catégories</p>
        <h4>Ajouter des photos (voir ajouter catégorie)</h4>
        <input name="admin-collection-upload" type="file">
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
    CKEDITOR.replace( 'admin-blog-content' );
</script>

<?php include '../components/footer.php'; ?>