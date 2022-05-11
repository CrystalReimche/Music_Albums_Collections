<?php
require 'db.php';

$album_id = $_GET['album_id'];

// storing delete query in variable
$songs_delete = 'DELETE FROM songs WHERE album_id=:album_id';

// prepare the query
$songs_statement = $connection->prepare($songs_delete);

// storing delete query in variable
$album_delete = 'DELETE FROM albums WHERE album_id=:album_id';

// prepare the query
$album_statement = $connection->prepare($album_delete);

// execute the album update queries
if (
  $songs_statement->execute([':album_id' => $album_id]) &&
  $album_statement->execute([':album_id' => $album_id])
) {
  header("Location: index.php");
}