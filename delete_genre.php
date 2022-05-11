<?php
require 'db.php';

$genre_id = $_GET['genre_id'];

// storing delete query in variable
$genre_delete = 'DELETE FROM genres WHERE genre_id=:genre_id';

// prepare the query
$genre_statement = $connection->prepare($genre_delete);

// execute the album update queries
$genre_statement->execute([':genre_id' => $genre_id]) ?  header("Location: index.php") : print("error");
