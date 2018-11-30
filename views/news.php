<?php
include '../components/header.php';
include '../components/navbar.php';
include '../controllers/controller-news.php';

$p = $_GET['page'] - 1;
?>
<link rel="stylesheet" href="../css/news.css">
<link rel="stylesheet" href="../css/drop-down.css">

<div class="container">
    <?php 
    if(!empty($blogDatas)): ?>
    <div class="news-page">
        <section class="blog-section">
            <article class="main-blog">
                <h1 class="main-blog-title"><?= $blogDatas[$p]['blog_title'] ;?></h1>
                <div class="main-blog-date"><?= $blogDatas[$p]['blog_date']; ?></div><br>
                <img class="main-blog-thumb" src="<?= $blogDatas[$p]['blog_thumb']; ?>" alt="">
                <div class="main-blog-content">
                    <?= $blogDatas[$p]['blog_corpus']; ?>
                </div>
            </article>

            <!-- Accordion -->
            <?php if($_GET['page'] != 1): ?>
            <br><hr><br><br>
            <h3>Jetez un oeil à notre dernier article :</h3>
            <button class="drop-down"><?= $blogDatas[0]['blog_title']; ?></button>
            <div class="panel">
                <p><?= substr(strip_tags($blogDatas[0]['blog_corpus']), 0, 500); ?> . . .</p>
                <a href="../views/news?page=1">Lire la suite . . .</a>
            </div>
            <?php endif; ?>
            <br><hr>
            <h3>Articles précédents :</h3>
            <?php $articleQty = count($blogDatas); ?>
            <?php for($i = 1; $i < 4; $i++) : 
            ?>
            <button class="drop-down"><?= $blogDatas[$i]['blog_title']; ?></button>
            <div class="panel">
                <p><?= substr(strip_tags($blogDatas[$i]['blog_corpus']), 0, 500); ?></p>
                <a href="../views/news?page=<?= $i + 1 ?>">Lire la suite . . .</a>
            </div>
            <?php endfor; ?>

        <div class="pagination">
            <?php for($i=0; $i < count($blogDatas); $i++) : ?>
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
            <?php foreach($pressDatas as $pressData): ?>
            <article class="press-article">
                <h3 class="press-title"><?= $pressData['press_title']; ?></h3>
                <p class="press-content"><?= $pressData['press_corpus']; ?></p>
                <p class="press-link"><a href="<?= $pressData['press_link']; ?>">En savoir plus. . .</a></p>
                <h4 class="press-signature"> - <?= $pressData['press_signature']; ?></h4>
            </article>
            <?php endforeach; ?>
        </section>
    
    </div>
            <?php endif;?>
</div>

<script src="../js/dropdown.js"></script>

<?php include '../components/footer.php'; ?>