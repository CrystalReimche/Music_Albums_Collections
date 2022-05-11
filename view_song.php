<?php


require 'db.php';

// grabbing the id of the song that was selected to be edited
$song_id = $_GET['song_id'];

$song_info = 'SELECT songs.album_id, song_id, song_name, stage_name, album_name, length_in_seconds, comments, highest_billboard_ranking, date_of_billboard_ranking, writer_name 
                FROM songs 
                    JOIN albums ON songs.album_id = albums.album_id 
                    JOIN artists ON albums.artist_id = artists.artist_id
                        WHERE song_id = :song_id';

// prepare the query
$song_query = $connection->prepare($song_info);

// execute the query
$song_query->execute([':song_id' => $song_id]);

// fetch Object data from database
$song = $song_query->fetchAll(PDO::FETCH_OBJ);

// grabbing album ID to use back button
foreach ($song as $x) {
    $back_to_album = $x->album_id;
    $song_name = $x->song_name;
}


$song_count_sql = 'SELECT * FROM songs WHERE album_id = :album_id';
$song_count_query = $connection->prepare($song_count_sql);

$song_count_query->execute([':album_id' => $back_to_album]);

$song_count = $song_count_query->rowCount();

// echo '<pre>' . print_r($song_count, true) . '</pre>';







?>


<?php require 'header.php'; ?>

<div class="container" style="width: 30rem;">
    <div class="card mt-5">
        <div class="card-header row">




            <?php if ($song_count <= 1) : ?>

                <a onclick="return confirm('Are you sure you want to delete <?php echo $song_name; ?>? There would not be any songs left in the album.')" href="delete_song.php?song_id=<?= $song_id ?>&album_id=<?= $back_to_album ?>" class="col-2 mt-2">
                    <i class="bi bi-trash fa-lg" data-title="Delete Song"></i>
                </a>
            <?php else : ?>

                <a onclick="return confirm('Are you sure you want to delete <?php echo $song_name; ?>?')" href="delete_song.php?song_id=<?= $song_id ?>&album_id=<?= $back_to_album ?>" class="col-2 mt-2">
                    <i class="bi bi-trash fa-lg" data-title="Delete Song"></i>
                </a>

            <?php endif; ?>


            <h2 class="text-center col-8">Song Details</h2>
            <a href="edit_song.php?song_id=<?= $song_id ?>&album_id=<?= $back_to_album ?>" class="col-2 text-right mt-2">
                <i class="bi bi-pencil fa-lg" data-title="Edit Song"></i>
            </a>

        </div>
        <div class="card-body">


            <?php foreach ($song as $info) : ?>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Song Name: <b><?= $info->song_name; ?></b>
                    </li>
                    <li class="list-group-item">Artist Stage Name: <b><?= $info->stage_name; ?></b>
                    </li>
                    <li class="list-group-item">Album Name: <b><?= $info->album_name; ?></b>
                    </li>
                    <li class="list-group-item">Song Length (in seconds): <b><?= $info->length_in_seconds; ?></b>
                    </li>
                    <li class="list-group-item">Comments: <b><?= $info->comments; ?></b>
                    </li>
                    <li class="list-group-item">Highest Billboard Ranking: <b><?= $info->highest_billboard_ranking; ?></b>
                    </li>
                    <li class="list-group-item">Date of Billboard Ranking: <b><?= $info->date_of_billboard_ranking; ?></b>
                    </li>
                    <li class="list-group-item">Writer(s) Name: <b><?= $info->writer_name; ?></b>
                    </li>
                </ul>
            <?php endforeach; ?>

            <hr>
            <div class="text-center">
                <a href="view_album.php?album_id=<?= $back_to_album; ?>" class="btn mr-5 btn-color">To Album</a>
                <a href="all_song.php" class="btn ml-5 btn-color">To All Songs</a>
            </div>

        </div>
    </div>
</div>








<?php require 'footer.php'; ?>