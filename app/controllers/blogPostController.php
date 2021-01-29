<?php // Controller de la page blogPost

// Pour rendre les fontions stockés dans blogPostData.php disponibles depuis le blogPostController
require 'app/persistences/blogPostData.php';

// Récupère le tableau de l'article demandé dans l'URL (“index.php?action=blogpost&id=2” l'article n°2 dans cet exemple)
$onePost = blogPostById($dbh, filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING));

// Récupère le tableau des commentaires de l'article demandé dans l'URL
$commentsPost = commentsByBlogPost($dbh, filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING));

// Si l'id saisi ne correspond pas à un l'id d'un article de la BDD 'erreur', sinon la template de l'article demandé s'affiche
if ($onePost == false){
    echo "Aucun article ne correspond à ce numéro";
} else {
    require 'ressources/views/blogPost.tpl.php';
}
