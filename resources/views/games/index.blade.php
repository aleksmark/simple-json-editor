<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">

    <link href="css/node_modules/jsoneditor.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/master.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="container">
        <div class="centered text-center">
            <h1> GAMES </h1>

            <ul class="list-group">
                <button type="button" class="btn-game list-group-item" value='{"name": "game 1","win_rate": 100,"credits": "credits 1"}'>ID: 1</button>
                <button type="button" class="btn-game list-group-item" value='{"name": "game 2","win_rate": 200,"credits": "credits 2"}''>ID: 2</button>
                <button type="button" class="btn-game list-group-item" value='{"name": "game 3","win_rate": 300,"credits": "credits 3"}''>ID: 3</button>
                <button type="button" class="btn-game list-group-item" value='{"name": "game 4","win_rate": 400,"credits": "credits 4"}''>ID: 4</button>
                <button type="button" class="btn-game list-group-item" value='{"name": "game 5","win_rate": 500,"credits": "credits 5"}''>ID: 5</button>
            </ul>

            <div id="jsoneditor" hidden></div>

            <button type='button' id='btn-save' class='btn btn-primary'>SAVE</button>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/node_modules/jsoneditor.min.js"></script>
    <script src="js/master.js"></script>
</body>
</html>
