<?php
require 'db.php';

// query to get 
$view_artist_info = 'SELECT artists.artist_id, stage_name, birth_name, COUNT(songs.song_id) as num_of_songs FROM artists
                        LEFT JOIN albums ON albums.artist_id = artists.artist_id
                        LEFT JOIN songs ON songs.artist_id = artists.artist_id
                            GROUP BY stage_name';

// prepare the query
$view_artist_statement = $connection->prepare($view_artist_info);

// execute the query
$view_artist_statement->execute();

// fetch Object data from database
$artist = $view_artist_statement->fetchAll(PDO::FETCH_OBJ);

// echo '<pre>' . print_r($artist, true) . '</pre>';


?>


<?php require 'header.php'; ?>


<div class="container mt-5" style=width:500px;>
    <div class="row">
        <div class="card mt-3">
            <div class="card-header">
                <h4 class="text-center">ARTISTS WITHOUT SONGS</h4>
            </div>
            <div class="card-body">
                <div class="card-body text-center">
                    <table class="table table-bordered ">
                        <thead>
                            <th>Stage Name
                                <a href="?order=stage_name&sort=asc"><i class="bi bi-sort-up"></i></a>
                                <a href="?order=stage_name&sort=desc"><i class="bi bi-sort-down"></i></a>
                            </th>
                            <th>Birth Name
                                <a href="?order=birth_name&sort=asc"><i class="bi bi-sort-up"></i></a>
                                <a href="?order=birth_name&sort=desc"><i class="bi bi-sort-down"></i></a>
                            </th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($artist as $info) : ?>
                            <?php if ($info->num_of_songs <= 1) : ?>
                            <tr>
                                <td><?= $info->stage_name; ?></td>
                                <td><?= $info->birth_name; ?></td>
                                <td>
                                    <a href="delete_artist.php?artist_id=<?= $info->artist_id ?>">
                                        <i class="bi bi-trash fa-lg" data-title="Delete Artist"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php require 'footer.php'; ?>