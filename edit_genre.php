<?php
require 'db.php';

// grabbing the id of the album that was selected to be edited
$genre_id = $_GET['genre_id'];

$genre_info = 'SELECT genre_id, genre FROM genres WHERE genre_id = :genre_id';

// prepare the query
$genre_query = $connection->prepare($genre_info);

// execute the query
$genre_query->execute([':genre_id' => $genre_id]);

// fetch Object data from database
$genre = $genre_query->fetch(PDO::FETCH_OBJ);

// echo '<pre>' . print_r($song, true) . '</pre>';


// if all values are set, assign them to variables
if (
    isset($_POST['genre'])
) {
    $genre = $_POST['genre'];


    // storing update query in variable
    $genre_update = 'UPDATE genres SET genre = :genre WHERE genre_id = :genre_id';

    // prepare the query
    $genre_statement = $connection->prepare($genre_update);

    // execute the album update queries

    $genre_statement->execute([':genre' => $genre, ':genre_id' => $genre_id]);

    header("Location: all_genre.php");
}

?>
<?php require 'header.php'; ?>
<div class="container" style="width: 40rem;">
    <div class="card mt-5 mb-5">
        <div class="card-header text-center">
            <h2>Update Genre</h2>
        </div>
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label for="genre">Genre Name</label>
                    <input value="<?= $genre->genre; ?>" type="text" name="genre" id="genre" class="form-control">
                </div>
                <hr>
                <div class="text-center">
                    <button type="button" class="btn btn-color mr-5" value="Cancel"
                        onclick="history.go(-1)">Cancel</button>

                    <button type="submit" class="btn btn-color ml-5">Update Genre</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>