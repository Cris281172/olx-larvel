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
    <form method="post" action="{{route('offer_edit', $offer->id)}}">
        @csrf
        <input placeholder="Tytuł" name="title" type="text" value="{{$offer->title}}" />
        <textarea name="description">
            {{$offer->description}}
        </textarea>
        <input placeholder="Cena" name="price" type="number" value="{{$offer->price}}">
        <input placeholder="Lokalizacja" name="location" type="text" value="{{$offer->location}}">
        <select name="type_id">
            <option value="1">
                Typ
            </option>
        </select>
        <select name="category_id">
            @foreach($categories as $category)
                <option value="{{$category->id}}">
                    {{$category->name}}
                </option>
            @endforeach
        </select>
        <button type="submit">
            Edytuj
        </button>
    </form>
</body>
</html>
