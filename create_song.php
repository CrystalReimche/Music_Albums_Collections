<?php
require 'db.php';


if (
    isset($_POST['song_name'])  && isset($_POST['stage_name']) &&
    isset($_POST['album_name'])  && isset($_POST['length_in_seconds'])  &&
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




    // get artist ID
    $artist_id_query = 'SELECT artist_id FROM artists WHERE stage_name = :stage_name';
    // prepare the query
    $artist_statement = $connection->prepare($artist_id_query);
    // execute the query
    $artist_statement->execute(['stage_name' => $stage_name]);
    // fetch Object data from database
    $artist_object = $artist_statement->fetch(PDO::FETCH_OBJ);

    $artist_id = $artist_object->artist_id;

    // echo '<pre>' . print_r($artist_id, true) . '</pre>';

    // get album ID
    $album_id_query = 'SELECT album_id FROM albums WHERE album_name = :album_name';
    // prepare the query
    $album_statement = $connection->prepare($album_id_query);
    // execute the query
    $album_statement->execute(['album_name' => $album_name]);
    // fetch Object data from database
    $album_object = $album_statement->fetch(PDO::FETCH_OBJ);

    $album_id = $album_object->album_id;

    // echo '<pre>' . print_r($album_id, true) . '</pre>';


    $new_song_info = 'INSERT INTO songs (song_name, artist_id, album_id, length_in_seconds, comments, highest_billboard_ranking, date_of_billboard_ranking, writer_name) 
                            VALUES (:song_name, :artist_id, :album_id, :length_in_seconds, :comments, :highest_billboard_ranking, :date_of_billboard_ranking, :writer_name)';


    // prepare the query
    $statement = $connection->prepare($new_song_info);

    // execute the query
    $statement->execute([':song_name' => $song_name, ':artist_id' => $artist_id, ':album_id' => $album_id, ':length_in_seconds' => $length_in_seconds, ':comments' => $comments, ':highest_billboard_ranking' => $highest_billboard_ranking, ':date_of_billboard_ranking' => $date_of_billboard_ranking, ':writer_name' => $writer_name]);

    // fetch Object data from database
    $new_song = $statement->fetch(PDO::FETCH_OBJ);




    header('Location: view_album.php?album_id=' . $album_id);

    // $message = 'Song was created successfully';
}

// storing query in variable
$stage_name_query = "SELECT stage_name FROM artists";
// prepare the query
$stage_name_statement = $connection->prepare($stage_name_query);
// execute the genre queries
$stage_name_statement->execute();
// fetch Object data from database
$stage_names = $stage_name_statement->fetchAll(PDO::FETCH_ASSOC);



// storing query in variable
$albums_query = "SELECT album_name FROM albums";
// prepare the query
$album_statement = $connection->prepare($albums_query);
// execute the genre queries
$album_statement->execute();
// fetch Object data from database
$album_names = $album_statement->fetchAll(PDO::FETCH_ASSOC);

// echo '<pre>' . print_r($genres, true) . '</pre>';

$get_last_album = 'SELECT album_name FROM albums WHERE album_id=(SELECT max(album_id) FROM albums)';
$last_album_statement = $connection->prepare($get_last_album);
$last_album_statement->execute();
$last_added_album = $last_album_statement->fetch(PDO::FETCH_ASSOC);



// echo '<pre>' . print_r($last_added_album, true) . '</pre>';

?>

<!-- ******************************************
* MAKE TOOL TIP FOR STAGE NAME AND GENRE MENUS 
********************************************-->

<?php require 'header.php'; ?>


<div class="container" style="width: 40rem;">
    <div class="card mt-5 mb-5">

        <div class="row card-header">
            <div class="col-3"></div>
            <h2 class="text-center col-6" id="create_song_header">Create Song</h2>
            <div class="dropdown col-3">
                <button class="dropbtn btn dropdownbtn"><i class="bi bi-plus-circle-fill fa-lg"></i></button>
                <div class="dropdown-content" id="create_song_dropdown_btn">
                    <a class="nav-link" href="index.php">Home</a>
                    <a class="nav-link" href="create_artist.php">Artist</a>
                    <a class="nav-link" href="create_genre.php">Genre</a>
                    <a class="nav-link" href="create_album.php">Album</a>
                </div>
            </div>
        </div>




        <!-- <div class="card-header text-center">
            <h2>Create A New Song</h2>
        </div> -->
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label>Song Name</label>
                    <input type="text" name="song_name" id="song_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Artist Stage Name
                        <i class="bi bi-info-square-fill"
                            data-title="If the artist name that you're wanting is not in the list, you must create that artist first."></i>
                    </label>
                    <select class="form-control" name="stage_name" id="stage_name" required>
                        <option value=""></option>
                        <?php foreach ($stage_names as $stage_name) : ?>
                        <option value="<?php echo $stage_name['stage_name']; ?>">
                            <?php echo $stage_name['stage_name']; ?>
                        </option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Album Name
                        <i class="bi bi-info-square-fill"
                            data-title="If the album name does not show up in the list, you must create an album first."></i>
                    </label>
                    <select class="form-control" name="album_name" id="album_name" required>
                        <option value=""></option>
                        <?php foreach ($album_names as $album_name) : ?>
                        <option value="<?php echo $album_name['album_name']; ?>">
                            <?php echo $album_name['album_name']; ?>
                        </option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Song Length in Seconds</label>
                    <input type="text" name="length_in_seconds" id="length_in_seconds" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Comments</label>
                    <input type="text" name="comments" id="comments" class="form-control">
                </div>
                <div class="form-group">
                    <label>Highest Billboard Ranking</label>
                    <input type="text" name="highest_billboard_ranking" id="highest_billboard_ranking"
                        class="form-control">
                </div>
                <div class="form-group">
                    <label>Date of Billboard Ranking</label>
                    <input type="text" name="date_of_billboard_ranking" id="date_of_billboard_ranking"
                        class="form-control" placeholder="YYYY-MM-DD">
                </div>
                <div class="form-group">
                    <label>Song Writers Name</label>
                    <input type="text" name="writer_name" id="writer_name" class="form-control" required>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-color">Create New Song</button>
                </div>
            </form>
        </div>
    </div>
</div>



<?php require 'footer.php'; ?>