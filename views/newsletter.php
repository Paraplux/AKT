<?php 
include '../components/header.php';
include '../components/navbar.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>
<link rel="stylesheet" href="../css/newsletter.css">

<div class="container">
    <div class="newsletter-page">
        <div class="newsletter-intro">
            <h1 class="newsletter-title">Subscribe</h1>
            <p class="newsletter-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio tempore ducimus neque nesciunt quidem ipsum doloribus sunt eveniet aliquam. Accusamus mollitia deleniti assumenda. Consequuntur adipisci repellat consequatur, commodi quos assumenda.
            Labore, excepturi enim architecto commodi in, pariatur libero, temporibus exercitationem velit impedit inventore repellat nisi veritatis quia nesciunt ratione dolorem blanditiis optio cumque sequi unde ipsam alias adipisci! Atque, reprehenderit!
            Mollitia dolorem at iusto, id architecto consectetur error autem! Maxime, dolores doloremque blanditiis eaque ratione ipsam culpa excepturi distinctio harum voluptatibus nisi facere quidem recusandae illo repellendus sequi enim molestiae.</p>
        </div>
        <div class="newsletter-flash">
            <?php include '../components/newsletter-flash.php'; ?>
        </div>
        <form class="newsletter-form" method="POST" action="../actions/action-newsletter.php">
                <input type="text" name="newsletter_email" placeholder="Enter your mail">
                <button type="submit">Valider</button>
        </form>
        <a class="unsubscribe" href="./unsubscribe.php">Unsubscribe</a>
    </div>
</div>