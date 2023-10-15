<?php
class DBUtils {
    public static function executeQuery($dbLink, $sql, $params) {
        $statement = $dbLink->prepare($sql);
        $statement->execute($params);
        return $statement;
    }
}
try {
    $db = new PDO('sqlite:music.db');
} catch (PDOException $e) {
    echo "Connection error: " . $e->getMessage();
}

class ArtistRepo {
    private static $primaryQuery = "SELECT * FROM artists";
    private $dbLink;  // making this property consistent across all classes
    
    public function __construct($dbLink) {
        $this->dbLink = $dbLink;
    }

    public function retrieveAllArtists() {
        $sql = self::$primaryQuery;
        $result = DBUtils::executeQuery($this->dbLink, $sql, null);
        return $result->fetchAll();
    }
}

class SongRepo {
    private static $primaryQuery = "SELECT acousticness, artist_name, bpm, danceability, duration, energy, genre_name, liveness, 
    popularity, song_id, speechiness, title, type_id, type_name, valence, year 
    FROM songs 
    INNER JOIN genres ON songs.genre_id = genres.genre_id 
    INNER JOIN artists ON songs.artist_id = artists.artist_id 
    INNER JOIN types ON artists.artist_type_id = types.type_id";
    private $dbLink;  
    
    public function __construct($dbLink) {
        $this->dbLink = $dbLink;
    }

    public function retrieveAllSongs() {
        $sql = self::$primaryQuery;
        $statement = DBUtils::executeQuery($this->dbLink, $sql, null);
        return $statement->fetchAll();
    }
}

class GenreRepo {
    private static $primaryQuery = "SELECT * FROM genres ORDER BY genre_id";  // corrected ORDER BY clause
    private $dbLink;
    
    public function __construct($dbLink) {
        $this->dbLink = $dbLink;
    }

    public function retrieveAllGenres() {
        $sql = self::$primaryQuery;
        $statement = DBUtils::executeQuery($this->dbLink, $sql, null);
        return $statement->fetchAll();
    }
}

class TypeRepo {
    private static $primaryQuery = "SELECT * FROM types ORDER BY type_id";  // corrected ORDER BY clause
    private $dbLink;
    
    public function __construct($dbLink) {
        $this->dbLink = $dbLink;
    }

    public function retrieveAllTypes() {
        $sql = self::$primaryQuery;
        $statement = DBUtils::executeQuery($this->dbLink, $sql, null);
        return $statement->fetchAll();
    }
}

?>
