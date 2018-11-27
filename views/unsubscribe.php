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
            <h1 class="newsletter-title">Unsubscribe</h1>
            <p class="newsletter-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio tempore ducimus neque nesciunt quidem ipsum doloribus sunt eveniet aliquam. Accusamus mollitia deleniti assumenda.</p>
        </div>
        <div class="newsletter-flash">
            <?php include '../components/newsletter-flash.php'; ?>
        </div>
        <form class="newsletter-form" method="POST" action="../actions/action-unsubscribe.php">
                <input type="text" name="newsletter_email" placeholder="Enter your mail">
                <button type="submit">Valider</button>
        </form>
    </div>
</div>