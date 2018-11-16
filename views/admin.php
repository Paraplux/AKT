<?php 

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>

<?php  

include '../components/header.php';
include '../components/db.php';
include '../components/navbar-reverse.php';

date_default_timezone_set('Europe/Paris');
$dateSQL = date('Y-m-d');
$date = date("d-m-Y");
$heure = date("H:i");

/*CALLING CONTROLLER*/
include '../components/controller.php';
$textDefil = new GetterRequest;
?>

<link rel="stylesheet" href="../css/drop-down.css">
<link rel="stylesheet" href="../css/admin.css">
<link rel="stylesheet" href="../css/navbar-reverse.css">
<script src="//cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script>



<div class="container"><br><hr>
    <h1 class="admin-title-style">Page d'aministration</h1><hr><br>
    <nav class="admin-nav">
        <a href="#anchor-defil">Home Message</a>
        <a href="#anchor-blog">Blog</a>
        <a href="#anchor-collection">Collection</a>
        <a href="#anchor-store">Store</a>
        <a href="#anchor-press">Press</a>
    </nav>

    <!-- ARTICLES DU BLOG -->

    <?php 
    $req = $pdo->prepare('SELECT * FROM akt_blog');
    $req->execute();
    $blogPosts = $req->fetchAll();
    ?>

    <!-- MESSAGE D'ERREURS -->
    <?php if(isset($_SESSION['flash'])): ?>
        <?php foreach($_SESSION['flash'] as $type => $error): ?>
            <div class="flash-message small-error-<?= $type; ?>">
                <div class="flash-message-dismiss"><i class="fas fa-times"></i></div>
                <?php if(isset($_SESSION['flash']['fail'])) : ?>
                <ul>
                    Vous avez mal rempli le formulaire :
                    <?php foreach ($_SESSION['flash']['fail'] as $message) : ?>
                    <li> <?= $message ?> </li>
                    <?php endforeach;?>
                </ul>
                <?php endif ?>
                <?php if (isset($_SESSION['flash']['success'])) : ?>
                <ul>
                    Parfait !
                    <?php foreach ($_SESSION['flash']['success'] as $message) : ?>
                    <li> <?= $message ?> </li>
                    <?php endforeach; ?>
                </ul>
                <?php endif ?>
            </div>
        <?php endforeach;?>
        <?php unset($_SESSION['flash']); ?>
    <?php endif;?>
    <!-- //MESSAGE D'ERREURS -->

    <hr id="anchor-defil">

    <div class="admin-defil">
        <h1 class="admin-title-style">Text d'accueil</h1><br>
        <p>Le texte actuel est : <?= $textDefil->getCol('akt_admin', 'home_defil')[0];  ?></p>
        <br>
        <form action="../actions/action-defil.php" method="POST" >
        <h2 class="admin-subtitle-style">Changer le texte :</h2>
            <input class="input-title-style" name="home_defil" type="text" placeholder="Changer le texte d'accueil défilant..."><br><br>
            <button class="btn-unstyle admin-button-style" type="submit">Submit <i class="fas fa-check"></i></button>
        </form>
    </div>

    <hr id="anchor-blog">
    
    <div class="admin-blog">
        <h1 class="admin-title-style">BLOG</h1><br>
        <h2 class="admin-subtitle-style drop-down">Gérer les articles :</h2>
            <div class="panel blog-list">
                <?php foreach($blogPosts as $blogPost): ?>
                <div class="blog-list-article">
                    <div class="blog-list-date"><?= $blogPost['blog_date']; ?></div>
                    <div class="blog-list-title"><?= $blogPost['blog_title']; ?></div>
                        <div class="blog-list-delete">
                            <form action="">
                                <input type="hidden" value="<?= $blogPost['id']; ?>">
                                <button class="btn-unstyle"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <form action="../actions/action-blog.php" method="POST" enctype="multipart/form-data">
            <h2 class="admin-subtitle-style">Nouvel article :</h2>
            <input class="input-title-style" name="blog_title" type="text" placeholder="Choisir un titre pour l'article...">
            <label for="blog_date"><h4>Nous sommes le <?= $date ?> et il est <?= $heure ?></h4></label>

            <label for="blog_thumb"><h4>Choisissez une image pour illustrer l'article :</h4></label>
            <input type="file" name="blog_thumb">

            <label for="blog_corpus"><h4>Corps de l'article :</h4></label>
            <textarea name="blog_corpus" type="text" cols=70 rows=10></textarea> <br><br>
            
            <input name="blog_date" type="hidden" value="<?= $dateSQL; ?>">
            <button class="admin-button-style" type="submit">Publier l'article</button>
        </form>
    </div>

    <hr id="anchor-collection">

    <div class="admin-collection">
        <h1 class="admin-title-style">Collection</h1><br>
        <h2 class="admin-subtitle-style">Ajouter une photo à la collection :</h2>
        <form action="../actions/action-collection.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="admin_collection_upload"><br><br>
            <input  class="input-title-style" type="text" name="admin_collection_cat" placeholder="Choisir une catégorie"><br><br>
            <button class="admin-button-style"  type="submit">Ajouter une photo à la collection</button>
        </form>
        <br>
        <button class="admin-button-style admin-subtitle-style" id="show-collection-modal">Gérer la collection<i class="fas fa-images"></i></button>
    </div>
    <div class="collection-modal">
        <?php include '../components/admin-collection-modal.php'; ?>
    </div>
    <div class="fullscreen-brightness"></div>
    
    <hr id="anchor-store">
    
    <div class="admin-store">
        <h1 class="admin-title-style">Store</h1><br>
        <h2 class="admin-subtitle-style">Ajouter un objet à vendre :</h2>
        <form action="../actions/action-store.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="admin_store_upload"><br><br>
            <input  class="input-title-style" type="text" name="admin_store_cat" placeholder="Choisir une catégorie"><br><br>
            <button class="admin-button-style"  type="submit">Ajouter une photo à la collection</button>
        </form>
        <button class="admin-button-style admin-subtitle-style" id="show-collection-modal">Gérer le stock<i class="fas fa-images"></i></button>
    </div>
    
    <hr id="anchor-press">
    
    <div class="admin-press">
        <h1 class="admin-title-style">Press</h1><br>
        <h3>Gérer les critiques presse</h3>
        <p>Lister ici les critiques</p>
        <h4>Ajouter une critique : </h4>
        <form action="../actions/action-press.php" method="POST">
        <h4>Titre : </h4>
        <input name="admin_press_title" type="text">
        <h4>Critque : </h4>
        <textarea name="admin_press_content" type="text" cols=70 rows=10></textarea>
        <h4>Lien : </h4>
        <input name="admin_press_link" type="text">
        <h4>Signature :</h4>
        <input name="admin_press_signature" type="text">
        <button class="admin-button-style"  type="submit">Valider</button>
        </form>
    </div>
