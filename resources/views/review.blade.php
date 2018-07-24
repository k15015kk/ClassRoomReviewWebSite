<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- css -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/review_style.css') }}" />
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/">教室レビュー</a>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/classroom/{{$building_data -> building_id}}">教室選択へ</a>
                    </li>

                </ul>
            </div>

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
            <div class="card classroom-body">
                <div class="card-body classroom-title row">
                    <div class="classroom-infomation col-12">
                        <p class="building card-title">{{$building_data -> building_name}}</p>
                        <p class="classroom card-title">{{$classroom_data -> classroom_name}}</p>
                    </div>

                    <p class="star-average card-subtitle col-12">★ {{$classroom_data -> star_average}}</p>
                </div>
            </div>


            @if($data -> count() == 0)

            <div class="reviewNothing">
                <p class="nothingMessage">まだ書き込みはありません</p>
            </div>

            @else @foreach($data as $d)

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-muted">
                        <span>@</span>{{$d -> username}}</h5>
                    <h6 class="card-subtitle star">★ {{$d -> star}}</h6>
                    <hr>
                    <p class="card-text">{{$d -> review}}</p>

                    @guest
                        
                    @else
                    <div class="delete-button-area">
                        <button type="submit" class="btn btn-danger" form="delete-{{$d -> review_id}}">削除</button>
                    </div>

                    <form id="delete-{{$d -> review_id}}" action="/review/delete/{{$d -> review_id}}" method="POST" style="display: none;">
                        <input type="hidden" name="reviewid" value="{{$d -> review_id}}">
                        <input type="hidden" name="classroomid" value="{{$classroom_data -> classroom_id}}">
                        @csrf
                    </form>
                    @endguest
                </div>
            </div>
            @endforeach @endif

            @guest
            <div class="write-button-area">
                <a class="add-button" href="/review_write/show/{{$classroom_data -> classroom_id}}">
                    <span class "add-mark">+</span>
                </a>
            </div>
            @endguest
        </main>
    </div>
</body>

</html>