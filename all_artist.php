    <?php
    require 'db.php';


    $artist_info = 'SELECT artists.artist_id, birth_name,  
                    year(NOW()) - year(date_of_birth) - (CONCAT(year(NOW()), "-" , month(date_of_birth), "-", day(date_of_birth)) > NOW()) AS age, 
                    COUNT(songs.song_id) as num_of_songs
                    FROM artists 
                        LEFT JOIN songs ON artists.artist_id = songs.artist_id
                            GROUP BY birth_name';


    // Order By and Sort
    if (isset($_GET['order']) && isset($_GET['sort'])) {
        if ($_GET['sort'] == 'asc') {
            $order = addslashes(trim($_GET['order']));
            $sort = addslashes(trim($_GET['sort']));
            $artist_info .= " ORDER BY $order $sort";
        } else {

            $order = addslashes(trim($_GET['order']));
            $sort = 'desc';
            $artist_info .= " ORDER BY $order $sort";
        }
    } else {
        $artist_info .= " ORDER BY birth_name ASC";
    }






    // prepare the query
    $artist_query = $connection->prepare($artist_info);

    // execute the query
    $artist_query->execute();

    // fetch Object data from database
    $artist = $artist_query->fetchAll(PDO::FETCH_OBJ);

    // echo '<pre>' . print_r($artist, true) . '</pre>';


    ?>

    <?php require 'header.php'; ?>


    <div class="container text-center">
        <div class="card mt-5 mb-5">

            <div class="card-header row">
                <div class="col-2"></div>
                <h2 class="col-8 text-center">Artist Details</h2>
                <a href="create_artist.php" class="col-2 mt-2">
                    <i class="bi bi-plus-circle-fill fa-lg" data-title="Create artist"></i>
                </a>
            </div>







            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Birth Name
                                <a href="?order=birth_name&sort=asc"><i class="bi bi-sort-up"></i></a>
                                <a href="?order=birth_name&sort=desc"><i class="bi bi-sort-down"></i></a>
                            </th>
                            <th>Age
                                <a href="?order=age&sort=asc"><i class="bi bi-sort-up"></i></a>
                                <a href="?order=age&sort=desc"><i class="bi bi-sort-down"></i></a>
                            </th>
                            <th>Number of Songs
                                <a href="?order=num_of_songs&sort=asc"><i class="bi bi-sort-up"></i></a>
                                <a href="?order=num_of_songs&sort=desc"><i class="bi bi-sort-down"></i></a>
                            </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <!-- grabs each record in result set from database -->
                    <?php foreach ($artist as $info) : ?>

                    <tr>
                        <td><?= $info->birth_name; ?></td>
                        <td><?= $info->age; ?></td>
                        <td><?= $info->num_of_songs; ?></td>
                        <td>

                            <a href="view_artist.php?artist_id=<?= $info->artist_id ?>">
                                <i class="bi bi-eyeglasses fa-lg" data-title="View Artist Details"></i>
                            </a>

                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>








    <?php require 'footer.php'; ?>