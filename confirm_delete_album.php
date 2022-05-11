<?php



require 'db.php';

// grabbing the id of the album that was selected to be edited
$album_id = $_GET['album_id'];

$view_album_info = 'SELECT *  FROM albums WHERE album_id = :album_id';

// prepare the query
$view_album_statement = $connection->prepare($view_album_info);

// execute the query
$view_album_statement->execute([':album_id' => $album_id]);

// fetch Object data from database
$view_album = $view_album_statement->fetch(PDO::FETCH_OBJ);

// echo '<pre>' . print_r($view_album, true) . '</pre>';

$song_info = 'SELECT * FROM songs
                    JOIN albums ON songs.album_id = albums.album_id 
                    JOIN artists ON albums.artist_id = artists.artist_id 
                        WHERE albums.album_id = :album_id';




// prepare the query
$statement = $connection->prepare($song_info);

// execute the query
$statement->execute([':album_id' => $album_id]);

// fetch Object data from database
$song = $statement->fetchAll(PDO::FETCH_OBJ);

// echo '<pre>' . print_r($song, true) . '</pre>';


?>


<?php require 'header.php'; ?>

<div class="container mt-5" style=width:500px;>
    <div class="row">
        <div class="card mt-3">
            <div class="card-header">

                <h4 class="text-center">WARNING</h4>

            </div>
            <div class="card-body">

                <h5>You are about to delete the album <?php echo $view_album->{'album_name'}; ?></h5>
                <p>It will also delete the following songs</p>

                </p>

                <!-- grabs each record in result set from database -->
                <?php foreach ($song as $info) : ?>

                <ul>
                    <li><?= $info->song_name; ?></li>

                </ul>
                <?php endforeach; ?>


                <hr>
                <div class="text-center">
                    <a href="index.php" class="btn mr-5 btn-color">Cancel</a>
                    <a href="delete_album.php?album_id=<?= $view_album->{'album_id'}; ?>"
                        class="btn ml-5 btn-color">Delete</a>
                </div>





            </div>
        </div>
    </div>








    <?php require 'footer.php'; ?>