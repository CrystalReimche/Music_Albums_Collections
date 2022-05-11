<?php
require 'db.php';

// grabbing the id of the album that was selected to be edited
$album_id = $_GET['album_id'];

$edit_album_query = 'SELECT album_id, album_name, stage_name, genre, record_label, release_date 
                        FROM Albums 
                        JOIN Artists ON Albums.artist_id = Artists.artist_id
                        JOIN Genres ON Albums.genre_id = Genres.genre_id
                            WHERE album_id = :album_id';

// prepare the query
$edit_album_statement = $connection->prepare($edit_album_query);

// execute the query
$edit_album_statement->execute([':album_id' => $album_id]);

// fetch Object data from database
$edit_album = $edit_album_statement->fetch(PDO::FETCH_OBJ);


// storing query in variable
$genres_query = "SELECT genre FROM genres";
// prepare the query
$genre_statement = $connection->prepare($genres_query);
// execute the genre queries
$genre_statement->execute();
// fetch Object data from database
$genres = $genre_statement->fetchAll(PDO::FETCH_ASSOC);



// echo '<pre>' . print_r($genres, true) . '</pre>';


// if all values are set, assign them to variables
if (isset($_POST['album_name']) && isset($_POST['stage_name']) && isset($_POST['genre']) && isset($_POST['record_label']) && isset($_POST['release_date'])) {
    $album_name = $_POST['album_name'];
    $stage_name = $_POST['stage_name'];
    $genre_name = $_POST['genre'];
    $record_label = $_POST['record_label'];
    $release_date = $_POST['release_date'];
    $old_stage_name = $album->stage_name;

    // storing update query in variable
    $album_update = 'UPDATE albums SET album_name = :album_name, record_label = :record_label, release_date = :release_date WHERE album_id = :album_id';

    // prepare the query
    $album_statement = $connection->prepare($album_update);

    // storing update query in variable
    $genre_update = 'UPDATE albums SET albums.genre_id = (SELECT genre_id FROM genres WHERE genres.genre = :genre_name) WHERE albums.album_id = :album_id';

    // prepare the query
    $genre_statement = $connection->prepare($genre_update);

    // storing update query in variable
    $artist_update = 'UPDATE artists SET stage_name = :stage_name WHERE artist_id = (SELECT artist_id FROM artists WHERE stage_name = :old_stage_name)';

    // prepare the query
    $artist_statement = $connection->prepare($artist_update);

    // execute the album update queries
    if (
        $album_statement->execute([':album_name' => $album_name, ':record_label' => $record_label, ':release_date' => $release_date, ':album_id' => $album_id]) &&
        $genre_statement->execute([':genre_name' => $genre_name, ':album_id' => $album_id]) &&
        $artist_statement->execute([':stage_name' => $stage_name, ':old_stage_name' => $old_stage_name])
    ) {
        header("Location: index.php");
    }
}

?>
<?php require 'header.php'; ?>
<div class="container" style="width: 40rem;">
    <div class="card mt-5 mb-5">
        <div class="card-header text-center">
            <h2>Update Album</h2>
        </div>
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label for="album_name">Album Name</label>
                    <input value="<?= $edit_album->album_name; ?>" type="text" name="album_name" id="album_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="stage_name">Stage Name</label>
                    <input value="<?= $edit_album->stage_name; ?>" type="text" name="stage_name" id="stage_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="name">Genre</label>
                    <select class="form-control" name="genre" id="genre" required>
                        <option value="<?php echo $edit_album->genre; ?>"><?php echo $edit_album->genre; ?></option>
                        <?php foreach ($genres as $genre) : ?>
                            <option value="<?php echo $genre['genre']; ?>"><?php echo $genre['genre']; ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="record_label">Record Label</label>
                    <input value="<?= $edit_album->record_label; ?>" type="text" name="record_label" id="record_label" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="release_date">Release Date</label>
                    <input value="<?= $edit_album->release_date; ?>" type="text" name="release_date" id="release_date" class="form-control" required>
                </div>
                <hr>
                <div class="text-center">
                    <button type="button" class="btn btn-color mr-5" value="Cancel" onclick="history.go(-1)">Cancel</button>
                    <button type="submit" class="btn btn-color ml-5" id="update_album_button">Update Album</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>