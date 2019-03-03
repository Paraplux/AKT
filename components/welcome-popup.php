<link rel="stylesheet" href="../css/welcome-popup.css">
<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<div class="welcome-popup">
    <div class="dismiss"><i class="fas fa-times"></i></div>
    <div class="rgpd-side">
        <div class="rgpd-content">
            By clickling the "I understand" button, you're accepting that Akt Jewels will keep some non-personnal informations to make your navigation easier.
        </div>
        <div class="newsletter-side-resp">
            Don't forget to <a href="../newsletter">subscribe.</a>
        </div>
        <div class="rgpd-buttons">
            <a class="rgpd-button">I understand</a>
            <a href="../contact" class="rgpd-button">More informations</a>
        </div>
    </div>
    <div class="newsletter-side">
        <div class="newsletter-content">
            Subscribe to our <a href="../newsletter">newsletter</a>.
        </div>
        <div class="newsletter-flash">
            <?php include '../components/newsletter-flash.php'; ?>
        </div>
        <form method="POST" action="../actions/action-newsletter-home.php">
            <input type="text" name="newsletter_email" placeholder="Enter your mail">
            <button type="submit">Validate</button>
        </form>
    </div>
</div>

<script src="../js/welcome.js"></script>