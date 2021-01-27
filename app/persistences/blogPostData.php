<?php

// Fonction qui retourne les 10 derniers posts de la BDD 'blog'

function lastBlogPosts (PDO $bdh) {
    return $bdh->query('SELECT title, text, pseudo, DATE_FORMAT(`publication_date`,"%d/%m/%Y"),DATE_FORMAT(`end_publication_date`,"%d/%m/%Y")
FROM posts
INNER JOIN `authors` ON `posts`.`authors_id` = `authors`.`id`
LIMIT 10');
}

