<?php
require 'db.php';


$genre_info = 'SELECT genre_id, genre FROM genres';

// Order By and Sort
if (isset($_GET['order']) && isset($_GET['sort'])) {
    if ($_GET['sort'] == 'asc') {
        $order = addslashes(trim($_GET['order']));
        $sort = addslashes(trim($_GET['sort']));
        $genre_info .= " ORDER BY $order $sort";
    } else {

        $order = addslashes(trim($_GET['order']));
        $sort = 'desc';
        $genre_info .= " ORDER BY $order $sort";
    }
} else {
    $genre_info .= " ORDER BY genre ASC";
}


// prepare the query
$genre_query = $connection->prepare($genre_info);

// execute the query
$genre_query->execute();

// fetch Object data from database
$genre = $genre_query->fetchAll(PDO::FETCH_OBJ);

// echo '<pre>' . print_r($album, true) . '</pre>';



?>
<?php require 'header.php'; ?>



<div class="container" style="width: 30rem;">
    <div class="card mt-5 mb-5">
        <div class="card-header row">
            <div class="col-2"></div>
            <h2 class="col-8 text-center">All Genres</h2>
            <a href="create_genre.php" class="col-2 mt-2">
                <i class="bi bi-plus-circle-fill fa-lg" data-title="Create Genre"></i>
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>Genre Name
                            <a href="?order=genre&sort=asc"><i class="bi bi-sort-up"></i></a>
                            <a href="?order=genre&sort=desc"><i class="bi bi-sort-down"></i></a>
                        </th>
                        <th>Action</th>
                    </tr>
                </thead>
                <!-- grabs each record in result set from database -->
                <?php foreach ($genre as $info) : ?>

                    <tr class="text-center">
                        <td><?= $info->genre; ?></td>
                        <td>
                            <a href="edit_genre.php?genre_id=<?= $info->genre_id ?>">
                                <i class="bi bi-pencil fa-lg" data-title="Edit Genre"></i>
                            </a>
                            <a onclick="return confirm('Are you sure you want to delete <?php echo $genre; ?>?')" href="delete_genre.php?genre_id=<?= $info->genre_id ?>" class="col-2 mt-2">
                                <i class="bi bi-trash fa-lg" data-title="Delete Genre"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>


<?php require 'footer.php'; ?>