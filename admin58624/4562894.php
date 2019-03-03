<?php include '../components/header.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<link rel="stylesheet" href="./auth.css">
<!-- MESSAGE D'ERREURS -->
    <?php if (isset($_SESSION['flash'])) : ?>
        <?php foreach ($_SESSION['flash'] as $type => $error) : ?>
            <div class="flash-message small-error-<?= $type; ?>">
                <div class="flash-message-dismiss"><i class="fas fa-times"></i></div>
                <?php if (isset($_SESSION['flash']['fail'])) : ?>
                <ul>
                    The form has errors :
                    <?php foreach ($_SESSION['flash']['fail'] as $message) : ?>
                    <li> <?= $message ?> </li>
                    <?php endforeach; ?>
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
        <?php endforeach; ?>
        <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>
    <!-- FIN MESSAGE D'ERREURS -->

<div class="auth-container">
    <form method='POST' class="auth-form" action="./auth.php">
        <input name="auth-username" class="auth-input" type="text" placeholder="Username"><br>
        <input name="auth-password" class="auth-input" type="password" placeholder="Password"><br>
        <button class="auth-button" type="submit">Connexion</button><br>
        <a class="back" href="../home">Back to the site</a>
    </form>
</div>  

<?php include '../components/footer.php'; ?>