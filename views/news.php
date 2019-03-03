<?php
include '../components/header.php';
include '../components/navbar.php';
include '../controllers/controller-news.php';

if(isset($_GET['page'])) {
    $_GET['page'] = intval($_GET['page']);
} else {
    header('Location: ../404');
}

if ($_GET['page'] <= 0) {
    header('Location: ../404');
} else if ($_GET['page'] > 0) {
    $p = $_GET['page'] - 1 ;
} else {
    header('Location: ../404');
}

if ($p >= count($blogDatas)) {
    header('Location: ../404');
}

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
            <?php if(isset($_GET['page']) && $_GET['page'] != 1): ?>
            <br><hr><br><br>
            <h3 class="press-title">Check our last post :</h3>
            <button class="drop-down"><?= $blogDatas[0]['blog_title']; ?></button>
            <div class="panel">
                <p><?= substr(strip_tags($blogDatas[0]['blog_corpus']), 0, 500); ?> . . .</p>
                <a href="../news?page=1">Lire la suite . . .</a>
            </div>
            <?php endif; ?>
            <br><hr>
            <h3 class="press-title">Old articles :</h3>
            <?php $articleQty = count($blogDatas);
            if($articleQty < 4) {
                $k = $articleQty;
            } else {
                $k = 4;
            }
            ?>
            <?php for($i = 1; $i < $k; $i++) : 
            ?>
            <button class="drop-down"><?= $blogDatas[$i]['blog_title']; ?></button>
            <div class="panel">
                <p><?= substr(strip_tags($blogDatas[$i]['blog_corpus']), 0, 500); ?></p>
                <a href="../news?page=<?= $i + 1 ?>">Read more . . .</a>
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

         <?php endif; ?>

        <?php if(!empty($pressDatas)) : ?>
        <section class="press-section">
            <?php foreach($pressDatas as $pressData): ?>
            <article class="press-article">
                <h3 class="press-title"><?= $pressData['press_title']; ?></h3>
                <p class="press-content"><?= $pressData['press_corpus']; ?></p>
                <p class="press-link"><a target="_blank" href="<?= $pressData['press_link']; ?>">Read more. . .</a></p>
                <h4 class="press-signature"> - <?= $pressData['press_signature']; ?></h4>
            </article>
            <?php endforeach; ?>
        </section>
        <?php endif; ?>
            
    </div>
           
</div>

<script src="../js/dropdown.js"></script>

<?php include '../components/footer.php'; ?>