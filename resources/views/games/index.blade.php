<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link href="css/node_modules/jsoneditor.min.css" rel="stylesheet" type="text/css">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="css/master.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
            <div id="main-wrapper" class="centered text-center">
                <h1> GAMES </h1>

                <ul class="list-group">
                    @foreach ($games as $game)
                        <button type="button" class="btn-game list-group-item" value='{{ $game->settings }}' game-id="{{ $game->id }}">
                            ID: {{ $game->id }}
                        </button>
                    @endforeach
                </ul>

                <div id="jsoneditor" hidden></div>

                <button type='button' id='btn-save' class='btn btn-primary'>SAVE</button>
            </div>
        </div>

        <script src="js/jquery.min.js"></script>
        <script src="js/node_modules/jsoneditor.min.js"></script>
        <script src="js/master.js"></script>

        <script>
            var URL = {
                gameUpdate: '{{ route('game-update', 'id') }}'
            }
        </script>
    </body>
</html>
