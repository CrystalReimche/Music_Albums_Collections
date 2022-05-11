<?php
require 'db.php';


if (
    isset($_POST['stage_name'])  && isset($_POST['birth_name']) &&
    isset($_POST['date_of_birth']) && isset($_POST['hometown']) &&
    isset($_POST['date_of_death']) && isset($_POST['fun_fact'])
) {
    $stage_name = !empty($_POST['stage_name']) ? $_POST['stage_name'] : NULL;
    $birth_name = $_POST['birth_name'];
    $date_of_birth = $_POST['date_of_birth'];
    $hometown = !empty($_POST['hometown']) ? $_POST['hometown'] : NULL;
    $date_of_death = !empty($_POST['date_of_death']) ? $_POST['date_of_death'] : NULL;
    $fun_fact = $_POST['fun_fact'];



    $new_artist_info = 'INSERT INTO artists (stage_name, birth_name, date_of_birth, hometown, date_of_death, fun_fact) 
                            VALUES (:stage_name, :birth_name, :date_of_birth, :hometown, :date_of_death, :fun_fact)';

    // prepare the query
    $statement = $connection->prepare($new_artist_info);

    // execute the query
    $statement->execute([
        ':stage_name' => $stage_name,
        ':birth_name' => $birth_name,
        ':date_of_birth' => $date_of_birth,
        ':hometown' => $hometown,
        ':date_of_death' => $date_of_death,
        ':fun_fact' => $fun_fact
    ]);

    // fetch Object data from database
    $new_artist = $statement->fetch(PDO::FETCH_OBJ);




    header('Location: all_artist.php');
}



// echo '<pre>' . print_r($new_artist, true) . '</pre>';


?>


<?php require 'header.php'; ?>


<div class="container" style="width: 40rem;">
    <div class="card mt-5 mb-5">
        <div class="row card-header">
            <div class="col-3"></div>
            <h2 class="text-center col-6" id="create_artist_header">Create Artist</h2>
            <div class="dropdown col-3">
                <button class="dropbtn btn dropdownbtn"><i class="bi bi-plus-circle-fill fa-lg"></i></button>
                <div class="dropdown-content" id="create_artist_dropdown_btn">
                    <a class="nav-link" href="index.php">Home</a>
                    <a class="nav-link" href="create_genre.php">Genre</a>
                    <a class="nav-link" href="create_album.php">Album</a>
                    <a class="nav-link" href="create_song.php">Song</a>
                </div>
            </div>
        </div>





        <div class="card-body">

            <form method="post">
                <div class="form-group">
                    <label>Artist Stage Name</label>
                    <input type="text" name="stage_name" id="stage_name" class="form-control">
                </div>
                <div class="form-group">
                    <label>Artist Birth Name</label>
                    <input type="text" name="birth_name" id="birth_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Date of Birth</label>
                    <input type="text" name="date_of_birth" id="date_of_birth" class="form-control"
                        placeholder="YYYY-MM-DD" required>
                </div>
                <div class="form-group">
                    <label>Hometown</label>
                    <input type="text" name="hometown" id="hometown" class="form-control">
                </div>
                <div class="form-group">
                    <label>Date of Death</label>
                    <input type="text" name="date_of_death" id="date_of_death" class="form-control"
                        placeholder="YYYY-MM-DD">
                </div>
                <div class="form-group">
                    <label>Fun Fact</label>
                    <textarea type="text" name="fun_fact" id="fun_fact" class="form-control" required></textarea>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-color">Create A New Artist</button>
                </div>
            </form>
        </div>
    </div>
</div>








<?php require 'footer.php'; ?>