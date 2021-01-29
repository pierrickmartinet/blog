<?php require 'layouts/header.tpl.php'; ?>

<!-- Affichage de l'article -->
<h1>Articles n° <?= $onePost['id'] ?></h1>
<h2><?= $onePost['title'] ?></h2>
<p><?= $onePost['text'] ?></p>
<P><?= $onePost ['pseudo'] ?></P>

<!-- Traitement de l'affichage des commentaires -->
<?php if (isset($commentsPost)): ?>
    <h2>Commentaires article n° <?= $onePost['id'] ?></h2>
    <?php foreach ($commentsPost as $value): ?>
        <div>
            <p><?= $value['text'] ?></p>
            <p>commentaire écrit par "<?= $value['pseudo'] ?>"</p>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>Il n'y a pas de commentaires sur cet article</p>
<?php endif ?>

<?php require 'layouts/footer.tpl.php'; ?>
