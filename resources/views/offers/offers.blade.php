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
    <h1>Oferty</h1>
    <ul>
        @foreach($offers as $offer)
            <li>
                <p>Tytuł: {{$offer->title}}</p>
                <p>Cena: {{$offer->price}}</p>
                <p>Kategoria: {{$offer->categories->name}}</p>
                <a href="{{route('offer_get', $offer->id)}}">Podgląd</a>
            </li>
        @endforeach
    </ul>
</body>
</html>
