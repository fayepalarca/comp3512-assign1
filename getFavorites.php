<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Favorites Page</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="header">
        <h1>Favorites Browser Section</h1>
    </div>
    
    <div class="container">
        <h1 class="results-container"> Your Favorite Tracks</h1>
        <div class="criteria">Current filter criteria (if any)</div>
        <div class="button-group">
            <button class="add-fav">Remove All</button>
        </div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Artist</th>
                        <th>Year</th>
                        <th>Genre</th>
                        <td><button class="remove-btn">Remove</button></td>
                        <td><button class="view-btn">View</button></td>
                    </tr>
                </thead>
                <tbody>
                    <?php
require_once 'db_link.php';

function retrieveFromDatabase($dbLink, $table, $column) {
    $sql = "SELECT $column FROM $table";
    return DBUtils::executeQuery($dbLink, $sql)->fetchAll(PDO::FETCH_ASSOC);
}

function displayResults($results, $column) {
    echo "<ul>";
    foreach ($results as $result) {
        echo "<li>" . htmlspecialchars($result[$column], ENT_QUOTES, 'UTF-8') . "</li>";
    }
    echo "</ul>";
}

// Sample data for the favorites
$favorites = array(
    array("title" => "Song1", "artist" => "Artist1", "year" => "2000", "genre" => "Rock"),
    //... more songs
);

foreach ($favorites as $song) { // Note change from $songs to $favorites
    echo "<tr>";
    echo "<td>" . htmlspecialchars($song["title"], ENT_QUOTES, 'UTF-8') . "</td>";
    echo "<td>" . htmlspecialchars($song["artist"], ENT_QUOTES, 'UTF-8') . "</td>";
    echo "<td>" . htmlspecialchars($song["year"], ENT_QUOTES, 'UTF-8') . "</td>";
    echo "<td>" . htmlspecialchars($song["genre"], ENT_QUOTES, 'UTF-8') . "</td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "</tr>";
}


try {
    $genres = retrieveFromDatabase($db, "genres", "genre_name");
    displayResults($genres, "genre_name");

    $titles = retrieveFromDatabase($db, "songs", "title");
    displayResults($titles, "title");

    $artists = retrieveFromDatabase($db, "artists", "artist_name");
    displayResults($artists, "artist_name");

    $years = retrieveFromDatabase($db, "songs", "year");
    displayResults($years, "year");
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
