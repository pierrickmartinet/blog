<?php

// Fonction page home.tpl

// Fonction qui retourne les 10 derniers posts de la BDD 'blog'
function lastBlogPosts(PDO $dbh)
{
    $resultatRequete = $dbh->query('SELECT title, text, pseudo, DATE_FORMAT(`publication_date`,"%d/%m/%Y"),DATE_FORMAT(`end_publication_date`,"%d/%m/%Y")
FROM posts
INNER JOIN `authors` ON `posts`.`authors_id` = `authors`.`id`
ORDER BY `publication_date` DESC 
LIMIT 10');
    $resultatfonction = $resultatRequete->fetchAll(\PDO::FETCH_ASSOC);
    return $resultatfonction;
}

// Fonction page blogPost.tpl

// Fonction qui prend en entrée le numéro de l'article et retourne l'article avec l'auteur
function blogPostById(PDO $dbh, $idArticle)
{
    $statement = $dbh->query("SELECT posts.id , title, text, pseudo
    FROM posts
    INNER JOIN authors ON posts.authors_id = authors.id
    WHERE posts.id = $idArticle");
    $result = $statement->fetch(\PDO::FETCH_ASSOC);
    return $result;
}

// Fonction qui prend en entrée le numéro de l'article et retourne les commentaires de l'article avec l'auteur
function commentsByBlogPost(PDO $dbh, $idArticle)
{
    $statement = $dbh->query("select `comments`.`text`, `pseudo`
from comments
inner join authors on comments.authors_id = authors.id
where posts_id = $idArticle");
    $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
    return $result;
}

//Fonction de création de post qui prend en entrée les champs nécessaires à la création d'un article
// (title, text, publication_date, end_publication_date, degrees_importance, authors_id)
function blogPostCreate (){

}
