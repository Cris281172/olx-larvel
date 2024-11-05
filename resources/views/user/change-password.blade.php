<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if(Session::has('error'))
        <p>
            {{Session::get('error')}}
        </p>
    @endif
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
            @endforeach
        </ul>
    @endif
    <form method="post" action="{{route('change_password')}}">
        @csrf
        <input type="password" name="current_password">
        <input type="password" name="new_password">
        <input type="password" name="repeat_new_password">
        <button type="submit">
            Zmień hasło
        </button>
    </form>
</body>
</html>
