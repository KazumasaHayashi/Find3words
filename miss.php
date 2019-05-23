<?php

if (array_key_exists('lng', $_GET) && array_key_exists('lat', $_GET)) {
    $urlContents = file_get_contents("https://api.what3words.com/v2/reverse?coords=" . $_GET['lat'] . "%2C" . $_GET['lng'] . "&key=3HYXQK2F&lang=ja&format=json&display=full");

    $geoArray = json_decode($urlContents, true);
    //print_r($geoArray);

    //echo $geoArray[words];
}
//print $_GET['lat'];
//print $_GET['lng'];

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>geo3words</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <style type="text/css">

    div{
        padding: 20px;
    }

    body{
        
    }

    .bg{
        background-image: url("map.jpg");
        background-position: center;
        height: 500;
    }

    .bg-mask{
        height: 500;
        background-color: rgba(0,0,0,0,6);
    }

    </style>

</head>

<body>
    
<div class="container">
    <div class="bg">
        <div class="bg-mask">
            <div class="col-6">
                <h1 class="display-3">FIND 3WORDS!</h1>
            </div>
        
            <form>
                <div class="form-group">
                    <div class="row">
                    <input type="text" class="form-control col-4" name="lat" placeholder="緯度：12">
                    <input type="text" class="form-control col-4" name="lng" placeholder="経度：0">
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-success btn-lg btn-block">Find!</button>
             </form>

            <div id="geo3words">
            <?php 
            if ($geoArray) {
                echo '<h2><div class="alert alert-primary" role="alert" name="result">RESULT：' . $geoArray[words] . '</div></h2>';
            }
            ?>
            </div>
        </div>
    </div>
</div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>