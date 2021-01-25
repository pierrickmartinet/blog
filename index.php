<?php

//test

echo "hello world yeah";

// fonction filtre de nettoyage URL

$pagefiltre = filter_input (INPUT_GET, 'action' ,FILTER_SANITIZE_STRING);


// front controller

if (isset ($pagefiltre)) {
    if ($pagefiltre == 'cv') {
        require 'action/cv.php';
    } else if ($pagefiltre == 'hobbie') {
        require 'action/hobbie.php';
    } else if ($pagefiltre == 'contact') {
        require 'action/contact.php';
    } else {
        require 'action/404.php';
    }
} else {
    require 'action/cv.php';
}
?>