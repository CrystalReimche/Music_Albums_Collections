<?php

require 'db.php';

// grabbing the id of the album that was selected to be edited
$album_id = $_GET['album_id'];

// grabbing album information to be displayed
$view_album_info = 'SELECT *  FROM albums WHERE album_id = :album_id';
$view_album_statement = $connection->prepare($view_album_info);
$view_album_statement->execute([':album_id' => $album_id]);
$view_album = $view_album_statement->fetch(PDO::FETCH_OBJ);

// grabbing all songs from the album that was selected to be viewed
$song_info = 'SELECT * FROM songs
                    JOIN albums ON songs.album_id = albums.album_id 
                    JOIN artists ON albums.artist_id = artists.artist_id 
                        WHERE albums.album_id = :album_id';
$statement = $connection->prepare($song_info);
$statement->execute([':album_id' => $album_id]);
$song = $statement->fetchAll(PDO::FETCH_OBJ);


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

// echo '<pre>' . print_r($album, true) . '</pre>';

?>


<?php require 'header.php'; ?>

<div class="jumbotron jumbotron-fluid">
    <div class="row ">
        <div class="col-lg-9 pb-3">
            <div class="card-transparent text-center">
                <h1 class="display-4"> <?php echo $view_album->{'album_name'}; ?></h1>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card-transparent text-right" id="vl">

                <div class="card-body pt-0 pb-0">
                    <p class="card-title">Record Label: <b><?php echo $view_album->{'record_label'}; ?></b></p>

                    <p class="card-title">Release Date: <b><?php echo $view_album->{'release_date'}; ?></b></p>
                    <p class="card-title text-left">Notable Fact: </p>
                    <p class="card-text text-left"><b>
                            <?php echo $view_album->{'notable_fact'}; ?></b>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="card mt-3">
            <div class="card-header row">
                <a href="index.php" class="col-1"><i class="bi bi-caret-left-fill fa-2x"
                        data-title="Back to All Albums"></i></a>
                <h4 class="col-10 text-center">Album Details</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th style=width:17%>Song Name
                                <a href="?order=song_name&sort=asc&album_id=<?= $view_album->album_id ?>">
                                    <i class="bi bi-sort-up"></i>
                                </a>
                                <a href="?order=song_name&sort=desc&album_id=<?= $view_album->album_id ?>">
                                    <i class="bi bi-sort-down"></i>
                                </a>
                            </th>
                            <th style=width:27%>Song Length (in seconds)
                                <a href="?order=length_in_seconds&sort=asc&album_id=<?= $view_album->album_id ?>">
                                    <i class="bi bi-sort-up"></i>
                                </a>
                                <a href="?order=length_in_seconds&sort=desc&album_id=<?= $view_album->album_id ?>">
                                    <i class="bi bi-sort-down"></i>
                                </a>
                            </th>
                            <th style=width:28%>Highest Billboard Ranking
                                <a
                                    href="?order=highest_billboard_ranking&sort=asc&album_id=<?= $view_album->album_id ?>">
                                    <i class="bi bi-sort-up"></i>
                                </a>
                                <a
                                    href="?order=highest_billboard_ranking&sort=desc&album_id=<?= $view_album->album_id ?>">
                                    <i class="bi bi-sort-down"></i>
                                </a>
                            </th>
                            <th style=width:20%>Writer(s) Name
                                <a href="?order=writer_name&sort=asc&album_id=<?= $view_album->album_id ?>">
                                    <i class="bi bi-sort-up"></i>
                                </a>
                                <a href="?order=writer_name&sort=desc&album_id=<?= $view_album->album_id ?>">
                                    <i class="bi bi-sort-down"></i>
                                </a>
                            </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <!-- grabs each record in result set from database -->
                    <?php foreach ($song as $info) : ?>
                    <tr>
                        <td><?= $info->song_name; ?></td>
                        <td><?= $info->length_in_seconds; ?></td>
                        <td><?= $info->highest_billboard_ranking; ?></td>
                        <td><?= $info->writer_name; ?></td>
                        <td>
                            <a href="view_song.php?song_id=<?= $info->song_id ?>"><i class="bi bi-eyeglasses fa-lg"
                                    data-title="View Song"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>








    <?php require 'footer.php'; ?>