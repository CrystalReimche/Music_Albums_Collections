<?php
require 'db.php';

$song_id = $_GET['song_id'];
$album_id = $_GET['album_id'];

// storing delete query in variable
$song_delete = 'DELETE FROM songs WHERE song_id=:song_id';

// prepare the query
$song_statement = $connection->prepare($song_delete);

// execute the album update queries
$song_statement->execute([':song_id' => $song_id]) ?  header("Location: index.php") : print("error");

header('Location: view_album.php?album_id=' . $album_id);