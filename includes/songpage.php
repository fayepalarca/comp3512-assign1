<?php
include 'db_link.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <title>COMP3512 Assign1</title>
    <link rel="stylesheet" href="songpage.css"/>
</head>

<body>
    <header>
       <nav>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#browse">Browse</a></li>
                <li><a href="#search">Search</a></li>
                <li><a href="#aboutus">About Us</a></li>
            </ul>
        </nav>
    </header>

    <h1>Song Details</h1>
    <?php
      $query = "SELECT songs.song_id, artists.artist_name, artists.artist_type_id, genres.genre_name, songs.year, songs.duration
              FROM songs JOIN artists JOIN genres WHERE songs.artist_id=artists.artist_id and songs.genre_id=genres.genre_id";
      $result = mysqli_query($query);

      while ($list = mysqli_fetch_array($result)) {

        $songId = $list('song_id');
    ?>
      <tr>
        <td><?php echo $list['title']; ?></td>
        <td><?php echo $list['artist_name']; ?></td>
        <td><?php echo $list['artist_type_id']; ?></td>
        <td><?php echo $list['genre_name']; ?></td>
        <td><?php echo $list['year']; ?></td>
        <td><?php echo $list['duration']; ?></td>
      </tr>
    <?php
      }
    ?>

    <div>
        <form method="GET" target="_blank" action="http://someurl.com" _lpchecked="1">
            <input type="text" id="song_id" name="song_id">
            <button type="submit" id="submit">Submit</button>
        </form>

    </div>

    <h2>Analysis Data</h2>
    <div class="table-container">
            <table>
                <thead>
                  <tr>
                    <th>BPM</th>
                    <th>Energy</th>
                    <th>Danceability</th>
                    <th>Liveness</th>
                    <th>Valence</th>
                    <th>Acousticness</th>
                    <th>Speechiness</th>
                    <th>Popularity</th>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <td>Sample BPM</td>
                    <td>Sample Energy</td>
                    <td>Sample Danceability</td>
                    <td>Sample Liveness</td>
                    <td>Sample Valence</td>
                    <td>Sample Acousticness</td>
                    <td>Sample Speechiness</td>
                    <td>Sample Popularity</td>
                  </tr>

                </tbody>
              </table>
    </div>
</body>

</html>