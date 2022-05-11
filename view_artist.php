<?php
require 'db.php';

$artist_id = $_GET['artist_id'];

$artist_info = 'SELECT stage_name, birth_name, date_of_birth, hometown, date_of_death, fun_fact
                    FROM artists
                        WHERE artist_id = :artist_id';


$song_info = 'SELECT song_id, song_name FROM songs WHERE artist_id = :artist_id ORDER BY song_name ASC';



// prepare the query
$artist_query = $connection->prepare($artist_info);
$song_query = $connection->prepare($song_info);
// execute the query
$artist_query->execute([':artist_id' => $artist_id]);
$song_query->execute([':artist_id' => $artist_id]);
// fetch Object data from database
$artist = $artist_query->fetchAll(PDO::FETCH_OBJ);

$song = $song_query->fetchAll(PDO::FETCH_OBJ);


// $song_imploded = implode(',', (array) $song);


// echo '<pre>' . print_r($artist, true) . '</pre>';

// echo '<pre>' . print_r($song_imploded, true) . '</pre>';





?>


<?php require 'header.php'; ?>




<div class="container text-center">
    <div class="card mt-5" style="width: 80rem;">
        <div class="card-header">
            <h2>Artist Details</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Artist Stage Name</th>
                        <th>Artist Birth Name</th>
                        <th>Date of Birth</th>
                        <th>Hometown</th>
                        <th>Date of Death</th>
                        <th>Fun Fact</th>
                        <th>List of Songs</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <!-- grabs each record in result set from database -->
                <?php foreach ($artist as $info) : ?>
                <tr>
                    <td><?= $info->stage_name; ?></td>
                    <td><?= $info->birth_name; ?></td>
                    <td style=width:150px;><?= $info->date_of_birth; ?></td>
                    <td><?= $info->hometown; ?></td>
                    <td><?= $info->date_of_death; ?></td>
                    <td style=max-width:600px;><?= $info->fun_fact; ?></td>
                    <td>&nbsp;</td>
                    <td>
                        <a href="edit_artist.php?artist_id=<?= $artist_id ?>">
                            <i class="bi bi-pencil fa-lg" data-title="Edit Artist"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php foreach ($song as $song_info) : ?>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><?= $song_info->song_name; ?></td>
                    <td>
                        <a href="view_song.php?song_id=<?= $song_info->song_id ?>">
                            <i class="bi bi-eyeglasses fa-lg" data-title="View Song Details"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>


<?php require 'footer.php'; ?>