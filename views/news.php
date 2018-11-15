<?php
include '../components/header.php';
include '../components/navbar.php';

/*CALLING CONTROLLER*/
include '../components/controller.php';
$BlogArticlesRequest = new GetterRequest;
$PressArticlesRequest = new GetterRequest;
$p = $_GET['page'] - 1;
?>
<link rel="stylesheet" href="../css/news.css">

<div class="container">
    <div class="news-page">
        <section class="blog-section">
            <article class="main-blog">
                <h1 class="main-blog-title"><?= $BlogArticlesRequest->getCol('akt_blog', 'blog_title')[$p]; ?></h1>
                <div class="main-blog-date"><?= $BlogArticlesRequest->getCol('akt_blog', 'blog_date')[$p]; ?></div><br>
                <img class="main-blog-thumb" src="<?= $BlogArticlesRequest->getCol('akt_blog', 'blog_thumb')[$p]; ?>" alt="">
                <div class="main-blog-content">
                    <?= $BlogArticlesRequest->getCol('akt_blog', 'blog_corpus')[$p]; ?>
                </div>
            </article>

            <!-- Accordion -->
            <?php if($_GET['page'] != 1): ?>
            <br><hr><br><br>
            <h3>Jetez un oeil à notre dernier article :</h3>
            <button class="old-blog-title"><?= $BlogArticlesRequest->getCol('akt_blog', 'blog_title')[0]; ?></button>
            <div class="panel">
                <p><?= substr(strip_tags($BlogArticlesRequest->getCol('akt_blog', 'blog_corpus')[0]), 0, 500); ?> . . .</p>
                <a href="../views/news.php?page=1">Lire la suite . . .</a>
            </div>
            <?php endif; ?>
            <br><hr>
            <h3>Articles précédents :</h3>
            <?php $articleQty = count($BlogArticlesRequest->getCol('akt_blog', 'blog_title')); ?>
            <?php for($i = 1; $i < 4; $i++) : 
            ?>
            <button class="old-blog-title"><?= $BlogArticlesRequest->getCol('akt_blog', 'blog_title')[$i]; ?></button>
            <div class="panel">
                <p><?= substr(strip_tags($BlogArticlesRequest->getCol('akt_blog', 'blog_corpus')[$i]), 0, 500); ?></p>
                <a href="../views/news.php?page=<?= $i + 1 ?>">Lire la suite . . .</a>
            </div>
            <?php endfor; ?>

        <div class="pagination">
            <?php for($i=0; $i < count($BlogArticlesRequest->getAll('akt_blog')); $i++) : ?>
                <form action="" method="GET">
                    <input name="page" type="hidden" value="<?= $i+1 ?>">
                    <button class="pagination-link"><?= $i+1; ?></button>
                </form>
            <?php endfor; ?>
        </div>
        </section>

        <?php 
        ?>
        <section class="press-section">
            <?php foreach($PressArticlesRequest->getAll('akt_press') as $pressArticle): ?>
            <article class="press-article">
                <h3 class="press-title"><?= $pressArticle['press_title']; ?></h3>
                <p class="press-content"><?= $pressArticle['press_corpus']; ?></p>
                <p class="press-link"><a href="<?= $pressArticle['press_link']; ?>">En savoir plus. . .</a></p>
                <h4 class="press-signature"> - <?= $pressArticle['press_signature']; ?></h4>
            </article>
            <?php endforeach; ?>
        </section>
    
    </div>
</div>

<script src="../js/news.js"></script>

<?php include '../components/footer.php'; ?>