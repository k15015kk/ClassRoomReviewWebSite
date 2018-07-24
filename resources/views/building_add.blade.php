<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>書き込み画面</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- css -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/building_add_style.css') }}" />
</head>

<body>

    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/">教室レビュー</a>
        </nav>

        <main>
            @if (session('status'))
            <div class="alert alert-danger">
                {{ session('status') }}
            </div>
            @endif

            <div class="page-title">
                <h1>建物を追加します</h1>
            </div>

            <div class="add-form">
                <form method="POST" name="building-form" action="/building_add/check">
                    <div class="form-group">
                        <label for="inputBuildingname">建物名</label>

                        @if (session('buildingname'))
                        <input type="text" class="form-control" name='buildingname' id="buildingname" placeholder="BuildingName" value="{{session('buildingname')}}"
                            required> 
                        @else
                        <input type="text" class="form-control" name='buildingname' id="buildingname" placeholder="BuildingName" required> 
                        @endif

                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </main>

    </div>
</body>

</html>