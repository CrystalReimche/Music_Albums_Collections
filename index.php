<?php
require 'db.php';

// grabbing all album information from database
$sql = 'SELECT album_id, album_name, stage_name, genre, record_label, release_date 
        FROM Albums
            JOIN Artists
                ON Albums.artist_id = Artists.artist_id
            JOIN Genres
                ON Albums.genre_id = Genres.genre_id';

//  appending Order By and Sort to query
if (isset($_GET['order']) && isset($_GET['sort'])) {
    if ($_GET['sort'] == 'asc') {
        $order = addslashes(trim($_GET['order']));
        $sort = addslashes(trim($_GET['sort']));
        $sql .= " ORDER BY $order $sort";
    } else {

        $order = addslashes(trim($_GET['order']));
        $sort = 'desc';
        $sql .= " ORDER BY $order $sort";
    }
} else {
    $sql .= " ORDER BY album_name ASC";
}

// preparing and executing query
$statement = $connection->prepare($sql);
$statement->execute();
$albums = $statement->fetchAll(PDO::FETCH_OBJ);

// echo '<pre>' . print_r($albums, true) . '</pre>';

?>

<?php require 'header.php'; ?>

<div class="container">
    <div class="card mt-5">
        <div class="row card-header">
            <div class="col-2"></div>
            <h2 class="text-center col-8">All Albums</h2>
            <div class="dropdown col-2">
                <button class="dropbtn btn"><i class="bi bi-plus-circle-fill fa-lg"></i><i
                        class="bi bi-music-note-beamed fa-lg"></i></button>
                <div class="dropdown-content">
                    <a class="nav-link" href="create_artist.php">Artist</a>
                    <a class="nav-link" href="create_genre.php">Genre</a>
                    <a class="nav-link" href="create_album.php">Album</a>
                    <a class="nav-link" href="create_song.php">Song</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered ">
                <thead>
                    <tr class="text-center">
                        <th style=width:19%>Album Name
                            <a href="?order=album_name&sort=asc"><i class="bi bi-sort-up"></i></a>
                            <a href="?order=album_name&sort=desc"><i class="bi bi-sort-down"></i></a>
                        </th>
                        <th style=width:18%>Stage Name
                            <a href="?order=stage_name&sort=asc"><i class="bi bi-sort-up"></i></a>
                            <a href="?order=stage_name&sort=desc"><i class="bi bi-sort-down"></i></a>
                        </th>
                        <th style=width:13%>Genre
                            <a href="?order=genre&sort=asc"><i class="bi bi-sort-up"></i></a>
                            <a href="?order=genre&sort=desc"><i class="bi bi-sort-down"></i></a>
                        </th>
                        <th style=width:18%>Record Label
                            <a href="?order=record_label&sort=asc"><i class="bi bi-sort-up"></i></a>
                            <a href="?order=record_label&sort=desc"><i class="bi bi-sort-down"></i></a>
                        </th>
                        <th style=width:18%>Release Date
                            <a href="?order=release_date&sort=asc"><i class="bi bi-sort-up"></i></a>
                            <a href="?order=release_date&sort=desc"><i class="bi bi-sort-down"></i></a>
                        </th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($albums as $album) : ?>
                    <tr class="text-center">
                        <td><?= $album->album_name; ?></td>
                        <td><?= $album->stage_name; ?></td>
                        <td><?= $album->genre; ?></td>
                        <td><?= $album->record_label; ?></td>
                        <td><?= $album->release_date; ?></td>
                        <td>
                            <a href="view_album.php?album_id=<?= $album->album_id ?>">
                                <i class="bi bi-eyeglasses fa-lg" data-title="View Album"></i>
                            </a>
                            <a href="edit_album.php?album_id=<?= $album->album_id ?>">
                                <i class="bi bi-pencil fa-lg" data-title="Edit Album"></i>
                            </a>
                            <a href="confirm_delete_album.php?album_id=<?= $album->album_id ?>">
                                <i class="bi bi-trash fa-lg" data-title="Delete Album"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>