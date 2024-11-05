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
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
            @endforeach
        </ul>
    @endif
    <form method="post" action={{route('register')}}>
        @csrf;
        <input placeholder="Name" name="name" type="text" />
        <input placeholder="Email" name="email" type="email" />
        <input placeholder="Password" name="password" type="password" />
        <input placeholder="Password Repeat" name="password_repeat" type="password" />
        <button type="submit">
            Zarejestruj się
        </button>
    </form>
</body>
</html>
