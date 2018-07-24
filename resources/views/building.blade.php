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
            <a class="navbar-brand" href="/">教室レビュー</a>

            @guest

            @else
                <a class="navbar-text" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
        </nav>

        <main class="buildinglist">
            @if($data -> count() == 0)

            <div class="reviewNothing">
                <p class="nothingMessage">まだ登録はありません．</p>
            </div>

            @else

            <div class="row card-area">
                @foreach($data as $d)

                <div class="card text-white col-12">
                    <a class="card-body" href="/classroom/{{$d -> building_id}}">
                        <span class="card-title">{{$d -> building_name}}</span>
                    </a>
                </div>

                @endforeach
            </div>

            @endif

            @guest
            
            @else 
                <div class="write-button-area">
                    <a class="add-button" href="/building_add/show">
                        <span class "add-mark">+</span>
                    </a>
                </div>
            @endguest
        </main>
    </div>
</body>

</html>