<?php
require 'header.tpl.php';

$tenLastPost = lastBlogPosts($dbh);
var_dump($tenLastPost);

require 'footer.tpl.php';
