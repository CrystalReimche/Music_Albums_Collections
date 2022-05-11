<?php
require 'db.php';

if (isset($_POST['genre'])) {
    $genre = $_POST['genre'];

    $new_genre_info = 'INSERT INTO genres (genre) VALUES (:genre)';
    $statement = $connection->prepare($new_genre_info);
    $statement->execute([':genre' => $genre]);
    $new_genre = $statement->fetch(PDO::FETCH_OBJ);

    header('Location: all_genre.php');
}

// echo '<pre>' . print_r($album, true) . '</pre>';

?>


<?php require 'header.php'; ?>

<div class="container" style="width: 40rem;">
    <div class="card mt-5 mb-5">
        <div class="row card-header">
            <div class="col-3"></div>
            <h2 class="text-center col-6" id="create_genre_header">Create Genre</h2>
            <div class="dropdown col-3">
                <button class="dropbtn btn dropdownbtn"><i class="bi bi-plus-circle-fill fa-lg"></i></button>
                <div class="dropdown-content" id="create_artist_dropdown_btn">
                    <a class="nav-link" href="index.php">Home</a>
                    <a class="nav-link" href="create_artist.php">Artist</a>
                    <a class="nav-link" href="create_album.php">Album</a>
                    <a class="nav-link" href="create_song.php">Song</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label>Genre Name</label>
                    <input type="text" name="genre" id="genre" class="form-control" required>
                </div>
                <!-- <div class="form-group text-center">
                    <button type="submit" class="btn btn-color">Create A New Genre</button>
                </div> -->



                <hr>
                <div class="text-center">
                    <a href="index.php" class="btn mr-5 btn-color">Cancel</a>
                    <button type="submit" class="btn btn-color ml-5">Create A New Genre</button>
                </div>




            </form>
        </div>
    </div>
</div>








<?php require 'footer.php'; ?>