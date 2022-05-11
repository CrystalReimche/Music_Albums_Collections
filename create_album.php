<?php
require 'db.php';


if (
    isset($_POST['album_name'])  && isset($_POST['stage_name']) &&
    isset($_POST['record_label']) && isset($_POST['genre']) &&
    isset($_POST['release_date']) && isset($_POST['notable_fact'])
) {
    $album_name = $_POST['album_name'];
    $stage_name = $_POST['stage_name'];
    $record_label = $_POST['record_label'];
    $genre = $_POST['genre'];
    $release_date = $_POST['release_date'];
    $notable_fact = !empty($_POST['notable_fact']) ? $_POST['notable_fact'] : NULL;


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

    // get genre ID
    $genre_id_query = 'SELECT genre_id FROM genres WHERE genre = :genre';
    // prepare the query
    $genre_statement = $connection->prepare($genre_id_query);
    // execute the query
    $genre_statement->execute(['genre' => $genre]);
    // fetch Object data from database
    $genre_object = $genre_statement->fetch(PDO::FETCH_OBJ);

    $genre_id = $genre_object->genre_id;

    // echo '<pre>' . print_r($genre_id, true) . '</pre>';


    $new_album_info = 'INSERT INTO albums (album_name, artist_id, record_label, genre_id, release_date, notable_fact) 
                            VALUES (:album_name, :artist_id, :record_label, :genre_id, :release_date, :notable_fact)';


    // prepare the query
    $statement = $connection->prepare($new_album_info);

    // execute the query
    $statement->execute([':album_name' => $album_name, ':artist_id' => $artist_id, ':record_label' => $record_label, ':genre_id' => $genre_id, ':release_date' => $release_date, ':notable_fact' => $notable_fact]);

    // fetch Object data from database
    // $new_album = $statement->fetch(PDO::FETCH_OBJ);


    header("Location: index.php");
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
$genres_query = "SELECT genre FROM genres";
// prepare the query
$genre_statement = $connection->prepare($genres_query);
// execute the genre queries
$genre_statement->execute();
// fetch Object data from database
$genres = $genre_statement->fetchAll(PDO::FETCH_ASSOC);

// echo '<pre>' . print_r($genres, true) . '</pre>';








?>
<?php require 'header.php'; ?>


<!-- ******************************************
* MAKE TOOL TIP FOR STAGE NAME AND GENRE MENUS 
********************************************-->




<div class="container" style="width: 40rem;">
    <div class="card mt-5 mb-5">
        <div class="row card-header">
            <div class="col-2"></div>
            <h2 class="text-center col-7" id="create_album_header">Create Album</h2>
            <div class="dropdown col-3">
                <button class="dropbtn btn dropdownbtn"><i class="bi bi-plus-circle-fill fa-lg"></i></button>
                <div class="dropdown-content" id="create_album_dropdown_btn">
                    <a class="nav-link" href="index.php">Home</a>
                    <a class="nav-link" href="create_artist.php">Artist</a>
                    <a class="nav-link" href="create_genre.php">Genre</a>
                    <a class="nav-link" href="create_song.php">Song</a>
                </div>
            </div>
        </div>




        <!-- <div class="card-header text-center">
            <h2>Create Album</h2>
        </div> -->
        <div class="card-body">
            <?php if (!empty($message)) : ?>
            <div class="alert alert-success">
                <?= $message; ?>
            </div>
            <?php endif; ?>
            <form method="post">
                <div class="form-group">
                    <label>Album Name</label>
                    <input type="text" name="album_name" id="album_name" class="form-control" required>
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
                    <label>Record Label</label>
                    <input type="text" name="record_label" id="record_label" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Genre
                        <i class="bi bi-info-square-fill"
                            data-title="If the genre that you're wanting is not in the list, you must create that genre first."></i>
                    </label>
                    <select class="form-control" name="genre" id="genre" required>
                        <option value=""></option>
                        <?php foreach ($genres as $genre) : ?>
                        <option value="<?php echo $genre['genre']; ?>"><?php echo $genre['genre']; ?>
                        </option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Release Date</label>
                    <input type="text" name="release_date" id="release_date" class="form-control"
                        placeholder="YYYY-MM-DD" required>
                </div>
                <div class="form-group">
                    <label>Notable Fact</label>
                    <textarea type="text" name="notable_fact" id="notable_fact" class="form-control"></textarea>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-color">Add Album</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>