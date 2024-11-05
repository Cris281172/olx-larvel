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
    <div>
        <h1>Kategorie</h1>
        <ul>
            @foreach($categories as $category)
                <li>
                    <span>{{$category->name}}</span>
                    <a href="{{route('category_delete', $category->id)}}">
                        Usuń
                    </a>
                    <a href="{{route('category_edit_view', $category->id)}}">
                        Edytuj
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
