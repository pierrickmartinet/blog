<?php

require 'app/persistences/blogPostData.php';

// Affiche les 10 derniers post de la BDD blog

$tenLastPost = lastBlogPosts($dbh);
var_dump($tenLastPost);