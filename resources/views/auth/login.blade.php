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
    <form method="post" action={{route('login')}}>
        @csrf;
        <input name="email" placeholder="Email" type="email" value="krzysztofjuczynski@gmail.com" />
        <input name="password" placeholder="Password" type="password" value="Test12345" />
        <button type="submit">
            Zaloguj się
        </button>
    </form>
</body>
</html>
