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
            <p class="newsletter-content">Don't forget to subscribe to be warn of AKT Jewels news and new products</p>
        </div>
        <div class="newsletter-flash">
            <?php include '../components/newsletter-flash.php'; ?>
        </div>
        <form class="newsletter-form" method="POST" action="../actions/action-newsletter.php">
                <input type="text" name="newsletter_email" placeholder="Enter your mail">
                <button type="submit">Valider</button>
        </form>
        <a class="unsubscribe" href="./unsubscribe">Unsubscribe</a>
    </div>
</div>

<?php
include '../components/footer.php';
?>