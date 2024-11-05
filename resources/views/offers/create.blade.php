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
    <form method="post" action={{route('offer_create')}}>
        @csrf
        <input placeholder="Tytuł" name="title" type="text" />
        <textarea name="description">
            Opis
        </textarea>
        <input placeholder="Cena" name="price" type="number" >
        <input placeholder="Lokalizacja" name="location" type="text">
        <select name="type_id">
            @foreach($types as $type)
                <option value="{{$type->id}}">
                    {{$type->name}}
                </option>
            @endforeach
        </select>
        <select name="category_id">
            @foreach($categories as $category)
                <option value="{{$category->id}}">
                    {{$category->name}}
                </option>
            @endforeach
        </select>
        <button type="submit">
            Stwórz
        </button>
    </form>
</body>
</html>
