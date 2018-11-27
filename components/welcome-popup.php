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
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatem dolorem repudiandae ea aperiam molestias distinctio repellendus possimus? Dicta ipsa provident maxime aliquid, labore deserunt beatae nostrum veniam, quibusdam, eius quae!
        </div>
        <div class="newsletter-side-resp">
            Don't forget to <a href="../views/newsletter.php">subscribe.</a>
        </div>
        <div class="rgpd-buttons">
            <a class="rgpd-button">I understand</a>
            <a href="" class="rgpd-button">More informations</a>
        </div>
    </div>
    <div class="newsletter-side">
        <div class="newsletter-content">
            Pour ne rien rater des actualités d'AKT et de ses produits, abonnez vous à la <a href="../views/newsletter.php">newsletter</a>.
        </div>
        <div class="newsletter-flash">
            <?php include '../components/newsletter-flash.php'; ?>
        </div>
        <form method="POST" action="../actions/action-newsletter-home.php">
            <input type="text" name="newsletter_email" placeholder="Enter your mail">
            <button type="submit">Valider</button>
        </form>
    </div>
</div>

<script src="../js/welcome.js"></script>