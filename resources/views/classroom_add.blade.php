<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>書き込み画面</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- css -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/classroom_add_style.css') }}" />
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
                <h1>教室を追加します</h1>
            </div>

            <div class="add-form">
                <form method="POST" name="classroom-form" action="/classroom_add/check/{{$building_id}}">
                    <div class="form-group">
                        <label for="inputClassroomname">教室名</label>

                        @if (session('classroomname'))
                        <input type="text" class="form-control" name='classroomname' id="classroomname" placeholder="ClassroomName" value="{{session('classroomname')}}"
                            required> 
                        @else
                        <input type="text" class="form-control" name='classroomname' id="classroomname" placeholder="ClassroomName" required> 
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