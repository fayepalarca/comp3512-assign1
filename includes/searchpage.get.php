
<html>
<body>

    <?php
    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        if ($_GET['songsearch == (title)']){
            echo ($_GET["title"]);
            echo ("<br/>");
        }else if ($_GET['songsearch == (artist)']){
            echo $_GET['artist'];
            echo ("<br/>");
        }else if ($_GET['songsearch == genre']){
            echo $_GET['genre'];
            echo ("<br/>");
        }else if ($_GET['songsearch == less']){
            echo $_GET['year'];
            echo ("<br/>");
        }else if ($_GET['songsearch == greater']){
            echo $_GET['year'];
            echo ("<br/>");
        } else {
            echo "No song found.";
            die();
    }
     
    }

    ?>
</body>
</html>