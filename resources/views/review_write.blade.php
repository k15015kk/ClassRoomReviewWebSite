<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>書き込み画面</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- css -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/review_write_style.css') }}" />

    <!-- js -->
    <script src="{{ asset('js/review_write_script.js') }}"></script>
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
        </nav>

        <main>
            @if (session('status'))
            <div class="alert alert-danger">
                {{ session('status') }}
            </div>
            @endif

            <div class="add-form">
                <div class="star-area row">
                    <div class="star-title-area col-12">
                        <p class="star-title">星を押して評価！</p>
                    </div>
                    <div class="star-wrong-label-area col-2">
                        <p class="star-wrong-label">👎</p>
                    </div>
                    <div class="star-click-area col-8 row">
                        <p class="star" id="star-1">★</p>
                        <p class="star" id="star-2">★</p>
                        <p class="star" id="star-3">★</p>
                        <p class="star" id="star-4">★</p>
                        <p class="star" id="star-5">★</p>
                    </div>
                    <div class="star-good-label-area col-2">
                        <p class="star-good-label">👍</p>
                    </div>
                </div>
                <form method="POST" name="review-form" action="/review_write/check/{{$classroom_id}}" onsubmit="get_star()">
                    <div class="form-group">
                        <label for="inputUsername">ユーザ名</label>

                        @if (session('username'))
                        <input type="text" class="form-control" name='username' id="inputUsername" placeholder="UserName" value="{{session('username')}}"
                            required> 
                        @else
                        <input type="text" class="form-control" name='username' id="inputUsername" placeholder="UserName" required> 
                        @endif

                        <label for="inputReview">レビュー</label>

                        @if (session('review'))
                        <textarea class="form-control" name="review" id="inputReview" placeholder="Review" required>{{session('review')}}</textarea>
                        @else
                        <textarea class="form-control" name="review" id="inputReview" placeholder="Review" required></textarea>
                        @endif

                        <input type="hidden" name="star" id="classroomid">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </main>

    </div>
</body>

</html>