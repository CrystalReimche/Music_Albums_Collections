<?php
require 'db.php';


$song_info = 'SELECT song_id, song_name, stage_name, album_name, length_in_seconds, comments, highest_billboard_ranking, date_of_billboard_ranking, writer_name 
                FROM songs 
                    JOIN albums ON songs.album_id = albums.album_id 
                    JOIN artists ON albums.artist_id = artists.artist_id';


// Order By and Sort
if (isset($_GET['order']) && isset($_GET['sort'])) {
    if ($_GET['sort'] == 'asc') {
        $order = addslashes(trim($_GET['order']));
        $sort = addslashes(trim($_GET['sort']));
        $song_info .= " ORDER BY $order $sort";
    } else {

        $order = addslashes(trim($_GET['order']));
        $sort = 'desc';
        $song_info .= " ORDER BY $order $sort";
    }
} else {
    $song_info .= " ORDER BY song_name ASC";
}







// prepare the query
$song_query = $connection->prepare($song_info);

// execute the query
$song_query->execute();

// fetch Object data from database
$song = $song_query->fetchAll(PDO::FETCH_OBJ);

// echo '<pre>' . print_r($album, true) . '</pre>';

?>
<?php require 'header.php'; ?>



<div class="container">
    <div class="card mt-5 mb-5">
        <div class="card-header row">
            <div class="col-2"></div>
            <h2 class="col-8 text-center">Song Details</h2>
            <a href="create_song.php" class="col-2 mt-2">
                <i class="bi bi-plus-circle-fill fa-lg" data-title="Create Song"></i>
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>Song Name
                            <a href="?order=song_name&sort=asc"><i class="bi bi-sort-up"></i></a>
                            <a href="?order=song_name&sort=desc"><i class="bi bi-sort-down"></i></a>
                        </th>
                        <th style=width:23%>Album Name
                            <a href="?order=album_name&sort=asc"><i class="bi bi-sort-up"></i></a>
                            <a href="?order=album_name&sort=desc"><i class="bi bi-sort-down"></i></a>
                        </th>
                        <th>Writer(s) Name
                            <a href="?order=writer_name&sort=asc"><i class="bi bi-sort-up"></i></a>
                            <a href="?order=writer_name&sort=desc"><i class="bi bi-sort-down"></i></a>
                        </th>
                        <th>Action</th>
                    </tr>
                </thead>
                <!-- grabs each record in result set from database -->
                <?php foreach ($song as $info) : ?>

                <tr class="text-center">
                    <td><?= $info->song_name; ?></td>
                    <td><?= $info->album_name; ?></td>
                    <td><?= $info->writer_name; ?></td>
                    <td>

                        <a href="view_song.php?song_id=<?= $info->song_id ?>">
                            <i class="bi bi-eyeglasses fa-lg" data-title="View Song"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>


<?php require 'footer.php'; ?>