<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'db_link.php';

$data = [];

try {
    $dbLink = new PDO('sqlite:music.db');
    $dbLink->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM genres";
    $result = $dbLink->query($sql);
    $data = $result->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "An error occurred: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse/Search Results</title>
    <link rel="stylesheet" href="browsestyles.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="header">
        <h1>Music Browser Section</h1>
    </div>
    <div class="container">
        <h1 class="results-container">Browse / Search Results Your Tracks </h1>
        <div class="criteria">Current filter/search criteria (if any)</div>
        <div class="button-group">         
            <button class="add-fav">Show All</button>
        </div>
        <div class="table-container">
            <table>
                <thead>
                  <tr>
                    <th>Title</th>
                    <th>Artist</th>
                    <th>Year</th>
                    <th>Genre</th>
                    <th>Popularity</th>
                    <td><button class="favorite-btn">Add to Favorites</button></td>
                    <td><button class="view-btn">View</button></td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Sample Title</td>
                    <td>Sample Artist</td>
                    <td>2023</td>
                    <td>Pop</td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                    <!-- Add more rows as needed -->
                </tbody>
              </table>
        </div>
    </div>
    <div class="footer">
        <p>Footer</p>
    </div>
</body>
</html>