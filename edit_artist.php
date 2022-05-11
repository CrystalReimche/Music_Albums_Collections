<?php
require 'db.php';

// grabbing the id of the album that was selected to be edited
$artist_id = $_GET['artist_id'];

$artist_info = 'SELECT stage_name, birth_name, date_of_birth, hometown, date_of_death, fun_fact
                    FROM artists
                        WHERE artist_id = :artist_id';

// prepare the query
$artist_query = $connection->prepare($artist_info);

// execute the query
$artist_query->execute([':artist_id' => $artist_id]);

// fetch Object data from database
$artist = $artist_query->fetch(PDO::FETCH_OBJ);

// echo '<pre>' . print_r($song, true) . '</pre>';


// if all values are set, assign them to variables
if (
    isset($_POST['stage_name']) && isset($_POST['birth_name']) &&
    isset($_POST['date_of_birth']) && isset($_POST['hometown']) &&
    isset($_POST['date_of_death']) && isset($_POST['fun_fact'])
) {
    $stage_name = !empty($_POST['stage_name']) ? $_POST['stage_name'] : NULL;
    $birth_name = $_POST['birth_name'];
    $date_of_birth = !empty($_POST['date_of_birth']) ? $_POST['date_of_birth'] : NULL;
    $hometown = !empty($_POST['hometown']) ? $_POST['hometown'] : NULL;
    $date_of_death = !empty($_POST['date_of_death']) ? $_POST['date_of_death'] : NULL;
    $fun_fact = $_POST['fun_fact'];


    // storing update query in variable
    $artist_update = 'UPDATE artists SET stage_name = :stage_name, birth_name = :birth_name, date_of_birth = :date_of_birth,  
                                         hometown = :hometown, date_of_death = :date_of_death, fun_fact = :fun_fact
                                            WHERE artist_id = :artist_id';

    // prepare the query
    $artist_statement = $connection->prepare($artist_update);

    // execute the album update queries

    $artist_statement->execute([
        ':stage_name' => $stage_name,
        ':birth_name' => $birth_name,
        ':date_of_birth' => $date_of_birth,
        ':hometown' => $hometown,
        ':date_of_death' => $date_of_death,
        ':fun_fact' => $fun_fact,
        ':artist_id' => $artist_id
    ]);


    header("Location: all_artist.php");
}

?>
<?php require 'header.php'; ?>
<div class="container" style="width: 40rem;">
    <div class="card mt-5 mb-5">
        <div class="card-header text-center">
            <h2>Update Artist</h2>
        </div>
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label for="album_name">Artist Stage Name</label>
                    <input value="<?= $artist->stage_name; ?>" type="text" name="stage_name" id="stage_name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="stage_name">Artist Birth Name</label>
                    <input value="<?= $artist->birth_name; ?>" type="text" name="birth_name" id="birth_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="name">Date of Birth</label>
                    <input value="<?= $artist->date_of_birth; ?>" type="text" name="date_of_birth" id="date_of_birth" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="record_label">Hometown</label>
                    <input value="<?= $artist->hometown; ?>" type="text" name="hometown" id="hometown" class="form-control">
                </div>
                <div class="form-group">
                    <label for="record_label">Date of Death</label>
                    <input value="<?= $artist->date_of_death; ?>" type="text" name="date_of_death" id="date_of_death" class="form-control">
                </div>
                <div class="form-group">
                    <label for="release_date">Fun Fact</label>
                    <textarea value="<?= $artist->fun_fact; ?>" type="text" name="fun_fact" id="fun_fact" class="form-control" required><?php echo $artist->fun_fact; ?></textarea>
                </div>
                <hr>
                <div class="text-center">
                    <button type="button" class="btn btn-color mr-5" value="Cancel" onclick="history.go(-1)">Cancel</button>
                    <a href="edit_artist.php?artist_id=<?= $artist_id ?>"></a>
                    <button type="submit" class="btn btn-color ml-5">Update Artist</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>