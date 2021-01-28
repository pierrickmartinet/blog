<?php

// Fonction qui retourne les 10 derniers posts de la BDD 'blog'

function lastBlogPosts (PDO $bdh) {
   $resultatRequete = $bdh->query('SELECT title, text, pseudo, DATE_FORMAT(`publication_date`,"%d/%m/%Y"),DATE_FORMAT(`end_publication_date`,"%d/%m/%Y")
FROM posts
INNER JOIN `authors` ON `posts`.`authors_id` = `authors`.`id`
ORDER BY `publication_date` DESC 
LIMIT 10');
    $resultatfonction = $resultatRequete->fetchAll(\PDO::FETCH_ASSOC);
    return $resultatfonction;
}
