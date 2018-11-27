<?php if (isset($_SESSION['flash'])) : ?>
    <?php foreach ($_SESSION['flash'] as $type => $error) : ?>
        <?php if (isset($_SESSION['flash']['fail'])) : ?>
            <?php foreach ($_SESSION['flash']['fail'] as $message) : ?>
                <?= $message ?>
            <?php endforeach; ?>
            <?php endif ?>
            <?php if (isset($_SESSION['flash']['success'])) : ?>
                <?php foreach ($_SESSION['flash']['success'] as $message) : ?>
                <?= $message ?>
                <?php endforeach; ?>
            <?php endif ?>
    <?php endforeach; ?>
    <?php unset($_SESSION['flash']); ?>
<?php endif; ?>