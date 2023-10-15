<html>
<body>

<?php 

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if ($_POST['songsearch'] == "title"){
        echo $_POST['title'];
    }else if ($_POST['songsearch'] == 'artist'){
        echo $_POST['artist'];
    }else if ($_POST['songsearch'] == 'genre'){
        echo $_POST['genre'];
    }else if ($_POST['songsearch'] == 'less'){
        echo $_POST['year'];
    }else if ($_POST['songsearch'] == 'greater'){
        echo $_POST['year'];
    } else {
        echo "No song found.";
        die();
    }
}

?>
</body>
</html>