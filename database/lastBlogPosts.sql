// Sauvegarde de la requête retournant les dix derniers articles de la BDD Blog

SELECT `title`, `text`, DATE_FORMAT(`publication_date`,"%d/%m/%Y"),DATE_FORMAT(`end_publication_date`,"%d/%m/%Y") , `pseudo`
FROM `posts`
INNER JOIN `authors` ON `posts`.`authors_id` = `authors`.`id`
ORDER BY publication_date DESC
LIMIT 10



