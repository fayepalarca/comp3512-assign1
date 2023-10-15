<!DOCTYPE html>
<html lang='en'>
<head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, inital-scale="1.0">
        <link rel="stylesheet" href="searchpage.css">
        <title>Song Search</title>
</head>

<div class="header">
    <h1>Music Browser </h1> 
</div>

<body>
        <h2>
         Song Search
        </h2>
            <form action="browse_search_results.php" method="POST">

                <div id="group">
                     <input type="radio" id="Title" name="songsearch" value="title">
                    <label for="Title"> Title <input type="text" title="title" ></label> </br>
                </br>

                    <input type="radio" id="Artist" name="songsearch" value="artist">
                    <label for="Artist">Artist</label> 
                    <select name="artist" id="Artist">
                        <option></option>
                    </select>
                </br></br>

                    <input type="radio" id="Genre" name="songsearch" value="genre">
                    <label for="Genre">Genre </label>
                    <select name="genre" id="Grtist">
                        <option>  </option>
                    </select>
                    </br>
                </br>


                    <label for="Year"> Year</label>
                </br>
                </br>
            </div>
                    <input type="radio" id="less" name="songsearch" value="less">
                    <label for="less"> Less than </label>
                    <input type="number" id="less" name="songsearch" max="2019" min="2016">

                    <input type="radio" id="greater" name="songsearch" value="greater">
                    <label for="greater"> Greater than</label>   
                    <input type="number" id="greater" name="songsearch" max="2019" min="2016">
                </br>
         </div>
        </div>
        </br>
        <button> <input type="submit" value="Search">
            </button>

     </form>
</body>

<div class="footer"></div>

</html>

<?php

include 'searchpage.html';

$request_method = $_SERVER['REQUEST_METHOD'];

if ($request_method === 'GET') {
    include 'get.php';
} elseif ($request_method === 'POST') {
    include 'post.php';
} else 
    echo "Invalid Input";
    die();

$sql = mysqli_query($connection, "SELECT artist_name FROM artist");
$result = $db->query($sql);

$sql = mysqli_query($connection, "SELECT genre_name FROM genre");
$result = $db->query($sql);
