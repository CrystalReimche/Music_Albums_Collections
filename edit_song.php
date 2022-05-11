<?php
require 'db.php';

// grabbing the id of the album that was selected to be edited
$song_id = $_GET['song_id'];
$album_id = $_GET['album_id'];

$song_info = 'SELECT song_id, song_name, stage_name, album_name, length_in_seconds, comments, highest_billboard_ranking, date_of_billboard_ranking, writer_name 
                FROM songs 
                    JOIN albums ON songs.album_id = albums.album_id 
                    JOIN artists ON albums.artist_id = artists.artist_id
                        WHERE song_id = :song_id';

// prepare the query
$song_query = $connection->prepare($song_info);

// execute the query
$song_query->execute([':song_id' => $song_id]);

// fetch Object data from database
$song = $song_query->fetch(PDO::FETCH_OBJ);

// echo '<pre>' . print_r($song, true) . '</pre>';



// if all values are set, assign them to variables
if (
    isset($_POST['song_name']) && isset($_POST['stage_name']) &&
    isset($_POST['album_name']) && isset($_POST['length_in_seconds']) &&
    isset($_POST['comments']) && isset($_POST['highest_billboard_ranking']) &&
    isset($_POST['date_of_billboard_ranking']) && isset($_POST['writer_name'])
) {
    $song_name = $_POST['song_name'];
    $stage_name = $_POST['stage_name'];
    $album_name = $_POST['album_name'];
    $length_in_seconds = $_POST['length_in_seconds'];
    $comments = !empty($_POST['comments']) ? $_POST['comments'] : NULL;
    $highest_billboard_ranking = !empty($_POST['highest_billboard_ranking']) ? $_POST['highest_billboard_ranking'] : NULL;
    $date_of_billboard_ranking = !empty($_POST['date_of_billboard_ranking']) ? $_POST['date_of_billboard_ranking'] : NULL;
    $writer_name = $_POST['writer_name'];
    $old_stage_name = $song->stage_name;
    $old_album_name = $song->album_name;

    // storing update query in variable
    $song_update = 'UPDATE songs SET song_name = :song_name, length_in_seconds = :length_in_seconds, comments = :comments, highest_billboard_ranking = :highest_billboard_ranking, date_of_billboard_ranking = :date_of_billboard_ranking, writer_name = :writer_name WHERE song_id = :song_id';

    // prepare the query
    $song_statement = $connection->prepare($song_update);

    // storing update query in variable
    $artist_update = 'UPDATE artists SET stage_name = :stage_name WHERE artist_id = (SELECT artist_id FROM artists WHERE stage_name = :old_stage_name)';

    // prepare the query
    $artist_statement = $connection->prepare($artist_update);

    // storing update query in variable
    $album_update = 'UPDATE albums SET album_name = :album_name WHERE album_id = (SELECT album_id FROM albums WHERE album_name = :old_album_name)';

    // prepare the query
    $album_statement = $connection->prepare($album_update);



    // execute the album update queries
    if (
        $song_statement->execute([
            ':song_name' => $song_name,
            ':length_in_seconds' => $length_in_seconds,
            ':comments' => $comments,
            ':highest_billboard_ranking' => $highest_billboard_ranking,
            ':date_of_billboard_ranking' => $date_of_billboard_ranking,
            ':writer_name' => $writer_name,
            ':song_id' => $song_id
        ]) &&
        $artist_statement->execute([':stage_name' => $stage_name, ':old_stage_name' => $old_stage_name]) &&
        $album_statement->execute([':album_name' => $album_name, ':old_album_name' => $old_album_name])
    ) {
        header("Location: view_album.php?album_id=" . $album_id);
    }
}

?>
<?php require 'header.php'; ?>
<div class="container" style="width: 40rem;">
    <div class="card mt-5 mb-5">
        <div class="card-header text-center">
            <h2>Update Song</h2>
        </div>
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label for="album_name">Song Name</label>
                    <input value="<?= $song->song_name; ?>" type="text" name="song_name" id="song_name"
                        class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="stage_name">Artist Stage Name</label>
                    <input value="<?= $song->stage_name; ?>" type="text" name="stage_name" id="stage_name"
                        class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Album Name</label>
                    <input value="<?= $song->album_name; ?>" type="text" name="album_name" id="album_name"
                        class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="record_label">Song Length (in seconds)</label>
                    <input value="<?= $song->length_in_seconds; ?>" type="text" name="length_in_seconds"
                        id="length_in_seconds" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="record_label">Comments</label>
                    <input value="<?= $song->comments; ?>" type="text" name="comments" id="comments"
                        class="form-control">
                </div>
                <div class="form-group">
                    <label for="release_date">Highest Billboard Ranking</label>
                    <input value="<?= $song->highest_billboard_ranking; ?>" type="text" name="highest_billboard_ranking"
                        id="highest_billboard_ranking" class="form-control">
                </div>
                <div class="form-group">
                    <label for="release_date">Date of Billboard Ranking</label>
                    <input value="<?= $song->date_of_billboard_ranking; ?>" type="text" name="date_of_billboard_ranking"
                        id="date_of_billboard_ranking" class="form-control">
                </div>
                <div class="form-group">
                    <label for="release_date">Writer(s) Name</label>
                    <input value="<?= $song->writer_name; ?>" type="text" name="writer_name" id="writer_name"
                        class="form-control" required>
                </div>
                <hr>
                <div class="text-center">
                    <button type="button" class="btn btn-color mr-5" value="Cancel"
                        onclick="history.go(-1)">Cancel</button>
                    <button type="submit" class="btn btn-color ml-5">Update Song</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>