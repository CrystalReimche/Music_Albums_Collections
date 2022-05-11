<?php
require 'db.php';

$artist_id = $_GET['artist_id'];

// storing delete query in variable
$artist_delete = 'DELETE FROM artists WHERE artist_id=:artist_id';

// prepare the query
$artist_statement = $connection->prepare($artist_delete);

// execute the album update queries
$artist_statement->execute([':artist_id' => $artist_id]) ?  header("Location: all_artist.php") : print("error");