<?php 
include './logged-only.php';

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

admin();
?>

<?php  

include '../components/header.php';
include '../components/navbar-reverse.php';
include '../controllers/controller-admin.php';

date_default_timezone_set('Europe/Paris');
$dateSQL = date('Y-m-d');
$date = date("d-m-Y");
$heure = date("H:i");

/*CALLING CONTROLLER*/
?>

<link rel="stylesheet" href="../css/drop-down.css">
<link rel="stylesheet" href="../css/admin.css">
<link rel="stylesheet" href="../css/navbar-reverse.css">
<script src="//cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script>



<div class="container"><br><hr>

    <!-- QUICK NAVIGATION BAR -->
    <h1 class="admin-title-style">Administration Page</h1><hr><br>
    <nav class="admin-nav">
        <a href="#anchor-defil">Home Message</a>
        <a href="#anchor-blog">Blog</a>
        <a href="#anchor-collection">Collection</a>
        <a href="#anchor-store">Store</a>
        <a href="#anchor-press">Press</a>
        <a href="./logout.php">Logout</a>
    </nav>


    <!-- MESSAGE D'ERREURS -->
    <?php if(isset($_SESSION['flash'])): ?>
        <?php foreach($_SESSION['flash'] as $type => $error): ?>
            <div class="flash-message small-error-<?= $type; ?>">
                <div class="flash-message-dismiss"><i class="fas fa-times"></i></div>
                <?php if(isset($_SESSION['flash']['fail'])) : ?>
                <ul>
                    The form has errors :
                    <?php foreach ($_SESSION['flash']['fail'] as $message) : ?>
                    <li> <?= $message ?> </li>
                    <?php endforeach;?>
                </ul>
                <?php endif ?>
                <?php if (isset($_SESSION['flash']['success'])) : ?>
                <ul>
                    Perfect !
                    <?php foreach ($_SESSION['flash']['success'] as $message) : ?>
                    <li> <?= $message ?> </li>
                    <?php endforeach; ?>
                </ul>
                <?php endif ?>
            </div>
        <?php endforeach;?>
        <?php unset($_SESSION['flash']); ?>
    <?php endif;?>
    <!-- FIN MESSAGE D'ERREURS -->




    <!-- TEXT ACCUEIL -->
    <hr id="anchor-defil">
    <div class="admin-defil">
        <h1 class="admin-title-style">Home message</h1><br>
        <p>The actual home message is : <?= $homeData; ?></p>
        <br>
        <form action="../actions/action-defil.php" method="POST" >
        <h2 class="admin-subtitle-style">Change the message :</h2>
            <input class="input-title-style" name="home_defil" type="text" placeholder="Type your message here..."><br><br>
            <button class="btn-unstyle admin-button-style" type="submit">Submit <i class="fas fa-check"></i></button>
        </form>
    </div>




    <!-- BLOG -->
    <hr id="anchor-blog">
    <div class="admin-blog">
        <h1 class="admin-title-style">BLOG</h1><br>
            <form action="../actions/action-blog-add.php" method="POST" enctype="multipart/form-data">
            <h2 class="admin-subtitle-style">Add a new article :</h2>
            <input class="input-title-style" name="blog_title" type="text" placeholder="Choose a title..."><br>
            <h2 class="admin-subtitle-style">Today is <?= $date ?> and it's <?= $heure ?></h2><br>

            <label for="blog_thumb"><h2 class="admin-subtitle-style">Choose the thumb of the current article :</h2></label>
            <input class="input-title-style" type="file" name="blog_thumb"><br><br>

            <label for="blog_corpus"><h2 class="admin-subtitle-style">Article body :</h2></label>
            <textarea name="blog_corpus" type="text" cols=70 rows=10></textarea> <br><br>
            
            <input name="blog_date" type="hidden" value="<?= $dateSQL; ?>">
            <button class="admin-button-style" type="submit">Submit <i class="fas fa-check"></i></button>
        </form>
        <h2 class="admin-subtitle-style drop-down">Articles management :</h2>
        <div class="panel blog-list">
            <div class="store-list-article">
                <div class="blog-list-date">DATE</div>
                <div class="blog-list-title">TITLE</div>
                <div class="blog-list-delete">DELETE</div>
            </div>
            <?php foreach ($blogDatas as $blogData) : ?>
            <div class="blog-list-article">
                <div class="blog-list-date"><?= $blogData['blog_date']; ?></div>
                <div class="blog-list-title"><?= $blogData['blog_title']; ?></div>
                <div class="blog-list-delete">
                    <form action="../actions/action-blog-delete.php" method="POST" onsubmit="if(confirm('Do you really want to delete this article ?')){return true;}else{return false;}">
                        <input type="hidden" name="blog-id-delete" value="<?= $blogData['id']; ?>">
                        <button class="btn-unstyle"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>




    <!-- COLLECTION -->
    <hr id="anchor-collection">
    <div class="admin-collection">
        <h1 class="admin-title-style">Collection</h1><br>
        <h2 class="admin-subtitle-style">Add a new photo to the collection :</h2><br><br>
        <p><i class="fas fa-exclamation-circle"></i> The photo will be resize and cut in 4 formats : 75x75 / 500x500 / 400px wide and 1000px wide (the last two preserve the ratio).</p>
        <form action="../actions/action-collection.php" method="POST" enctype="multipart/form-data">
            <div class="form-grouped">
                <div>
                    <input class="input-title-style" type="file" name="admin_collection_upload">
                </div>
                <div>
                    <p><i class="fas fa-exclamation-circle"></i> You can create as many category as you wish but be careful, you need to remember them!</p>
                    <input class="input-title-style" type="text" name="admin_collection_cat" placeholder="Choose a category">
                </div>
            </div><br><br>
            <button class="admin-button-style"  type="submit">Submit <i class="fas fa-check"></i></button>
        </form>
        <br>
        <button class="admin-button-style admin-subtitle-style" id="show-collection-modal">Collection management<i class="fas fa-images"></i></button>
    </div>
    <div class="collection-modal">
        <?php include '../components/admin-collection-modal.php'; ?>
    </div>
    <div class="fullscreen-brightness"></div>




    <!-- STORE -->
    <hr id="anchor-store">
    <div class="admin-store">
        <h1 class="admin-title-style">Store</h1><br>
        <h2 class="admin-subtitle-style">Add a new article to sell :</h2><br><br>
        <form action="../actions/action-store.php" method="POST" enctype="multipart/form-data">
            <div class="form-grouped">
                <div>
                    <input name="admin_store_name" type="text" class="input-title-style" placeholder="Choisir un nom">
                </div>
                <div>
                    <input name="admin_store_prix" type="text" class="input-title-style" placeholder="A quel prix sera vendu l'objet ?">
                </div>
            </div><br><br>
            <div class="form-grouped">
                <div>
                    <h2 class="admin-subtitle-style">Article description :</h2>
                    <textarea name="admin_store_description" type="text" class="input-title-style-textarea" placeholder="Type a description..." col=70 rows=10></textarea><br><br>
                </div>
                <div>
                    <h2 class="admin-subtitle-style">Article thumb :</h2>
                    <input class="input-title-style" name="admin_store_upload_1" type="file"><br><br>
                    <input class="input-title-style" name="admin_store_upload_2" type="file"><br><br>
                    <input class="input-title-style" name="admin_store_upload_3" type="file"><br><br>
                </div>
            </div>
            <div class="form-grouped">
                <div>
                    <input name="admin_store_color" type="text" class="input-title-style" placeholder="Type here the color or material">
                </div>
                <div>
                    <select class="input-title-style" name="admin_store_cat">
                        <option value="">--Choose a category--</option>

                        <?php foreach($storeCatDatas as $cat) : ?>
                        <option value="<?= $cat['name'] ?>|<?= $cat['name_format']?>|<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div><br><br>
                <label class="stock-label" for="admin_store_stock">Default : <span>100</span></label><br>
                <input  name="admin_store_stock" type="text" class="input-title-style stock-input" value="100"><br><br>
            <button class="admin-button-style"  type="submit">Submit <i class="fas fa-check"></i></button>
        </form><br> <hr>
        <h2 class="admin-subtitle-style">Create a clone of an existing article with a different color or material :</h2><br><br>
        <form action="../actions/action-store-variation.php" method='POST'>
            <div class="form-grouped">
                <div>
                    <select class="input-title-style" name="admin_store_clone">
                    <option value="">--Choose the article to clone--</option>
                    
                    <?php foreach ($variationDatas as $variationData) : ?>
                    <option value="<?= $variationData['id'] ?>"><?= $variationData['name'] ?></option>
                    <?php endforeach; ?>
                </select>
                </div>
            <div>
                <input type="text" name="admin_store_variation" class="input-title-style" placeholder="What color or material ?">
            </div>
            </div><br><br>
            <label class="stock-label" for="admin_store_variation_stock">Default : <span>100</span></label><br>
                <input name="admin_store_variation_stock" type="text" class="input-title-style stock-input" value="100"><br><br>
            <button class="admin-button-style" type="submit">Dupliquer <i class="far fa-clone"></i></button>
        </form>
        <br>
        <h2 class="admin-subtitle-style drop-down">Store management :</h2>
        <div class="panel store-list">
            <div class="store-list-article">
                <div class="store-list-name">NAME</div>
                <div class="store-list-prix">PRICE</div>
                <div class="store-list-stock">STOCK</div>
                <div class="store-list-delete">DELETE</div>
            </div>
            <?php foreach ($storeDatas as $storeData) : ?>
            <div class="store-list-article">
                <div class="store-list-name"><?= $storeData['name']; ?>(<?= $storeData['color']?>)</div>
                <div class="store-list-prix">
                    <form method="POST" action="../actions/action-store-change-price.php">
                        <input type="hidden" name="change-price-id" value="<?= $storeData['id'];?>">
                        <input class="input-title-style" type="text" name="change-price-value" placeholder="<?= $storeData['prix'];?>">
                        <button class="admin-button-style">Change</button>
                    </form>
                </div>
                <div class="store-list-stock">
                    <form method="POST" action="../actions/action-store-change-stock.php">
                        <input type="hidden" name="change-stock-id" value="<?= $storeData['id']; ?>">
                        <input class="input-title-style" type="text" name="change-stock-value" placeholder="<?= $storeData['qty']; ?>">
                        <button class="admin-button-style">Change</button>
                    </form>
                </div>
                <div class="store-list-delete">
                    <form action="../actions/action-store-delete.php" method="POST" onsubmit="if(confirm('Do you really want to delete this article ?')){return true;}else{return false;}">
                        <input type="hidden" name="store-id-delete" value="<?= $storeData['id']; ?>">
                        <button class="btn-unstyle"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    



    <!-- PRESS -->
    <hr id="anchor-press">
    <div class="admin-press">
        <h1 class="admin-title-style">Press</h1><br>
        <h2 class="admin-subtitle-style">Add a press review :</h2><br><br>
        <form action="../actions/action-press.php" method="POST">

        <div class="form-grouped">
            <div>
                <input name="admin_press_title" type="text" class="input-title-style" placeholder="Title of the review">
            </div>
            <div>
                <input name="admin_press_signature" type="text" class="input-title-style"  placeholder="Who made the review ? (newspaper, website, etc)">
            </div>
        </div><br><br>
        <textarea name="admin_press_content" type="text" cols=70 rows=10 class="input-title-style-textarea" placeholder="Review body"></textarea><br><br>
        <input name="admin_press_link" type="text" class="input-title-style" placeholder="Link to the full review"><br><br>
        <button class="admin-button-style"  type="submit">Submit <i class="fas fa-check"></i></button>
        </form><br><br>
        <h2 class="admin-subtitle-style drop-down">Reviews management :</h2>
            <div class="panel press-list">
                <div class="store-list-article">
                    <div class="press-list-signature">FORM</div>
                    <div class="press-list-title">TITLE</div>
                    <div class="press-list-delete">DELETE</div>
                </div>
                <?php foreach ($pressDatas as $pressData) : ?>
                <div class="press-list-article">
                    <div class="press-list-signature"><?= $pressData['press_signature']; ?></div>
                    <div class="press-list-title"><?= $pressData['press_title']; ?></div>
                    <div class="press-list-delete">
                        <form action="../actions/action-press-delete.php" method="POST" onsubmit="if(confirm('Do you really want to delete this review ?')){return true;}else{return false;}">
                            <input type="hidden" name="press-id-delete" value="<?= $pressData['id']; ?>">
                            <button class="btn-unstyle"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
    </div>


    <!-- LOGS -->
    <hr>
    <div class="admin-logs">
        <h1 class="admin-title-style">Change Password</h1><br>
        <form action="./change-logs.php" method="POST">

        <div class="form-grouped">
            <div>
                <input name="new-username" type="text" class="input-title-style" placeholder="New Username">
            </div>
            <div>
                <input name="new-password" type="password" class="input-title-style"  placeholder="New password">
            </div>
        </div><br><br>
        <button class="admin-button-style"  type="submit">Submit <i class="fas fa-check"></i></button>
        </form><br><br>
    </div>
    <!-- FIN de la page admin -->
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
            $('#display-resp-nav-sidebar').css('display', 'none');
            $('.collection-modal').fadeIn();
            
        });
        $('.fullscreen-brightness').on('click', function(){
            $('.fullscreen-brightness').css('display', 'none');
            $('#display-resp-nav-sidebar').css('display', 'block');
            $('.collection-modal').fadeOut();
        });
        $('#hide-collection-modal').on('click', function(){
            $('.fullscreen-brightness').css('display', 'none');
            $('#display-resp-nav-sidebar').css('display', 'block');
            $('.collection-modal').fadeOut();
        });
        $('.flash-message-dismiss').on('click', function() {
        $('.flash-message').fadeOut();
        });


        
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
        $(document).on('submit', '#collection-modal-cat-trash', function(e) {
            if(confirm('Voulez vous vraiment supprimer cette photo de votre collection ?')){
                $.ajax({
                    type: 'post',
                    url: '../actions/action-collection-delete.php',
                    data: $(this).serialize(),
                    success: function () {
                        $('.collection-modal').load('../components/admin-collection-modal.php');
                    }
                });
            } else {
                return false;
            }
            e.preventDefault();
        });
    });
</script>
<script src="../js/dropdown.js"></script>

<?php include '../components/footer.php'; ?>