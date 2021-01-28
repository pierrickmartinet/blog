<?php

// Appelle du fichier contenant la fonction / $dph est utilisable car le database.php est appellé dans l'index (frontController)

require 'app/persistences/blogPostData.php';

// Fonction qui affiche les 10 derniers post de la BDD blog

$tenLastPost = lastBlogPosts($dbh);

// Affiche la view (template) home

require 'ressources/views/home.tpl.php';