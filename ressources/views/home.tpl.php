<!-- Appelle du Header -->
<?php require 'layouts/header.tpl.php'; ?>

<h1>Articles</h1>

<!-- Si il n'y a pas d'article -->
<?php if (empty($tenLastPost)): ?>
    <p>Il n'y a pas d'articles"</p>

    <!-- Sinon s'il n'y a des articles -->
<?php else: ?>

    <?php $index = 0; ?>

    <!-- Avec un while -->
    <!-- Tant que la longueur du tableau $tenLastPost est supèrieur à l'index (donc qu'il y a des articles) -->
    <?php while (count($tenLastPost) > $index): ?>
        <!-- Traitement de l'affichage des articles via l'index qui parcours le tableau-->
        <div>
            <h2><?= $tenLastPost[$index]['title'] ?></h2>
            <p>Article publié du <?= $tenLastPost [$index]['DATE_FORMAT(`publication_date`,"%d/%m/%Y")'] ?>
                au <?= $tenLastPost [$index]['DATE_FORMAT(`end_publication_date`,"%d/%m/%Y")'] ?></p>
            <p><?= $tenLastPost [$index]['text'] ?></p>
            <p><?= $tenLastPost [$index]['pseudo'] ?></p>
        </div>
        <!-- Équivaut à $index = $index +1 -->
        <?php $index++ ?>
    <?php endwhile; ?>

<!-- Avec un foreach -->
    <?php foreach ($tenLastPost as $value): ?>
        <!-- Traitement de l'affichage des articles, $Value parcours le tableau-->
        <div>
            <h2><?= $value['title'] ?></h2>
            <p>Article publié du <?= $value['DATE_FORMAT(`publication_date`,"%d/%m/%Y")'] ?>
                au <?= $value['DATE_FORMAT(`end_publication_date`,"%d/%m/%Y")'] ?></p>
            <p><?= $value['text'] ?></p>
            <p><?= $value['pseudo'] ?></p>
        </div>

    <?php endforeach; ?>

<?php endif; ?>

<!-- Appelle du Footer -->
<?php require 'layouts/footer.tpl.php' ; ?>
