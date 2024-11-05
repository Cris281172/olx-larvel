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
                {{$error}}
            @endforeach
        </ul>
    @endif
    <form method="post" action={{route('category_create')}}>
        @csrf
        <input type="text" name="name" placeholder="Nazwa kategorii">
        <button type="submit">
            Dodaj
        </button>
    </form>
</body>
</html>
