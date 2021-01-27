<?php

// connexion à la BDD 'Blog'

try {
    $user = 'pierrick';
    $pass = 'lacolombe02';
    $dbh = new PDO('mysql:host=localhost;dbname=Blog;charset=UTF8', $user, $pass);
} catch (PDOException $e) {
echo "Erreur !: " . $e -> getMessage() ;
die();
}
