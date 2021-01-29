<?php

// Affiche les erreurs

error_reporting(E_ALL);
ini_set("display_errors", 1);

// Rend le debug plus presentable

function debug($var) {
    highlight_string("<?php\n" . var_export($var, true) . ";\n?>");
}

// connecte à la BDD 'Blog' grâce à la configuration intégré dans le fichier database.php / once puisqu'on l'appelle une seule fois

require_once 'config/database.php';

// front controller sous forme de tableau

$map = [
    'home' => 'app/controllers/homeController.php',
    'blogpost' => 'app/controllers/blogPostController.php',
    '404' => 'ressources/views/errors/404.php',
];

if (filter_has_var(INPUT_GET, 'action')) { // lit si il y a une valeur aprés action dns l'url
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING); // filtre l'url
    if (!isset($map [$action])) { // Si Map n'est pas égale à une des pages du tableau alors 404
        $action = '404';
    }
} else { // sinon page accueil
    $action = 'home';
}

// fichier prend la valeur de la page du tableau correspondant à la page inscrite dans l'url aprés action

$fichier = $map [$action];

// Affiche la page

require $fichier;