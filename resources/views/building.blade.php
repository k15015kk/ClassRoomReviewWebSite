<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>建物選択</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- css -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/building_style.css') }}" />

</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">教室レビュー</a>
        </nav>

        <main class="buildinglist">
            <div class="card-deck">
                @foreach($data as $d)

                <div class="card text-white xl-3">
                    <a class="card-body" href="./classroom/{{$d -> building_id}}">
                        <span class="card-title">{{$d -> building_name}}</span>
                    </a>
                </div>

                @endforeach
        </main>

        </div>

</body>

</html>