</div>

<script>
    CKEDITOR.replace('blog_corpus', {
        contentsCss: ['../css/news.css'],
        stylesSet: [
        {
            name: 'Subtitle',
            element: 'h2',
            styles: {
                'font-family' : 'Montserrat Thin',
                'font-weight' : '300',
                'font-size' : '1.8rem',
            }
        },
        {
            name: 'Corps de texte',
            element: 'p',
            styles: {
                'font-family' : 'Raleway Light',
                'font-weight' : '300',
                'font-size' : '1rem',
                'text-align': 'justify',
            }
        },
        {
            name:'Small',
            element: 'p', 
            styles: {
                'font-family' : 'Raleway Light',
                'font-weight' : '300',
                'font-size' : '0.8rem',
                'font-style': 'italic',
            }
        },
        {
            name:'Important',
            element: 'strong', 
            styles: {
                'font-family' : 'Raleway',
                'font-weight' : '600',
                'font-size' : '1rem',
            }
        }
        ],
    });
</script>
<script>
    $(document).ready(function(){
        $('#show-collection-modal').on('click', function(){
            $('.fullscreen-brightness').css('display', 'block');
            $('.collection-modal').fadeIn();

        });
        $('.fullscreen-brightness').on('click', function(){
            $('.fullscreen-brightness').css('display', 'none');
            $('.collection-modal').fadeOut();
        });
        $('#hide-collection-modal').on('click', function(){
            $('.fullscreen-brightness').css('display', 'none');
            $('.collection-modal').fadeOut();
        });
        $('.flash-message-dismiss').on('click', function() {
        $('.flash-message').fadeOut();
        });


        /*TEST*/
        $(document).on('submit', '#collection-modal-cat-fav', function(e) {
            $.ajax({
                type: 'post',
                url: '../actions/action-collection-fav.php',
                data: $(this).serialize(),
                success: function () {
                    $('.collection-modal').load('../components/admin-collection-modal.php');
                }
            });
            e.preventDefault();
        });
    });
</script>
<script src="../js/dropdown.js"></script>

<?php include '../components/footer.php'; ?>