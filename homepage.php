<!DOCTYPE html>
<html lang='en'>
<head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, inital-scale="1.0">
        <link rel="stylesheet" href="homepage.css"/>
        <title>Home Page</title>
</head>

<div class="header">
    <h1>Welcome to Our Song Browser </h1> 
</div>

<body>
<h2> Home Page</h2> 
<p> In this assignment, we used HTML along with PHP to implement a table where songs could be populated by user request and interact with the databse to pull the information. We used CSS to style our php files as well as SQL queries to gather the data and prompt the information to the page.<br>
 COMP 3512 - Web Development II <br>
 Rebeka Ochieng, Faye Palarca, Guranjan Singh <br>
 https://github.com/fayepalarca/comp3512-assign1.git</p>

</body>
<div class="row">
  <div class="column" style="background-color:#aaa;">
    <h2>Top Genres</h2>
  
  <div class="column" style="background-color:#bbb;">
    <h2>Top Artists</h2>
  </div>
  <div class="column" style="background-color:#bbb;">
    <h2> Most Popular Song </h2>
  </div>
  <div class="column" style="background-color:#bbb;">
    <h2>One Hit Wonders</h2>
  </div>
</div>

<div class="row">
  <div class="column" style="background-color:#ccc;">
    <h2>Longest Acoustic Songs</h2>
  </div>
  <div class="column" style="background-color:#ddd;">
    <h2>At the Club</h2>
  </div>
  <div class="column" style="background-color:#bbb;">
    <h2>Running Songs</h2>
  </div>
  <div class="column" style="background-color:#bbb;">
    <h2>Studying</h2>
  </div>
</div>


<div class="footer">
<p> In this assignment, we used HTML along with PHP to implement a table where songs could be populated by user request and interact with the databse to pull the information. We used CSS to style our php files as well as SQL queries to gather the data and prompt the information to the page.<br>br>
 COMP 3512 - Web Development II <br>
 Rebeka Ochieng, Faye Palarca, Guranjan Singh <br>
 https://github.com/fayepalarca/comp3512-assign1.git</p> </p>
</div>

</html>
<?php

function TopGenres() {
  $pdo = create_connection();
  $stmt = $pdo->query("SELECT genre_name, COUNT(song_id) AS song_count
  FROM songs 
  INNER JOIN genres  ON song.genre_id = genre.genre_id
  GROUP BY genre_name
  ORDER BY song_count DESC 10;");
  return $stmt->fetchAll();
}

function TopArtists() {
  $pdo = create_connection();
  $stmt = $pdo->query("SELECT artist_name, COUNT(song_id) AS song_count
  FROM songs 
  INNER JOIN artists  ON song.artist_id = artist.artist_id
  GROUP BY artist_name
  ORDER BY song_count DESC 10;");
  return $stmt->fetchAll();
}

function Popular() {
  $pdo = create_connection();
  $stmt = $pdo->query("SELECT song_title, artist_name, popularity
  FROM songs
  INNER JOIN artists ON songs.artist_id = artist.artist_id
  GROUP BY song_title
  ORDER BY popularity DESC 10;");
  return $stmt->fetchAll();
}

function OneHits() {
  $pdo = create_connection();
  $stmt = $pdo->query("SELECT song_title, artist_name, popularity
  FROM songs
  INNER JOIN artists ON song.artist_id = artist.artist_id
  WHERE artist.artist_id IN (
    SELECT artist_id
    FROM songs
    GROUP BY artist_id
    HAVING COUNT(song_id) = 1
  )
  ORDER BY popularity DESC 10;");
  return $stmt->fetchAll();
}

function Acoustic() {
  $pdo = create_connection();
  $stmt = $pdo->query("SELECT song_title, duration
  FROM songs
  INNER JOIN artists ON song.artist_id = artist.artist_id
  WHERE acousticness > 40
  ORDER BY duration DESC 10;");
  return $stmt->fetchAll();
}

function Club() {
  $pdo = create_connection();
  $stmt = $pdo->query("SELECT song_title, (danceability * 1.6 + energy * 1.4) AS danceability
  FROM songs
  INNER JOIN artists ON song.artist_id = artist.artist_id
  WHERE danceability > 80
  ORDER BY club_suitability DESC 10;");
  return $stmt->fetchAll();
}

function Running() {
  $pdo = create_connection();
  $stmt = $pdo->query("SELECT song_title, (energy * 1.3 + valence * 1.6) AS running
  FROM songs
  INNER JOIN artists ON song.artist_id = artist.artist_id
  WHERE bpm >= 120 AND bpm <= 125
  ORDER BY running DESC 10;");
  return $stmt->fetchAll();
}

function Studying() {
  $pdo = create_connection();
  $stmt = $pdo->query("SELECT song_title, ((acousticness * 0.8) + (100 - speechiness) + (100 - valence)) AS studying
  FROM songs
  INNER JOIN artists ON song.artist_id = artist.artist_id
  WHERE bpm >= 100 AND bpm <= 115 AND speechiness >= 1 AND speechiness <= 20
  ORDER BY studying DESC 10;");
  return $stmt->fetchAll();
}

?>

